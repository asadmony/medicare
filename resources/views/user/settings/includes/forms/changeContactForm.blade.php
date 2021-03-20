<form method="post" class="form-user-setting" action="{{route('user.changeContact')}}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('new_contact') ? ' has-danger' : '' }}">
        <label for="new_contact">New Contact (Mobile) *</label>
        <input  
        type="text" 
        id="new_contact" 
        class="form-control w3-border w3-border-light-gray" 
        name="new_contact"
        value="{{ $u->mobile}}"        
        placeholder="8801800000000" 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_contact'))

        <span class="help-block">
            <strong>{{ $errors->first('new_contact') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('new_contact_confirmation') ? ' has-danger' : '' }}">
        <label for="new_contact_confirmation">Confirm New Contact *</label>
        <input  
        type="text" 
        id="new_contact_confirmation" 
        class="form-control w3-border w3-border-light-gray" 
        name="new_contact_confirmation"
        value="{{old('new_contact_confirmation')}}"        
        placeholder="Confirm new contact..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_contact_confirmation'))

        <span class="help-block">
            <strong>{{ $errors->first('new_contact_confirmation') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
        <label for="password">Current Password *</label>
        <input  
        type="password" 
        id="password" 
        class="form-control w3-border w3-border-light-gray" 
        name="password"    
        placeholder="Your current password" 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>

    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>