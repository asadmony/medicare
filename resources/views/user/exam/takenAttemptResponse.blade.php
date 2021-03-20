@extends('user.layouts.userMaster')

@push('css')
<style>
    #grad1 {
        background-color: : #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA)
    }
</style>
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
                        Examination
                    </h3>
                </div>
                <div>

                    <div class="container-fluid" id="grad1">
                        <div class="row justify-content-center mt-0">
                            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                    <h2><strong>{{ $takenCourseExam->course->title }}</strong></h2>
                                    <div class="row">
                                        <div class="col-md-12 mx-0 ">
                                            <table class="table">
                                                <tr>
                                                    <th>Last Attempt Date</th>
                                                    <td>:</td>
                                                    <td>{{ $takenCourseExam->last_attempt_started_at }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Score</th>
                                                    <td>:</td>
                                                    <td>
                                                        @php
                                                        $result = 0;
                                                        $total =
                                                        $takenCourseExam->takenCourseExamItems->count();
                                                        if ($total > 0) {
                                                        $correct =
                                                        $takenCourseExam->takenCourseExamItems()->where('correct',
                                                        1)->get()->count();
                                                        $result = round($correct/$total*100, 2);
                                                        }
                                                        @endphp
                                                        {{ $result }}%
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>:</td>
                                                    <td>
                                                        @if ($result >= config('parameter.pass_score'))
                                                        <span class="text-green">Passed</span>
                                                        @elseif($result <= config('parameter.fail_score')) <span
                                                            class="text-red">Failed</span>
                                                            @else
                                                            <span class="text-blue">Resubmit</span>
                                                            @endif
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="pb-3 text-center">
                                                @if ($result < config('parameter.pass_score')) <a
                                                    href="{{route('user.takeAttemptCourseExam',$takenCourseExam->taken_course_id) }}"
                                                    class="btn btn-primary"> Retake Exam</a>
                                                    @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="table-responsive ">
                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Correct?</th>
                                    <th>Comment</th>
                                </tr>
                                @foreach ($takenCourseExam->takenCourseExamItems as $attempt)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $attempt->question->question }}</td>
                                    <td>{{ $attempt->answer }}</td>
                                    <td>
                                        @if ($attempt->correct == 1)
                                        yes
                                        @else
                                        no
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
</section>
@endsection
@push('js')
@endpush
