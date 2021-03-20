@extends('subrole.layouts.subRoleMaster')

@push('css')
<!-- Theme style -->
{{-- <link rel="stylesheet" href="{{ asset('cp/dist/css/adminlte.min.css') }}"> --}}
<style>
    tr.nowrap td {
        white-space: nowrap;
    }
</style>

@endpush

@section('content')
{{-- @section('contents') --}}
<div class="container">
    {{-- <section class="content"> --}}
    <div class="p-2 ">
        {{-- @include('company.layouts.companyTopNav') --}}
    </div>


    <div class="row">

        <div class="col-sm-12">

            @include('alerts.alerts')

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Course Matrix
                    </h3>
                </div>
                <div class="card-body">
                    @include('company.course.modules.courseMatrixTable')
                </div>
            </div>
        </div>
    </div>

    </section>
</div>


<div class="modal fade" id="message">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection


@push('js')
<!-- AdminLTE App -->
{{-- <script src="{{ asset('cp/dist/js/adminlte.min.js') }}"></script> --}}
@endpush
