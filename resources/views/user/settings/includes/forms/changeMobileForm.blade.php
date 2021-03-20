<form method="post" class="form-user-setting" action="{{route('user.changeMobile')}}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('new_mobile') ? ' has-danger' : '' }}">
        <label for="new_mobile" class="w3-text-black text-bold">New Mobile *</label>
        <input  
        type="text" 
        id="new_mobile" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
        name="new_mobile"
        value="{{ old('new_mobile') ?: $me->mobile}}"        
        placeholder="New Mobile Number..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_mobile'))

        <span class="help-block">
            <strong>{{ $errors->first('new_mobile') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('new_mobile_confirmation') ? ' has-danger' : '' }}">
        <label for="new_mobile_confirmation" class="w3-text-black text-bold">Confirm New Username *</label>
        <input  
        type="text" 
        id="new_mobile_confirmation" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
        name="new_mobile_confirmation"
        value="{{old('new_mobile_confirmation')}}"        
        placeholder="Confirm new username..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_mobile_confirmation'))

        <span class="help-block">
            <strong>{{ $errors->first('new_mobile_confirmation') }}</strong>
        </span>

        @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? ' has-danger' : '' }}">
        <label for="password" class="w3-text-black text-bold">Current Password *</label>
        <input  
        type="password" 
        id="password" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
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
        <button type="submit" class="btn btn-danger">Update</button>
    </div>

</form>