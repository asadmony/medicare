<form method="post" class="form-user-setting" action="{{route('user.settingPersonalInfoPost')}}">
    {{csrf_field()}}


    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">

                    <div class="other-area">
                        <div class="form-group {{ $errors->has('education_level') ? ' has-danger' : '' }}">
                            <label for="education_level" class="w3-text-black text-bold">Education Level *</label>
                            <select class="simple-select2 w-100 change-with-other" name="education_level"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->education_level}}</option>
                                @endif
                                {{-- ID: 26     Education Level --}}
                                @foreach ($userSettingFields[25]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->education_level != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" id="education_level_other"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            name="education_level_other"
                            value="{{$me->personalInfo ? $me->personalInfo->education_level_other : ''}}"
                            placeholder="My Hair Color Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->education_level == 'Other' || $me->personalInfo->education_level ==
                        'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif
                        />
                    </div>


                    <div class="form-group {{ $errors->has('major_subject') ? ' has-danger' : '' }}">
                        <label for="major_subject" class="w3-text-black text-bold">Major Subject </label>
                        {{-- ID: 41     My major_subject --}}
                        <input type="text" name=" major_subject" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;">
                        {{-- <select class="simple-select2 w-100" name="major_subject" style="width: 100%;">
            <option></option>
            @if($me->personalInfo)
            <option selected>{{$me->personalInfo->major_subject}}</option>
                        @endif
                        @foreach ($userSettingFields[40]->values as $value)
                        @if($me->personalInfo)
                        @if ($me->personalInfo->major_subject != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                        </select> --}}
                    </div>
                    <div class="form-group form-group-sm {{ $errors->has('graduate_from') ? ' has-danger' : '' }}">
                        <label for="diat_status" class="w3-text-black text-bold">Graduation from (Institution) </label>
                        <input type="text" name="graduate_from" placeholder="Enter your institution" id="graduate_from"
                            value="{{$me->personalInfo ? $me->personalInfo->graduate_from : ''}}"
                            class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;">

                    </div>


                </div>
                <div class="col-sm-4">


                    <div class="form-group {{ $errors->has('job_title') ? ' has-danger' : '' }}">
                        <label for="job_title " class="w3-text-black text-bold">Job Title *</label>
                        <input type="text" id="job_title" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="job_title" @if($me->personalInfo)
                        value="{{ old('job_title') ?: $me->personalInfo->job_title }}"
                        @else
                        value="{{ old('job_title') }}"
                        @endif


                        placeholder="Job Title..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('job_title'))

                        <span class="help-block">
                            <strong>{{ $errors->first('job_title') }}</strong>
                        </span>

                        @endif

                    </div>

                    <div class="form-group {{ $errors->has('job_company_name') ? ' has-danger' : '' }}">
                        <label for="job_company_name" class="w3-text-black text-bold">Job Company Name *</label>
                        <input type="text" id="job_company_name" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="job_company_name" @if($me->personalInfo)
                        value="{{ old('job_company_name') ?: $me->personalInfo->job_company_name }}"
                        @else
                        value="{{ old('job_company_name') }}"
                        @endif

                        placeholder="Company Name..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('job_company_name'))

                        <span class="help-block">
                            <strong>{{ $errors->first('job_company_name') }}</strong>
                        </span>

                        @endif

                    </div>

                </div>
                <div class="col-sm-4">



                    <div class="other-area">
                        <div class="form-group {{ $errors->has('my_profession') ? ' has-danger' : '' }}">
                            <label for="my_profession" class="w3-text-black text-bold">My Profession *</label>
                            <select class="simple-select2 w-100 change-with-other" name="my_profession"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->my_profession}}</option>
                                @endif
                                {{-- ID: 27    My Profession --}}
                                @foreach ($userSettingFields[26]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->my_profession != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" id="my_profession_other" class=" w3-border w-100 w3-round w3-small px-2"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            value="{{$me->personalInfo ? $me->personalInfo->my_profession_other : ''}}"
                            placeholder="My Profession Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->my_profession == 'Other' || $me->personalInfo->my_profession ==
                        'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif
                        />
                    </div>


                    <div class="form-group {{ $errors->has('income') ? ' has-danger' : '' }}">
                        <label for="income" class="w3-text-black text-bold">My Income *</label>
                        <select class="simple-select2 w-100" name="income" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->income}}</option>
                            @endif
                            {{-- ID: 9     My income --}}
                            @foreach ($userSettingFields[8]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->income != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>



                </div>
            </div>
        </div>
    </div>




    <div class="box">
        <div class="box-body">
            <div class="row">

                <div class="col-sm-4">






                    <div class="other-area">
                        <div class="form-group {{ $errors->has('citizenship') ? ' has-danger' : '' }}">
                            <label for="citizenship" class="w3-text-black text-bold">Citizenship Status</label>
                            <select class="simple-select2 w-100 change-with-other" name="citizenship"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->citizenship}}</option>
                                @endif
                                {{-- ID:7, title:citizenship --}}
                                @foreach ($userSettingFields[6]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->citizenship != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <input type="text" id="citizenship_other" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="citizenship_other"
                            value="{{$me->personalInfo ? $me->personalInfo->citizenship_other : ''}}"
                            placeholder="Citizenship Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->citizenship == 'Other' || $me->personalInfo->citizenship == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        />
                    </div>


                    <div class="form-group {{ $errors->has('city_of_residence') ? ' has-danger' : '' }}">
                        <label for="height" class="w3-text-black text-bold">City of Residence *</label>
                        <input type="text" id="city_of_residence" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="city_of_residence" @if($me->personalInfo)
                        value="{{ old('job_company_name') ?: $me->personalInfo->city_of_residence }}"
                        @else
                        value="{{ old('city_of_residence') }}"
                        @endif

                        placeholder="City of residence..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('city_of_residence'))

                        <span class="help-block">
                            <strong>{{ $errors->first('city_of_residence') }}</strong>
                        </span>

                        @endif

                    </div>



                    <div class="form-group {{ $errors->has('state_of_residence') ? ' has-danger' : '' }}">
                        <label for="height" class="w3-text-black text-bold">State / Division of Residence </label>
                        <input type="text" id="state_of_residence" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="state_of_residence" @if($me->personalInfo)
                        value="{{ old('state_of_residence') ?: $me->personalInfo->state_of_residence }}"
                        @else
                        value="{{ old('state_of_residence') }}"
                        @endif

                        placeholder="State / Division..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('state_of_residence'))

                        <span class="help-block">
                            <strong>{{ $errors->first('state_of_residence') }}</strong>
                        </span>

                        @endif
                    </div>


                    <div class="other-area">
                        <div class="form-group {{ $errors->has('country_of_residence') ? ' has-danger' : '' }}">
                            <label for="country_of_residence" class="w3-text-black text-bold">Country of Residence
                                *</label>
                            <select class="simple-select2 w-100 change-with-other" name="country_of_residence"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->country_of_residence}}</option>
                                @endif
                                {{-- ID:3, title:country --}}
                                @foreach ($userSettingFields[2]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->country_of_residence != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <input type="text" id="country_of_residence_other"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            name="country_of_residence_other"
                            value="{{$me->personalInfo ? $me->personalInfo->country_of_residence_other : ''}}"
                            placeholder="Country of residence Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->country_of_residence == 'Other' ||
                        $me->personalInfo->country_of_residence == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        />
                    </div>


                </div>
                <div class="col-sm-4">

                    <div class="form-group {{ $errors->has('father_name') ? ' has-danger' : '' }}">
                        <label for="father_name" class="w3-text-black text-bold">Father's Name *</label>
                        <input type="text" id="father_name" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="father_name" @if($me->personalInfo)
                        value="{{ old('father_name') ?: $me->personalInfo->father_name }}"
                        @else
                        value="{{ old('father_name') }}"
                        @endif

                        placeholder="Father's Name..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('father_name'))

                        <span class="help-block">
                            <strong>{{ $errors->first('father_name') }}</strong>
                        </span>

                        @endif

                    </div>



                    <div class="form-group {{ $errors->has('father_occupation') ? ' has-danger' : '' }}">
                        <label for="father_occupation" class="w3-text-black text-bold">Father's Occupation *</label>
                        <select class="simple-select2 w-100" name="father_occupation" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->father_occupation}}</option>
                            @endif
                            {{-- ID: 33     Father's Occupation --}}
                            @foreach ($userSettingFields[32]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->father_occupation != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group {{ $errors->has('mother_name') ? ' has-danger' : '' }}">
                        <label for="mother_name" class="w3-text-black text-bold">Mother's Name *</label>
                        <input type="text" id="mother_name" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="mother_name" @if($me->personalInfo)
                        value="{{ old('mother_name') ?: $me->personalInfo->mother_name }}"
                        @else
                        value="{{ old('mother_name') }}"
                        @endif

                        placeholder="Mother's Name..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('mother_name'))

                        <span class="help-block">
                            <strong>{{ $errors->first('mother_name') }}</strong>
                        </span>

                        @endif

                    </div>



                    <div class="form-group {{ $errors->has('mother_occupation') ? ' has-danger' : '' }}">
                        <label for="mother_occupation" class="w3-text-black text-bold">Mother's Occupation *</label>
                        <select class="simple-select2 w-100" name="mother_occupation" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->mother_occupation}}</option>
                            @endif
                            {{-- ID: 34     Mother's Occupation --}}
                            @foreach ($userSettingFields[33]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->mother_occupation != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="col-sm-4">

                    <div class="form-group {{ $errors->has('number_of_brother') ? ' has-danger' : '' }}">
                        <label for="number_of_brother" class="w3-text-black text-bold">Number of Brother *</label>
                        <select class="simple-select2 w-100" id="no-of-bro" name="number_of_brother"
                            style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->number_of_brother}}</option>
                            @endif
                            @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                                @endfor
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('how_many_brother_married') ? ' has-danger' : '' }}">
                        <label for="how_many_brother_married" class="w3-text-black text-bold">How many brother Married?
                            *</label>
                        <select class="simple-select2 w-100" id="married" name="how_many_brother_married"
                            style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->how_many_brother_married}}</option>
                            @endif
                            @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                                @endfor

                        </select>
                    </div>


                    <div class="form-group {{ $errors->has('number_of_sister') ? ' has-danger' : '' }}">
                        <label for="number_of_sister" class="w3-text-black text-bold">Number of Sister *</label>
                        <select class="simple-select2 w-100" id="no-of-sis" name="number_of_sister"
                            style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->number_of_sister}}</option>
                            @endif
                            @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                                @endfor
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('how_many_sister_married') ? ' has-danger' : '' }}">
                        <label for="how_many_sister_married" class="w3-text-black text-bold">How many sister Married?
                            *</label>
                        <select class="simple-select2 w-100" id="married-sis" name="how_many_sister_married"
                            style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->how_many_sister_married}}</option>
                            @endif
                            @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                                @endfor

                        </select>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">

                    <div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                        <label for="district" class="w3-text-black text-bold">District</label>
                        {{-- <input type="text" class=" w3-border w-100 w3-round w3-small px-2" name="district"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"> --}}
                        <select class="simple-select2 w-100" name="district" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->district}}</option>
                            @endif

                            @foreach ($allDistricts as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->district != $value->name)
                            <option>{{ $value->name }}</option>
                            @endif
                            @else
                            <option>{{ $value->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-sm-4">

                    <div class="form-group {{ $errors->has('thana') ? ' has-danger' : '' }}">
                        <label for="thana" class="w3-text-black text-bold">Thana</label>
                        <input type="text" name="thana"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            class=" w3-border w-100 w3-round w3-small px-2">
                        {{-- <select class="simple-select2 w-100" name="thana" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->thana}}</option>
                        @endif

                        @foreach ($allUpazilas as $value)
                        @if($me->personalInfo)
                        @if ($me->personalInfo->thana != $value->name)
                        <option>{{ $value->name }}</option>
                        @endif
                        @else
                        <option>{{ $value->name }}</option>
                        @endif
                        @endforeach
                        </select> --}}
                    </div>
                </div>
                <div class="col-sm-4">


                    <div class="form-group {{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                        <label for="zip_code" class="w3-text-black text-bold">Zip Code</label>
                        <input type="text" id="zip_code" class=" w3-border w-100 w3-round w3-small px-2"
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="zip_code" @if($me->personalInfo)
                        value="{{ old('zip_code') ?: $me->personalInfo->zip_code }}"
                        @else
                        value="{{ old('zip_code') }}"
                        @endif

                        placeholder="Zip Code..."
                        style="border-radius: 4px;padding-left: 8px;"
                        />
                        @if($errors->has('zip_code'))

                        <span class="help-block">
                            <strong>{{ $errors->first('zip_code') }}</strong>
                        </span>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="box">
        <div class="box-body">
            <div class="row">

                <div class="col-sm-4">

                    <div class="form-group {{ $errors->has('height') ? ' has-danger' : '' }}">
                        <label for="height" class="w3-text-black text-bold">My Height *</label>
                        <select class="simple-select2 w-100" name="height" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->height}}</option>
                            @endif
                            {{-- ID: 15     My Height --}}
                            @foreach ($userSettingFields[14]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->height != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('blood_group') ? ' has-danger' : '' }}">
                        <label for="blood_group" class="w3-text-black text-bold">Blood Group *</label>
                        <select class="simple-select2 w-100" name="blood_group" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->blood_group}}</option>
                            @endif
                            {{-- ID: 25     Blood group --}}
                            @foreach ($userSettingFields[24]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->blood_group != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group {{ $errors->has('body_build') ? ' has-danger' : '' }}">
                        <label for="body_build" class="w3-text-black text-bold">My Body Type *</label>
                        <select class="simple-select2 w-100" name="body_build" style="width: 100%;">

                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->body_build}}</option>
                            @endif
                            {{-- ID: 16     My Body Build --}}
                            @foreach ($userSettingFields[15]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->body_build != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                        <label for="marital_status" class="w3-text-black text-bold">Marital Status</label>
                        <select class="simple-select2 w-100" name="marital_status" style="width: 100%;">

                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->marital_status}}</option>
                            @endif
                            {{-- ID: 11     Marital Status --}}
                            @foreach ($userSettingFields[10]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->marital_status != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>






                </div>
                <div class="col-sm-4">


                    <div class="other-area">
                        <div class="form-group {{ $errors->has('hair_color') ? ' has-danger' : '' }}">
                            <label for="hair_color" class="w3-text-black text-bold">My Hair Color *</label>
                            <select class="simple-select2 w-100 change-with-other" name="hair_color"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->hair_color}}</option>
                                @endif
                                {{-- ID: 17     My Hair Color --}}
                                @foreach ($userSettingFields[16]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->hair_color != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" id="hair_color_other"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            name="hair_color_other"
                            value="{{$me->personalInfo ? $me->personalInfo->hair_color_other : ''}}"
                            placeholder="My Hair Color Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->hair_color == 'Other' || $me->personalInfo->hair_color == 'Others')
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
                            <label for="eye_color" class="w3-text-black text-bold">My Eye Color *</label>
                            <select class="simple-select2 w-100 change-with-other" name="eye_color"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->eye_color}}</option>
                                @endif
                                {{-- ID: 18     My Eye Color --}}
                                @foreach ($userSettingFields[17]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->eye_color != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" id="eye_color_other"
                            class="form-control w3-border w3-border-light-gray other-value-field" name="eye_color_other"
                            value="{{$me->personalInfo ? $me->personalInfo->eye_color_other : ''}}"
                            placeholder="My Eye Color Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->eye_color == 'Other' || $me->personalInfo->eye_color == 'Others')
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
                            <label for="skin_color" class="w3-text-black text-bold">My Skin Color *</label>
                            <select class="simple-select2 w-100 change-with-other" name="skin_color"
                                style="width: 100%;">
                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->skin_color}}</option>
                                @endif
                                {{-- ID: 19     My Skin Color --}}
                                @foreach ($userSettingFields[18]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->skin_color != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" id="skin_color_other"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            name="skin_color_other"
                            value="{{$me->personalInfo ? $me->personalInfo->skin_color_other : ''}}"
                            placeholder="My Skin Color Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->skin_color == 'Other' || $me->personalInfo->skin_color == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        />
                    </div>





                    <div class="form-group {{ $errors->has('do_u_have_children') ? ' has-danger' : '' }}">
                        <label for="do_u_have_children" class="w3-text-black text-bold">Do you have children?</label>
                        <select class="simple-select2 w-100" name="do_u_have_children" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->do_u_have_children}}</option>
                            @endif
                            {{-- ID: 13     Do you have children? --}}
                            @foreach ($userSettingFields[12]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->do_u_have_children != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>



                </div>
                <div class="col-sm-4">




                    <div class="form-group {{ $errors->has('zodiac_sign') ? ' has-danger' : '' }}">
                        <label for="zodiac_sign" class="w3-text-black text-bold">Zodiac Sign *</label>
                        <select class="simple-select2 w-100" name="zodiac_sign" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->zodiac_sign}}</option>
                            @endif
                            {{-- ID: 30     Zodiac Sign --}}
                            @foreach ($userSettingFields[29]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->zodiac_sign != $value->title)
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
                            <label for="disabilities_status" class="w3-text-black text-bold">Do I have any disabilities?
                                *</label>
                            <select class="simple-select2 w-100 change-with-other" name="disabilities_status"
                                style="width: 100%;">

                                <option></option>
                                @if($me->personalInfo)
                                <option selected>{{$me->personalInfo->disabilities_status}}</option>
                                @endif
                                {{-- ID: 22     Do I have any disabilities? --}}
                                @foreach ($userSettingFields[21]->values as $value)
                                @if($me->personalInfo)
                                @if ($me->personalInfo->disabilities_status != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif
                                @else
                                <option>{{ $value->title }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <input type="text" id="disabilities_status_other"
                            class="form-control w3-border w3-border-light-gray other-value-field"
                            name="disabilities_status_other"
                            value="{{$me->personalInfo ? $me->personalInfo->disabilities_status_other : ''}}"
                            placeholder="Disabilities... Other (Please Specify here)" @if($me->personalInfo)
                        @if ($me->personalInfo->disabilities_status == 'Other' || $me->personalInfo->disabilities_status
                        == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif

                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                        @endif


                        />
                    </div>


                    <div class="form-group {{ $errors->has('hear_about_us') ? ' has-danger' : '' }}">
                        <label for="hear_about_us" class="w3-text-black text-bold">How did you know about us? *</label>
                        <select class="simple-select2 w-100" name="hear_about_us" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->hear_about_us}}</option>
                            @endif
                            {{-- ID: 5     Hear about us --}}
                            @foreach ($userSettingFields[4]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->hear_about_us != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>



                </div>
            </div>
        </div>
    </div>





    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">


                    <div class="form-group {{ $errors->has('smoke_status') ? ' has-danger' : '' }}">
                        <label for="smoke_status" class="w3-text-black text-bold">Do I smoke? *</label>
                        <select class="simple-select2 w-100" name="smoke_status" style="width: 100%;">
                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->smoke_status}}</option>
                            @endif
                            {{-- ID: 21     Do I smoke? --}}
                            @foreach ($userSettingFields[20]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->smoke_status != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>




                </div>
                <div class="col-sm-4">


                    <div class="form-group {{ $errors->has('alcohol_status') ? ' has-danger' : '' }}">
                        <label for="alcohol_status" class="w3-text-black text-bold">Do I addicted to alcohol? *</label>
                        <select class="simple-select2 w-100" name="alcohol_status" style="width: 100%;">

                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->alcohol_status}}</option>
                            @endif
                            {{-- ID: 24     Do I addicted to alcohol? --}}
                            @foreach ($userSettingFields[23]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->alcohol_status != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>


                </div>
                <div class="col-sm-4">


                    <div class="form-group {{ $errors->has('diat_status') ? ' has-danger' : '' }}">
                        <label for="diat_status" class="w3-text-black text-bold">Diat Status *</label>
                        <select class="simple-select2 w-100" name="diat_status" style="width: 100%;">

                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->diat_status}}</option>
                            @endif
                            {{-- ID: 28     Diat Status --}}
                            @foreach ($userSettingFields[27]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->diat_status != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4">

                    <div class="form-group {{ $errors->has('mother_tongue') ? ' has-danger' : '' }}">
                        <label for="mother_tongue" class="w3-text-black text-bold">Mother Tongue *</label>
                        <select class="simple-select2 w-100" name="mother_tongue" style="width: 100%;">

                            <option></option>
                            @if($me->personalInfo)
                            <option selected>{{$me->personalInfo->mother_tongue}}</option>
                            @endif
                            {{-- ID: 31     Mother Tongue --}}
                            @foreach ($userSettingFields[30]->values as $value)
                            @if($me->personalInfo)
                            @if ($me->personalInfo->mother_tongue != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-sm-8">

                    <div class="form-group {{ $errors->has('can_speak') ? ' has-danger' : '' }}">
                        <label for="can_speak" class="w3-text-black text-bold">Can Speak</label>


                        {{-- ID: 32   can speak --}}

                        <div class="row">
                            @foreach ($userSettingFields[31]->values->chunk($userSettingFields[31]->values->count()/3)
                            as $value3)
                            <div class="col-sm-4">


                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="can_speak[]"
                                            value="{{ $value->title }}" @if ($me->personalInfo)
                                        <?php  
										$arr =  explode(", ",$me->personalInfo->can_speak);
										?>
                                        @foreach ($arr as $element)
                                        {{ ($element == $value->title) ? 'checked' : ''}}
                                        @endforeach

                                        @endif

                                        > {{ $value->title }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                @endforeach
                            </div>
                            @endforeach
                        </div>





                    </div>


                </div>
            </div>
        </div>
    </div>


    <br>
    <div class="pull-right">
        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
        <button type="submit" class="btn btn-danger">{{$me->personalInfo ? 'Submit' : 'Next'}}</button>
    </div>
</form>

<script>
    $("#no-of-bro").change(function() {
        // console.log($(this).val());
  if ($(this).val() != 0) {
   
    document.getElementById("married").disabled = false;

   
  } else {
    
    document.getElementById("married").disabled = true;

  }
});
$("#no-of-bro").trigger("change");

$("#no-of-sis").change(function() {
  if ($(this).val() != 0) {

    document.getElementById("married-sis").disabled = false;
  } else {
    document.getElementById("married-sis").disabled = true;
  }
});
$("#no-of-sis").trigger("change");


</script>