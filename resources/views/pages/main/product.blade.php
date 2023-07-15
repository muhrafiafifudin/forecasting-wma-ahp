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
                            <a href="#">Tables</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Datatables</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Produk</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addProduct">
                                        <i class="fa fa-plus"></i>
                                        Tambah Produk
                                    </button>
                                </div>

                                <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
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
                                                <form>
                                                    <div class="form-group">
                                                        <label for="variable">Variabel</label>
                                                        <input type="text" class="form-control" name="variable" placeholder="Masukkan Variabel">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="criteria">Kriteria</label>
                                                        <input type="text" class="form-control" name="criteria" placeholder="Masukkan Kriteria">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="button" id="addRowButton" class="btn btn-primary">Tambah</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
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
                                                        <div class="form-button-action">
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</button>
															<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
																<i class="fa fa-times"></i>
															</button>
														</div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
@endpush
