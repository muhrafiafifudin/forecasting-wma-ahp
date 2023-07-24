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

                                    <a href="{{ route('wma-ahp.print-excel') }}" target="_blank" class="btn btn-primary btn-round ml-auto">
                                        Print Data
                                    </a>
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
                                                    <th>{{ round($criteria->result_pv, 5) }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($x=0; $x < $count_product; $x++)
                                                <tr>
                                                    <td>{{ $listVar[$x] }}</td>
                                                    <td>{{ $listName[$x] }}</td>

                                                    @for ($y=0; $y < $count_criteria; $y++)
                                                        <td>{{ round($result[$x][$y], 5) }}</td>
                                                    @endfor

                                                    <td>{{ $sum_result[$x] }}</td>
                                                    <td>{{ $ranking[$x]['rank'] }}</td>
                                                </tr>
                                            @endfor
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
