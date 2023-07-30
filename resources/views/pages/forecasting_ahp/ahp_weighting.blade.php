@extends('layouts.app')

@section('title')
    Pembobotan Kriteria
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Pembobotan Kriteria</h4>
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
                            <a href="#">Pembobotan AHP</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Pembobotan</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-primary" role="alert">
                            Masukan nilai pembobotan antar kriteria untuk melakukan perhitungan perbandingan matriks kriteria (Nilai tidak boleh minus)
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pembobotan Kriteria</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{ route('ahp.store') }}" method="POST">
                                        @csrf
                                        @method('POST')

                                        <table id="ahp-weighting-table" class="display table table-striped table-hover" >
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Kriteria</th>
                                                    <th>Nilai Perbandingan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $no = 0; $count_criteria = count($criterias); @endphp
                                                    @for ($x=0; $x <= ($count_criteria - 2); $x++)
                                                        @for ($y=($x+1); $y <= ($count_criteria - 1) ; $y++)
                                                            @php $no++ @endphp
                                                            <tr>
                                                                <td>{{ $ahp_weighting[$x] }}</td>
                                                                <td>{{ $ahp_weighting[$y] }}</td>
                                                                <td>
                                                                    <input type="number" step="any" class="form-control" name="weighting_{{ $no }}" placeholder="Masukkan Bobot" required>
                                                                </td>
                                                            </tr>
                                                        @endfor
                                                    @endfor
                                            </tbody>
                                        </table>

                                        <div class="text-center mt-5">
                                            <button type="submit" class="btn btn-secondary">Lakukan Pembobotan</button>
                                        </div>
                                    </form>
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
