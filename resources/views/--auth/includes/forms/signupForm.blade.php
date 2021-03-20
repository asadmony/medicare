<form method="post" action="{{route('signupPost')}}">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-5 ml-auto">

            <div class="form-group {{ $errors->has('full_name') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Full Name *</label>
                <input type="text" value="{{old('full_name')}}" class="form-control" required id="full_name" name="full_name" autocomplete="off">
                @if ($errors->has('full_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('full_name') }}</strong>
                </span>
                @else
                <span class="bmd-help">Your full name is required</span>
                @endif
            </div>

            {{-- <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Create a username *</label>
                <input type="text" value="{{old('username')}}" class="form-control" id="username" name="username" autocomplete="off">
                @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @else
                <span class="bmd-help">Ex: salam124, skype23</span>
                @endif
            </div> --}}






            <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Enter Your Email *</label>
                <input type="email" value="{{old('email') ?: $email}}" class="form-control" required  id="email" name="email" autocomplete="off">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @else
                <span class="bmd-help">Email is required</span>
                @endif
            </div>





            {{-- <div class="form-group {{ $errors->has('email_confirmation') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Confirm your email *</label>
                <input type="email" value="{{old('email_confirmation')}}" class="form-control" id="email_confirmation" name="email_confirmation">
                @if ($errors->has('email_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('email_confirmation') }}</strong>
                </span>
                @else
                <span class="bmd-help">Email confirmation is required</span>
                @endif
            </div> --}}



            <div class="form-group {{ $errors->has('your_mobile') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Your Mobile *</label>
                <input type="text" value="{{old('your_mobile')}}" class="form-control" required  id="your_mobile" name="your_mobile" autocomplete="off">
                @if ($errors->has('your_mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('your_mobile') }}</strong>
                </span>
                @else
                <span class="bmd-help">Bangladeshi Mobile Numbers Only</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('guardian_mobile') ? ' has-danger' : '' }}">
                <label for="exampleInput1" class="bmd-label-floating">Guardian's Mobile *</label>
                <input type="text" value="{{old('guardian_mobile')}}" class="form-control" id="guardian_mobile" required  name="guardian_mobile" autocomplete="off">
                @if ($errors->has('guardian_mobile'))
                <span class="help-block">
                    <strong>{{ $errors->first('guardian_mobile') }}</strong>
                </span>
                @else
                <span class="bmd-help">Bangladeshi Mobile Numbers Only</span>
                @endif
            </div>



 
    <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
    
    <select class="form-control change-with-other" id="country" name="country" required  autocomplete="off">
    <option value="">Select Country *</option>
    @if (old('country'))
        <option selected value="{{ old('country') }}">{{ old('country') }}</option>
    @endif
    
    @foreach ($userSettingFields[2]->values as $value)
      <option>{{ $value->title }}</option>
    @endforeach
  </select>
    @if ($errors->has('country'))
    <span class="help-block">
        <strong>{{ $errors->first('country') }}</strong>
    </span>
    @else
    @endif
</div>

 

<div class="form-group {{ $errors->has('district') ? ' has-danger' : '' }}">
                
                <select class="form-control" required  id="district" name="district">
                <option value="">Select District *</option>
                @if(old('district'))
                <option selected>{{old('district')}}</option>
                @endif

                @foreach($districts as $district)
                <option>{{ $district->name }}</option>
                @endforeach
                
        

              </select>
                @if ($errors->has('district'))
                <span class="help-block">
                    <strong>{{ $errors->first('district') }}</strong>
                </span>
                @else
                @endif
            </div>


<div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }}">
                
                <select class="form-control" required  id="gender" name="gender">
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





<div class="form-group {{ $errors->has('profession') ? ' has-danger' : '' }}">
                
                <select class="form-control" required  id="profession" required name="profession">
                <option value="">Select Profession *</option>
                @if(old('profession'))
                <option  selected>{{old('profession')}}</option>
                
                @endif
                {{-- id:1, title:profession --}}
                @foreach ($userSettingFields[26]->values as $value)
                @if($value->title == 'Other')
                @elseif($value->title == 'Others')
                @else
                  <option>{{ $value->title }}</option>
                @endif
                @endforeach
              </select>
                @if ($errors->has('profession'))
                <span class="help-block">
                    <strong>{{ $errors->first('profession') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>



            <div class="form-group {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                
                <select class="form-control" id="marital_status" required name="marital_status">
                <option value="">Select Marital Status *</option>
                @if(old('marital_status'))
                <option  selected>{{old('marital_status')}}</option>
                
                @endif
                {{-- id:11, title:marital_status --}}
                @foreach ($userSettingFields[10]->values as $value)
                @if($value->title == 'Other')
                @elseif($value->title == 'Others')
                @else
                  <option>{{ $value->title }}</option>
                @endif
                @endforeach
              </select>
                @if ($errors->has('marital_status'))
                <span class="help-block">
                    <strong>{{ $errors->first('marital_status') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">Country is required</span> --}}
                @endif
            </div>





        </div>
        <div class="col-md-5 ml-auto">

<br>


            



            


            


             
                
                <div class="row">
                    <div class="col-sm-3"><div class="form-group">
                                        <label class="label-control">Your Date of Birth * </label>


      
                                    </div></div>
                    <div class="col-sm-3"><select required  class="form-control {{ $errors->has('day') ? 'w3-text-red' : '' }} "  id="day" name="day">
                @if(old('day'))
                <option selected>{{old('day')}}</option>
                @endif
                <option value="">Day</option>
                @for ($i = 1; $i <= 31; $i++)
                    <option>{{ $i }}</option>
                @endfor
                
              </select></div>
                    <div class="col-sm-3">
                        <select required  class="form-control {{ $errors->has('month') ? 'w3-text-red' : '' }} " id="month" name="month" style="width: 90px;">
                @if(old('month'))
                <option selected >{{old('month')}}</option>
                @endif
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
                    <div class="col-sm-3"><select required  class="form-control  {{ $errors->has('year') ? 'w3-text-red' : '' }} " id="year" name="year">
                <option value="">Year</option>

                @if(old('year'))
                <option selected>{{old('year')}}</option>
                @endif
                @for ($i = date('Y') -17; $i >= date('Y') - 60; $i--)
                    <option>{{ $i }}</option>
                @endfor

              </select></div>
                </div>

<br>



<div class="other-area">
    <div class="form-group {{ $errors->has('createdby') ? ' has-danger' : '' }}">
    
    <select class="form-control change-with-other" id="createdby" name="createdby" required  autocomplete="off">
    <option value="">Profile Created By *</option>
    @if (old('createdby'))
        <option selected value="{{ old('createdby') }}">{{ old('createdby') }}</option>
    @endif
    
    
    {{-- id:2, title:Profile Created By --}}
    @foreach ($userSettingFields[1]->values as $value)
      <option>{{ $value->title }}</option>
    @endforeach
  </select>
    @if ($errors->has('createdby'))
    <span class="help-block">
        <strong>{{ $errors->first('createdby') }}</strong>
    </span>
    @else
    {{-- <span class="help-block">Profile Created By</span> --}}
    @endif
</div>
<input  
type="text" 
id="createdby_other" 
class="form-control other-value-field" 
name="createdby_other"        
value="{{old('createdby_other')}}"
placeholder="Profile Created By (Please Specify here)" 
@if ((old('createdby') == 'Other') || (old('createdby') == 'Others'))
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
@endif
 
/>
</div>


        {{-- </div>
        <div class="col-md-5 ml-auto"> --}}

 

<div class="form-group {{ $errors->has('religion') ? ' has-danger' : '' }}">
                
        <select class="form-control" required  id="religion" name="religion">
        <option value="">Religion/Community *</option>

        @if (old('religion'))
        <option selected value="{{ old('religion') }}">{{ old('religion') }}</option>
        @endif
        
        {{-- ID:4, title:Religion/Community? --}}
        @foreach ($userSettingFields[3]->values as $value)
          <option>{{ $value->title }}</option>
        @endforeach

      </select>
        @if ($errors->has('religion'))
        <span class="help-block">
            <strong>{{ $errors->first('religion') }}</strong>
        </span>
        @else

        @endif
    </div>




<div class="form-group {{ $errors->has('social_order') ? ' has-danger' : '' }}">
                
        <select class="form-control" id="social_order" required  name="social_order">
        <option value="">Social Order/Caste *</option>

        @if (old('social_order'))
        <option selected value="{{ old('social_order') }}">{{ old('social_order') }}</option>
        @endif
        
        {{-- ID:29, title:Social Order/Caste --}}
        @foreach ($userSettingFields[28]->values as $value)
          <option>{{ $value->title }}</option>
        @endforeach

      </select>
        @if ($errors->has('social_order'))
        <span class="help-block">
            <strong>{{ $errors->first('social_order') }}</strong>
        </span>
        @else

        @endif
    </div>


<div class="form-group {{ $errors->has('looking_for') ? ' has-danger' : '' }}">
                
        <select class="form-control" id="looking_for" name="looking_for">
        <option value="">Looking For *</option>

        @if (old('looking_for'))
        <option selected value="{{ old('looking_for') }}">{{ old('looking_for') }}</option>
        @endif
        
        {{-- ID:6, title:Looking For --}}
        @foreach ($userSettingFields[5]->values as $value)
          <option>{{ $value->title }}</option>
        @endforeach

      </select>
        @if ($errors->has('looking_for'))
        <span class="help-block">
            <strong>{{ $errors->first('looking_for') }}</strong>
        </span>
        @else

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
                    <a target="_blank" href="{{ route('page','terms-and-condition') }}" style="color:#D52379">terms and conditions</a>.
                </label>
            </div>

            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" disabled checked >
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    <a href="tel:+8801972006695" style="color:#D52379">Call: 01972006695 (Helpline)</a>
                </label>
            </div>
<br>

            <div class="">
                <button type="submit" class="btn btn-primary" style="background-color:#D52379">Submit</button>
            </div>
              <div class="">
                <a href="{{url('https://www.taslimamarriagemedia.com/login')}}" style="color:#D52379"> Already have an account? Sign in </a>
            </div>
        </div>
    </div>
</form>