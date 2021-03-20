<section class="content-header">
    <h1>
        User
        <small>Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">
            @include('alerts.alerts')
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> Edit information of ID:{{ $user->id }}, {{ $user->email }}, {{ $user->username }}</h3>
                    <div class="pull-right">

                    </div>
                    
                </div>
                <div class="box-body">


                    <form  role="form" method="post" action="{{route('admin.userDetailsUpdatePost',$user)}}">
                        {{csrf_field()}}

                        <div class="row">
                            <div class="col-sm-6">


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Basic
                                    </div>
                                    <div class="panel-body">


                                        


                                        <div class="form-group form-group-sm {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="username">Username:</label>
                                            <input 
                                            type="text"  
                                            class="form-control" 
                                            id="username"
                                            name="username"
                                            value="{{ old('username') ?: $user->username }}" 
                                            placeholder="Username" 
                                            />

                                            @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="form-group form-group-sm {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email">Email:</label>
                                            <input 
                                            type="email"  
                                            class="form-control" 
                                            id="email"
                                            name="email"
                                            value="{{ old('email') ?: $user->email }}" 
                                            placeholder="Email" 
                                            />

                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>




<div class="other-area">
    <div class="form-group form-group-sm {{ $errors->has('country') ? ' has-error' : '' }}">
        <label for="country">Country</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="country" 
        name="country" 
        data-placeholder="Select Option"
        /> 
        <option></option>
        <option selected>{{$user->country}}</option>
        {{-- ID: 3     Country --}}
        @foreach ($userSettingFields[2]->values as $value)

        @if ($user->country != $value->title)
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
value="{{$user->country_other ?: ''}}"
placeholder="Country Other (Please Specify here)" 

@if ($user->country == 'Other' || $user->country == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

/>
</div>


                                    <div class="form-group form-group-sm {{ $errors->has('location') ? ' has-error' : '' }}">
                                        <label for="location">Location </label>
                                        <select class="form-control form-group-sm select2" 
                                        id="location" 
                                        name="location" 
                                        data-placeholder="Select Option"
                                        />
                                        <option></option>
                                        <option selected>{{$user->location}}</option>
                                        {{-- ID: 2     Location --}}
                                        @foreach ($userSettingFields[1]->values as $value)

                                        @if ($user->location != $value->title)
                                        <option>{{ $value->title }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    </div>

                                        <div class="form-group form-group-sm {{ $errors->has('package') ? ' has-error' : '' }}">
                                            <label for="package">Package:</label>

                                            <select class="form-control form-group-sm select2" id="package" name="package">
                                                <option value="">Select Package </option>
                                                @if(old('package'))
                                                <option selected>{{old('package')}}</option>
                                                @elseif($user->package > 0)
                                                <option selected>{{$user->package}}</option>
                                                @endif
                                                {{-- packages --}}
                                                @foreach ($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->id }} ({{$package->package_title}}, Duration {{$package->package_duration}} Days, {{$package->package_currency}} {{$package->package_amount}})</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('package'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('package') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="form-group form-group-sm {{ $errors->has('expired_at') ? ' has-error' : '' }}">
                                            <label for="expired_at">Expired Date:</label>
                                            <input 
                                            type="date"  
                                            class="form-control" 
                                            id="expired_at"
                                            name="expired_at"
                                            @if($user->expired_at)
                                            value="{{old('expired_at') ?: date('Y-m-d', strtotime($user->expired_at))}}"
                                            @else
                                            value="{{ old('expired_at') }}" 
                                            @endif

                                            placeholder="Expired Date" 
                                            />

                                            @if ($errors->has('expired_at'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('expired_at') }}</strong>
                                            </span>
                                            @endif
                                        </div>






<!--   <div class="form-group form-group-sm">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
-->
<!--   <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  
-->


</div>
</div>




</div>
<div class="col-sm-6">


    <div class="panel panel-default">
        <div class="panel-heading">
            About {{$user->name}}
        </div>
        <div class="panel-body">


            <div class="form-group form-group-sm {{ $errors->has('fullName') ? ' has-error' : '' }}">
                    <label for="fullName">Full Name:</label>
                    <input 
                    type="text"  
                    class="form-control" 
                    id="fullName"
                    name="fullName"
                    value="{{ old('fullName') ?: $user->name }}" 
                    placeholder="Full Name" 
                    />

                    @if ($errors->has('fullName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fullName') }}</strong>
                    </span>
                    @endif
                </div>


            <div class="form-group form-group-sm {{ $errors->has('headline') ? ' has-error' : '' }}">
                <label for="headline">Headline:</label>
                <input 
                type="text"  
                class="form-control" 
                id="headline"
                name="headline"
                @if($user->about)
                value="{{ old('headline') ?:  $user->about->headline }}" 
                @else
                value="{{ old('headline') }}"
                @endif


                placeholder="Headline" 
                />

                @if ($errors->has('headline'))
                <span class="help-block">
                    <strong>{{ $errors->first('headline') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group form-group-sm {{ $errors->has('about_me') ? ' has-error' : '' }}">
                <label for="about_me">About Me (User):</label>
                <input 
                type="text"  
                class="form-control" 
                id="about_me"
                name="about_me"
                @if($user->about)
                value="{{ old('about_me') ?:  $user->about->about_me }}" 
                @else
                value="{{ old('about_me') }}"
                @endif


                placeholder="About User" 
                />

                @if ($errors->has('about_me'))
                <span class="help-block">
                    <strong>{{ $errors->first('about_me') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group form-group-sm {{ $errors->has('looking_for') ? ' has-error' : '' }}">
                <label for="looking_for">Looking For:</label>
                <input 
                type="text"  
                class="form-control" 
                id="looking_for"
                name="looking_for"
                value="{{ old('looking_for') ?: $user->looking_for }}" 
                placeholder="Looking For" 
                />

                @if ($errors->has('looking_for'))
                <span class="help-block">
                    <strong>{{ $errors->first('looking_for') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group form-group-sm {{ $errors->has('gender') ? ' has-error' : '' }}">
                <label for="gender">Gender:</label>
                
                <select class="form-control form-group-sm select2" id="gender" name="gender">
                    <option value="">Select Gender </option>
                    @if(old('gender'))
                    <option selected>{{old('gender')}}</option>
                    @else              
                    <option selected>{{$user->gender}}</option>
                    @endif
                    {{-- id:1, title:gender --}}
                    @foreach ($userSettingFields[0]->values as $value)
                    <option>{{ $value->title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('gender'))
                <span class="help-block">
                    <strong>{{ $errors->first('gender') }}</strong>
                </span>
                @endif
            </div>


            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group form-group-sm">
                        <label class="label-control">Date of Birth</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" id="day" name="day">

                        @if($user->dob)
                        <option value="{{date('d', strtotime($user->dob))}}">{{date('d', strtotime($user->dob))}}</option>
                        @else
                        <option value="">Day</option>
                        @endif
                        @for ($i = 1; $i <= 31; $i++)
                        <option>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" id="month" name="month">

                        @if($user->dob)
                        <option value="{{date('m', strtotime($user->dob))}}">{{date('M', strtotime($user->dob))}}</option>
                        @else
                        <option value="">Month</option>
                        @endif
                        <option value="01">January</option>
                        <option value="02">February</option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col-sm-3"><select class="form-control" id="year" name="year">

                   @if($user->dob)
                   <option value="{{date('Y', strtotime($user->dob))}}">{{date('Y', strtotime($user->dob))}}</option>
                   @else
                   <option value="">Year</option>
                   @endif

                   @for ($i = date('Y') -14; $i >= date('Y') - 60; $i--)
                   <option>{{ $i }}</option>
                   @endfor
               </select></div>
           </div>


           <div class="checkbox">
            <label>
                <input 
                type="checkbox"
                name="active"
                {{$user->active ? 'checked' : ''}} 
                /> Active (Account Status)</label>
            </div>








        </div>

    </div>

</div>
</div>


<div class="row">


    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">

                Education & Work

            </div>
            <div class="panel-body">



                <div class="other-area">
                    <div class="form-group form-group-sm {{ $errors->has('education_level') ? ' has-error' : '' }}">
                        <label for="education_level">Education Level</label>
                        <select class="form-control form-group-sm select2 change-with-other" 
                        id="education_level" 
                        name="education_level" 
                        data-placeholder="Select Option"
                        />    
                        <option></option>
                        @if($user->educationWork)
                        <option selected>{{$user->educationWork->education_level}}</option>
                        @endif
                        {{-- ID: 26     My Education Level --}}
                        @foreach ($userSettingFields[25]->values as $value)
                        @if($user->educationWork)
                        @if ($user->educationWork->education_level != $value->title)
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
                class="form-control other-value-field" 
                name="education_level_other"
                value="{{$user->educationWork ? $user->educationWork->education_level_other : ''}}"    
                placeholder="Education Level Other (Please Specify here)" 

                @if($user->educationWork)
                @if ($user->educationWork->education_level == 'Other' || $user->educationWork->education_level == 'Others')
                style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                @endif

                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                @endif


                />

            </div>



            <div class="form-group form-group-sm {{ $errors->has('subject_studied') ? ' has-error' : '' }}">
                <label for="subject_studied">Subject Studied </label>
                <input  
                type="text" 
                id="subject_studied" 
                class="form-control" 
                name="subject_studied"
                value="{{$user->educationWork ? $user->educationWork->subject_studied : ''}}"        
                placeholder="Subject studied..." 
                style="border-radius: 4px;padding-left: 8px;" 
                />
                @if($errors->has('subject_studied'))

                <span class="help-block">
                    <strong>{{ $errors->first('subject_studied') }}</strong>
                </span>

                @endif
            </div>



            <div class="form-group form-group-sm {{ $errors->has('job_title') ? ' has-error' : '' }}">
                <label for="job_title">Job Title</label>
                <input  
                type="text" 
                id="job_title" 
                class="form-control" 
                name="job_title"
                value="{{$user->educationWork ? $user->educationWork->job_title : ''}}"        
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
                <div class="form-group form-group-sm {{ $errors->has('my_profession') ? ' has-error' : '' }}">
                    <label for="my_profession">Profession</label>
                    <select class="form-control form-group-sm select2 change-with-other" 
                    id="my_profession" 
                    name="my_profession" 
                    data-placeholder="Select Option"
                    />  
                    <option></option>
                    @if($user->educationWork)
                    <option selected>{{$user->educationWork->my_profession}}</option>
                    @endif
                    {{-- ID: 27     My Profession --}}
                    @foreach ($userSettingFields[26]->values as $value)
                    @if($user->educationWork)
                    @if ($user->educationWork->my_profession != $value->title)
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
            class="form-control other-value-field" 
            name="my_profession_other"
            value="{{$user->educationWork ? $user->educationWork->my_profession_other : ''}}"       
            placeholder="My Profession Other (Please Specify here)" 

            @if($user->educationWork)
            @if ($user->educationWork->my_profession == 'Other' || $user->educationWork->my_profession == 'Others')
            style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
            @else
            style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
            @endif

            @else
            style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
            @endif

            />



        </div>

        <div class="form-group form-group-sm {{ $errors->has('first_language') ? ' has-error' : '' }}">
            <label for="first_language">First Language</label>
            <input  
            type="text" 
            id="first_language" 
            class="form-control" 
            name="first_language"
            value="{{$user->educationWork ? $user->educationWork->first_language : ''}}"        
            placeholder="My first language..." 
            style="border-radius: 4px;padding-left: 8px;" 
            />
            @if($errors->has('first_language'))

            <span class="help-block">
                <strong>{{ $errors->first('first_language') }}</strong>
            </span>

            @endif
        </div>

        <div class="form-group form-group-sm {{ $errors->has('second_language') ? ' has-error' : '' }}">
            <label for="second_language">Second Language</label>
            <input  
            type="text" 
            id="second_language" 
            class="form-control" 
            name="second_language"
            value="{{$user->educationWork ? $user->educationWork->second_language : ''}}"        
            placeholder="My second language..." 
            style="border-radius: 4px;padding-left: 8px;" 
            />
            @if($errors->has('second_language'))

            <span class="help-block">
                <strong>{{ $errors->first('second_language') }}</strong>
            </span>

            @endif
        </div>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">

        Religion

    </div>
    <div class="panel-body">


        <div class="form-group form-group-sm {{ $errors->has('religious_status') ? ' has-error' : '' }}">
            <label for="religious_status">How Religious Are You?</label>

            <select class="form-control form-group-sm select2" 
            id="religious_status" 
            name="religious_status" 
            data-placeholder="Select Option"
            />
            <option></option>
            @if($user->religion)
            <option selected>{{$user->religion->religious_status}}</option>
            @endif
            {{-- ID: 28     How Religious Are You? --}}
            @foreach ($userSettingFields[27]->values as $value)
            @if ($user->religion)
            @if ($user->religion->religious_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group form-group-sm {{ $errors->has('religious_section') ? ' has-error' : '' }}">
        <label for="religious_section">Religious Section </label>

        <select class="form-control form-group-sm select2" 
        id="religious_section" 
        name="religious_section" 
        data-placeholder="Select Option"
        />
        <option></option>
        @if($user->religion)
        <option selected>{{$user->religion->religious_section}}</option>
        @endif
        {{-- ID: 29     My Section --}}
        @foreach ($userSettingFields[28]->values as $value)
        @if ($user->religion)
        @if ($user->religion->religious_section != $value->title)
        <option>{{ $value->title }}</option>
        @endif
        @else
        <option>{{ $value->title }}</option>
        @endif
        @endforeach
    </select>
</div>

<div class="form-group form-group-sm {{ $errors->has('prefer_hijab') ? ' has-error' : '' }}">
    <label for="prefer_hijab">Do You Prefer Hijab/Niqab?</label>
    <select class="form-control form-group-sm select2" 
    id="prefer_hijab" 
    name="prefer_hijab" 
    data-placeholder="Select Option"
    />
    <option></option>
    @if($user->religion)
    <option selected>{{$user->religion->prefer_hijab}}</option>
    @endif
    {{-- ID: 30     Do You Prefer Hijab/Niqab? --}}
    @foreach ($userSettingFields[29]->values as $value)
    @if($user->religion)
    @if ($user->religion->prefer_hijab != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @else
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>

<div class="form-group form-group-sm {{ $errors->has('prefer_beard') ? ' has-error' : '' }}">
    <label for="prefer_beard">Do You Like Beard? </label>
    <select class="form-control form-group-sm select2" 
    id="prefer_beard" 
    name="prefer_beard" 
    data-placeholder="Select Option"
    />
    <option></option>
    @if($user->religion)
    <option selected>{{$user->religion->prefer_beard}}</option>
    @endif
    {{-- ID: 31     Do You Like Beard? --}}
    @foreach ($userSettingFields[30]->values as $value)
    @if($user->religion)
    @if ($user->religion->prefer_beard != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @else
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>

<div class="form-group form-group-sm {{ $errors->has('are_you_revert') ? ' has-error' : '' }}">
    <label for="are_you_revert">Are You a Revert?</label>

    <select class="form-control form-group-sm select2" 
    id="are_you_revert" 
    name="are_you_revert" 
    data-placeholder="Select Option"
    />

    <option></option>
    @if($user->religion)
    <option selected>{{$user->religion->are_you_revert}}</option>
    @endif
    {{-- ID: 32     Are You a Revert? --}}
    @foreach ($userSettingFields[31]->values as $value)
    @if($user->religion)
    @if ($user->religion->are_you_revert != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @else
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>

<div class="form-group form-group-sm {{ $errors->has('salah_status') ? ' has-error' : '' }}">
    <label for="salah_status">Do You Perform Salah? </label>

    <select class="form-control form-group-sm select2" 
    id="salah_status" 
    name="salah_status" 
    data-placeholder="Select Option"
    />
    <option></option>
    @if($user->religion)
    <option selected>{{$user->religion->salah_status}}</option>
    @endif
    {{-- ID: 33     Do You Perform Salah? --}}
    @foreach ($userSettingFields[32]->values as $value)
    @if($user->religion)
    @if ($user->religion->salah_status != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @else
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>

<div class="form-group form-group-sm {{ $errors->has('can_read_quran') ? ' has-error' : '' }}">
    <label for="can_read_quran">Do You Know How to Read Quran? </label>

    <select class="form-control form-group-sm select2" 
    id="can_read_quran" 
    name="can_read_quran" 
    data-placeholder="Select Option"
    />

    <option></option>
    @if($user->religion)
    <option selected>{{$user->religion->can_read_quran}}</option>
    @endif
    {{-- ID: 34     Do You Know How to Read Quran? --}}
    @foreach ($userSettingFields[33]->values as $value)
    @if($user->religion)
    @if ($user->religion->can_read_quran != $value->title)
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


<div class="panel panel-default">
    <div class="panel-heading">
        Personal Info for Office
    </div>
    <div class="panel-body">



    <div class="form-group form-group-sm {{ $errors->has('first_name') ? ' has-error' : '' }}">
        <label for="first_name">First Name</label>
        <input  
        type="text" 
        id="first_name" 
        class="form-control" 
        name="first_name"
        value="{{$user->infoForOffice ? $user->infoForOffice->first_name : ''}}"        
        placeholder="First name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('first_name'))

        <span class="help-block">
            <strong>{{ $errors->first('first_name') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('last_name') ? ' has-error' : '' }}">
        <label for="last_name">Last Name</label>
        <input  
        type="text" 
        id="last_name" 
        class="form-control" 
        name="last_name"
        value="{{$user->infoForOffice ? $user->infoForOffice->last_name : ''}}"        
        placeholder="Last name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('last_name'))

        <span class="help-block">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
        
        @endif
    </div>


    <div class="form-group form-group-sm {{ $errors->has('present_address') ? ' has-error' : '' }}">
        <label for="present_address">Present Address</label>
        <textarea 
        class="form-control" 
        name="present_address" 
        id="present_address" 
        cols="30" 
        rows="3" 
        placeholder="Present address..." 
        style="border-radius: 4px;padding-left: 8px;">{{$user->infoForOffice ? $user->infoForOffice->present_address : ''}}</textarea>
        @if($errors->has('present_address'))

        <span class="help-block">
            <strong>{{ $errors->first('present_address') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('permanent_address') ? ' has-error' : '' }}">
        <label for="permanent_address">Permanent Address</label>
        <textarea 
        class="form-control" 
        name="permanent_address" 
        id="permanent_address" 
        cols="30" 
        rows="3" 
        placeholder="Permanent address..." 
        style="border-radius: 4px;padding-left: 8px;">{{$user->infoForOffice ? $user->infoForOffice->permanent_address : ''}}</textarea>
        @if($errors->has('permanent_address'))

        <span class="help-block">
            <strong>{{ $errors->first('permanent_address') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('office_address') ? ' has-error' : '' }}">
        <label for="office_address">Office Address </label>
        <textarea 
        class="form-control" 
        name="office_address" 
        id="office_address" 
        cols="30" 
        rows="3" 
        placeholder="Office address..." 
        style="border-radius: 4px;padding-left: 8px;">{{$user->infoForOffice ? $user->infoForOffice->office_address : ''}}</textarea>
        @if($errors->has('office_address'))

        <span class="help-block">
            <strong>{{ $errors->first('office_address') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('father_name') ? ' has-error' : '' }}">
        <label for="father_name">Father's Name</label>
        <input  
        type="text" 
        id="father_name" 
        class="form-control" 
        name="father_name"
        value="{{$user->infoForOffice ? $user->infoForOffice->father_name : ''}}"        
        placeholder="Father's name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('father_name'))

        <span class="help-block">
            <strong>{{ $errors->first('father_name') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('father_contact') ? ' has-error' : '' }}">
        <label for="father_contact">Father's Contact</label>
        <textarea 
        class="form-control" 
        name="father_contact" 
        id="father_contact" 
        cols="30" 
        rows="3" 
        placeholder="Father's contact..." 
        style="border-radius: 4px;padding-left: 8px;">{{$user->infoForOffice ? $user->infoForOffice->father_contact : ''}}</textarea>
        @if($errors->has('father_contact'))

        <span class="help-block">
            <strong>{{ $errors->first('father_contact') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('mother_name') ? ' has-error' : '' }}">
        <label for="mother_name">Mother's Name</label>
        <input  
        type="text" 
        id="mother_name" 
        class="form-control" 
        name="mother_name"
        value="{{$user->infoForOffice ? $user->infoForOffice->mother_name : ''}}"        
        placeholder="Mother's name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('mother_name'))

        <span class="help-block">
            <strong>{{ $errors->first('mother_name') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('mother_contact') ? ' has-error' : '' }}">
        <label for="mother_contact">Mother's Contact</label>
        <textarea 
        class="form-control" 
        name="mother_contact" 
        id="mother_contact" 
        cols="30" 
        rows="3" 
        placeholder="Mother's contact..." 
        style="border-radius: 4px;padding-left: 8px;">{{$user->infoForOffice ? $user->infoForOffice->mother_contact : ''}}</textarea>
        @if($errors->has('mother_contact'))

        <span class="help-block">
            <strong>{{ $errors->first('mother_contact') }}</strong>
        </span>

        @endif
    </div>



    <div class="form-group form-group-sm {{ $errors->has('mobile') ? ' has-error' : '' }}">
        <label for="mobile">Mobile Number</label>
        <input  
        type="text" 
        id="mobile" 
        class="form-control" 
        name="mobile"
        value="{{$user->infoForOffice ? $user->infoForOffice->mobile : ''}}"        
        placeholder="Mobile number..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('mobile'))

        <span class="help-block">
            <strong>{{ $errors->first('mobile') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group form-group-sm {{ $errors->has('phone') ? ' has-error' : '' }}">
        <label for="phone">Telephone Number </label>
        <input  
        type="text" 
        id="phone" 
        class="form-control" 
        name="phone"
        value="{{$user->infoForOffice ? $user->infoForOffice->phone : ''}}"        
        placeholder="Telephone number..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('phone'))

        <span class="help-block">
            <strong>{{ $errors->first('phone') }}</strong>
        </span>
        
        @endif
    </div>


    <br>


    <div class="row">
        <div class="col-sm-3">
            <div class="form-group form-group-sm">
                <label class="label-control">Date of Birth</label>
            </div>
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="day_for_office" name="day_for_office">

                @if($user->infoForOffice)
                <option value="{{date('d', strtotime($user->infoForOffice->dob))}}">{{date('d', strtotime($user->infoForOffice->dob))}}</option>
                @else
                <option value="">Day</option>
                @endif
                @for ($i = 1; $i <= 31; $i++)
                    <option>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="month_for_office" name="month_for_office">

                @if($user->infoForOffice)
                <option value="{{date('m', strtotime($user->infoForOffice->dob))}}">{{date('M', strtotime($user->infoForOffice->dob))}}</option>
                @else
                <option value="">Month</option>
                @endif
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">Jun</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-sm-3"><select class="form-control" id="year_for_office" name="year_for_office">

             @if($user->infoForOffice)
                <option value="{{date('Y', strtotime($user->infoForOffice->dob))}}">{{date('Y', strtotime($user->infoForOffice->dob))}}</option>
                @else
                <option value="">Year</option>
                @endif
            
            @for ($i = date('Y') -14; $i >= date('Y') - 60; $i--)
                    <option>{{ $i }}</option>
                @endfor
        </select></div>
    </div>

    <br>

    <div class="form-group form-group-sm {{ $errors->has('nid_number') ? ' has-error' : '' }}">
        <label for="nid_number">National ID</label>
        <input  
        type="text" 
        id="nid_number" 
        class="form-control" 
        name="nid_number"
        value="{{$user->infoForOffice ? $user->infoForOffice->nid_number : ''}}"        
        placeholder="National ID..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('nid_number'))

        <span class="help-block">
            <strong>{{ $errors->first('nid_number') }}</strong>
        </span>
        
        @endif
    </div>

        <div class="form-group form-group-sm {{ $errors->has('passport_number') ? ' has-error' : '' }}">
        <label for="passport_number">Passport Number</label>
        <input  
        type="text" 
        id="passport_number" 
        class="form-control" 
        name="passport_number"
        value="{{$user->infoForOffice ? $user->infoForOffice->passport_number : ''}}"        
        placeholder="Passport number..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('passport_number'))

        <span class="help-block">
            <strong>{{ $errors->first('passport_number') }}</strong>
        </span>
        
        @endif
    </div>



    </div>
</div>


</div>


<div class="col-sm-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            Personal Info
        </div>
        <div class="panel-body">


 


<div class="other-area">
    <div class="form-group form-group-sm {{ $errors->has('citizenship') ? ' has-error' : '' }}">
        <label for="citizenship">Citizenship</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="citizenship" 
        name="citizenship" 
        data-placeholder="Select Option"
        /> 
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
<input  
type="text" 
id="citizenship_other" 
class="form-control  other-value-field" 
name="citizenship_other"   
value="{{$user->personalInfo ? $user->personalInfo->citizenship_other : ''}}"     
placeholder="Citizenship Other (Please Specify here)" 

@if($user->personalInfo)
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


        <div class="form-group form-group-sm {{ $errors->has('birth_place') ? ' has-error' : '' }}">
            <label for="birth_place">Birth Place</label>

            <select class="form-control form-group-sm select2" 
            id="birth_place" 
            name="birth_place" 
            data-placeholder="Select Option"
            />
            <option></option>
            @if($user->personalInfo)
            <option selected>{{$user->personalInfo->birth_place}}</option>
            @endif
            {{-- ID: 8, Birth Place  ID: 1 is here for locatio_name --}}
            @foreach ($userSettingFields[1]->values as $value)
            @if($user->personalInfo)
            @if ($user->personalInfo->birth_place != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>


    <div class="form-group form-group-sm {{ $errors->has('income') ? ' has-error' : '' }}">
        <label for="income">Select Income (BDT)/Year</label>
        <select class="form-control form-group-sm select2" 
        id="income" 
        name="income" 
        data-placeholder="Select Option"
        />
        <option></option>

        @if($user->personalInfo)
        <option selected>{{$user->personalInfo->income}}</option>
        @endif
        {{-- ID: 9     Income (BDT)/Year --}}
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


<div class="form-group form-group-sm {{ $errors->has('going_to_marry') ? ' has-error' : '' }}">
    <label for="going_to_marry">Select Going to marry</label>
    <select class="form-control form-group-sm select2" 
    id="going_to_marry" 
    name="going_to_marry" 
    data-placeholder="Select Option"
    />
    <option></option>
    @if($user->personalInfo)
    <option selected>{{$user->personalInfo->going_to_marry}}</option>
    @endif
    {{-- ID: 10     Looking to Marry --}}
    @foreach ($userSettingFields[9]->values as $value)
    @if($user->personalInfo)
    @if ($user->personalInfo->going_to_marry != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @else
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>

<div class="form-group form-group-sm {{ $errors->has('marital_status') ? ' has-error' : '' }}">
    <label for="marital_status">Marital Status</label>
    <select class="form-control form-group-sm select2" 
    id="marital_status" 
    name="marital_status" 
    data-placeholder="Select Option"
    />
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


<div class="form-group form-group-sm {{ $errors->has('like_to_have_children') ? ' has-error' : '' }}">
    <label for="like_to_have_children">Like to have children?</label>
    <select class="form-control form-group-sm select2" 
    id="like_to_have_children" 
    name="like_to_have_children" 
    data-placeholder="Select Option"
    />
    <option></option>
    @if($user->personalInfo)
    <option selected>{{$user->personalInfo->like_to_have_children}}</option>
    @endif
    {{-- ID: 12     Would you like to have children? --}}
    @foreach ($userSettingFields[11]->values as $value)
    @if($user->personalInfo)
    @if ($user->personalInfo->like_to_have_children != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @else
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>

<div class="form-group form-group-sm {{ $errors->has('do_u_have_children') ? ' has-error' : '' }}">
    <label for="do_u_have_children">Do You Have Children?</label>
    <select class="form-control form-group-sm select2" 
    id="do_u_have_children" 
    name="do_u_have_children" 
    data-placeholder="Select Option"
    />            
    <option></option>
    @if($user->personalInfo)
    <option selected>{{$user->personalInfo->do_u_have_children}}</option>
    @endif
    {{-- ID: 13     Do I Have Children? --}}
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




<div class="other-area">

    <div class="form-group form-group-sm {{ $errors->has('living_with') ? ' has-error' : '' }}">
        <label for="living_with">Live With?</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="living_with" 
        name="living_with" 
        data-placeholder="Select Option"
        />     
        <option></option>
        @if($user->personalInfo)
        <option selected>{{$user->personalInfo->living_with}}</option>
        @endif
        {{-- ID: 14     I live with --}}
        @foreach ($userSettingFields[13]->values as $value)
        @if($user->personalInfo)
        @if ($user->personalInfo->living_with != $value->title)
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
class="form-control other-value-field" 
name="living_with_other"        
value="{{$user->personalInfo ? $user->personalInfo->living_with_other : ''}}"
placeholder="Live With Other (Please Specify here)" 

@if($user->personalInfo)
@if ($user->personalInfo->living_with == 'Other' || $user->personalInfo->living_with == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

/>
</div>

<div class="form-group form-group-sm {{ $errors->has('height') ? ' has-error' : '' }}">
    <label for="height">Height</label>
    <select class="form-control form-group-sm select2" 
    id="height" 
    name="height" 
    data-placeholder="Select Option"
    />   
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


<div class="form-group form-group-sm {{ $errors->has('body_build') ? ' has-error' : '' }}">
    <label for="body_build">Body Build</label>
    <select class="form-control form-group-sm select2" 
    id="body_build" 
    name="body_build" 
    data-placeholder="Select Option"
    />               
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


<div class="other-area">
    <div class="form-group form-group-sm {{ $errors->has('hair_color') ? ' has-error' : '' }}">
        <label for="hair_color">Hair Color</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="hair_color" 
        name="hair_color" 
        data-placeholder="Select Option"
        /> 
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
<input  
type="text" 
id="hair_color_other" 
class="form-control other-value-field" 
name="hair_color_other"        
value="{{$user->personalInfo ? $user->personalInfo->hair_color_other : ''}}"
placeholder="Hair Color Other (Please Specify here)" 
@if($user->personalInfo)
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
    <div class="form-group form-group-sm {{ $errors->has('eye_color') ? ' has-error' : '' }}">
        <label for="eye_color">Eye Color</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="eye_color" 
        name="eye_color" 
        data-placeholder="Select Option"
        /> 
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
<input  
type="text" 
id="eye_color_other" 
class="form-control other-value-field" 
name="eye_color_other"      
value="{{$user->personalInfo ? $user->personalInfo->eye_color_other : ''}}"
placeholder="My Eye Color Other (Please Specify here)" 

@if($user->personalInfo)
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

<div class="other-area">
    <div class="form-group form-group-sm {{ $errors->has('skin_color') ? ' has-error' : '' }}">
        <label for="skin_color">Skin Color</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="skin_color" 
        name="skin_color" 
        data-placeholder="Select Option"
        /> 
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
<input  
type="text" 
id="skin_color_other" 
class="form-control  other-value-field" 
name="skin_color_other"   
value="{{$user->personalInfo ? $user->personalInfo->skin_color_other : ''}}"     
placeholder="Skin Color Other (Please Specify here)" 

@if($user->personalInfo)
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


<div class="other-area">
    <div class="form-group form-group-sm {{ $errors->has('dress_up') ? ' has-error' : '' }}">
        <label for="dress_up">Dress Up</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="dress_up" 
        name="dress_up" 
        data-placeholder="Select Option"
        /> 
        <option></option>
        @if($user->personalInfo)
        <option selected>{{$user->personalInfo->dress_up}}</option>
        @endif
        {{-- ID: 20     My Dress --}}
        @foreach ($userSettingFields[19]->values as $value)
        @if($user->personalInfo)
        @if ($user->personalInfo->dress_up != $value->title)
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
class="form-control other-value-field" 
name="dress_up_other"        
value="{{$user->personalInfo ? $user->personalInfo->dress_up_other : ''}}"
placeholder="Dress Other (Please Specify here)" 

@if($user->personalInfo)
@if ($user->personalInfo->dress_up == 'Other' || $user->personalInfo->dress_up == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

/>
</div>


<div class="form-group form-group-sm {{ $errors->has('smoke_status') ? ' has-error' : '' }}">
    <label for="smoke_status">Do I Smoke</label>
    <select class="form-control form-group-sm select2" 
    id="smoke_status" 
    name="smoke_status" 
    data-placeholder="Select Option"
    />     
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


<div class="other-area">
    <div class="form-group form-group-sm {{ $errors->has('disabilities_status') ? ' has-error' : '' }}">
        <label for="disabilities_status">Do I have any disabilities?</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="disabilities_status" 
        name="disabilities_status" 
        data-placeholder="Select Option"
        />             
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
<input  
type="text" 
id="disabilities_status_other" 
class="form-control other-value-field" 
name="disabilities_status_other"        
value="{{$user->personalInfo ? $user->personalInfo->disabilities_status_other : ''}}"
placeholder="Disabilities... Other (Please Specify here)" 

@if($user->personalInfo)
@if ($user->personalInfo->disabilities_status == 'Other' || $user->personalInfo->disabilities_status == 'Others')
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
    <div class="form-group form-group-sm {{ $errors->has('how_many_siblings') ? ' has-error' : '' }}">
        <label for="how_many_siblings">How Many Brother & Sisters?</label>
        <select class="form-control form-group-sm select2 change-with-other" 
        id="how_many_siblings" 
        name="how_many_siblings" 
        data-placeholder="Select Option"
        />            
        <option></option>
        @if($user->personalInfo)
        <option selected>{{$user->personalInfo->how_many_siblings}}</option>
        @endif
        {{-- ID: 23     My Brother and Sister? --}}
        @foreach ($userSettingFields[22]->values as $value)
        @if($user->personalInfo)
        @if ($user->personalInfo->how_many_siblings != $value->title)
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
class="form-control other-value-field" 
name="how_many_siblings_other"        
value="{{$user->personalInfo ? $user->personalInfo->how_many_siblings_other : ''}}"
placeholder="Brother & Sister... Other (Please Specify here)" 

@if($user->personalInfo)
@if ($user->personalInfo->how_many_siblings == 'Other' || $user->personalInfo->how_many_siblings == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif


/>
</div>



<div class="form-group form-group-sm {{ $errors->has('alcohol_status') ? ' has-error' : '' }}">
    <label for="alcohol_status">Do I addicted to alcohol?</label>
    <select class="form-control form-group-sm select2" 
    id="alcohol_status" 
    name="alcohol_status" 
    data-placeholder="Select Option"
    />              
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

<div class="form-group form-group-sm {{ $errors->has('blood_group') ? ' has-error' : '' }}">
    <label for="blood_group">Blood Group</label>
    <select class="form-control form-group-sm select2" 
    id="blood_group" 
    name="blood_group" 
    data-placeholder="Select Option"
    />              
    <option></option>
    @if($user->personalInfo)
    <option selected>{{$user->personalInfo->blood_group}}</option>
    @endif
    {{-- ID: 25     My Blood Group? --}}
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

</div>
</div>
</div>

</div>

<div class="pull-right">

    <a class="btn btn-primary" target="_blank" href="{{route('admin.userDetailsPrint', $user)}}">Print <i class="fa fa-print"></i></a>

    <button type="submit" class="btn btn-primary">Update</button>              
</div>


</form>
</div>
</div>

</div>
</div>
<!-- /.row -->


</section>