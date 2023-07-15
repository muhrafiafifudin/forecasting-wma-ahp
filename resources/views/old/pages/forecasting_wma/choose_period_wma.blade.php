@extends('layouts.app')

@section('title')
    Peramalan Periode WMA
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Peramalan Periode WMA</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Peramalan Periode WMA</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Peramalan Periode WMA</h4>
                            <p class="text-muted m-b-30">
                                Memasukkan periode yang akan dihitung untuk peramalan wma yang tersedia.
                            </p>

                            <form action="">
                                <div class="mb-3">
                                    <label class="form-label">Single Select</label>
                                    <select class="form-control select2 select-form">
                                        <option>Select</option>
                                        <option value="AK">Alaska</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        $(document).ready(function () {
            $(".select-form").select2();
        });
    </script>
@endpush
