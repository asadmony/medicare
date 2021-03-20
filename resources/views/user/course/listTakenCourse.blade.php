@extends('user.layouts.userMaster')

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
                        Pakcages
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Title</th>
                                    <th>Course Code</th>
                                    <th>Package</th>
                                    <th>Enrolled From</th>
                                    <th>Total Attempts</th>
                                    <th>Score</th>
                                    <th>Expire Date</th>
                                    <th width="300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($takenCourses->currentPage() - 1) * $takenCourses->perPage() + 1); ?>
                                @foreach ($takenCourses as $utc)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$utc->course_title}}</td>
                                    <td>{{$utc->course ? $utc->course->course_code : ''}}</td>
                                    <td>
                                        @if ($utc->takenPackage)
                                        <a href="{{ route('user.takenPackageDetails', $utc->takenPackage) }}">
                                            {{$utc->takenPackage->pack->title}}
                                        </a>
                                        @else
                                            Not a packageable course
                                        @endif
                                    </td>
                                    <td>{{$utc->taken_date}}</td>
                                    <td>
                                        @php
                                        $takenCourseExams = $utc->takenCourseExams()->where('total_question', "<>",
                                            null)->get();
                                            @endphp
                                            {{ $takenCourseExams->count() ?? 0 }}
                                    </td>
                                    <td>
                                        @php
                                        $takenCourseExam = $utc->takenCourseExams()->where('total_question', "<>",
                                            null)->latest()->first();
                                            $result = 0;
                                            if ($takenCourseExam) {
                                            $total = $takenCourseExam->takenCourseExamItems->count();
                                            if ($total > 0) {
                                            $correct =
                                            $takenCourseExam->takenCourseExamItems()->where('correct',
                                            1)->get()->count();
                                            $result = round($correct/$total*100, 2);
                                            }
                                            }
                                            @endphp
                                            {{ $result ?? 0 }}%
                                    </td>
                                    <td>{{$utc->expired_date}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            @if ($utc->takenPackage)
                                            <a href="{{route('user.takenPackageCourseDetails',[$utc->takenPackage->id,$utc])}}"
                                                class="btn btn-warning btn-xs">
                                                Details
                                            </a>
                                            @else
                                            <a href="{{route('user.takenCourseDetails',$utc)}}"
                                                class="btn btn-warning btn-xs">
                                                Details
                                            </a>
                                            @endif
                                            @if (isset($takenCourseExam->no_of_attempts)
                                            && $takenCourseExam->no_of_attempts > 0)
                                            <div class="btn-group">
                                                <a href="{{route('user.courseExamAttempt',$takenCourseExam->id)}}">
                                                    <button type="button" class="btn btn-success btn-xs">
                                                        View
                                                        response
                                                    </button>
                                                </a>
                                                @php
                                                $otherExams = $utc->takenCourseExams()->where('id', '<>',
                                                    $takenCourseExam->id)->where('total_question', '<>',
                                                        null)->latest()->get();
                                                        @endphp
                                                        @if ($otherExams->count() > 0)
                                                        <button type="button"
                                                            class="btn btn-success btn-xs dropdown-toggle dropdown-toggle-split"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            @foreach ($otherExams as $exam)
                                                            <a class="dropdown-item"
                                                                href="{{ route('user.courseExamAttempt', $exam->id) }}">Exam
                                                                ID: {{ $exam->id }}
                                                            </a>
                                                            @endforeach
                                                        </div>
                                                        @endif
                                            </div>
                                            @endif
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('user.takeAttemptCourseExam',$utc)}}">Take
                                                Attempt
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $takenCourses->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
