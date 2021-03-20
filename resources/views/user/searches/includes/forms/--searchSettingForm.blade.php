<form method="post" class="form-user-setting" action="{{route('user.settingSearchTermPost')}}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('minimum_age') ? ' has-danger' : '' }}" style="width: 250px;">
        <label for="minimum_age">Minimum Age (Year) *</label>
         
        <select class="form-control  simple-select2 w-100" id="minimum_age" name="minimum_age">

                <option value="">Select Minimum Age </option>
                @if ($me->searchTerm->min_age)
                    <option selected>{{ $me->searchTerm->min_age }}</option>
                @endif

                @for ($i = 18; $i <= 60; $i++)
                    @if ($me->searchTerm->min_age != $i)
                        <option>{{ $i }}</option>
                    @endif
                    
                @endfor
                
        </select>

        @if($errors->has('minimum_age'))

        <span class="help-block">
            <strong>{{ $errors->first('minimum_age') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('maximum_age') ? ' has-danger' : '' }}" style="width: 250px;">
        <label for="maximum_age">Maximum Age *</label>

        <select class="form-control  simple-select2 w-100" id="maximum_age" name="maximum_age">

            <option value="">Select Maximum Age </option>
            @if ($me->searchTerm->max_age)
                <option selected>{{ $me->searchTerm->max_age }}</option>
            @endif

            @for ($i = 18; $i <= 80; $i++)
                @if ($me->searchTerm->max_age != $i)
                    <option>{{ $i }}</option>
                @endif
                
            @endfor
                
        </select>
        
         

        @if($errors->has('maximum_age'))

        <span class="help-block">
            <strong>{{ $errors->first('maximum_age') }}</strong>
        </span>

        @endif
    </div>

{{-- 
        <div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }}" style="width: 250px;">
        <label for="gender">Gender</label>

        <select class="form-control  simple-select2 w-100" id="gender" name="gender">

            <option value="">Select Gender</option>
            @if ($me->searchTerm->gender)
                <option selected>{{ $me->searchTerm->gender }}</option>
            @endif

            
                @foreach ($userSettingFields[0]->values as $value)
                  @if ($me->searchTerm->gender != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach


                
        </select>
        
         

        @if($errors->has('gender'))

        <span class="help-block">
            <strong>{{ $errors->first('gender') }}</strong>
        </span>

        @endif
    </div> --}}

{{--         <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}" >
        <label for="country">Country</label>

        <select class="form-control simple-select2 w-100" id="country" name="country" style="width: 250px;">

            <option value="">Select Country</option>
            @if ($me->searchTerm->country)
                <option selected>{{ $me->searchTerm->country }}</option>
            @endif

            ID: 3     Country
                @foreach ($userSettingFields[2]->values as $value)
                  @if ($me->searchTerm->country != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
 
        </select>
        
         

        @if($errors->has('country'))

        <span class="help-block">
            <strong>{{ $errors->first('country') }}</strong>
        </span>

        @endif
    </div> --}}

<div class="other-area">
    <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
        <label for="country">Country</label>
        <select class="form-control simple-select2 w-100 change-with-other" 
        id="country" 
        name="country" 
        data-placeholder="Select Option"
        style="width: 250px;"
        >
        <option></option>
        @if ($me->searchTerm->country)
            <option selected>{{ $me->searchTerm->country }}</option>
        @endif
        {{-- ID: 3     Country --}}
        @foreach ($userSettingFields[2]->values as $value)

        @if ($me->searchTerm->country != $value->title)
        <option>{{ $value->title }}</option>
        @endif
        @endforeach
    </select>
</div>
<input  
type="text" 
id="country_other" 
class="form-control other-value-field" 
name="country_other"        
value="{{$me->searchTerm->country_other ?: ''}}"
placeholder="Country Other (Please Specify here)" 

@if ($me->searchTerm->country == 'Other' || $me->searchTerm->country == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;width: 250px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none; margin-bottom: 25px;width: 250px;" 
@endif

/>
</div>






    <div class="form-group {{ $errors->has('location') ? ' has-danger' : '' }}" >
        <label for="location">Location (District, Place)</label>

        <select class="form-control simple-select2 w-100" id="location" name="location" style="width: 250px;">

            <option value="">Select Location</option>
            @if ($me->searchTerm->location)
                <option selected>{{ $me->searchTerm->location }}</option>
            @endif

            {{-- ID: 2     Location (District, Place) --}}
                @foreach ($userSettingFields[1]->values as $value)
                  @if ($me->searchTerm->location != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
 
        </select>
        
         

        @if($errors->has('location'))

        <span class="help-block">
            <strong>{{ $errors->first('location') }}</strong>
        </span>

        @endif
    </div>

    

    <div class="form-group {{ $errors->has('user_status') ? ' has-danger' : '' }}" >
        <label for="user_status">User Status</label>

        <select class="form-control simple-select2 w-100" id="user_status" name="user_status" style="width: 250px;">

            <option value="">Select User Status</option>
            @if ($me->searchTerm->user_status)
                <option selected>{{ $me->searchTerm->user_status }}</option>
            @endif

            {{-- ID: 35     User Status --}}
                @foreach ($userSettingFields[34]->values as $value)
                  @if ($me->searchTerm->user_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
 
        </select>
        
         

        @if($errors->has('user_status'))

        <span class="help-block">
            <strong>{{ $errors->first('user_status') }}</strong>
        </span>

        @endif
    </div>


    

{{-- 
min_age
max_age
gender
country
location
user_status
name
mobile
username
email
active
reason_for_register
looking_for
education_level
subject_studied
job_title
my_profession
my_profession_other
first_language
second_language
citizenship
birth_place
income
going_to_marry
marital_status
like_to_have_children
do_u_have_children
living_with
living_with_other
height
body_build
hair_color
eye_color
skin_color
dress_up
smoke_status
disabilities_status
disabilities_status_other
how_many_siblings
alcohol_status
blood_group
religious_status
religious_section
prefer_hijab
prefer_beard
are_you_revert
salah_status
can_read_quran



    <div class="form-group {{ $errors->has('looking_for') ? ' has-danger' : '' }}">
        <label for="looking_for">Looking For *</label>
        <input  
        type="text" 
        id="looking_for" 
        class="form-control w3-border w3-border-light-gray" 
        name="looking_for"
        value="{{$me->looking_for}}"        
        placeholder="Write about what are you looking for..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('looking_for'))

        <span class="help-block">
            <strong>{{ $errors->first('looking_for') }}</strong>
        </span>
        
        @endif
    </div>



 --}}
 
    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>