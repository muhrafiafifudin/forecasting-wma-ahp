@extends('layouts.app')

@section('title')
    Hasil Pembobotan Kriteria
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Hasil Pembobotan Kriteria</h4>
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
                                <h4 class="card-title">Hasil Pembobotan Kriteria</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="ahp-weighting-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Kriteria</th>

                                                @php  @endphp
                                                @for ($i=0; $i <= ($count_criteria-1); $i++)
                                                    <th>{{ $listName[$i] }}</th>

                                                @endfor
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($x=0; $x <= ($count_criteria - 1); $x++)
                                                <tr>
                                                    <td>{{ $listName[$x] }}</td>

                                                    @for ($y=0; $y <= ($count_criteria - 1); $y++)
                                                        <td>{{ round($matrix[$x][$y], 5) }}</td>
                                                    @endfor
                                                </tr>
                                            @endfor
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Jumlah</th>

                                                @for ($i=0; $i <= ($count_criteria-1); $i++)
                                                    <th>{{ round($sum_matrix_criteria[$i], 5) }}</th>
                                                @endfor
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Matrik Nilai Kriteria</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="ahp-weighting-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Kriteria</th>

                                                @php  @endphp
                                                @for ($i=0; $i <= ($count_criteria-1); $i++)
                                                    <th>{{ $listName[$i] }}</th>
                                                @endfor

                                                <th>Jumlah</th>
                                                <th>Rata - Rata</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($x=0; $x <= ($count_criteria - 1); $x++)
                                                <tr>
                                                    <td>{{ $listName[$x] }}</td>

                                                    @for ($y=0; $y <= ($count_criteria - 1); $y++)
                                                        <td>{{ round($comparison_matrix[$x][$y], 5) }}</td>
                                                    @endfor

                                                    <td>{{ round($sum_eigen[$x], 5) }}</td>
                                                    <td>{{ round($mean[$x], 5) }}</td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="{{ $count_criteria + 2 }}">Principe Eigen Vector (λ maks)</th>
                                                <th>{{ round($eigen_vector, 5) }}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="{{ $count_criteria + 2 }}">Consistency Index</th>
                                                <th>{{ round($consistency_index, 5) }}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="{{ $count_criteria + 2 }}">Consistency Ratio</th>
                                                <th>{{ round($consistency_ratio, 5) }}</th>
                                            </tr>
                                        </tfoot>
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
    <script src="{{ asset('assets/js/pages/forecasting_ahp/ahp_weighting.js') }}"></script>
@endpush
