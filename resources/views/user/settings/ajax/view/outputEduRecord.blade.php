<strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
<br/>
@if($me->educations()->count())
@foreach($me->educations() as $edu)

<span> <b>{{$edu->passed_degree}} in {{$edu->passed_department.' from '}} <strong>{{$edu->organization_name}}</strong> ({{date('Y', strtotime($edu->year_from)).' - '.date('Y', strtotime($edu->year_to))}}). Passed {{ date('Y', strtotime($edu->passed_year)) }} </b> </span>
&nbsp;
<span title="Delete this Information" class="w3-btn w3-small delete-edu-work  p-0 pl-1 pr-1 w3-round w3-border-red w3-border" data-url="{{route('user.settingEduDelete',['edu'=>$edu])}}">
    <i class="fa fa-trash text-red"></i>
</span>
<br/>
@endforeach
@endif
  <hr class="w3-border-purple">

