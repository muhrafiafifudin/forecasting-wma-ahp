@extends('layouts.app')

@section('title')
    Proses WMA - AHP
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Proses WMA - AHP</h4>
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
                                    <h4 class="card-title">Proses WMA - AHP</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="actual-sale-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th rowspan="3">Kriteria</th>
                                                <th rowspan="3">Produk</th>
                                                <th colspan="{{ $count_criteria }}">Kriteria (Rata - Rata)</th>
                                                <th rowspan="3">Rata - Rata</th>
                                                <th rowspan="3">Ranking</th>
                                            </tr>
                                            <tr>
                                                @foreach ($criterias as $criteria)
                                                    <th>{{ $criteria->variable }}</th>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach ($criterias as $criteria)
                                                    <th>{{ $criteria->result_pv }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>(A1)</td>
                                                <td>Sosis Ayam</td>
                                                <td>2,306031</td>
                                                <td>2,306031</td>
                                                <td>2,306031</td>
                                                <td>2,306031</td>
                                                <td>2,306031</td>
                                                <td>2</td>
                                            </tr>
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
    <script src="{{ asset('assets/js/pages/main/actual_sale.js') }}"></script>

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
