<form method="post" class="form-user-setting" action="{{route('user.settingSearchTermReligionPost')}}">
    {{csrf_field()}}


<div class="form-group {{ $errors->has('religious_status') ? ' has-danger' : '' }}">
<label for="religious_status">How Religious?</label>
<select class="simple-select2 w-100" name="religious_status" style="width: 100%;">

<option></option>
@if($u->searchTerm->religious_status)
<option selected>{{$u->searchTerm->religious_status}}</option>
@endif
{{-- ID: 28     How Religious Are You? --}}
@foreach ($userSettingFields[27]->values as $value)
@if ($u->searchTerm->religious_status != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<div class="form-group {{ $errors->has('religious_section') ? ' has-danger' : '' }}">
<label for="religious_section">Religious Section</label>
<select class="simple-select2 w-100" name="religious_section" style="width: 100%;">

<option></option>
@if($u->searchTerm->religious_section)
<option selected>{{$u->searchTerm->religious_section}}</option>
@endif
{{-- ID: 29     My Section --}}
@foreach ($userSettingFields[28]->values as $value)
@if ($u->searchTerm->religious_section != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<div class="form-group {{ $errors->has('prefer_hijab') ? ' has-danger' : '' }}">
<label for="prefer_hijab">Prefer Hijab/Niqab?</label>
<select class="simple-select2 w-100" name="prefer_hijab" style="width: 100%;">

<option></option>
@if($u->searchTerm->prefer_hijab)
<option selected>{{$u->searchTerm->prefer_hijab}}</option>
@endif
{{-- ID: 30     Do You Prefer Hijab/Niqab? --}}
@foreach ($userSettingFields[29]->values as $value)
@if ($u->searchTerm->prefer_hijab != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<div class="form-group {{ $errors->has('prefer_beard') ? ' has-danger' : '' }}">
<label for="prefer_beard">Prefer Beard? </label>
<select class="simple-select2 w-100" name="prefer_beard" style="width: 100%;">

<option></option>
@if($u->searchTerm->prefer_beard)
<option selected>{{$u->searchTerm->prefer_beard}}</option>
@endif
{{-- ID: 31     Do You Like Beard? --}}
@foreach ($userSettingFields[30]->values as $value)
@if ($u->searchTerm->prefer_beard != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<div class="form-group {{ $errors->has('are_you_revert') ? ' has-danger' : '' }}">
<label for="are_you_revert"> Revert?</label>
<select class="simple-select2 w-100" name="are_you_revert" style="width: 100%;">


<option></option>
@if($u->searchTerm->are_you_revert)
<option selected>{{$u->searchTerm->are_you_revert}}</option>
@endif
{{-- ID: 32     Are You a Revert? --}}
@foreach ($userSettingFields[31]->values as $value)
@if ($u->searchTerm->are_you_revert != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<div class="form-group {{ $errors->has('salah_status') ? ' has-danger' : '' }}">
<label for="salah_status">Perform Salah? *</label>
<select class="simple-select2 w-100" name="salah_status" style="width: 100%;">

<option></option>
@if($u->searchTerm->salah_status)
<option selected>{{$u->searchTerm->salah_status}}</option>
@endif
{{-- ID: 33     Do You Perform Salah? --}}
@foreach ($userSettingFields[32]->values as $value)
@if ($u->searchTerm->salah_status != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<div class="form-group {{ $errors->has('can_read_quran') ? ' has-danger' : '' }}">
<label for="can_read_quran">Does He/She Know How to Read Quran?</label>
<select class="simple-select2 w-100" name="can_read_quran" style="width: 100%;">


<option></option>
@if($u->searchTerm->can_read_quran)
<option selected>{{$u->searchTerm->can_read_quran}}</option>
@endif
{{-- ID: 34     Do You Know How to Read Quran? --}}
@foreach ($userSettingFields[33]->values as $value)
@if ($u->searchTerm->can_read_quran != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>