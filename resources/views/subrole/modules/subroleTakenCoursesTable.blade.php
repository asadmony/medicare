
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
                            @if (isset($subrole) && ($subrole->title == 'assessor' || $subrole->title == 'administrator'))
                            <a href="{{route('assessor.assignCourseToUser',[$subrole,$utc->taken_package_id,$utc->course_id])}}"
                            class="btn btn-warning btn-xs">
                            Details
                            </a>
                            @else
                            <a href="{{route('subrole.takenCourseDetails',[$role,$utc])}}"
                            class="btn btn-warning btn-xs">
                            Details
                            </a>
                            @endif
                            @if (isset($takenCourseExam->no_of_attempts)
                            && $takenCourseExam->no_of_attempts > 0)
                            <div class="btn-group">
                                @if (isset($subrole) && ($subrole->title == 'assessor' || $subrole->title == 'administrator'))
                                <a href="{{route('assessor.CourseExamAttempt',[$role,$takenCourseExam->id])}}">
                                    <button type="button" class="btn btn-success btn-xs">
                                        View
                                        respons
                                    </button>
                                </a> 
                                @else
                                
                                @endif
                                @php
                                $otherExams = $utc->takenCourseExams()->where('id', '<>',
                                    $takenCourseExam->id)->where('total_question', '<>',
                                        null)->latest()->get();
                                        @endphp
                                        @if ($otherExams->count() > 0)
                                        <button type="button"
                                            class="btn btn-success btn-xs dropdown-toggle dropdown-toggle-split"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                            @if (isset($subrole) && ($subrole->title == 'assessor' || $subrole->title == 'administrator'))
                                            {{-- @foreach ($otherExams as $exam)
                                            <a class="dropdown-item"
                                                href="">Exam
                                                ID: {{ $exam->id }}
                                            </a>
                                            @endforeach
                                            @else --}}
                                            @foreach ($otherExams as $exam)
                                            <a class="dropdown-item"
                                                href="{{ route('subrole.CourseExamAttempt', [$role, $exam->id]) }}">Exam
                                                ID: {{ $exam->id }}
                                            </a>
                                            @endforeach
                                            @endif
                                        </div>
                                        @endif
                            </div>
                            @endif
                            @if (isset($subrole) && $subrole->title == 'member')
                            <a class="btn btn-primary btn-xs"
                            href="{{route('subrole.takeAttemptCourseExam',[$role,$utc])}}">Take
                            Attempt
                            </a>
                            @else
                            @endif
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
    <h4 class="w3-center w3-text-red">No course to display.</h4>
    @endif
</div>
