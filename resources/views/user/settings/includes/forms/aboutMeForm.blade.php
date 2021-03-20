<form method="post" class="form-user-setting" action="{{route('user.settingAboutMePost')}}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('headline') ? ' has-danger' : '' }}">
        <label for="headline">Headline *</label>
        <input  
        type="text" 
        id="headline" 
        class="form-control w3-border w3-border-light-gray" 
        name="headline"
        value="{{$u->about ? $u->about->headline : ''}}"        
        placeholder="Write a headline or greetings" 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('headline'))

        <span class="help-block">
            <strong>{{ $errors->first('headline') }}</strong>
        </span>

        @endif
    </div>


    <div class="form-group {{ $errors->has('about_me') ? ' has-danger' : '' }}">
        <label for="about_me">About Me *</label>
        <input  
        type="text" 
        id="about_me" 
        class="form-control w3-border w3-border-light-gray" 
        name="about_me"
        value="{{$u->about ? $u->about->about_me : ''}}"        
        placeholder="Write little bit about me..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('about_me'))

        <span class="help-block">
            <strong>{{ $errors->first('about_me') }}</strong>
        </span>
        
        @endif
    </div>

    <div class="form-group {{ $errors->has('looking_for') ? ' has-danger' : '' }}">
        <label for="looking_for">Looking For *</label>
        <input  
        type="text" 
        id="looking_for" 
        class="form-control w3-border w3-border-light-gray" 
        name="looking_for"
        value="{{$u->looking_for}}"        
        placeholder="Write about what are you looking for..." 
        style="border-radius: 4px;padding-left: 8px;" 
        />
        @if($errors->has('looking_for'))

        <span class="help-block">
            <strong>{{ $errors->first('looking_for') }}</strong>
        </span>
        
        @endif
    </div>




    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">{{$u->about ? 'Submit' : 'Next'}}</button>
    </div>

</form>