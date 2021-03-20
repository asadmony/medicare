@extends('layouts.app')
@push('css')
<link href="{{ asset('css/loginStyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/loginIcons.css') }}" rel="stylesheet">
@endpush
@section('content')
<section class="w3l-form-36">
    <div class="form-36-mian section-gap">
        <div class="wrapper">
            <div class="form-inner-cont">
                @include('alerts.alerts')
                
                <h3>Login now</h3>
                <form action="{{ route('login') }}" method="post" class="signin-form">
                    @csrf
                    <div class="form-input">
                        <span class="fa fa-envelope-o" aria-hidden="true"></span> <input type="email" id="email"
                            @error('email') is-invalid @enderror name="email" placeholder="Username"
                            value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-input">
                        <span class="fa fa-key" aria-hidden="true"></span> <input type="password" id="password"
                            name="password" value="{{ old('password') }}" placeholder="Password" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login-remember d-grid">
                        <label class="check-remaind">
                            <input type="checkbox" {{ old('remember') ? 'checked' : '' }} name="remember" id="remember">
                            <span class="checkmark"></span>
                            <p class="remember">Remember me</p>
                        </label>
                        <button class="btn theme-button">Login</button>
                    </div>
                    <div class="new-signup">
                        <a href="#reload" class="signuplink">Forgot password?</a>
                    </div>
                </form>
                <p class="signup">Don’t have an account? <a href="{{route('welcome.registrationOption')}}" class="signuplink">Register</a></p>
            </div>
        </div>
    </div>
</section>
@endsection
