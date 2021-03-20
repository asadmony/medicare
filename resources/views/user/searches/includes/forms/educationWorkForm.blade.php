<form method="post" class="form-user-setting" action="{{route('user.settingSearchTermEduWorkPost')}}">
    {{csrf_field()}}




<div class="form-group {{ $errors->has('education_level') ? ' has-danger' : '' }}">
<label for="education_level">Education Level </label>
<select class="simple-select2 w-100" name="education_level" style="width: 100%;">

<option></option>
@if($u->searchTerm->education_level)
<option selected>{{$u->searchTerm->education_level}}</option>
@endif
{{-- ID: 26     My Education Level --}}
@foreach ($userSettingFields[25]->values as $value)
@if ($u->searchTerm->education_level != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>


<div class="form-group {{ $errors->has('subject_studied') ? ' has-danger' : '' }}">
    <label for="subject_studied">Subject Studied</label>
    <input  
    type="text" 
    id="subject_studied" 
    class="form-control w3-border w3-border-light-gray" 
    name="subject_studied"
    value="{{$u->searchTerm->subject_studied ?: ''}}"        
    placeholder="Subject studied..." 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('subject_studied'))

    <span class="help-block">
        <strong>{{ $errors->first('subject_studied') }}</strong>
    </span>
    
    @endif
</div>


<div class="form-group {{ $errors->has('job_title') ? ' has-danger' : '' }}">
    <label for="job_title">Job Title</label>
    <input  
    type="text" 
    id="job_title" 
    class="form-control w3-border w3-border-light-gray" 
    name="job_title"
    value="{{$u->searchTerm->job_title ?: ''}}"        
    placeholder="job title..." 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('job_title'))

    <span class="help-block">
        <strong>{{ $errors->first('job_title') }}</strong>
    </span>
    
    @endif
</div>

<div class="form-group {{ $errors->has('my_profession') ? ' has-danger' : '' }}">
<label for="my_profession">Profession </label>
<select class="simple-select2 w-100" name="my_profession" style="width: 100%;">

<option></option>
@if($u->searchTerm->my_profession)
<option selected>{{$u->searchTerm->my_profession}}</option>
@endif
{{-- ID: 27     My Profession --}}
@foreach ($userSettingFields[26]->values as $value)
@if ($u->searchTerm->my_profession != $value->title)
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>


<div class="form-group {{ $errors->has('first_language') ? ' has-danger' : '' }}">
    <label for="first_language">First Language</label>
    <input  
    type="text" 
    id="first_language" 
    class="form-control w3-border w3-border-light-gray" 
    name="first_language"
    value="{{$u->searchTerm->first_language ?: ''}}"        
    placeholder="First language..." 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('first_language'))

    <span class="help-block">
        <strong>{{ $errors->first('first_language') }}</strong>
    </span>
    
    @endif
</div>

<div class="form-group {{ $errors->has('second_language') ? ' has-danger' : '' }}">
    <label for="second_language">Second Language</label>
    <input  
    type="text" 
    id="second_language" 
    class="form-control w3-border w3-border-light-gray" 
    name="second_language"
    value="{{$u->searchTerm->second_language ?: ''}}"        
    placeholder="Second language..." 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('second_language'))

    <span class="help-block">
        <strong>{{ $errors->first('second_language') }}</strong>
    </span>
    
    @endif
</div>




    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>