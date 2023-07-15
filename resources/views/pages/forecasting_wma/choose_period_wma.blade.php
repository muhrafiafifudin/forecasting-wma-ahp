@extends('layouts.app')

@section('title')
    Peramalan Periode WMA
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Peramalan Periode WMA</h4>
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
                                <h4 class="card-title">Peramalan Periode WMA</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('wma.result-wma') }}" method="POST">
                                    @csrf
                                    @method('POST')

                                    <div class="row">
                                        <div class="col-lg-1"></div>
                                        <div class="col-lg-1">
                                            <label>Bulan</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="select2-input">
                                                <select name="month" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April</option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-1">
                                            <label>Tahun</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="select2-input">
                                                <select name="year" class="form-control">
                                                    <option value="">&nbsp;</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('assets/js/pages/forecasting_wma/choose_period.js') }}"></script>
@endpush
