@if ($assignment->answers()->count() > 0)
@foreach($assignment->answers as $answer)
<div class="card card-widget m-2  form-outer-area ">
    <div class="card-header">
        <h3 class="card-title">
            {{$loop->iteration}}. {{$answer->user->email}} 
        </h3>
        <div class="card-tools">
                Submission Time: {{ now()->parse($answer->created_at)->format('d-M-Y H:i a')  }}
        </div>
    </div>

            <div class="card-body table-responsive w3-light-gray p-0">

                <table class="table table-sm table-bordered ">

                    <tbody class=" all-data-area answer-area w3-white">

                            <tr>
                                <td>Answer : {{$answer->answer}}</td>
                                <td>
                                    Attached file : 
                                    @if($answer->file_name)
                                        <a href="{{asset('storage/course/assignment/'.$answer->file_name)}}"
                                            download><i class="fa fa-download" aria-hidden="true"></i>
                                            Answer File
                                        </a>
                                    @endif
                                </td>

                                {{-- <td width="50">
                                    <a title="Delete"  class="w3-btn p-1 px-2 w3-small w3-border item-delete" href="{{route('admin.deleteTopicCourseQuestionAnswer', ['type'=>'answer', 'id'=>$answer->id])}}"><i class="fa fa-times w3-text-red"></i></a>
                                </td> --}}
                            </tr>

                    </tbody>

                </table>

            </div>
</div>

@endforeach
@endif