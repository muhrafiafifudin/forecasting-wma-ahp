@extends('layouts.app')

@section('title')
    Nilai Bobot Alternatif
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Nilai Bobot Alternatif</h4>
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
                                    <h4 class="card-title">Nilai Bobot Alternatif</h4>
                                    <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addActualSale">
                                        <i class="fa fa-plus mr-2"></i>
                                        Nilai Bobot Alternatif
                                    </button>

                                    <div class="modal fade" id="addActualSale" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('alternative-weight.change-data') }}" method="POST">
                                                    @csrf
                                                    @method('POST')

                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <strong>
                                                                Form Nilai Bobot Alternatif
                                                            </strong>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="weight">Bobot</label>
                                                            <select name="weight" class="form-control">
                                                                <option value="">Pilih Bobot</option>
                                                                @foreach ($weights as $weight)
                                                                    <option value="{{ $weight }}">{{ $weight }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="criteria_id">Kriteria</label>
                                                            <select name="criteria_id" class="form-control">
                                                                <option value="">Pilih Kriteria</option>

                                                                @foreach ($criterias as $criteria)
                                                                    <option value="{{ $criteria->id }}">({{ $criteria->variable }}) {{ $criteria->criteria }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="product_id">Produk</label>
                                                            <select name="product_id" class="form-control">
                                                                <option value="">Pilih Produk</option>

                                                                @foreach ($products as $product)
                                                                    <option value="{{ $product->id }}">({{ $product->variable }}) {{ $product->product }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="alternative-weight-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Bobot</th>

                                                @foreach ($criterias as $criteria)
                                                    <th>({{ $criteria->variable }}) {{ $criteria->criteria }}</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($alternative_weight_distinct as $data)
                                                <tr>
                                                    <td>{{ $data->weight }}</td>

                                                    @foreach ($criterias as $criteria)
                                                        <td>{{ $alternative_weight[$data->weight][$criteria->id] }}</td>
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
    <script src="{{ asset('assets/js/pages/main/alternative_weight.js') }}"></script>

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
