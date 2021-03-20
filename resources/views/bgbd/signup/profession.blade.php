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
      <div class="center- margin-bottom-20 padding-10-0">


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

      </div>
      <h2 class="center-block m-t-0">
        @isset($title)
          {{ $title }}
        @else
          Title of the form
        @endisset
      </h2>
      <hr>




      <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('signup.prefessionStore') }}"
      role="form">
      @csrf

      <div class="form-group row">
        <label for="profession" class="col-sm-3 col-form-label">Profession*
        </label>
        <div class="col-sm-9">
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select name="profession" id="profession" class="uk-input" required="required">
              <option value="">Select ...</option>
              @foreach (profileProfession() as $key=>$value)
                <option {{ old('profession') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}
                </option>
              @endforeach
            </select>
            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
              <span>
                Relativeship
              </span>
              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
            </button>
            @if ($errors->has('profession'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('profession') }}</strong>
              </span>
            @endif
            <span class="text-danger" role="alert">
              <strong id="err_profession"></strong>
            </span>
          </div>
        </div>
      </div>


      <div id="professiondetails" class="form-group row" style="display: none">
        <label for="profession_details" class="col-sm-3 col-form-label">Profession Details
        </label>

        <div class="col-sm-9">
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select data-oldval="{{ old('profession_details') ?? 0 }}" name="profession_details" id="profession_details"
            class="uk-input">
          </select>
          <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
            <span>
              Relativeship
            </span>
            <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
          </button>
          @if ($errors->has('profession_details'))
            <span class="text-danger" role="alert">
              <strong>{{ $errors->first('profession_details') }}</strong>
            </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group row extrainfo">
      <div class="col-sm-6">
        <label for="designation"  class="designation-level col-form-label">Designation</label>
        <div class="">
          <input value="{{ old('designation') }}" type="text" name="designation"
          id="designation" placeholder="Designation" class="uk-input">
          @if ($errors->has('designation'))
            <span class="text-danger" role="alert">
              <strong>{{ $errors->first('designation') }}</strong>
            </span>
          @endif
        </div>
      </div>
      <div class="col-sm-6">
        <label for="orgName" class=" col-form-label">Organization Name</label>
        <div class="">
          <input value="{{ Auth::user()->user_org_name }}" type="text" name="orgName" id="orgName"
          placeholder="Organization" class="uk-input">
          @if ($errors->has('orgName'))
            <span class="text-danger" role="alert">
              <strong>{{ $errors->first('orgName') }}</strong>
            </span>
          @endif
        </div>
      </div>
    </div>
    <div class="form-group other_details">
      <div class="">
        <label for="otherdetails" class="col-form-label">Other job Details</label>
        <div class="">
          <input value="{{ old('otherdetails') }}" type="text" name="otherdetails"
          id="otherdetails" placeholder="Provide Details" class="uk-input">
          @if ($errors->has('otherdetails'))
            <span class="text-danger" role="alert">
              <strong>{{ $errors->first('otherdetails') }}</strong>
            </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-3">
        <button type="submit" id="submit" class="uk-button uk-button-block create_acc">Save and
          Continue</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
</div>
</div>
@include('sections.javascripts.signup_profession')
@endsection
