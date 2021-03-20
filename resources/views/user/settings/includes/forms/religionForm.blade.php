<form method="post" class="form-user-setting" action="{{route('user.settingReligion')}}">
    {{csrf_field()}}


    <div class="form-group {{ $errors->has('religious_status') ? ' has-danger' : '' }}">
        <label for="religious_status">How Religious Are You? *</label>
        <select class="simple-select2 w-100" name="religious_status" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->religious_status}}</option>
            @endif
            {{-- ID: 28     How Religious Are You? --}}
            @foreach ($userSettingFields[27]->values as $value)
            @if ($u->religion)
            @if ($u->religion->religious_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('religious_section') ? ' has-danger' : '' }}">
        <label for="religious_section">My Section *</label>
        <select class="simple-select2 w-100" name="religious_section" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->religious_section}}</option>
            @endif
            {{-- ID: 29     My Section --}}
            @foreach ($userSettingFields[28]->values as $value)
            @if ($u->religion)
            @if ($u->religion->religious_section != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('prefer_hijab') ? ' has-danger' : '' }}">
        <label for="prefer_hijab">Do You Prefer Hijab/Niqab? *</label>
        <select class="simple-select2 w-100" name="prefer_hijab" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->prefer_hijab}}</option>
            @endif
            {{-- ID: 30     Do You Prefer Hijab/Niqab? --}}
            @foreach ($userSettingFields[29]->values as $value)
            @if($u->religion)
            @if ($u->religion->prefer_hijab != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('prefer_beard') ? ' has-danger' : '' }}">
        <label for="prefer_beard">Do You Like Beard? *</label>
        <select class="simple-select2 w-100" name="prefer_beard" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->prefer_beard}}</option>
            @endif
            {{-- ID: 31     Do You Like Beard? --}}
            @foreach ($userSettingFields[30]->values as $value)
            @if($u->religion)
            @if ($u->religion->prefer_beard != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('are_you_revert') ? ' has-danger' : '' }}">
        <label for="are_you_revert">Are You a Revert?  (Diverted from other Religion to Islam) *</label>
        <select class="simple-select2 w-100" name="are_you_revert" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->are_you_revert}}</option>
            @endif
            {{-- ID: 32     Are You a Revert? --}}
            @foreach ($userSettingFields[31]->values as $value)
            @if($u->religion)
            @if ($u->religion->are_you_revert != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('salah_status') ? ' has-danger' : '' }}">
        <label for="salah_status">Do You Perform Salah? *</label>
        <select class="simple-select2 w-100" name="salah_status" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->salah_status}}</option>
            @endif
            {{-- ID: 33     Do You Perform Salah? --}}
            @foreach ($userSettingFields[32]->values as $value)
            @if($u->religion)
            @if ($u->religion->salah_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group {{ $errors->has('can_read_quran') ? ' has-danger' : '' }}">
        <label for="can_read_quran">Do You Know How to Read Quran? *</label>
        <select class="simple-select2 w-100" name="can_read_quran" style="width: 100%;">
            <option></option>
            @if($u->religion)
            <option selected>{{$u->religion->can_read_quran}}</option>
            @endif
            {{-- ID: 34     Do You Know How to Read Quran? --}}
            @foreach ($userSettingFields[33]->values as $value)
            @if($u->religion)
            @if ($u->religion->can_read_quran != $value->title)
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
        <button type="submit" class="btn btn-primary">{{$u->religion ? 'Submit' : 'Next'}}</button>
    </div>
</form>