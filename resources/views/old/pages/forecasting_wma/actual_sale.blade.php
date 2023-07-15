@extends('layouts.app')

@section('title')
    Penjualan Aktual
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Penjualan Aktual</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Penjualan Aktual</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Penjualan Aktual</h4>
                            <p class="text-muted m-b-30">
                                Menampilkan semua data pernjualan aktual yang tersedia.
                            </p>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Produk</th>

                                        @foreach ($filters as $filter)
                                            <th>{{ \Carbon\Carbon::create()->month($filter->month)->monthName }} ({{ $filter->year }})</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $product->product }}</td>

                                        @foreach ($filters as $filter)
                                            <td>{{ $actual_sales[$product->id][$filter->month][$filter->year] }}</td>
                                        @endforeach
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
