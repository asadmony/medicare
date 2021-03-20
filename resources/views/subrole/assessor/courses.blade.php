@extends('subrole.layouts.subRoleMaster')

@push('css')
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        List of Taken Courses By the members of this company.
                    </h3>
                </div>
                @include('company.course.modules.courseListTable')
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
@endpush