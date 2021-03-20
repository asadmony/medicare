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
                        Users enrolled for @if(isset($takenCourse)) {{ $takenCourse->course->title }} @else $takenPackage->title @endif
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>No. of Taken Courses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($takenCourseUsers->currentPage() - 1) * $takenCourseUsers->perPage() + 1); ?>
                                @foreach ($takenCourseUsers as $takenCourseUser)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$takenCourseUser->user->name}}</td>
                                    <td>{{$takenCourseUser->user->email}}</td>
                                    <td>{{$takenCourseUser->user->mobile}}</td>
                                    <td>{{$takenCourseUser->takenCourses->count()}}</td>

                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>

                        {{ $takenCourseUsers->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
