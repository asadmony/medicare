@extends('company.layouts.companyMaster')

@push('css')
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
                        List of Courses
                    </h3>
                </div>
                @include('company.course.modules.courseListTable')
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
