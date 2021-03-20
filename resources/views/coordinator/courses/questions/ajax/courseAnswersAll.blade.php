@foreach($question->answers as $answer)
                            <tr>
                                <td width="30">{{$loop->iteration}}</td>
                                <td>{{$answer->answer}}</td>
                                <td width="60">

                                    @if($answer->correct)
                                    Correct
                                    @endif
                                </td>
                                <td width="60">
                                    @if($answer->active)
                                    Active
                                    @endif 
                                </td>

                                <td width="50">
                                    <a title="Delete"  class="w3-btn p-1 px-2 w3-small w3-border item-delete" href="{{route('coordinator.deleteTopicCourseQuestionAnswer', ['type'=>'answer', 'id'=>$answer->id])}}"><i class="fa fa-times w3-text-red"></i></a>
                                </td>
                            </tr>

                            @endforeach