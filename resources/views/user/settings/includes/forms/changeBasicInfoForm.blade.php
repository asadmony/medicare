<form method="post" class="form-user-setting" action="{{route('user.settingBasicInfoPost')}}">
    {{csrf_field()}}

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-default">
                <div class="box-body">


                    <div class="form-group {{ $errors->has('full_name') ? ' has-danger' : '' }}">
                        <label for="full_name" class="w3-text-black text-bold">Full Name</label> <br>
                        <input type="text" id="full_name" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="full_name" value="{{$me->name}}" placeholder="Your Full Name"
                            style="border-radius: 4px;padding-left: 8px;" />
                        @if($errors->has('full_name'))

                        <span class="help-block">
                            <strong>{{ $errors->first('full_name') }}</strong>
                        </span>

                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('guardian_mobile') ? ' has-danger' : '' }}">
                        <label for="guardian_mobile" class="w3-text-black text-bold">Guardian's Mobile Number</label>
                        <input type="text" id="guardian_mobile" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="guardian_mobile" value="{{$me->guardian_mobile}}"
                            placeholder="Guardian's Mobile Number" style="border-radius: 4px;padding-left: 8px;" />
                        @if($errors->has('guardian_mobile'))

                        <span class="help-block">
                            <strong>{{ $errors->first('guardian_mobile') }}</strong>
                        </span>

                        @endif
                    </div>


                    <div class="other-area">
                        <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
                            <label for="country" class="w3-text-black text-bold">Country</label>
                            <select class="simple-select2 w-100 change-with-other" name="country" style="width: 100%;">
                                <option></option>

                                <option selected>{{$me->country}}</option>

                                {{-- ID:3, title:country --}}
                                @foreach ($userSettingFields[2]->values as $value)

                                @if ($me->country != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif

                                @endforeach

                            </select>
                        </div>

                        <input type="text" id="country_other"
                            class="form-control w3-border w3-border-light-gray other-value-field" name="country_other"
                            value="{{$me->country_other ? $me->country_other : ''}}"
                            placeholder="Country Other (Please Specify here)" @if ($me->country == 'Other' ||
                        $me->country == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        />
                    </div>



                    <div class="other-area">
                        <div class="form-group {{ $errors->has('profile_created_by') ? ' has-danger' : '' }}">
                            <label for="profile_created_by" class="w3-text-black text-bold">Profile created by</label>
                            <select class="simple-select2 w-100 change-with-other" name="profile_created_by"
                                style="width: 100%;">
                                <option></option>

                                <option selected>{{$me->profile_created_by}}</option>

                                {{-- ID:2, title:profile created by --}}
                                @foreach ($userSettingFields[1]->values as $value)

                                @if ($me->profile_created_by != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif

                                @endforeach

                            </select>
                        </div>

                        <input type="text" id="profile_created_by_other"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            name="profile_created_by_other"
                            value="{{$me->profile_created_by_other ? $me->profile_created_by_other : ''}}"
                            placeholder="Profile Created by Other (Please Specify here)" @if ($me->profile_created_by ==
                        'Other' || $me->profile_created_by == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif



                        />
                    </div>


                </div>
            </div>




        </div>
        <div class="col-sm-6">


            <div class="box box-default">
                <div class="box-body">


                    <div class="form-group {{ $errors->has('religion') ? ' has-danger' : '' }}">
                        <label for="religion" class="w3-text-black text-bold">Religion/Community</label>
                        <select class="simple-select2 w-100" name="religion" style="width: 100%;">

                            <option></option>

                            <option selected>{{$me->religion}}</option>

                            {{-- ID: 4   Religion --}}
                            @foreach ($userSettingFields[3]->values as $value)
                            {{$value}}
                            @if ($me->religion != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>


                    <div class="form-group {{ $errors->has('social_order') ? ' has-danger' : '' }}">
                        <label for="social_order" class="w3-text-black text-bold">Caste/Social Order</label>
                        <input type="text" name="social_order"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            class=" w3-border w-100 w3-round w3-small px-2">
                        {{-- ID: 29   social order --}}
                        {{-- <select class="simple-select2 w-100" name="social_order" style="width: 100%;">            
                            <option></option> 
                            <option selected>{{$me->social_order}}</option>

                        @foreach ($userSettingFields[28]->values as $value)
                        @if ($me->social_order != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                        </select> --}}
                    </div>


                    <div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }}">
                        <label for="gender">Gender</label>
                        <select class="simple-select2 w-100" name="gender" style="width: 100%;">
                            <option></option>
                            <option selected>{{$me->gender}}</option>
                            {{-- ID: 1   social order --}}
                            @foreach ($userSettingFields[0]->values as $value)
                            @if ($me->gender != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('looking_for') ? ' has-danger' : '' }}">
                        <label for="looking_for" class="w3-text-black text-bold">Looking for</label>
                        <select class="simple-select2 w-100" name="looking_for" style="width: 100%;">
                            <option></option>
                            <option selected>{{$me->looking_for}}</option>
                            {{-- ID: 6   social order --}}
                            @foreach ($userSettingFields[5]->values as $value)
                            @if ($me->looking_for != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <br>
                    <div class="">
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>



                </div>
            </div>

        </div>

    </div>





</form>