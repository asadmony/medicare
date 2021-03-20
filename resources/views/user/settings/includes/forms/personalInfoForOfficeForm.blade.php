<form method="post" class="form-user-setting" action="{{route('user.settingPersonalInfoForOfficePost')}}">
    {{csrf_field()}}


    <div class="form-group {{ $errors->has('first_name') ? ' has-danger' : '' }}">
        <label for="first_name">First Name *</label>
        <input  
        type="text" 
        id="first_name" 
        class="form-control w3-border w3-border-light-gray" 
        name="first_name"
        value="{{$u->infoForOffice ? $u->infoForOffice->first_name : ''}}"        
        placeholder="Your first name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('first_name'))

        <span class="help-block">
            <strong>{{ $errors->first('first_name') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group {{ $errors->has('last_name') ? ' has-danger' : '' }}">
        <label for="last_name">Last Name *</label>
        <input  
        type="text" 
        id="last_name" 
        class="form-control w3-border w3-border-light-gray" 
        name="last_name"
        value="{{$u->infoForOffice ? $u->infoForOffice->last_name : ''}}"        
        placeholder="Your last name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('last_name'))

        <span class="help-block">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
        
        @endif
    </div>


    <div class="form-group {{ $errors->has('present_address') ? ' has-danger' : '' }}">
        <label for="present_address">Your Present Address *</label>
        <textarea 
        class="form-control w3-border w3-border-light-gray" 
        name="present_address" 
        id="present_address" 
        cols="30" 
        rows="3" 
        placeholder="Your present address..." 
        style="border-radius: 4px;padding-left: 8px;">{{$u->infoForOffice ? $u->infoForOffice->present_address : ''}}</textarea>
        @if($errors->has('present_address'))

        <span class="help-block">
            <strong>{{ $errors->first('present_address') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group {{ $errors->has('permanent_address') ? ' has-danger' : '' }}">
        <label for="permanent_address">Your Permanent Address *</label>
        <textarea 
        class="form-control w3-border w3-border-light-gray" 
        name="permanent_address" 
        id="permanent_address" 
        cols="30" 
        rows="3" 
        placeholder="Your permanent address..." 
        style="border-radius: 4px;padding-left: 8px;">{{$u->infoForOffice ? $u->infoForOffice->permanent_address : ''}}</textarea>
        @if($errors->has('permanent_address'))

        <span class="help-block">
            <strong>{{ $errors->first('permanent_address') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group {{ $errors->has('office_address') ? ' has-danger' : '' }}">
        <label for="office_address">Your Office Address </label>
        <textarea 
        class="form-control w3-border w3-border-light-gray" 
        name="office_address" 
        id="office_address" 
        cols="30" 
        rows="3" 
        placeholder="Your office address..." 
        style="border-radius: 4px;padding-left: 8px;">{{$u->infoForOffice ? $u->infoForOffice->office_address : ''}}</textarea>
        @if($errors->has('office_address'))

        <span class="help-block">
            <strong>{{ $errors->first('office_address') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group {{ $errors->has('father_name') ? ' has-danger' : '' }}">
        <label for="father_name">Your Father's Name *</label>
        <input  
        type="text" 
        id="father_name" 
        class="form-control w3-border w3-border-light-gray" 
        name="father_name"
        value="{{$u->infoForOffice ? $u->infoForOffice->father_name : ''}}"        
        placeholder="Your father's name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('father_name'))

        <span class="help-block">
            <strong>{{ $errors->first('father_name') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group {{ $errors->has('father_contact') ? ' has-danger' : '' }}">
        <label for="father_contact">Your Father's Contact *</label>
        <textarea 
        class="form-control w3-border w3-border-light-gray" 
        name="father_contact" 
        id="father_contact" 
        cols="30" 
        rows="3" 
        placeholder="Your father's contact..." 
        style="border-radius: 4px;padding-left: 8px;">{{$u->infoForOffice ? $u->infoForOffice->father_contact : ''}}</textarea>
        @if($errors->has('father_contact'))

        <span class="help-block">
            <strong>{{ $errors->first('father_contact') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group {{ $errors->has('mother_name') ? ' has-danger' : '' }}">
        <label for="mother_name">Your Mother's Name *</label>
        <input  
        type="text" 
        id="mother_name" 
        class="form-control w3-border w3-border-light-gray" 
        name="mother_name"
        value="{{$u->infoForOffice ? $u->infoForOffice->mother_name : ''}}"        
        placeholder="Your mother's name..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('mother_name'))

        <span class="help-block">
            <strong>{{ $errors->first('mother_name') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group {{ $errors->has('mother_contact') ? ' has-danger' : '' }}">
        <label for="mother_contact">Your Mother's Contact *</label>
        <textarea 
        class="form-control w3-border w3-border-light-gray" 
        name="mother_contact" 
        id="mother_contact" 
        cols="30" 
        rows="3" 
        placeholder="Your mother's contact..." 
        style="border-radius: 4px;padding-left: 8px;">{{$u->infoForOffice ? $u->infoForOffice->mother_contact : ''}}</textarea>
        @if($errors->has('mother_contact'))

        <span class="help-block">
            <strong>{{ $errors->first('mother_contact') }}</strong>
        </span>

        @endif
    </div>



    <div class="form-group {{ $errors->has('mobile') ? ' has-danger' : '' }}">
        <label for="mobile">Your Mobile Number *</label>
        <input  
        type="text" 
        id="mobile" 
        class="form-control w3-border w3-border-light-gray" 
        name="mobile"
        value="{{$u->infoForOffice ? $u->infoForOffice->mobile : ''}}"        
        placeholder="Your mobile number..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('mobile'))

        <span class="help-block">
            <strong>{{ $errors->first('mobile') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
        <label for="phone">Your Telephone Number </label>
        <input  
        type="text" 
        id="phone" 
        class="form-control w3-border w3-border-light-gray" 
        name="phone"
        value="{{$u->infoForOffice ? $u->infoForOffice->phone : ''}}"        
        placeholder="Your telephone number..." 
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
            <div class="form-group">
                <label class="label-control">Your Date of Birth</label>
            </div>
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="day" name="day">

                @if($u->infoForOffice)
                <option value="{{date('d', strtotime($u->infoForOffice->dob))}}">{{date('d', strtotime($u->infoForOffice->dob))}}</option>
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

                @if($u->infoForOffice)
                <option value="{{date('m', strtotime($u->infoForOffice->dob))}}">{{date('M', strtotime($u->infoForOffice->dob))}}</option>
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

             @if($u->infoForOffice)
                <option value="{{date('Y', strtotime($u->infoForOffice->dob))}}">{{date('Y', strtotime($u->infoForOffice->dob))}}</option>
                @else
                <option value="">Year</option>
                @endif
            
            @for ($i = date('Y') -17; $i >= date('Y') - 60; $i--)
                    <option>{{ $i }}</option>
                @endfor
        </select></div>
    </div>

    <br>

    <div class="form-group {{ $errors->has('nid_number') ? ' has-danger' : '' }}">
        <label for="nid_number">Your National ID *</label>
        <input  
        type="text" 
        id="nid_number" 
        class="form-control w3-border w3-border-light-gray" 
        name="nid_number"
        value="{{$u->infoForOffice ? $u->infoForOffice->nid_number : ''}}"        
        placeholder="Your national ID..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('nid_number'))

        <span class="help-block">
            <strong>{{ $errors->first('nid_number') }}</strong>
        </span>
        
        @endif
    </div>

        <div class="form-group {{ $errors->has('passport_number') ? ' has-danger' : '' }}">
        <label for="passport_number">Your Passport Number *</label>
        <input  
        type="text" 
        id="passport_number" 
        class="form-control w3-border w3-border-light-gray" 
        name="passport_number"
        value="{{$u->infoForOffice ? $u->infoForOffice->passport_number : ''}}"        
        placeholder="Your passport number..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('passport_number'))

        <span class="help-block">
            <strong>{{ $errors->first('passport_number') }}</strong>
        </span>
        
        @endif
    </div>



 
         <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="declare" checked required>
                    <span class="form-check-sign">
                        <span class="check"></span>
                    </span>
                    I declare all the information given here is true.
                </label>
            </div>
                 


    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>