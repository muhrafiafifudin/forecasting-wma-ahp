@extends('layouts.app')

@section('title')
    Produk
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Produk</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Data Master</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Produk</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Produk</h4>
                                    <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addProduct">
                                        <i class="fa fa-plus mr-2"></i>
                                        Tambah Produk
                                    </button>
                                </div>

                                <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('product.store') }}" method="POST">
                                                @csrf
                                                @method('POST')

                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <strong>
                                                            Form Tambah Produk
                                                        </strong>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="variable">Variabel</label>
                                                        <input type="text" class="form-control" name="variable" placeholder="Masukkan Variabel">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Kode</label>
                                                        <input type="text" class="form-control" name="code" placeholder="Masukkan Kode">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Produk</label>
                                                        <input type="text" class="form-control" name="product" placeholder="Masukkan Produk">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Harga</label>
                                                        <input type="number" class="form-control" name="price" placeholder="Masukkan Harga">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Tanggal Kadaluarsa</label>
                                                        <input type="date" class="form-control" name="exp_date" placeholder="Masukkan Tanggal Kadaluarsa">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Stok</label>
                                                        <input type="number" class="form-control" name="stock" placeholder="Masukkan Stok">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Penjualan Aktual</label>
                                                        <input type="number" class="form-control" name="actual_sale" placeholder="Masukkan Penjualan Aktual">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Peramalan</label>
                                                        <input type="number" class="form-control" name="forecasting" placeholder="Masukkan Peramalan">
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" id="addRowButton" class="btn btn-primary">Tambah</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="product-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th width="50px">No.</th>
                                                <th>Variabel</th>
                                                <th>Code</th>
                                                <th>Produk</th>
                                                <th>Harga Satuan</th>
                                                <th>Kadaluarsa</th>
                                                <th>Stok</th>
                                                <th>Penjualan Aktual</th>
                                                <th>Peramalan</th>
                                                <th width="50px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $product->variable }}</td>
                                                    <td>{{ $product->code }}</td>
                                                    <td>{{ $product->product }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->exp_date }}</td>
                                                    <td>{{ $product->stock }}</td>
                                                    <td>{{ $product->actual_sale }}</td>
                                                    <td>{{ $product->forecasting }}</td>
                                                    <td>
                                                        <form action="{{ route('product.destroy', \Crypt::encrypt($product->id)) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <div class="form-button-action">
                                                                <a href="#" class="btn btn-link btn-primary" data-toggle="modal" data-target="#editProduct_{{ $product->id }}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                <button type="submit" class="btn btn-link btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @foreach ($products as $product)
                                        <div class="modal fade" id="editProduct_{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('product.update', \Crypt::encrypt($product->id)) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <strong>
                                                                    Form Ubah Produk
                                                                </strong>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="variable">Variabel</label>
                                                                <input type="text" class="form-control" name="variable" value="{{ $product->variable }}" placeholder="Masukkan Variabel">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Kode</label>
                                                                <input type="text" class="form-control" name="code" value="{{ $product->code }}" placeholder="Masukkan Kode">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Produk</label>
                                                                <input type="text" class="form-control" name="product" value="{{ $product->product }}" placeholder="Masukkan Produk">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Harga</label>
                                                                <input type="number" class="form-control" name="price" value="{{ $product->price }}" placeholder="Masukkan Harga">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Tanggal Kadaluarsa</label>
                                                                <input type="date" class="form-control" name="exp_date" value="{{ $product->exp_date }}" placeholder="Masukkan Tanggal Kadaluarsa">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Stok</label>
                                                                <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" placeholder="Masukkan Stok">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Penjualan Aktual</label>
                                                                <input type="number" class="form-control" name="actual_sale" value="{{ $product->actual_sale }}" placeholder="Masukkan Penjualan Aktual">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Peramalan</label>
                                                                <input type="number" class="form-control" name="forecasting" value="{{ $product->forecasting }}" placeholder="Masukkan Peramalan">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('assets/js/pages/main/product.js') }}"></script>

    @if($message = Session::get('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success("{{ $message }}");
            })
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.error("{{ $message }}");
            })
        </script>
    @endif
@endpush
