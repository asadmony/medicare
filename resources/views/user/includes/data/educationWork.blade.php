<div class="table-responsive">
<table class="table table-bordered">
	<tr><td width="160"><b>Eductation Lavel</b></td><td>

		@if($u->educationWork->my_profession == 'Other' || $u->educationWork->my_profession == 'Others')
		{{$u->educationWork->education_level_other}}
		@else
		{{$u->educationWork->education_level}}
		@endif

	</td></tr>
	<tr><td width="160"><b>Subject</b></td><td>{{$u->educationWork->subject_studied}}</td></tr>
	<tr><td width="160"><b>Job Title</b></td><td>{{$u->educationWork->job_title}}</td></tr>
	<tr><td width="160"><b>Profession</b></td><td>
		@if($u->educationWork->my_profession == 'Other' || $u->educationWork->my_profession == 'Others')
		{{$u->educationWork->my_profession_other}}
		@else
		{{$u->educationWork->my_profession}}
		@endif
	</td></tr>
	<tr><td width="160"><b>First Language</b></td><td>{{$u->educationWork->first_language}}</td></tr>
	<tr><td width="160"><b>Second Language</b></td><td>{{$u->educationWork->second_language}}</td></tr></tr>
</table>
</div>