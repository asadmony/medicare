<form method="post" action="{{route('signupPost')}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-5 ml-auto">

          {{--   <div class="form-group {{ $errors->has('full_name') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Full Name *</label>
                <input type="text" value="{{old('full_name')}}" class="form-control" id="full_name" name="full_name">
                @if ($errors->has('full_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('full_name') }}</strong>
                </span>
                @else
                <span class="bmd-help">Your full name is required</span>
                @endif
            </div> --}}

            {{-- <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Create a username *</label>
                <input type="text" value="{{old('username')}}" class="form-control" id="username" name="username">
                @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @else
                <span class="bmd-help">Username is required</span>
                @endif
            </div> --}}



            <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Enter Your Email *</label>
                <input type="email" value="{{old('email') ?: $email}}" class="form-control" id="email" name="email">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @else
                <span class="bmd-help">Email is required</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('email_confirmation') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Confirm your email *</label>
                <input type="email" value="{{old('email_confirmation')}}" class="form-control" id="email_confirmation" name="email_confirmation">
                @if ($errors->has('email_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('email_confirmation') }}</strong>
                </span>
                @else
                <span class="bmd-help">Email confirmation is required</span>
                @endif
            </div>


            <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">New Password *</label>
                <input type="password" value="{{old('password')}}" class="form-control" id="password" name="password">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @else
                <span class="bmd-help">Password is required</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">New Password Again *</label>
                <input type="password" value="{{old('password_confirmation')}}" class="form-control" id="password_confirmation" name="password_confirmation">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @else
                <span class="bmd-help">Confirm your password</span>
                @endif
            </div>

            




<div class="form-group {{ $errors->has('location') ? ' has-danger' : '' }}">
                
                <select class="form-control" id="location" name="location">
                <option value="">Select District *</option>
                
                @if(old('location'))
                <option selected>{{old('location')}}</option>
                @elseif($location)                
                <option selected>{{$location}}</option>
                @endif
                {{-- id:1, title:Location --}}
                @foreach ($userSettingFields[1]->values as $value)
                  <option>{{ $value->title }}</option>
                @endforeach
              </select>
                @if ($errors->has('location'))
                <span class="help-block">
                    <strong>{{ $errors->first('location') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>

            



        </div>
        <div class="col-md-5 ml-auto">

<br>


            
<div class="other-area">
            <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
                
                <select class="form-control change-with-other" id="country" name="country">
                <option value="">Select Country *</option>
                @if (old('country'))
                    <option selected value="{{ old('country') }}">{{ old('country') }}</option>
                @endif
                
                {{-- id:3, title:country --}}
                @foreach ($userSettingFields[2]->values as $value)
                  <option>{{ $value->title }}</option>
                @endforeach
              </select>
                @if ($errors->has('country'))
                <span class="help-block">
                    <strong>{{ $errors->first('country') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>
<input  
type="text" 
id="country_other" 
class="form-control other-value-field" 
name="country_other"        
value="{{old('country_other')}}"
placeholder="Country Other (Please Specify here)" 
@if ((old('country') == 'Other') || (old('country') == 'Others'))
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif
 
/>
</div>


            <div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }}">
                
                <select class="form-control" id="gender" name="gender">
                <option value="">Select Gender *</option>
                @if(old('gender'))
                <option selected>{{old('gender')}}</option>
                @elseif($gender)                
                <option selected>{{$gender}}</option>
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
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>


            

<br>
             
                
                <div class="row">
                    <div class="col-sm-3"><div class="form-group">
                                        <label class="label-control">Your Date of Birth</label>


      
                                    </div></div>
                    <div class="col-sm-3"><select class="form-control" id="day" name="day">
                <option value="">Day</option>
                @for ($i = 1; $i <= 31; $i++)
                    <option>{{ $i }}</option>
                @endfor
                
              </select></div>
                    <div class="col-sm-3">
                        <select class="form-control" id="month" name="month" style="width: 90px;">
                <option value="">Month</option>
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
              </select></div>
                    <div class="col-sm-3"><select class="form-control" id="year" name="year">
                <option value="">Year</option>
                @for ($i = date('Y') -17; $i >= date('Y') - 60; $i--)
                    <option>{{ $i }}</option>
                @endfor

              </select></div>
                </div>

<br>

                <div class="form-group {{ $errors->has('reason') ? ' has-danger' : '' }}">
                
                <select class="form-control" id="reason" name="reason">
                <option value="">Reason for Registering *</option>

                {{-- id:4, title:Reason for Registering --}}
                @foreach ($userSettingFields[3]->values as $value)
                  <option>{{ $value->title }}</option>
                @endforeach
  
              </select>
                @if ($errors->has('reason'))
                <span class="help-block">
                    <strong>{{ $errors->first('reason') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>


            <div class="form-group {{ $errors->has('about_us') ? ' has-danger' : '' }}">
                
                <select class="form-control" id="about_us" name="about_us">
                <option value="">Where do you hear about us? *</option>
                
                {{-- ID:5, title:Where do you hear about us? --}}
                @foreach ($userSettingFields[4]->values as $value)
                  <option>{{ $value->title }}</option>
                @endforeach

              </select>
                @if ($errors->has('about_us'))
                <span class="help-block">
                    <strong>{{ $errors->first('about_us') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>
                 


            

            <br>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" disabled checked >
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    I agree to the
                    <a target="_blank" href="{{ route('page','terms_and_condition') }}">terms and conditions</a>.
                </label>
            </div>
<br>

            <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </div>
    </div>
</form>