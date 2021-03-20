@extends('hasan.master')

@section('content')
  @include('hasan.subpage.banner-sm')
  <div class="container" style="margin-top: 30px;">
    <br />
    <div class="row">
      <div class="col-sm-12 padding-0 margin-0">
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $completed }}"
          aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
          {{ $completed }}% completed
        </div>
      </div>
    </div>
  </div>
  <br />

  <div class="row">
    <div class="col-sm-12 m-b-100">
      @isset($allowGoback)
        <a href="{{ $allowGoback }}" class="signupbutton padding-0-30 margin-bottom-15 btn btn-info pull-left">
          <span class="fa fa-caret-left"></span> Back
        </a>
      @endisset

      @isset($allowSkip)
        <a href="{{ $allowSkip }}" class="signupbutton padding-0-30 margin-bottom-15 btn btn-danger pull-right">
          Skip <span class="fa fa-caret-right"></span>
        </a>
      @endisset

      <h2 class="center-block m-t-0">
        @isset($title)
          {{ $title }}
        @else
          Title of the form
        @endisset
      </h4>
      <hr>


            <form class="padding-0-30 margin-bottom-20" method="POST" action="" aria-label="{{ __('Register') }}" role="form">
                @csrf

                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="profilemadeby" class="col-form-label">Profile Made by*
                        </label>
                        <div class="">
                            <select required='required' name="profilemadeby" id="profilemadeby" class="form-control">
                                <option>Select ...</option>
                                @foreach (profileMadeBy() as $key => $value)
                                <option {{ old('profilemadeby') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                    $value }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('profilemadeby'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('profilemadeby') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lookingfor" class="col-form-label">Looking for*
                        </label>
                        <div class="">
                            <select required='required' name="lookingfor" id="lookingfor" class="form-control">
                                <option>I am Looking for ...</option>
                                @foreach (lookingFor() as $key => $value)
                                <option {{ old('lookingfor') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                                    }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('lookingfor'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('lookingfor') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="fname" class=" col-form-label">First Name*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('fname') }}" id="fname" name="fname" placeholder="First Name"
                                class="form-control here" type="text">
                            @if ($errors->has('fname'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('fname') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="lname" class=" col-form-label">Last Name*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('lname') }}" id="lname" name="lname" placeholder="Last Name"
                                class="form-control here" type="text">
                            @if ($errors->has('lname'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-12">
                        <label for="dob" class=" col-form-label">Date of Birth*
                        </label>
                        <div class="">
                            <input required='required' value="{{ old('language') }}" id="fname" name="dob" placeholder="Date of Birth ..."
                                class="form-control here" type="date">
                            @if ($errors->has('dob'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('dob') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <hr>
                <div class="form-group row">

                    <div class="col-xs-6">
                        <button type="button" class="signupbutton btn btn-large btn-block btn-danger">Skip Now and
                            Continue</button>
                        <!--<button type="button" class="signupbutton btn btn-large btn-block btn-danger">Skip Now and Continue</button>-->
                    </div>
                    <div class="col-xs-6">
                        <a href="" class="signupbutton btn btn-large btn-block btn-success">Save and Continue</a>
                        <!--<button type="submit" class="signupbutton btn btn-large btn-block btn-success">Save and Continue</button>-->
                    </div>

                </div>


            </form>

        </div>
        <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
</div>

@endsection
