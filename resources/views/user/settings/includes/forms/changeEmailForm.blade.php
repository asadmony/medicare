<form method="post" class="form-user-setting" action="{{route('user.changeEmail')}}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('new_email') ? ' has-danger' : '' }}">
        <label for="new_email" class="w3-text-black text-bold">New Email *</label>
        <input  
        type="email" 
        id="new_email" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
        name="new_email"
        value="{{ $me->email}}"        
        placeholder="New email..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_email'))

        <span class="help-block">
            <strong>{{ $errors->first('new_email') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('new_email_confirmation') ? ' has-danger' : '' }}">
        <label for="new_email_confirmation" class="w3-text-black text-bold">Confirm New Email *</label>
        <input  
        type="email" 
        id="new_email_confirmation" 
        class=" w3-border w-100 w3-round w3-small px-2" 
                        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
        name="new_email_confirmation"
        value="{{old('new_email_confirmation')}}"        
        placeholder="Confirm new email..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_email_confirmation'))

        <span class="help-block">
            <strong>{{ $errors->first('new_email_confirmation') }}</strong>
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