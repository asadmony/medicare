<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">
            Personal Information
        </h3>
    </div>
    <div class="box-body">


        <div class="row w3-border no-margin">
            <div class="col-sm-3">


                <div class="other-area">
                    <div class="form-group form-group-sm {{ $errors->has('education_level') ? ' has-danger' : '' }}">
                        <label for="education_level">Education Level </label>
                        <select class="form-control select2 change-with-other change-with-other" name="education_level"
                            style="width: 100%;" data-placeholder="Select Option">
                            <option></option>
                            @if($user->personalInfo)
                            <option selected>{{$user->personalInfo->education_level}}</option>
                            @endif
                            {{-- ID: 26     Education Level --}}
                            @foreach ($userSettingFields[25]->values as $value)
                            @if($user->personalInfo)
                            @if ($user->personalInfo->education_level != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="text" id="education_level_other" class="form-control other-value-field"
                        name="education_level_other"
                        value="{{$user->personalInfo ? $user->personalInfo->education_level_other : ''}}"
                        placeholder="My Hair Color Other (Please Specify here)" @if($user->personalInfo)
                    @if ($user->personalInfo->education_level == 'Other' || $user->personalInfo->education_level ==
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


                <div class="form-group form-group-sm {{ $errors->has('major_subject') ? ' has-danger' : '' }}">
                    <label for="major_subject">Major Subject </label>
                    <input type="text" class="form-control" name="major_subject" style="width: 100%"
                        placeholder="Enter your Major subject">
                    {{-- <select class="form-control select2 change-with-other" 
                    name="major_subject" 
                    style="width: 100%;"
                    data-placeholder="Select Option"
                    >
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->major_subject}}</option>
                    @endif --}}
                    {{-- ID: 41     My major_subject --}}
                    {{-- @foreach ($userSettingFields[40]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->major_subject != $value->title)
                        <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach --}}
                    {{-- </select> --}}
                </div>


                <div class="form-group form-group-sm {{ $errors->has('job_title') ? ' has-danger' : '' }}">
                    <label for="job_title">Job Title </label>
                    <input type="text" id="job_title" class="form-control " name="job_title" @if($user->personalInfo)
                    value="{{ old('job_title') ?: $user->personalInfo->job_title }}"
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


            </div>
            <div class="col-sm-3">





                <div class="form-group form-group-sm {{ $errors->has('job_company_name') ? ' has-danger' : '' }}">
                    <label for="job_company_name">Job Company Name </label>
                    <input type="text" id="job_company_name" class="form-control " name="job_company_name"
                        @if($user->personalInfo)
                    value="{{ old('job_company_name') ?: $user->personalInfo->job_company_name }}"
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


                <div class="other-area">
                    <div class="form-group form-group-sm {{ $errors->has('my_profession') ? ' has-danger' : '' }}">
                        <label for="my_profession">My Profession </label>
                        <select class="form-control select2  change-with-other" name="my_profession"
                            style="width: 100%;" data-placeholder="Select Option">
                            <option></option>
                            @if($user->personalInfo)
                            <option selected>{{$user->personalInfo->my_profession}}</option>
                            @endif
                            {{-- ID: 27    My Profession --}}
                            @foreach ($userSettingFields[26]->values as $value)
                            @if($user->personalInfo)
                            @if ($user->personalInfo->my_profession != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif
                            @else
                            <option>{{ $value->title }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <input type="text" id="my_profession_other" class="form-control  other-value-field"
                        name="my_profession_other"
                        value="{{$user->personalInfo ? $user->personalInfo->my_profession_other : ''}}"
                        placeholder="My Profession Other (Please Specify here)" @if($user->personalInfo)
                    @if ($user->personalInfo->my_profession == 'Other' || $user->personalInfo->my_profession ==
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


                <div class="form-group form-group-sm {{ $errors->has('income') ? ' has-danger' : '' }}">
                    <label for="income">My Income </label>
                    <select class="form-control select2 " name="income" style="width: 100%;"
                        data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->income}}</option>
                        @endif
                        {{-- ID: 9     My income --}}
                        @foreach ($userSettingFields[8]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->income != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>





            </div>
            <div class="col-sm-3">


                {{-- <div class="form-group form-group-sm {{ $errors->has('division') ? ' has-error' : '' }}">
                <label for="division">Division/State:</label>

                <select class="form-control div-select form-group-sm " id="division" name="division"
                    data-url="{{route('welcome.divSelected')}}">
                    <option value="">Select Division </option>


                    @foreach ($divisions as $value)
                    <option value="{{ $value->id }}" {{ $user->division == $value->name ? 'selected' : '' }}>
                        {{ $value->name }}</option>
                    @endforeach

                </select>
                @if ($errors->has('division'))
                <span class="help-block">
                    <strong>{{ $errors->first('division') }}</strong>
                </span>
                @endif
            </div>


            <div class="form-group form-group-sm {{ $errors->has('district') ? ' has-error' : '' }}">
                <label for="district">District:</label>

                <select class="form-control form-group-sm dist-select" id="district" name="district"
                    data-url="{{route('welcome.distSelected')}}">
                    <option value="">Select District </option>
                    @if(old('district'))
                    <option selected>{{old('district')}}</option>
                    @elseif($user->district)
                    <option selected>{{$user->district}}</option>
                    @endif



                </select>
                @if ($errors->has('district'))
                <span class="help-block">
                    <strong>{{ $errors->first('district') }}</strong>
                </span>
                @endif
                <input type="hidden" class="dist" name="dist">
            </div>


            <div class="form-group form-group-sm {{ $errors->has('thana') ? ' has-error' : '' }}">
                <label for="thana">Location/Thana:</label>

                <select class="form-control thana-select form-group-sm " id="thana" name="thana">
                    <option value="">Select Location/Thana </option>
                    @if(old('thana'))
                    <option selected>{{old('thana')}}</option>
                    @elseif($user->thana)
                    <option selected>{{$user->thana}}</option>
                    @endif

                </select>
                @if ($errors->has('thana'))
                <span class="help-block">
                    <strong>{{ $errors->first('thana') }}</strong>
                </span>
                @endif
                <input type="hidden" name="tha" class="tha">
            </div> --}}






            <div class="form-group form-group-sm {{ $errors->has('district') ? ' has-danger' : '' }}">
                <label for="district">District </label>
                {{-- <input type="text" class="form-control" name="district" style="width: 100%;"
                    placeholder="Enter disctrict"> --}}
                <select class="form-control select2 " name="district" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->district}}</option>
                    @endif
                    @foreach ($allDistricts as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->district != $value->name)
                    <option>{{ $value->name }}</option>
                    @endif
                    @else
                    <option>{{ $value->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group form-group-sm {{ $errors->has('thana') ? ' has-danger' : '' }}">
                <label for="thana">Thana </label>

                <input type="text" class="form-control" name="thana" style="width: 100%" placeholder="Enter your thana">
                {{-- <select class="form-control select2 " name="thana" style="width: 100%;" data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->thana}}</option>
                @endif
                @foreach ($allUpazilas as $value)
                @if($user->personalInfo)
                @if ($user->personalInfo->thana != $value->name)
                <option>{{ $value->name }}</option>
                @endif
                @else
                <option>{{ $value->name }}</option>
                @endif
                @endforeach
                </select> --}}
            </div>
            <div class="form-group form-group-sm {{ $errors->has('zip_code') ? ' has-danger' : '' }}">
                <label for="zip_code">Zip Code</label>
                <input type="text" id="zip_code" class="form-control " name="zip_code" @if($user->personalInfo)
                value="{{ old('zip_code') ?: $user->personalInfo->zip_code }}"
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
        <div class="col-sm-3">





            <div class="form-group form-group-sm {{ $errors->has('smoke_status') ? ' has-danger' : '' }}">
                <label for="smoke_status">Do I smoke? </label>
                <select class="form-control select2 " name="smoke_status" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->smoke_status}}</option>
                    @endif
                    {{-- ID: 21     Do I smoke? --}}
                    @foreach ($userSettingFields[20]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->smoke_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group form-group-sm {{ $errors->has('alcohol_status') ? ' has-danger' : '' }}">
                <label for="alcohol_status">Do I addicted to alcohol? </label>
                <select class="form-control select2 " name="alcohol_status" style="width: 100%;"
                    data-placeholder="Select Option">

                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->alcohol_status}}</option>
                    @endif
                    {{-- ID: 24     Do I addicted to alcohol? --}}
                    @foreach ($userSettingFields[23]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->alcohol_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group form-group-sm {{ $errors->has('diat_status') ? ' has-danger' : '' }}">
                <label for="diat_status">Diat Status </label>
                <select class="form-control select2 " name="diat_status" style="width: 100%;"
                    data-placeholder="Select Option">

                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->diat_status}}</option>
                    @endif
                    {{-- ID: 28     Diat Status --}}
                    @foreach ($userSettingFields[27]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->diat_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group form-group-sm {{ $errors->has('graduate_from') ? ' has-danger' : '' }}">
                <label for="diat_status">Graduation from (Institution) </label>
                <input type="text" name="graduate_from" placeholder="Enter your institution" id="graduate_from"
                    value="{{$user->personalInfo ? $user->personalInfo->graduate_from : ''}}" class="form-control">

            </div>
        </div>
    </div>

    <br>

    <br>

    <div class="row w3-border no-margin">
        <div class="col-sm-3">







            <div class="other-area">
                <div class="form-group form-group-sm {{ $errors->has('citizenship') ? ' has-danger' : '' }}">
                    <label for="citizenship">Citizenship Status</label>
                    <select class="form-control select2  change-with-other" name="citizenship" style="width: 100%;"
                        data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->citizenship}}</option>
                        @endif
                        {{-- ID:7, title:citizenship --}}
                        @foreach ($userSettingFields[6]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->citizenship != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <input type="text" id="citizenship_other" class="form-control  other-value-field"
                    name="citizenship_other"
                    value="{{$user->personalInfo ? $user->personalInfo->citizenship_other : ''}}"
                    placeholder="Citizenship Other (Please Specify here)" @if($user->personalInfo)
                @if ($user->personalInfo->citizenship == 'Other' || $user->personalInfo->citizenship == 'Others')
                style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                @endif

                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                @endif

                />
            </div>


            <div class="form-group form-group-sm {{ $errors->has('city_of_residence') ? ' has-danger' : '' }}">
                <label for="height">City of Residence </label>
                <input type="text" id="city_of_residence" class="form-control " name="city_of_residence"
                    @if($user->personalInfo)
                value="{{ old('job_company_name') ?: $user->personalInfo->city_of_residence }}"
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



            <div class="form-group form-group-sm {{ $errors->has('state_of_residence') ? ' has-danger' : '' }}">
                <label for="height">State / Division of Residence </label>
                <input type="text" id="state_of_residence" class="form-control " name="state_of_residence"
                    @if($user->personalInfo)
                value="{{ old('state_of_residence') ?: $user->personalInfo->state_of_residence }}"
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










        </div>
        <div class="col-sm-3">



            <div class="other-area">
                <div class="form-group form-group-sm {{ $errors->has('country_of_residence') ? ' has-danger' : '' }}">
                    <label for="country_of_residence">Country of Residence </label>
                    <select class="form-control select2  change-with-other" name="country_of_residence"
                        style="width: 100%;" data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->country_of_residence}}</option>
                        @endif
                        {{-- ID:3, title:country --}}
                        @foreach ($userSettingFields[2]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->country_of_residence != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <input type="text" id="country_of_residence_other" class="form-control  other-value-field"
                    name="country_of_residence_other"
                    value="{{$user->personalInfo ? $user->personalInfo->country_of_residence_other : ''}}"
                    placeholder="Country of residence Other (Please Specify here)" @if($user->personalInfo)
                @if ($user->personalInfo->country_of_residence == 'Other' || $user->personalInfo->country_of_residence
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





            <div class="form-group form-group-sm {{ $errors->has('father_name') ? ' has-danger' : '' }}">
                <label for="father_name">Father's Name </label>
                <input type="text" id="father_name" class="form-control " name="father_name" @if($user->personalInfo)
                value="{{ old('father_name') ?: $user->personalInfo->father_name }}"
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



            <div class="form-group form-group-sm {{ $errors->has('father_occupation') ? ' has-danger' : '' }}">
                <label for="father_occupation">Father's Occupation </label>
                <select class="form-control select2 " name="father_occupation" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->father_occupation}}</option>
                    @endif
                    {{-- ID: 33     Father's Occupation --}}
                    @foreach ($userSettingFields[32]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->father_occupation != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>








        </div>
        <div class="col-sm-3">


            <div class="form-group form-group-sm {{ $errors->has('mother_name') ? ' has-danger' : '' }}">
                <label for="mother_name">Mother's Name </label>
                <input type="text" id="mother_name" class="form-control " name="mother_name" @if($user->personalInfo)
                value="{{ old('mother_name') ?: $user->personalInfo->mother_name }}"
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



            <div class="form-group form-group-sm {{ $errors->has('mother_occupation') ? ' has-danger' : '' }}">
                <label for="mother_occupation">Mother's Occupation </label>
                <select class="form-control select2 " name="mother_occupation" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->mother_occupation}}</option>
                    @endif
                    {{-- ID: 34     Mother's Occupation --}}
                    @foreach ($userSettingFields[33]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->mother_occupation != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>





            <div class="form-group form-group-sm {{ $errors->has('number_of_brother') ? ' has-danger' : '' }}">
                <label for="number_of_brother">Number of Brother </label>
                <select class="form-control select2 " name="number_of_brother" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->number_of_brother}}</option>
                    @endif
                    @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                        @endfor
                </select>
            </div>







        </div>
        <div class="col-sm-3">






            <div class="form-group form-group-sm {{ $errors->has('how_many_brother_married') ? ' has-danger' : '' }}">
                <label for="how_many_brother_married">How many brother Married? </label>
                <select class="form-control select2 " name="how_many_brother_married" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->how_many_brother_married}}</option>
                    @endif
                    @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                        @endfor

                </select>
            </div>


            <div class="form-group form-group-sm {{ $errors->has('number_of_sister') ? ' has-danger' : '' }}">
                <label for="number_of_sister">Number of Sister </label>
                <select class="form-control select2 " name="number_of_sister" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->number_of_sister}}</option>
                    @endif
                    @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                        @endfor
                </select>
            </div>

            <div class="form-group form-group-sm {{ $errors->has('how_many_sister_married') ? ' has-danger' : '' }}">
                <label for="how_many_sister_married">How many sister Married? </label>
                <select class="form-control select2 " name="how_many_sister_married" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->how_many_sister_married}}</option>
                    @endif
                    @for ($i = 0; $i <= 15; $i++) <option>{{ $i }}</option>

                        @endfor

                </select>
            </div>



        </div>
    </div>

    <br>


    <br>
    <div class="row w3-border no-margin">
        <div class="col-sm-3">





            <div class="form-group form-group-sm {{ $errors->has('height') ? ' has-danger' : '' }}">
                <label for="height">My Height </label>
                <select class="form-control select2 " name="height" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->height}}</option>
                    @endif
                    {{-- ID: 15     My Height --}}
                    @foreach ($userSettingFields[14]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->height != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group form-group-sm {{ $errors->has('blood_group') ? ' has-danger' : '' }}">
                <label for="blood_group">Blood Group </label>
                <select class="form-control select2 " name="blood_group" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->blood_group}}</option>
                    @endif
                    {{-- ID: 25     Blood group --}}
                    @foreach ($userSettingFields[24]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->blood_group != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>



            <div class="form-group form-group-sm {{ $errors->has('body_build') ? ' has-danger' : '' }}">
                <label for="body_build">My Body Type </label>
                <select class="form-control select2 " name="body_build" style="width: 100%;"
                    data-placeholder="Select Option">

                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->body_build}}</option>
                    @endif
                    {{-- ID: 16     My Body Build --}}
                    @foreach ($userSettingFields[15]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->body_build != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>







        </div>
        <div class="col-sm-3">


            <div class="form-group form-group-sm {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                <label for="marital_status">Marital Status</label>
                <select class="form-control select2 " name="marital_status" style="width: 100%;"
                    data-placeholder="Select Option">

                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->marital_status}}</option>
                    @endif
                    {{-- ID: 11     Marital Status --}}
                    @foreach ($userSettingFields[10]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->marital_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>






            <div class="other-area">
                <div class="form-group form-group-sm {{ $errors->has('hair_color') ? ' has-danger' : '' }}">
                    <label for="hair_color">My Hair Color </label>
                    <select class="form-control select2  change-with-other" name="hair_color" style="width: 100%;"
                        data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->hair_color}}</option>
                        @endif
                        {{-- ID: 17     My Hair Color --}}
                        @foreach ($userSettingFields[16]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->hair_color != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input type="text" id="hair_color_other" class="form-control  other-value-field" name="hair_color_other"
                    value="{{$user->personalInfo ? $user->personalInfo->hair_color_other : ''}}"
                    placeholder="My Hair Color Other (Please Specify here)" @if($user->personalInfo)
                @if ($user->personalInfo->hair_color == 'Other' || $user->personalInfo->hair_color == 'Others')
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
                <div class="form-group form-group-sm {{ $errors->has('eye_color') ? ' has-danger' : '' }}">
                    <label for="eye_color">My Eye Color </label>
                    <select class="form-control select2  change-with-other" name="eye_color" style="width: 100%;"
                        data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->eye_color}}</option>
                        @endif
                        {{-- ID: 18     My Eye Color --}}
                        @foreach ($userSettingFields[17]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->eye_color != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input type="text" id="eye_color_other" class="form-control  other-value-field" name="eye_color_other"
                    value="{{$user->personalInfo ? $user->personalInfo->eye_color_other : ''}}"
                    placeholder="My Eye Color Other (Please Specify here)" @if($user->personalInfo)
                @if ($user->personalInfo->eye_color == 'Other' || $user->personalInfo->eye_color == 'Others')
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
        <div class="col-sm-3">


            <div class="other-area">
                <div class="form-group form-group-sm {{ $errors->has('skin_color') ? ' has-danger' : '' }}">
                    <label for="skin_color">My Skin Color </label>
                    <select class="form-control select2  change-with-other" name="skin_color" style="width: 100%;"
                        data-placeholder="Select Option">
                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->skin_color}}</option>
                        @endif
                        {{-- ID: 19     My Skin Color --}}
                        @foreach ($userSettingFields[18]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->skin_color != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input type="text" id="skin_color_other" class="form-control  other-value-field" name="skin_color_other"
                    value="{{$user->personalInfo ? $user->personalInfo->skin_color_other : ''}}"
                    placeholder="My Skin Color Other (Please Specify here)" @if($user->personalInfo)
                @if ($user->personalInfo->skin_color == 'Other' || $user->personalInfo->skin_color == 'Others')
                style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;"
                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                @endif

                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;"
                @endif

                />
            </div>





            <div class="form-group form-group-sm {{ $errors->has('do_u_have_children') ? ' has-danger' : '' }}">
                <label for="do_u_have_children">Do you have children?</label>
                <select class="form-control select2 " name="do_u_have_children" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->do_u_have_children}}</option>
                    @endif
                    {{-- ID: 13     Do you have children? --}}
                    @foreach ($userSettingFields[12]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->do_u_have_children != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>





            <div class="form-group form-group-sm {{ $errors->has('zodiac_sign') ? ' has-danger' : '' }}">
                <label for="zodiac_sign">Zodiac Sign </label>
                <select class="form-control select2 " name="zodiac_sign" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->zodiac_sign}}</option>
                    @endif
                    {{-- ID: 30     Zodiac Sign --}}
                    @foreach ($userSettingFields[29]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->zodiac_sign != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>










        </div>
        <div class="col-sm-3">



            <div class="other-area">
                <div class="form-group form-group-sm {{ $errors->has('disabilities_status') ? ' has-danger' : '' }}">
                    <label for="disabilities_status">Do I have any disabilities? </label>
                    <select class="form-control select2  change-with-other" name="disabilities_status"
                        style="width: 100%;" data-placeholder="Select Option">

                        <option></option>
                        @if($user->personalInfo)
                        <option selected>{{$user->personalInfo->disabilities_status}}</option>
                        @endif
                        {{-- ID: 22     Do I have any disabilities? --}}
                        @foreach ($userSettingFields[21]->values as $value)
                        @if($user->personalInfo)
                        @if ($user->personalInfo->disabilities_status != $value->title)
                        <option>{{ $value->title }}</option>
                        @endif
                        @else
                        <option>{{ $value->title }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input type="text" id="disabilities_status_other" class="form-control  other-value-field"
                    name="disabilities_status_other"
                    value="{{$user->personalInfo ? $user->personalInfo->disabilities_status_other : ''}}"
                    placeholder="Disabilities... Other (Please Specify here)" @if($user->personalInfo)
                @if ($user->personalInfo->disabilities_status == 'Other' || $user->personalInfo->disabilities_status ==
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


            <div class="form-group form-group-sm {{ $errors->has('hear_about_us') ? ' has-danger' : '' }}">
                <label for="hear_about_us">How did you know about us? </label>
                <select class="form-control select2 " name="hear_about_us" style="width: 100%;"
                    data-placeholder="Select Option">
                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->hear_about_us}}</option>
                    @endif
                    {{-- ID: 5     Hear about us --}}
                    @foreach ($userSettingFields[4]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->hear_about_us != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>



            <div class="checkbox">
                <label>
                    <input type="checkbox" name="personal_info_checked" @if ($user->personalInfo)

                    {{$user->personalInfo->checked ? 'checked' : ''}}

                    @endif

                    /> Data Checked (Personal Info)</label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="personal_info_can_edit" @if ($user->personalInfo)

                    {{$user->personalInfo->can_edit ? 'checked' : ''}}

                    @endif
                    /> Can Edit (Personal Info)</label>
            </div>


        </div>
    </div>

    <br>

    <br>
    <div class="row w3-border" style="margin:0">
        <div class="col-sm-3">





            <div class="form-group form-group-sm {{ $errors->has('mother_tongue') ? ' has-danger' : '' }}">
                <label for="mother_tongue">Mother Tongue </label>
                <select class="form-control select2 " name="mother_tongue" style="width: 100%;"
                    data-placeholder="Select Option">

                    <option></option>
                    @if($user->personalInfo)
                    <option selected>{{$user->personalInfo->mother_tongue}}</option>
                    @endif
                    {{-- ID: 31     Mother Tongue --}}
                    @foreach ($userSettingFields[30]->values as $value)
                    @if($user->personalInfo)
                    @if ($user->personalInfo->mother_tongue != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                    @else
                    <option>{{ $value->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>




        </div>
        <div class="col-sm-9">





            <div class="form-group form-group-sm {{ $errors->has('can_speak') ? ' has-danger' : '' }}">
                <label for="can_speak">Can Speak</label>


                {{-- ID: 32   can speak --}}

                <div class="row">
                    @foreach ($userSettingFields[31]->values->chunk($userSettingFields[31]->values->count()/3) as
                    $value3)
                    <div class="col-sm-4">


                        @foreach($value3 as $value)

                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="can_speak[]"
                                    value="{{ $value->title }}" @if ($user->personalInfo)
                                <?php  
                                    $arr =  explode(", ",$user->personalInfo->can_speak);
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