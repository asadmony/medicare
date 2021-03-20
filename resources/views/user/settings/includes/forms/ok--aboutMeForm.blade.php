<form method="post" action="{{ route('login') }}">
    {{csrf_field()}}

    <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
        <label for="exampleInput1" class="bmd-label-floating">Create a username *</label>
        <input type="text" value="{{old('username')}}" class="form-control w3-border w3-border-light-gray" placeholder="Username" id="username" name="username" style="border-radius: 4px;padding-left: 5px;">
        @if ($errors->has('username'))
        <span class="help-block">
            <strong>{{ $errors->first('username') }}</strong>
        </span>
        @else
        <span class="bmd-help">Username is required</span>
        @endif
    </div>

    <br>

    <div class="form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            {{ __('Remember Me') }}
        </label>
    </div>

    <br>

    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>