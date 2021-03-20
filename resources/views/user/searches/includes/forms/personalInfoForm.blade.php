<form method="post" class="form-user-setting" action="{{route('user.settingSearchTermPersonalInfoPost')}}">
    {{csrf_field()}}
    <div class="form-group {{ $errors->has('citizenship') ? ' has-danger' : '' }}">
        <label for="citizenship">Citizenship</label>
        <select class="simple-select2 w-100" name="citizenship" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->citizenship)
            <option selected>{{$u->searchTerm->citizenship}}</option>
            @endif
            {{-- ID:7, title:citizenship --}}
            @foreach ($userSettingFields[6]->values as $value)
            @if ($u->searchTerm->citizenship != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('birth_place') ? ' has-danger' : '' }}">
        <label for="birth_place">Birth Place</label>
        <select class="simple-select2 w-100" name="birth_place" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->birth_place)
            <option selected>{{$u->searchTerm->birth_place}}</option>
            @endif
            {{-- ID: 8, Birth Place --}}
            @foreach ($userSettingFields[7]->values as $value)
            @if ($u->searchTerm->birth_place != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            
            @endforeach
            
        </select>
    </div>

    <div class="form-group {{ $errors->has('income') ? ' has-danger' : '' }}">
        <label for="income">Income (BDT)/Year</label>
        <select class="simple-select2 w-100" name="income" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->income)
            <option selected>{{$u->searchTerm->income}}</option>
            @endif
            {{-- ID: 9     Income (BDT)/Year --}}
            @foreach ($userSettingFields[8]->values as $value)
            @if ($u->searchTerm->income != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('going_to_marry') ? ' has-danger' : '' }}">
        <label for="going_to_marry">Looking to marry</label>
        <select class="simple-select2 w-100" name="going_to_marry" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->going_to_marry)
            <option selected>{{$u->searchTerm->going_to_marry}}</option>
            @endif
            {{-- ID: 10     Looking to Marry --}}
            @foreach ($userSettingFields[9]->values as $value)
            @if ($u->searchTerm->going_to_marry != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
        <label for="marital_status">Marital Status </label>
        <select class="simple-select2 w-100" name="marital_status" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->marital_status)
            <option selected>{{$u->searchTerm->marital_status}}</option>
            @endif
            {{-- ID: 11     Marital Status --}}
            @foreach ($userSettingFields[10]->values as $value)
            @if ($u->searchTerm->marital_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('like_to_have_children') ? ' has-danger' : '' }}">
        <label for="like_to_have_children">Like to have children</label>
        <select class="simple-select2 w-100" name="like_to_have_children" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->like_to_have_children)
            <option selected>{{$u->searchTerm->like_to_have_children}}</option>
            @endif
            {{-- ID: 12     Would you like to have children? --}}
            @foreach ($userSettingFields[11]->values as $value)
            @if ($u->searchTerm->like_to_have_children != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('do_u_have_children') ? ' has-danger' : '' }}">
        <label for="do_u_have_children">Have Children?</label>
        <select class="simple-select2 w-100" name="do_u_have_children" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->do_u_have_children)
            <option selected>{{$u->searchTerm->do_u_have_children}}</option>
            @endif
            {{-- ID: 13     Do I Have Children? --}}
            @foreach ($userSettingFields[12]->values as $value)
            @if ($u->searchTerm->do_u_have_children != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('living_with') ? ' has-danger' : '' }}">
        <label for="living_with">Live with</label>
        <select class="simple-select2 w-100" name="living_with" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->living_with)
            <option selected>{{$u->searchTerm->living_with}}</option>
            @endif
            {{-- ID: 14     I live with --}}
            @foreach ($userSettingFields[13]->values as $value)
            @if ($u->searchTerm->living_with != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('height') ? ' has-danger' : '' }}">
        <label for="height">Height</label>
        <select class="simple-select2 w-100" name="height" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->height)
            <option selected>{{$u->searchTerm->height}}</option>
            @endif
            {{-- ID: 15     My Height --}}
            @foreach ($userSettingFields[14]->values as $value)
            @if ($u->searchTerm->height != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('body_build') ? ' has-danger' : '' }}">
        <label for="body_build">Body Build</label>
        <select class="simple-select2 w-100" name="body_build" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->body_build)
            <option selected>{{$u->searchTerm->body_build}}</option>
            @endif
            {{-- ID: 16     My Body Build --}}
            @foreach ($userSettingFields[15]->values as $value)
            @if ($u->searchTerm->body_build != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('hair_color') ? ' has-danger' : '' }}">
        <label for="hair_color">Hair Color</label>
        <select class="simple-select2 w-100" name="hair_color" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->hair_color)
            <option selected>{{$u->searchTerm->hair_color}}</option>
            @endif
            {{-- ID: 17     My Hair Color --}}
            @foreach ($userSettingFields[16]->values as $value)
            @if ($u->searchTerm->hair_color != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    
    <div class="form-group {{ $errors->has('eye_color') ? ' has-danger' : '' }}">
        <label for="eye_color">Eye Color</label>
        <select class="simple-select2 w-100" name="eye_color" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->eye_color)
            <option selected>{{$u->searchTerm->eye_color}}</option>
            @endif
            {{-- ID: 18     My Eye Color --}}
            @foreach ($userSettingFields[17]->values as $value)
            @if ($u->searchTerm->eye_color != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('skin_color') ? ' has-danger' : '' }}">
        <label for="skin_color">Skin Color</label>
        <select class="simple-select2 w-100" name="skin_color" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->skin_color)
            <option selected>{{$u->searchTerm->skin_color}}</option>
            @endif
            {{-- ID: 19     My Skin Color --}}
            @foreach ($userSettingFields[18]->values as $value)
            @if ($u->searchTerm->skin_color != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    
    <div class="form-group {{ $errors->has('dress_up') ? ' has-danger' : '' }}">
        <label for="dress_up">Dress</label>
        <select class="simple-select2 w-100" name="dress_up" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->dress_up)
            <option selected>{{$u->searchTerm->dress_up}}</option>
            @endif
            {{-- ID: 20     My Dress --}}
            @foreach ($userSettingFields[19]->values as $value)
            @if ($u->searchTerm->dress_up != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('smoke_status') ? ' has-danger' : '' }}">
        <label for="smoke_status">Smoking? </label>
        <select class="simple-select2 w-100" name="smoke_status" style="width: 100%;">
            <option></option>
            @if($u->searchTerm->smoke_status)
            <option selected>{{$u->searchTerm->smoke_status}}</option>
            @endif
            {{-- ID: 21     Do I smoke? --}}
            @foreach ($userSettingFields[20]->values as $value)
            @if ($u->searchTerm->smoke_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('disabilities_status') ? ' has-danger' : '' }}">
        <label for="disabilities_status">Any disabilities? *</label>
        <select class="simple-select2 w-100" name="disabilities_status" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->disabilities_status)
            <option selected>{{$u->searchTerm->disabilities_status}}</option>
            @endif
            {{-- ID: 22     Do I have any disabilities? --}}
            @foreach ($userSettingFields[21]->values as $value)
            @if ($u->searchTerm->disabilities_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('how_many_siblings') ? ' has-danger' : '' }}">
        <label for="how_many_siblings">Brother and Sister?</label>
        <select class="simple-select2 w-100" name="how_many_siblings" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->how_many_siblings)
            <option selected>{{$u->searchTerm->how_many_siblings}}</option>
            @endif
            {{-- ID: 23     My Brother and Sister? --}}
            @foreach ($userSettingFields[22]->values as $value)
            @if ($u->searchTerm->how_many_siblings != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('alcohol_status') ? ' has-danger' : '' }}">
        <label for="alcohol_status">Addicted to alcohol?</label>
        <select class="simple-select2 w-100" name="alcohol_status" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->alcohol_status)
            <option selected>{{$u->searchTerm->alcohol_status}}</option>
            @endif
            {{-- ID: 24     Do I addicted to alcohol? --}}
            @foreach ($userSettingFields[23]->values as $value)
            @if ($u->searchTerm->alcohol_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('blood_group') ? ' has-danger' : '' }}">
        <label for="blood_group">Blood Group?</label>
        <select class="simple-select2 w-100" name="blood_group" style="width: 100%;">
            
            <option></option>
            @if($u->searchTerm->blood_group)
            <option selected>{{$u->searchTerm->blood_group}}</option>
            @endif
            {{-- ID: 25     My Blood Group? --}}
            @foreach ($userSettingFields[24]->values as $value)
            @if ($u->searchTerm->blood_group != $value->title)
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