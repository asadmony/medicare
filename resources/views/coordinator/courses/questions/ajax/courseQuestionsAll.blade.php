@foreach($topic->questions as $question)
<div class="card card-widget mb-2   form-outer-area ">
    <div class="card-header">
        <h3 class="card-title">
            {{$loop->iteration}}. {{$question->question}} <span class="bg-blue px-1 rounded text-xs"> Level
                {{ $question->question_level}}</span>
        </h3>

        <div class="card-tools">

            <a title="Delete" class="w3-btn p-1 px-2 w3-small w3-border item-delete"
                href="{{route('coordinator.deleteTopicCourseQuestionAnswer', ['type'=>'question', 'id'=>$question->id])}}"><i
                    class="fa fa-times w3-text-red"></i></a>
        </div>
    </div>
    <div class="card-body w3-light-gray p-2">

        <div class="card card-widget p-1 mb-0">
            <div class="card-header">


                <form class="form-add-item" action="{{route('coordinator.addNewQuestionAnswer', $question)}}" method="post">

                    @csrf

                    <div class="row">
                        <div class="col-9">
                            <label>New Answer (Total Answers: <span
                                    class="item-count-area">{{$question->answers()->count()}}</span>)</label>
                            <input type="text" name="answer" {{old('question')}} class="form-control"
                                placeholder="Add Answer of the question {{$question->question}}">
                        </div>

                        <div class="col-1">
                            <div class="form-group">
                                <br>
                                <div class="form-check" style="margin-top: 10px;">
                                    <input name="correct" class="form-check-input" type="checkbox">
                                    <label class="form-check-label">Correct</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-1">
                            <div class="form-group">
                                <br>
                                <div class="form-check" style="margin-top: 10px;">
                                    <input name="live" class="form-check-input" type="checkbox" checked>
                                    <label class="form-check-label">Active</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-1">

                            <button type="submit" style="margin-top: 23px;" class="btn btn-sm btn-primary"><i
                                    class="fa fa-plus"></i></button>
                        </div>

                    </div>


                </form>
            </div>

            <div class="card-body table-responsive w3-light-gray p-2">

                <table class="table table-sm table-bordered ">

                    <tbody class=" all-data-area answer-area w3-white">

                        @include('coordinator.courses.questions.ajax.courseAnswersAll')
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

@endforeach