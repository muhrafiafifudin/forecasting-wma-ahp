@extends('layouts.app')

@section('title')
    Data Peramalan WMA
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data Peramalan WMA</h4>
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
                            <a href="#">Peramalan WMA</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Data Ramal</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Peramalan WMA</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="forecast-data-table" class="display table table-striped table-hover" >
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('assets/js/pages/forecasting_wma/forecast_data.js') }}"></script>
@endpush
