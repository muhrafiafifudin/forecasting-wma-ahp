@extends('layouts.app')

@section('title')
    Kriteria
@endsection

@section('content')
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Kriteria</h4>
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
                            <a href="#">Data Master</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Kriteria</a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Kriteria</h4>
                                    <button class="btn btn-secondary btn-round ml-auto" data-toggle="modal" data-target="#addCriteria">
                                        <i class="fa fa-plus mr-2"></i>
                                        Tambah Kriteria
                                    </button>

                                    <div class="modal fade" id="addCriteria" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('criteria.store') }}" method="POST">
                                                    @csrf
                                                    @method('POST')

                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <strong>
                                                                Form Tambah Kriteria
                                                            </strong>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="variable">Variabel</label>
                                                            <input type="text" class="form-control" name="variable" placeholder="Masukkan Variabel">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="criteria">Kriteria</label>
                                                            <input type="text" class="form-control" name="criteria" placeholder="Masukkan Kriteria">
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
                                    <table id="criteria-table" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>
                                                <th width="50px">No.</th>
                                                <th>Variabel</th>
                                                <th>Kriteria</th>
                                                <th width="50px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($criterias as $criteria)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $criteria->variable }}</td>
                                                    <td>{{ $criteria->criteria }}</td>
                                                    <td>
                                                        <form action="{{ route('criteria.destroy', \Crypt::encrypt($criteria->id)) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <div class="form-button-action">
                                                                <a href="#" class="btn btn-link btn-primary" data-toggle="modal" data-target="#editCriteria_{{ $criteria->id }}">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>

                                                                <button type="submit" class="btn btn-link btn-danger">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @foreach ($criterias as $criteria)
                                        <div class="modal fade" id="editCriteria_{{ $criteria->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('criteria.update', \Crypt::encrypt($criteria->id)) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <strong>
                                                                    Form Ubah Kriteria
                                                                </strong>
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="variable">Variabel</label>
                                                                <input type="text" class="form-control" name="variable" value="{{ $criteria->variable }}" placeholder="Masukkan Variabel">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="criteria">Kriteria</label>
                                                                <input type="text" class="form-control" name="criteria" value="{{ $criteria->criteria }}" placeholder="Masukkan Kriteria">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer no-bd">
                                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
    <script src="{{ asset('assets/js/pages/main/criteria.js') }}"></script>

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
