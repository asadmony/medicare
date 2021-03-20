
<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">
            Basic Information
        </h3>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-3">


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

<div class="form-group form-group-sm {{ $errors->has('mobile') ? ' has-error' : '' }}">
    <label for="mobile">Mobile:</label>
    <input 
    type="text"  
    class="form-control" 
    id="mobile"
    name="mobile"
    value="{{ old('mobile') ?: $user->mobile }}" 
    placeholder="Mobile" 
    />

    @if ($errors->has('mobile'))
    <span class="help-block">
        <strong>{{ $errors->first('mobile') }}</strong>
    </span>
    @endif
</div>


     
            </div>
            <div class="col-sm-3">


<div class="form-group form-group-sm {{ $errors->has('guardian_mobile') ? ' has-error' : '' }}">
    <label for="guardian_mobile">Guardian's Mobile:</label>
    <input 
    type="text"  
    class="form-control" 
    id="guardian_mobile"
    name="guardian_mobile"
    value="{{ old('guardian_mobile') ?: $user->guardian_mobile }}" 
    placeholder="guardian_mobile" 
    />

    @if ($errors->has('guardian_mobile'))
    <span class="help-block">
        <strong>{{ $errors->first('guardian_mobile') }}</strong>
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
                    @if ($user->gender != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('gender'))
            <span class="help-block">
                <strong>{{ $errors->first('gender') }}</strong>
            </span>
            @endif
        </div>


        <div class="form-group form-group-sm {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
    <label for="date_of_birth">Date of Birth:</label>

    <div class="w3-row">

            <div class="w3-col s4">
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

            <div class="w3-col s4">
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
            <div class="w3-col s4"><select class="form-control" id="year" name="year">

               @if($user->dob)
               <option value="{{date('Y', strtotime($user->dob))}}">{{date('Y', strtotime($user->dob))}}</option>
               @else
               <option value="">Year</option>
               @endif

               @for ($i = date('Y') -14; $i >= date('Y') - 60; $i--)
               <option>{{ $i }}</option>
               @endfor
           </select>
       </div>
       </div>

   
    </div>


            </div>
            <div class="col-sm-3">


                


                <div class="other-area">
<div class="form-group form-group-sm {{ $errors->has('profile_created_by') ? ' has-error' : '' }}">
    <label for="profile_created_by">Profile Created By</label>
    <select class="form-control form-group-sm select2 change-with-other" 
    id="profile_created_by" 
    name="profile_created_by" 
    data-placeholder="Select Option"
    /> 
    <option></option>
    <option selected>{{$user->profile_created_by}}</option>
    {{-- ID: 2     profile_created_by --}}
    @foreach ($userSettingFields[1]->values as $value)

    @if ($user->profile_created_by != $value->title)
    <option>{{ $value->title }}</option>
    @endif
    @endforeach
</select>
</div>
<input  
type="text" 
id="profile_created_by_other" 
class="form-control other-value-field" 
name="profile_created_by_other"        
value="{{$user->profile_created_by_other ?: ''}}"
placeholder="Profile Created by Other (Please Specify here)" 

@if ($user->profile_created_by == 'Other' || $user->profile_created_by == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif

/>
</div>


<div class="form-group form-group-sm {{ $errors->has('looking_for') ? ' has-error' : '' }}">
            <label for="looking_for">Looking For:</label>
            <select class="form-control form-group-sm select2" id="looking_for" name="looking_for">
                @if(old('looking_for'))
                <option selected>{{old('looking_for')}}</option>
                @else              
                <option selected>{{$user->looking_for}}</option>
                @endif
                {{-- id:6, title:looking for --}}
                @foreach ($userSettingFields[5]->values as $value)
                @if ($user->looking_for != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
            </select>

            @if ($errors->has('looking_for'))
            <span class="help-block">
                <strong>{{ $errors->first('looking_for') }}</strong>
            </span>
            @endif
        </div>


        <div class="form-group form-group-sm {{ $errors->has('religion') ? ' has-error' : '' }}">
            <label for="religion">Religion:</label>

            <select class="form-control form-group-sm select2" id="religion" name="religion" data-placeholder="Select Option">
                @if(old('religion'))
                <option selected>{{old('religion')}}</option>
                @else              
                <option selected>{{$user->religion}}</option>
                @endif
                {{-- id:4, title:religion --}}
                @foreach ($userSettingFields[3]->values as $value)
                    @if ($user->religion != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
            </select>

            @if ($errors->has('religion'))
            <span class="help-block">
                <strong>{{ $errors->first('religion') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group form-group-sm {{ $errors->has('social_order') ? ' has-error' : '' }}">
            <label for="social_order">Caste / Social Order:</label> 
            <input type="text" class="form-control" name="social_order" id="social_order" placeholder="Enter caste">
            {{-- <select class="form-control form-group-sm select2" data-placeholder="Select caste" id="social_order" name="social_order">
                <option value="">Select caste</option>
                @if(old('social_order'))
                
                <option selected>{{old('social_order')}}</option>
                @else              
                <option selected>{{$user->social_order}}</option>
                @endif
                id:29, title:social_order
                @foreach ($userSettingFields[28]->values as $value)
                    @if ($user->social_order != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
            </select> --}}

            @if ($errors->has('social_order'))
            <span class="help-block">
                <strong>{{ $errors->first('social_order') }}</strong>
            </span>
            @endif
        </div>



                


            </div>
            <div class="col-sm-3">
                

                <div class="form-group form-group-sm {{ $errors->has('package') ? ' has-error' : '' }}">
    <label for="package">Package:</label>

    <select class="form-control form-group-sm select2" id="package" name="package">
        <option value="">Free Package </option>
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


        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="active"
            {{$user->active ? 'checked' : ''}} 
            /> Active (Account Status)</label>
        </div>

        <div class="checkbox">
            <label>
                <input 
                type="checkbox"
                name="featured"
                {{$user->featured ? 'checked' : ''}} 
                /> Active (Featured)</label>
            </div>

        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="user_type"
            {{$user->isOffline() ? 'checked' : ''}} 
            /> Offline Profile</label>
        </div>

        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="basic_checked"
            {{$user->checked ? 'checked' : ''}} 
            /> Data Checked (Basic)</label>
        </div>
        
        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="basic_can_edit"
            {{$user->can_edit ? 'checked' : ''}} 
            /> Can Edit (Basic)</label>
        </div>

            </div>
        </div>
    </div>
</div>