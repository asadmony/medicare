@extends('subrole.layouts.subRoleMaster')

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
                        @if (isset($certificatesOnly))
                        List of all successful Exam Attempts
                        @else
                        List of Exam Attempts of
                        @if(isset($takenCourse))
                        Course: {{ $takenCourse->course->title }}
                        @elseif(isset($role))
                        @if ($role->title == "assessor")
                            Company Members
                            @else
                            {{ $role->user->email }}
                            @endif
                        @else
                        Company: {{ $company->company_code }} @endif
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    @if (isset($takenAttempts))
                    @include('company.exam.modules.examAttemptTable')
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
