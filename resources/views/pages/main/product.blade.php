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
                                <h4 class="card-title">Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="product-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Variabel</th>
                                                <th>Code</th>
                                                <th>Produk</th>
                                                <th>Harga Satuan</th>
                                                <th>Kadaluarsa</th>
                                                <th>Stok</th>
                                                <th>Penjualan Aktual</th>
                                                <th>Peramalan</th>
                                                <th>Aksi</th>
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
                                                    <td>Aksi</td>
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
