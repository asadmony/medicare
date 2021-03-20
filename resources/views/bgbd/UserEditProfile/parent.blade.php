@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')

<div class="container" style="background: #FFF; margin-top: 30px; margin-bottom: 150px">
  <br />
  <form method="POST" action="{{ route('users.profile.parent.update') }}" role="form">
    <div class="row">
      @csrf
      <div class="col-sm-6">
        <h4 class="bold-text">Father's Information</h4>
        <hr>
        <div class="form-group">
          <div class="col-xs-12">
            <label for="flstatus" class=" col-form-label">Father's Living Status*
            </label>
            <div class="">
              <input required="required" {{ Auth::user()->father_living_status == 1 ? 'checked':'' }} type="radio"
                name="flstatus" id="flstatus1" value="1" class="fatherLiveStatusRadio flstat1" />
              Alive
              <input required="required" {{ Auth::user()->father_living_status == 2 ? 'checked':'' }} type="radio"
                name="flstatus" id="flstatus" value="2" class="fatherLiveStatusRadio flstat1" />
              Passed Away
              @if ($errors->has('flstatus'))
              <br>
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('flstatus') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_flstatus"></strong>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="fsrvstatus" class=" col-form-label">Father's Service Status*
            </label>
            <div class="">
              <input required="required" {{ Auth::user()->father_service_status == 1 ?'checked' : '' }} type="radio"
                id="fsrvstatus1" class="fsrvstatus serv" name="fsrvstatus" value="1" /> In Service
              <input required="required" {{ Auth::user()->father_service_status == 2 ?'checked' : '' }} type="radio"
                id="fsrvstatus2" class="fsrvstatus serv" name="fsrvstatus" value="2" /> Retired
              <input required="required" {{ Auth::user()->father_service_status == 3 ?'checked' : '' }} type="radio"
                class="fsrvstatus serv" name="fsrvstatus" value="3" /> Others
              @if ($errors->has('fsrvstatus'))
              <br>
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('fsrvstatus') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_fsrvstatus"></strong>
              </span>
            </div>
          </div>
        </div>
        <!---liveStausLinkToServiceDivId--->
        <div class="form-group">
          <div class="col-xs-12">
            <label for="fprofession" class=" col-form-label">Father's Profession*
            </label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
              <select name="fprofession" id="fprofession" class="uk-input">
                <option value="">Select ...</option>
                @foreach (professionTypeMaleParent() as $key=>$item)
                <option {{ Auth::user()->father_profession == $key ?'selected':'' }} value="
                      {{ $key }}">{{
                        $item }}</option>
                @endforeach
              </select>
              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                <span>
                  Relativeship
                </span>
                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
              </button>
              @if ($errors->has('fprofession'))
              <br>
              <span class="
                      text-danger" role="alert">
                <strong>{{ $errors->first('fprofession') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_fprofession"></strong>
              </span>
            </div>
          </div>
        </div>

        @if (
        Auth::user()->father_profession == 14 ||
        Auth::user()->father_profession == 16
        )
        @php
        $fdisplay = 'style="display: none;"';
        @endphp
        @else
        @php
        $fdisplay = '';
        @endphp
        @endif

        <div class="form-group fdetails" {!! $fdisplay !!}>
          <div class="col-xs-12">
            <label for="fdesignation" class=" col-form-label">Profession Details</label>
            <div class="">
              <input value="{{ Auth::user()->father_profession_details }}" name="father_profession_details"
                placeholder="Profession Details" class="uk-input here" type="text">
            </div>
          </div>
        </div>

      </div>
      <div class="col-sm-6">
        <h4 class="bold-text">
          Mother's Information
        </h4>
        <hr>
        <div class="form-group">
          <div class="col-xs-12">
            <label for="mlstatus" class=" col-form-label">Mother's Living Status*
            </label>
            <div class="">
              <input required="required" {{ Auth::user()->mother_living_status == 1 ? 'checked':'' }} type="radio"
                name="mlstatus" id="mlstatus1" value="1" class="motherLiveStatusRadio mls" />
              Alive
              <input required="required" {{ Auth::user()->mother_living_status == 2 ? 'checked':'' }} type="radio"
                name="mlstatus" id="mlstatus" value="2" class="motherLiveStatusRadio mls" />
              Passed Away
              @if ($errors->has('mlstatus'))
              <br>
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('mlstatus') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_mlstatus"></strong>
              </span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="msrvstatus" class=" col-form-label">Mother's Service Status*
            </label>
            <div class="">
              <input required="required" {{ Auth::user()->mother_service_status == 1 ?'checked' : '' }} type="radio"
                id="msrvstatus1" class="msrvstatus mss" name="msrvstatus" value="1" /> In Service
              <input required="required" {{ Auth::user()->mother_service_status == 2 ?'checked' : '' }} type="radio"
                id="msrvstatus2" class="msrvstatus mss" name="msrvstatus" value="2" /> Retired
              <input required="required" {{ Auth::user()->mother_service_status == 3 ?'checked' : '' }} type="radio"
                class="msrvstatus mss" name="msrvstatus" value="3" /> Others
              @if ($errors->has('msrvstatus'))
              <br>
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('msrvstatus') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_msrvstatus"></strong>
              </span>
            </div>
          </div>
          <div class="col-xs-12">
          </div>
        </div>

        <div class="form-group">
          <div class="col-xs-12">
            <label for="mprofession" class=" col-form-label">Mother's Profession*
            </label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
              <select name="mprofession" id="mprofession" class="uk-input">
                <option value="">Select ...</option>
                @foreach (professionTypeFemaleParent() as $key=>$item)
                <option {{ Auth::user()->mother_profession == $key ?'selected':'' }} value="
                      {{ $key }}">{{
                        $item }}</option>
                @endforeach
              </select>
              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                <span>
                  Relativeship
                </span>
                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
              </button>
              @if ($errors->has('mprofession'))
              <br>
              <span class="
                      text-danger" role="alert">
                <strong>{{ $errors->first('mprofession') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_mprofession"></strong>
              </span>
            </div>
          </div>
        </div>
        @if (
        Auth::user()->mother_profession == 14 ||
        Auth::user()->mother_profession == 16
        )
        @php
        $mdisplay = 'style="display: none;"';
        @endphp
        @else
        @php
        $mdisplay = '';
        @endphp
        @endif

        <div class="form-group mdetails" {!! $mdisplay !!}>
          <div class="col-xs-12">
            <label for="fdesignation" class=" col-form-label">Profession Details</label>
            <div class="">
              <input value="{{ Auth::user()->mother_profession_details }}" name="mother_profession_details"
                placeholder="Profession Details" class="uk-input here" type="text">
            </div>
          </div>
        </div>


      </div>

      <hr>

      <div class="col-sm-12">

        <div class="form-group">
          <div class="col-sm-5">
            <label for="landyeno" class=" col-form-label">Have any land/flat in Dhaka/Nearby
            </label>
            <div class="">
              <input required="required" checked type="radio" name="landyeno" id="landyeno1" value="1"
                class="landyesno hanflat" />
              No
              <input required="required" type="radio" name="landyeno" id="landyeno" value="2"
                class="landyesno hanflat" />
              Yes
              @if ($errors->has('landyeno'))
              <br>
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('landyeno') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert"><br>
                <strong id="err_landyeno"></strong>
              </span>
            </div>
          </div>

          <div class="col-sm-7">
            <div id="landDivHide" style="display:none">
              <label for="landyeno" class=" col-form-label">Types of Land/Flat
              </label>
              <div class="">
                @foreach (landType() as $key => $value)
                <label for="{{ $key }}" class="margin-right-10">
                  <input {{ old($key) == $key ? 'checked':'' }} type="checkbox" name="typeland[]" id="{{ $key }}"
                    value="{{ $key }}" class="{{ $key }} tofland" /> {{ $value
                      }}
                </label>
                @endforeach

                <span class="text-danger" role="alert">
                  <br>
                  <strong id="err_typeland"></strong>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
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
<script type="text/javascript">
  $(document).ready(function() {
  $("#fprofession").change(function(event) {
    var fids  = parseInt($(this).val());
    if(fids == 14 || fids == 16){
      $('.fdetails').hide();
    }
    else{
      $('.fdetails').show();
    }
  });

  $("#mprofession").change(function(event) {
    var mids  = parseInt($(this).val());
    if(mids == 14 || mids == 16){
      $('.mdetails').hide();
    }
    else{
      $('.mdetails').show();
    }
  });
});
</script>

@include('sections.javascripts.signup_parents')
@include('sections.javascripts.signup_parents2')
@endsection