<form method="post" class="form-user-setting" action="{{route('user.settingEducationWorkPost')}}">
    {{csrf_field()}}



<div class="other-area">
<div class="form-group {{ $errors->has('education_level') ? ' has-danger' : '' }}">
<label for="education_level">My Education Level *</label>
<select class="simple-select2 w-100 change-with-other" name="education_level" style="width: 100%;">

<option></option>
@if($u->educationWork)
<option selected>{{$u->educationWork->education_level}}</option>
@endif
{{-- ID: 26     My Education Level --}}
@foreach ($userSettingFields[25]->values as $value)
@if($u->educationWork)
@if ($u->educationWork->education_level != $value->title)
<option>{{ $value->title }}</option>
@endif
@else
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

<input  
    type="text" 
    id="education_level_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="education_level_other"
    value="{{$u->educationWork ? $u->educationWork->education_level_other : ''}}"    
    placeholder="Education Level Other (Please Specify here)" 

@if($u->educationWork)
@if ($u->educationWork->education_level == 'Other' || $u->educationWork->education_level == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

    
    />

</div>


<div class="form-group {{ $errors->has('subject_studied') ? ' has-danger' : '' }}">
    <label for="subject_studied">Subject Studied *</label>
    <input  
    type="text" 
    id="subject_studied" 
    class="form-control w3-border w3-border-light-gray" 
    name="subject_studied"
    value="{{$u->educationWork ? $u->educationWork->subject_studied : ''}}"        
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
    <label for="job_title">My Job Title *</label>
    <input  
    type="text" 
    id="job_title" 
    class="form-control w3-border w3-border-light-gray" 
    name="job_title"
    value="{{$u->educationWork ? $u->educationWork->job_title : ''}}"        
    placeholder="My job title..." 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('job_title'))

    <span class="help-block">
        <strong>{{ $errors->first('job_title') }}</strong>
    </span>
    
    @endif
</div>

<div class="other-area">

<div class="form-group {{ $errors->has('my_profession') ? ' has-danger' : '' }}">
<label for="my_profession">My Profession *</label>
<select class="simple-select2 w-100 change-with-other" name="my_profession" style="width: 100%;">

<option></option>
@if($u->educationWork)
<option selected>{{$u->educationWork->my_profession}}</option>
@endif
{{-- ID: 27     My Profession --}}
@foreach ($userSettingFields[26]->values as $value)
@if($u->educationWork)
@if ($u->educationWork->my_profession != $value->title)
<option>{{ $value->title }}</option>
@endif
@else
<option>{{ $value->title }}</option>
@endif
@endforeach

</select>
</div>

 
    <input  
    type="text" 
    id="my_profession_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="my_profession_other"
    value="{{$u->educationWork ? $u->educationWork->my_profession_other : ''}}"       
    placeholder="My Profession Other (Please Specify here)" 
    
    @if($u->educationWork)
@if ($u->educationWork->my_profession == 'Other' || $u->educationWork->my_profession == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

    />
 


</div>

<div class="form-group {{ $errors->has('first_language') ? ' has-danger' : '' }}">
    <label for="first_language">My First Language *</label>
    <input  
    type="text" 
    id="first_language" 
    class="form-control w3-border w3-border-light-gray" 
    name="first_language"
    value="{{$u->educationWork ? $u->educationWork->first_language : ''}}"        
    placeholder="My first language..." 
    style="border-radius: 4px;padding-left: 8px;" 
    />
    @if($errors->has('first_language'))

    <span class="help-block">
        <strong>{{ $errors->first('first_language') }}</strong>
    </span>
    
    @endif
</div>

<div class="form-group {{ $errors->has('second_language') ? ' has-danger' : '' }}">
    <label for="second_language">My Second Language *</label>
    <input  
    type="text" 
    id="second_language" 
    class="form-control w3-border w3-border-light-gray" 
    name="second_language"
    value="{{$u->educationWork ? $u->educationWork->second_language : ''}}"        
    placeholder="My second language..." 
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
        <button type="submit" class="btn btn-primary">{{$u->educationWork ? 'Submit' : 'Next'}}</button>
    </div>

</form>