<div class="table-responsive">
<table class="table table-bordered">
	{{--<tr>
		<td width="120"><b>Name</b></td><td>{{$u->name}}</td>
	</tr>--}}

	<tr>
		<td width="120"><b>Username</b></td><td>{{$u->username}}</td>
	</tr>

	<tr>
		<td width="120"><b>Gender</b></td><td>{{$u->gender}}</td>
	</tr>

	<tr>
		<td width="120"><b>Location</b></td><td>{{$u->location}}</td>
	</tr>

	<tr><td width="120"><b>Country</b></td><td>
		@if($u->country == 'Other' || $u->country == 'Others')
		{{$u->country_other}}
		@else
		{{$u->country}}
		@endif

	</td></tr>


	<tr>
		<td width="120"><b>Looking For</b> </td><td>{{$u->looking_for}}</td>
	</tr>
</table>
</div>