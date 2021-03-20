@isset($assignments)
<div class="card-body border">
    <div class="container">
        <h3>Assignment
        </h3>
        <div class="container">
            <div class="card">
                @if (isset($assignmentFields))
                    @if (isset($subrole))
                            
                        <form class="" action="{{ route('assessor.updateCourseAssignment', [$subrole, $takenPackage, $course, $assignmentFields]) }}" method="POST" enctype="multipart/form-data">
                    @elseif(auth()->user()->isCoordinator())
                        <form class="" action="{{ route('coordinator.updateCourseAssignment', [$course, $assignmentFields]) }}" method="POST" enctype="multipart/form-data">
                    @else
                    @endif
                @else
                    @if (isset($subrole))
                        <form class="" action="{{ route('assessor.saveCourseAssignment', [$subrole, $takenPackage, $course]) }}" method="POST" enctype="multipart/form-data">
                    @elseif(auth()->user()->isCoordinator())
                        <form class="" action="{{ route('coordinator.saveCourseAssignment', [$course]) }}" method="POST" enctype="multipart/form-data">
                    @else
                    @endif
                @endif
                    @csrf
                    <div class="input-group my-2">
                        <div class="col-md-3">
                            <label for="title">Assignment Title:</label>
                        </div>
                        <div class="col-md-8">
                            <input class="form-control" type="text" id="title" name="title" placeholder="Assignment title" value="@isset($assignmentFields){{ $assignmentFields->title }}@endisset">
                        </div>
                    </div>
                    <div class="input-group my-2">
                        <div class="col-md-3">
                        <label for="description">Description:</label>
                        </div>
                        <div class="col-md-8">
                        <textarea class="form-control" name="description" id="description" cols="30" rows="3" placeholder="Assignment description">@isset($assignmentFields){{ $assignmentFields->description }}@endisset</textarea>
                        </div>
                    </div>
                    <div class="input-group my-2">
                        <div class="col-md-3">
                        <label for="file_name">Attachment File:</label>
                        </div>
                        <div class="col-md-8">
                        <input type="file" class="form-control" name="file_name" id="file_name" >
                        </div>
                    </div>
                    <div class="input-group my-2 d-flex justify-content-center">
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-save"></i> Save assignment</button>
                    </div>
                </form>
            </div>
            <div class="card card-widget">
                <div class="card-header with-border">
                    <h3 class="card-title">
                        <i class="fa fa-th"></i>
                        Assignment list <span class="badge badge-default">{{ $course->title}}</span></h3>
                </div>
                @if($assignments->count() > 0)
                <div class="card-body w3-gray p-1">


                    @foreach($assignments as $assignment)
                    <div class="card card-widget form-outer-area  collapsed-card mb-3">

                        <div class="card-header">

                            <h3 class="card-title">
                                {{$loop->iteration}}. Title: {{$assignment->title}}
                            </h3>

                            <div class="card-tools">
                                @if (auth()->user()->isCoordinator())
                                    <a title="edit" class="w3-btn p-1 px-2 w3-small w3-border"
                                        href="{{ route('coordinator.editCourseAssignment', [ $course, $assignment]) }}">
                                        <i class="fa fa-edit w3-text-blue"></i>
                                    </a>
                                @else
                                    <a title="edit" class="w3-btn p-1 px-2 w3-small w3-border"
                                        href="{{ route('assessor.editCourseAssignment', [$subrole, $takenPackage, $course, $assignment]) }}">
                                        <i class="fa fa-edit w3-text-blue"></i>
                                    </a>
                                @endif
                                <a title="Delete" class="w3-btn p-1 px-2 w3-small w3-border"
                                    onclick="event.preventDefault(); if(confirm('Do you really want to delete this Assignment?')){
                                        document.getElementById('delete_course_assignment_{{ $assignment->id }}').submit();
                                    };"
                                    href="">
                                    <i class="fa fa-trash w3-text-red"></i>
                                    <form action="{{ route('deleteCourseAssignment', $assignment) }}" method="post" id="delete_course_assignment_{{ $assignment->id }}">
                                    @csrf
                                    @method('delete')
                                </form>
                                </a>
                                Toal answer submitted: <span
                                class="item-count-area question">{{$assignment->answers()->count()}}</span>
                                <button type="button" class="btn btn-tool w3-blue " data-card-widget="collapse"><i
                                        class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body p-1">

                            <div class="px-3 py-1">

                                Description: {!! $assignment->description !!}
                                <br>
                                File:

                                @if($assignment->file_name)

                                <a href="{{asset('storage/course/assignment/'.$assignment->file_name)}}" download><i
                                        class="fa fa-download" aria-hidden="true"></i> Download File
                                    </a>
                                @endif


                            </div>



                            <div class="card card-widget mb-0 ">
                                <div class="card-body w3-light-gray p-1">

                                    <div class="card card-widget mb-0 ">
                                        {{-- <div class="card-header">
                                            <form class="form-add-item"
                                                action="{{route('admin.addNewTopicQuestion', $topic)}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <label>New Question</label>
                                                        <input type="text" name="question" {{old('question')}}
                                                            class="form-control" placeholder="Add New Question">
                                                    </div>
                                                    <div class="col-md-1">

                                                        <div class="form-group">
                                                            <label>Level</label>
                                                            <select class="form-control" name="question_level">
                                                                @if(old('question_level'))
                                                                <option>{{old('question_level')}}</option>
                                                                @endif

                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="form-group">
                                                            <br>
                                                            <div class="form-check" style="margin-top: 10px;">
                                                                <input name="active" class="form-check-input"
                                                                    type="checkbox" checked>
                                                                <label class="form-check-label">Active</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="submit" style="margin-top: 23px;"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}
                                        <div class="all-data-area question-area card-body w3-gray p-1 ">
                                            <div class="card card-widget mb-1 form-outer-area ">
                                                <div class="card-header  w3-blue">
                                                    <h3 class="card-title">
                                                        <i class="far fa-copy"></i> Submitted Answers
                                                    </h3>
                                                    <div class="card-tools">
                                                    </div>
                                                </div>
                                                <div class=" w3-light-gray">

                                                    @include('subrole.modules.courseAssignmentAnswerRow')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @else
                <h3 class="w3-center w3-text-red">No Assignment Yet</h3>
                @endif
            </div>
        </div>
    </div>
</div>
@endisset