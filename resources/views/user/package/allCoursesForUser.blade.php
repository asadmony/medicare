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
                        All Courses
                        Package:(id:{{$takenPackUser->takenPackage->id}}),{{$takenPackUser->takenPackage->title}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($courses as $course)
                        <div class="col-sm-2">
                            <div class="card" style="min-height: 250px !important">
                                <img class="rounded-top img-fluid"
                                    src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}"
                                    alt="">
                                <div class="p-2">
                                    <h5>{{custom_title($course->title,13)}}</h5>
                                    <p>{{custom_title($course->excerpt,30)}}</p>
                                    <p class="text-center"><a
                                            href="{{route('subrole.takePackageCourse',[$subrole,$course,'takenPackUser'=>$takenPackUser])}}"
                                            class="btn btn-primary btn-sm">Take Course</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Your Taken Courses
                    </h3>
                </div>

                <div class="card-body">

                    @if($userTakenCourses->count() > 0)
                    <div class="table-responsive ">
                        <table class="table table-hover w3-centered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    {{-- <th>Company</th> --}}
                                    <th>Course Title</th>
                                    <th>Course Code</th>
                                    <th>Enrolled From</th>
                                    <th># of Attempts</th>
                                    <th>Score</th>
                                    <th>Expire Date</th>
                                    <th width="300">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($userTakenCourses->currentPage() - 1) * $userTakenCourses->perPage() + 1); ?>
                                @foreach ($userTakenCourses as $utc)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$utc->course_title}}</td>
                                    <td>{{$utc->course->course_code}}</td>
                                    <td>{{$utc->taken_date}}</td>
                                    <td>
                                        @php
                                        $takenCourseExam = $utc->takenCourseExams()->where('total_question', "<>",
                                            null)->latest()->first();
                                            @endphp
                                            {{ $takenCourseExam->no_of_attempts ?? 0 }}
                                    </td>
                                    <td>
                                        @php
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
                                            <a href="{{route('subrole.takenCourseDetails',[$subrole,$utc])}}"
                                                class="btn btn-warning btn-xs">
                                                Details
                                            </a>
                                            @if (isset($takenCourseExam->no_of_attempts)
                                            && $takenCourseExam->no_of_attempts > 0)
                                            <div class="btn-group">
                                                <a
                                                    href="{{route('subrole.CourseExamAttempt',[$subrole,$takenCourseExam->id])}}">
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
                                                                href="{{ route('user.courseExamAttempt', [$subrole, $exam->id]) }}">Exam
                                                                ID: {{ $exam->id }}</a>
                                                            @endforeach
                                                        </div>
                                                        @endif
                                            </div>
                                            @endif
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('user.takeAttemptCourseExam',$utc)}}">Take
                                                Attempt</a>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>

                        {{ $userTakenCourses->render() }}

                    </div>
                    @else
                    <h4 class="w3-center w3-text-red">You Did Not Take Any Course.</h4>
                    @endif
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
