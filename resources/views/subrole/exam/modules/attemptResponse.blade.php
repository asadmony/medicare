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
                                    @elseif($result <= config('parameter.fail_score')) <span class="text-red">
                                        Failed</span>
                                        @else
                                        <span class="text-blue">Resubmit</span>
                                        @endif
                                </td>
                            </tr>
                        </table>
                        @if (isset($subrole))

                        <div class="pb-3 text-center">
                            @if ($result < config('parameter.pass_score')) <a
                                href="{{route('subrole.takeAttemptCourseExam',[$subrole,$takenCourseExam->taken_course_id]) }}"
                                class="btn btn-primary"> Retake Exam</a>
                                @endif
                        </div>
                        @endif
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
                <th width="400">Comment</th>
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
                <td>

                    @if (isset($subrole) && $subrole->title != 'member' && isset($accessRole))
                    <form action="{{ route('send.message', $attempt->user_id) }}" method="post">
                        @csrf
                        <input type="hidden" name="role_from" value="company_{{ $accessRole }}">
                        <input type="hidden" name="company_id" value="{{ $subrole->company_id }}">
                        <input type="hidden" name="messageable_id" value="{{ $attempt->id }}">
                        <input type="hidden" name="messageable_type" value="App\Model\TakenCourseExamItem">
          
                        <div class="input-group input-group-sm mb-3">
                          <input type="text" class="form-control" name="message" placeholder="Type your message" aria-label="Type your comment" >
                          <div class="input-group-append">
                            <button type="submit" class="input-group-text w3-purple btn-sm"> 
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                    <div>
                        @isset($attempt->comments)
                        <ul class="list-group">
                            @foreach ($attempt->showComments() as $comment)
                            <li class="list-group-item p-1">
                                {{ $comment->message }}
                            </li>
                            @endforeach
                        </ul>
                        @endisset
                    </div>


                    @endif
                    @if (isset($company) )
                    <form action="{{ route('send.message', $attempt->user_id) }}" method="post">
                        @csrf
                        <input type="hidden" name="role_from" value="company_owner">
                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                        <input type="hidden" name="messageable_id" value="{{ $attempt->id }}">
                        <input type="hidden" name="messageable_type" value="App\Model\TakenCourseExamItem">
          
                        <div class="input-group input-group-sm mb-3">
                          <input type="text" class="form-control" name="message" placeholder="Type your message" aria-label="Type your comment" >
                          <div class="input-group-append">
                            <button type="submit" class="input-group-text w3-purple btn-sm"> 
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </button>
                          </div>
                        </div>
                    </form>
                    <div>
                        @isset($attempt->comments)
                        <ul class="list-group">
                            @foreach ($attempt->showComments() as $comment)
                            <li class="list-group-item p-1">
                                {{ $comment->message }}
                            </li>
                            @endforeach
                        </ul>
                        @endisset
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
