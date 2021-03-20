<div class="table-responsive">
<table class="table table-bordered">
	<tr><td width="160"><b>Citizenship</b></td><td>
		@if($u->personalInfo->citizenship == 'Other' || $u->personalInfo->citizenship == 'Others')
		{{$u->personalInfo->citizenship_other}}
		@else
		{{$u->personalInfo->citizenship}}
		@endif
	</td></tr>
	<tr><td width="160"><b>Birth Place</b></td><td>{{$u->personalInfo->birth_place}}</td></tr>
	<tr><td width="160"><b>Income</b></td><td>{{$u->personalInfo->income}}</td></tr>
	<tr><td width="160"><b>Going to Marry</b></td><td>{{$u->personalInfo->going_to_marry}}</td></tr>
	<tr><td width="160"><b>Marital Status</b></td><td>{{$u->personalInfo->marital_status}}</td></tr>
	<tr><td width="160"><b>Do I like to have children?</b></td><td>{{$u->personalInfo->like_to_have_children}}</td></tr>
	<tr><td width="160"><b>Do I have children?</b></td><td>{{$u->personalInfo->do_u_have_children}}</td></tr>
	<tr><td width="160"><b>I am living with</b></td><td>
		@if($u->personalInfo->living_with == 'Other' || $u->personalInfo->living_with == 'Others')
		{{$u->personalInfo->living_with_other}}
		@else
		{{$u->personalInfo->living_with}}
		@endif

		</td></tr>
	<tr><td width="160"><b>Height</b></td><td>{{$u->personalInfo->height}}</td></tr>
	<tr><td width="160"><b>Body Build</b></td><td>{{$u->personalInfo->body_build}}</td></tr>
	<tr><td width="160"><b>Hair Color</b></td><td>

		@if($u->personalInfo->hair_color == 'Other' || $u->personalInfo->hair_color == 'Others')
		{{$u->personalInfo->hair_color_other}}
		@else
		{{$u->personalInfo->hair_color}}
		@endif

	</td></tr>
	<tr><td width="160"><b>Eye Color</b></td><td>


		@if($u->personalInfo->eye_color == 'Other' || $u->personalInfo->eye_color == 'Others')
		{{$u->personalInfo->eye_color_other}}
		@else
		{{$u->personalInfo->eye_color}}
		@endif

	</td></tr>
	<tr><td width="160"><b>Skin Color</b></td><td>


		@if($u->personalInfo->skin_color == 'Other' || $u->personalInfo->skin_color == 'Others')
		{{$u->personalInfo->skin_color_other}}
		@else
		{{$u->personalInfo->skin_color}}
		@endif

	</td></tr>
	<tr><td width="160"><b>Dress up</b></td><td>

		@if($u->personalInfo->dress_up == 'Other' || $u->personalInfo->dress_up == 'Others')
		{{$u->personalInfo->dress_up_other}}
		@else
		{{$u->personalInfo->dress_up}}
		@endif

	</td></tr>
	<tr><td width="160"><b>Smoke Status</b></td><td>{{$u->personalInfo->smoke_status}}</td></tr>
	<tr><td width="160"><b>Disability Status</b></td><td>

		@if($u->personalInfo->disabilities_status == 'Other' || $u->personalInfo->disabilities_status == 'Others')
		{{$u->personalInfo->disabilities_status_other}}
		@else
		{{$u->personalInfo->disabilities_status}}
		@endif

	</td></tr>
	<tr><td width="160"><b>How many children?</b></td><td>

		@if($u->personalInfo->how_many_siblings == 'Other' || $u->personalInfo->how_many_siblings == 'Others')
		{{$u->personalInfo->how_many_siblings_other}}
		@else
		{{$u->personalInfo->how_many_siblings}}
		@endif

	</td></tr>
	<tr><td width="160"><b>Alcohol Status</b></td><td>{{$u->personalInfo->alcohol_status}}</td></tr>
	<tr><td width="160"><b>Blood Group</b></td><td>{{$u->personalInfo->blood_group}}</td></tr>
	


</table>
</div>