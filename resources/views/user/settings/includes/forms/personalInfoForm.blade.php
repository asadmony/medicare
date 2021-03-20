<form method="post" class="form-user-setting" action="{{route('user.settingPersonalInfoPost')}}">
    {{csrf_field()}}
 

<div class="other-area">
    <div class="form-group {{ $errors->has('citizenship') ? ' has-danger' : '' }}">
        <label for="citizenship">Citizenship *</label>
        <select class="simple-select2 w-100 change-with-other" name="citizenship" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->citizenship}}</option>
            @endif
            {{-- ID:7, title:citizenship --}}
            @foreach ($userSettingFields[6]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->citizenship != $value->title)
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
    id="citizenship_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="citizenship_other"        
    value="{{$u->personalInfo ? $u->personalInfo->citizenship_other : ''}}"
    placeholder="Citizenship Other (Please Specify here)" 
    
@if($u->personalInfo)
@if ($u->personalInfo->citizenship == 'Other' || $u->personalInfo->citizenship == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

    />
</div>

    <div class="form-group {{ $errors->has('birth_place') ? ' has-danger' : '' }}">
        <label for="birth_place">My Birth Place *</label>
        <select class="simple-select2 w-100" name="birth_place" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->birth_place}}</option>
            @endif
            {{-- ID: 8, Birth Place  ID: 1 is here for location name --}}
            @foreach ($userSettingFields[1]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->birth_place != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
            
        </select>
    </div>
    <div class="form-group {{ $errors->has('income') ? ' has-danger' : '' }}">
        <label for="income">My Income (BDT)/Year *</label>
        <select class="simple-select2 w-100" name="income" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->income}}</option>
            @endif
            {{-- ID: 9     Income (BDT)/Year --}}
            @foreach ($userSettingFields[8]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->income != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('going_to_marry') ? ' has-danger' : '' }}">
        <label for="going_to_marry">I am looking to marry *</label>
        <select class="simple-select2 w-100" name="going_to_marry" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->going_to_marry}}</option>
            @endif
            {{-- ID: 10     Looking to Marry --}}
            @foreach ($userSettingFields[9]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->going_to_marry != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
        <label for="marital_status">Marital Status *</label>
        <select class="simple-select2 w-100" name="marital_status" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->marital_status}}</option>
            @endif
            {{-- ID: 11     Marital Status --}}
            @foreach ($userSettingFields[10]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->marital_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('like_to_have_children') ? ' has-danger' : '' }}">
        <label for="like_to_have_children">Would you like to have children? *</label>
        <select class="simple-select2 w-100" name="like_to_have_children" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->like_to_have_children}}</option>
            @endif
            {{-- ID: 12     Would you like to have children? --}}
            @foreach ($userSettingFields[11]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->like_to_have_children != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('do_u_have_children') ? ' has-danger' : '' }}">
        <label for="do_u_have_children">Do I Have Children? *</label>
        <select class="simple-select2 w-100" name="do_u_have_children" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->do_u_have_children}}</option>
            @endif
            {{-- ID: 13     Do I Have Children? --}}
            @foreach ($userSettingFields[12]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->do_u_have_children != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="other-area">
    <div class="form-group {{ $errors->has('living_with') ? ' has-danger' : '' }}">
        <label for="living_with">I live with *</label>
        <select class="simple-select2 w-100 change-with-other" name="living_with" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->living_with}}</option>
            @endif
            {{-- ID: 14     I live with --}}
            @foreach ($userSettingFields[13]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->living_with != $value->title)
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
    id="living_with_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="living_with_other"        
    value="{{$u->personalInfo ? $u->personalInfo->living_with_other : ''}}"
    placeholder="I Live With Other (Please Specify here)" 
    
@if($u->personalInfo)
@if ($u->personalInfo->living_with == 'Other' || $u->personalInfo->living_with == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

    />
</div>
    <div class="form-group {{ $errors->has('height') ? ' has-danger' : '' }}">
        <label for="height">My Height *</label>
        <select class="simple-select2 w-100" name="height" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->height}}</option>
            @endif
            {{-- ID: 15     My Height --}}
            @foreach ($userSettingFields[14]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->height != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('body_build') ? ' has-danger' : '' }}">
        <label for="body_build">My Body Build *</label>
        <select class="simple-select2 w-100" name="body_build" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->body_build}}</option>
            @endif
            {{-- ID: 16     My Body Build --}}
            @foreach ($userSettingFields[15]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->body_build != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="other-area">
    <div class="form-group {{ $errors->has('hair_color') ? ' has-danger' : '' }}">
        <label for="hair_color">My Hair Color *</label>
        <select class="simple-select2 w-100 change-with-other" name="hair_color" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->hair_color}}</option>
            @endif
            {{-- ID: 17     My Hair Color --}}
            @foreach ($userSettingFields[16]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->hair_color != $value->title)
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
    id="hair_color_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="hair_color_other"        
    value="{{$u->personalInfo ? $u->personalInfo->hair_color_other : ''}}"
    placeholder="My Hair Color Other (Please Specify here)" 
    @if($u->personalInfo)
@if ($u->personalInfo->hair_color == 'Other' || $u->personalInfo->hair_color == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif
    />
</div>
    
    <div class="other-area">
    <div class="form-group {{ $errors->has('eye_color') ? ' has-danger' : '' }}">
        <label for="eye_color">My Eye Color *</label>
        <select class="simple-select2 w-100 change-with-other" name="eye_color" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->eye_color}}</option>
            @endif
            {{-- ID: 18     My Eye Color --}}
            @foreach ($userSettingFields[17]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->eye_color != $value->title)
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
    id="eye_color_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="eye_color_other"      
    value="{{$u->personalInfo ? $u->personalInfo->eye_color_other : ''}}"
    placeholder="My Eye Color Other (Please Specify here)" 
    
@if($u->personalInfo)
@if ($u->personalInfo->eye_color == 'Other' || $u->personalInfo->eye_color == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif
    />
</div>

    <div class="other-area">
    <div class="form-group {{ $errors->has('skin_color') ? ' has-danger' : '' }}">
        <label for="skin_color">My Skin Color *</label>
        <select class="simple-select2 w-100 change-with-other" name="skin_color" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->skin_color}}</option>
            @endif
            {{-- ID: 19     My Skin Color --}}
            @foreach ($userSettingFields[18]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->skin_color != $value->title)
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
    id="skin_color_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="skin_color_other"   
    value="{{$u->personalInfo ? $u->personalInfo->skin_color_other : ''}}"     
    placeholder="My Skin Color Other (Please Specify here)" 

@if($u->personalInfo)
@if ($u->personalInfo->skin_color == 'Other' || $u->personalInfo->skin_color == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

    />
</div>
    
    <div class="other-area">
    <div class="form-group {{ $errors->has('dress_up') ? ' has-danger' : '' }}">
        <label for="dress_up">My Dress *</label>
        <select class="simple-select2 w-100 change-with-other" name="dress_up" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->dress_up}}</option>
            @endif
            {{-- ID: 20     My Dress --}}
            @foreach ($userSettingFields[19]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->dress_up != $value->title)
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
    id="dress_up_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="dress_up_other"        
    value="{{$u->personalInfo ? $u->personalInfo->dress_up_other : ''}}"
    placeholder="My Dress Other (Please Specify here)" 
    
@if($u->personalInfo)
@if ($u->personalInfo->dress_up == 'Other' || $u->personalInfo->dress_up == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

    />
</div>
    <div class="form-group {{ $errors->has('smoke_status') ? ' has-danger' : '' }}">
        <label for="smoke_status">Do I smoke? *</label>
        <select class="simple-select2 w-100" name="smoke_status" style="width: 100%;">
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->smoke_status}}</option>
            @endif
            {{-- ID: 21     Do I smoke? --}}
            @foreach ($userSettingFields[20]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->smoke_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="other-area">
    <div class="form-group {{ $errors->has('disabilities_status') ? ' has-danger' : '' }}">
        <label for="disabilities_status">Do I have any disabilities? *</label>
        <select class="simple-select2 w-100 change-with-other" name="disabilities_status" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->disabilities_status}}</option>
            @endif
            {{-- ID: 22     Do I have any disabilities? --}}
            @foreach ($userSettingFields[21]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->disabilities_status != $value->title)
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
    id="disabilities_status_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="disabilities_status_other"        
    value="{{$u->personalInfo ? $u->personalInfo->disabilities_status_other : ''}}"
    placeholder="Disabilities... Other (Please Specify here)" 
    
@if($u->personalInfo)
@if ($u->personalInfo->disabilities_status == 'Other' || $u->personalInfo->disabilities_status == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif


    />
</div>
<div class="other-area">
    <div class="form-group {{ $errors->has('how_many_siblings') ? ' has-danger' : '' }}">
        <label for="how_many_siblings">My Brother and Sister? *</label>
        <select class="simple-select2 w-100 change-with-other" name="how_many_siblings" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->how_many_siblings}}</option>
            @endif
            {{-- ID: 23     My Brother and Sister? --}}
            @foreach ($userSettingFields[22]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->how_many_siblings != $value->title)
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
    id="how_many_siblings_other" 
    class="form-control w3-border w3-border-light-gray other-value-field" 
    name="how_many_siblings_other"        
    value="{{$u->personalInfo ? $u->personalInfo->how_many_siblings_other : ''}}"
    placeholder="Brother & Sister... Other (Please Specify here)" 

@if($u->personalInfo)
@if ($u->personalInfo->how_many_siblings == 'Other' || $u->personalInfo->how_many_siblings == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif


    />
</div>
    <div class="form-group {{ $errors->has('alcohol_status') ? ' has-danger' : '' }}">
        <label for="alcohol_status">Do I addicted to alcohol? *</label>
        <select class="simple-select2 w-100" name="alcohol_status" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->alcohol_status}}</option>
            @endif
            {{-- ID: 24     Do I addicted to alcohol? --}}
            @foreach ($userSettingFields[23]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->alcohol_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('blood_group') ? ' has-danger' : '' }}">
        <label for="blood_group">My Blood Group? *</label>
        <select class="simple-select2 w-100" name="blood_group" style="width: 100%;">
            
            <option></option>
            @if($u->personalInfo)
            <option selected>{{$u->personalInfo->blood_group}}</option>
            @endif
            {{-- ID: 25     My Blood Group? --}}
            @foreach ($userSettingFields[24]->values as $value)
            @if($u->personalInfo)
            @if ($u->personalInfo->blood_group != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <br>
    <div class="">
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <button type="submit" class="btn btn-primary">{{$u->personalInfo ? 'Submit' : 'Next'}}</button>
    </div>
</form>