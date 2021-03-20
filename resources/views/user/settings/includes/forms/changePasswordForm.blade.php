<form method="post" class="form-user-setting" action="{{route('user.changePassword')}}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('current_password') ? ' has-danger' : '' }}">
        <label for="current_password" class="w3-text-black text-bold">Current Password *</label>
        <input  
        type="password" 
        id="current_password" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
        name="current_password"        
        placeholder="Current password..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('current_password'))

        <span class="help-block">
            <strong>{{ $errors->first('current_password') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('new_password') ? ' has-danger' : '' }}">
        <label for="new_password" class="w3-text-black text-bold">New Password *</label>
        <input  
        type="password" 
        id="new_password" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
        name="new_password"      
        placeholder="New password..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_password'))

        <span class="help-block">
            <strong>{{ $errors->first('new_password') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('new_password_confirmation') ? ' has-danger' : '' }}">
        <label for="new_password_confirmation" class="w3-text-black text-bold">Confirm New Password *</label>
        <input  
        type="password" 
        id="new_password_confirmation" 
        class=" w3-border w-100 w3-round w3-small px-2" 
        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
        name="new_password_confirmation"      
        placeholder="Confirm new password..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('new_password_confirmation'))
        <span class="help-block">
            <strong>{{ $errors->first('new_password_confirmation') }}</strong>
        </span>
        @endif
    </div>



    <br>

    <div class="">
        <button type="submit" class="btn btn-danger">Update</button>
    </div>

</form>