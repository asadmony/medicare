@foreach($question->question->answers as $answer)
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
</tr>

@endforeach
