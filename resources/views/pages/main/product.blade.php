@extends('layouts.app')

@section('title')
    Produk
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Produk</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Produk</h4>
                            <p class="text-muted m-b-30">
                                Menampilkan semua data produk yang tersedia.
                            </p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Alternatif</th>
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
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
