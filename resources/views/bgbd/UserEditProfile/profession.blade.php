@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
  <div class="profileSection">
    <div class="container" style="background: #FFF; margin-top: 30px;">
      <div class="row">
        <div class="col-sm-12 m-b-100">
          <div class="profileContent">
            <div class="container-fluid">
              <div class="titleHeader">
                <br />
                <h4>
                  {{ $editTitle }}
                </h4>
                <hr />
                <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ $formAction }}"
                role="form">
                @csrf

                <div class="form-group row">
                  <label for="profession" class="col-sm-3 col-form-label">Profession*
                  </label>
                  <div class="col-sm-9">
                    @php
                    if(Auth::user()->gender == 1){
                    $profileProfession = professionTypeMale();
                  }
                  else{
                    $profileProfession = professionTypeFemale();
                  }
                  @endphp
                  <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                  <select name="profession" id="profession" class="uk-input" required="required">
                    <option value="">Select ...</option>
                    @foreach ($profileProfession as $key=>$value)

                      <option {{ Auth::user()->user_profession_type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}
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


              @if (
                Auth::user()->user_profession_type == 3 ||
                Auth::user()->user_profession_type == 4 ||
                Auth::user()->user_profession_type == 7 ||
                Auth::user()->user_profession_type == 8 ||
                Auth::user()->user_profession_type == 11 ||
                Auth::user()->user_profession_type == 12 ||
                Auth::user()->user_profession_type == 13 ||
                Auth::user()->user_profession_type == 14 ||
                Auth::user()->user_profession_type == 15
                )
                @php
                $display = 'style="display: none"';
                @endphp
              @else
                @php
                $display = '';
                @endphp
              @endif

              @php
              if(Auth::user()->user_profession_type == 14 ||
              Auth::user()->user_profession_type == 15){
                $job_designation = '';
              }
              else{
                $job_designation = 'style="display: none"';
              }
              @endphp

              <div id="professiondetails" class="form-group row" {!! $display !!}>
                <label for="profession_details" class="col-sm-3 col-form-label">
                  Profession Details
                </label>

                <div class="col-sm-9">
                  @php
                  if(Auth::user()->user_profession_type == 1){
                    $profession_details = professionTypeBCS();
                  }
                  else if(Auth::user()->user_profession_type == 2){
                    $profession_details = professionTypeGovGrade();
                  }
                  else if(Auth::user()->user_profession_type == 5){
                    $profession_details = professionTypeBank();
                  }
                  else if(Auth::user()->user_profession_type == 6){
                    $profession_details = professionTypeTeacher();
                  }
                  else if(Auth::user()->user_profession_type == 9){
                    $profession_details = professionTypeDefense();
                  }
                  else if(Auth::user()->user_profession_type == 10){
                    $profession_details = professionTypeLawyer();
                  }
                  @endphp
                  <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                  <select name="profession_details" id="profession_details" class="uk-input">
                    @isset($profession_details)
                      @foreach ($profession_details as $profession_key => $profession_value)
                        @if (Auth::user()->user_profession_details == $profession_key)
                          <option selected value="{{ $profession_key }}">{{ $profession_value }}</option>
                        @else
                          <option value="{{ $profession_key }}">{{ $profession_value }}</option>
                        @endif
                      @endforeach
                    @endisset
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

              <div class="form-group row extrainfo" {!! $job_designation !!}>
                <div class="col-sm-6">
                  <label for="designation" class="designation-level col-form-label">
                    {{ (Auth::user()->user_profession_type == 8)?"Business Type":"Designation" }}
                  </label>
                  <div class="">
                    <input value="{{ Auth::user()->user_designation }}" type="text" name="designation"
                    id="designation"  class="uk-input">
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
              <div class="form-group row other_details" {!! $job_designation !!}>
                <label for="otherdetails">Details</label>
                <input value="{{ Auth::user()->user_other_profession_details }}" type="text" name="otherdetails" id="otherdetails"  class="uk-input">
                @if ($errors->has('otherdetails'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('otherdetails') }}</strong>
                  </span>
                @endif

              </div>


              <div class="form-group row">
                <div class="col-sm-3">
                  <button type="submit" id="submit" class="uk-button uk-button-block create_acc">
                    Update
                  </button>
                </div>                  
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
@include('sections.javascripts.signup_profession')
@endsection
