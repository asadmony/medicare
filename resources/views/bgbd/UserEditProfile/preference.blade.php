@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
<style media="screen">
  .profession_row,
  .education_row,
  .district_row,
  .country_row {
    display: none;
  }
</style>
<div class="container" style="background: #FFF; margin-top: 30px;">
  <div class="row">
    <div class="col-sm-12 m-b-100">
      <h3 class="center-block margin-0-auto margin-bottom-15 text-align-center padding-top-20">
        Edit Preference
        </h4>
        <hr>

        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif

        <form novalidate class="padding-0-30 margin-bottom-20" method="POST"
          action="{{ route('users.profile.preference.update') }}" role="form">
          @csrf

          <div class="form-group">
            <h4>Basic Information</h4>
          </div>

          <div class="form-group row">
            <div class="col-sm-4 padding-0">
              <label for="minage" class="col-form-label col-xs-12">
                Age Between
                <span></span></label>
              <div class="row">
                <div class="col-sm-6  padding-">
                  <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                    uk-form-custom="target: > * > span:first-child">
                    <select class="uk-input" required name="minage">
                      <option value="">Min Age</option>
                      @for ($i=18; $i < 80; $i++) @if (Auth::user()->preference_min_age == $i)
                        <option selected value="{{ $i }}">{{ $i }}</option>
                        @else
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                        @endfor
                    </select>
                    <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                      <span>
                        Relativeship
                      </span>
                      <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                    </button>
                  </div>
                </div>
                <div class="col-sm-6 padding-">
                  <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                    uk-form-custom="target: > * > span:first-child">
                    <select class="uk-input" name="maxage">
                      <option value="">Max Age</option>
                      @for ($i=18; $i < 80; $i++) @if (Auth::user()->preference_max_age == $i)
                        <option selected value="{{ $i }}">{{ $i }}</option>
                        @else
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                        @endfor
                    </select>
                    <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                      <span>
                        Relativeship
                      </span>
                      <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                    </button>
                    @if ($errors->has('maxage'))
                    <p class="text-danger" role="alert">
                      <strong>{{ $errors->first('maxage') }}</strong>
                    </p>
                    @endif
                    <p class="text-danger" role="alert">
                      <strong id="err_maxage"></strong>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <label for="mstatus" class=" col-form-label">Marital Status
              </label>
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select name="mstatus" id="mstatus" class="classMarital uk-input" required="required">
                  @foreach (maritalstatusPreference() as $key => $value)
                  <option {{ Auth::user()->preference_marital_status == $key ? 'selected' : '' }} value="{{ $key }}">{{
                      $value }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                </button>
                @if ($errors->has('mstatus'))
                <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('mstatus') }}</strong>
                </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_mstatus"></strong>
                </span>
              </div>
            </div>
            <div class="col-sm-6" id="myallowchildren">
              <label for="childallow" class=" col-form-label">Children Allow
              </label>
              <div class="">
                <div class="radio">
                  <label class="margin-right-10">
                    <input class="chilAlow" required="required"
                      {{ Auth::user()->preference_children_allow == 3? 'checked' : '' }} type="radio" name="childallow"
                      value="3">
                    No
                  </label>
                  <label class="margin-right-10">
                    <input class="chilAlow" required="required"
                      {{ Auth::user()->preference_children_allow == 1? 'checked' : '' }} type="radio" name="childallow"
                      value="1">
                    Yes, not living together
                  </label>
                  <label class="margin-right-10">
                    <input class="chilAlow" required="required"
                      {{ Auth::user()->preference_children_allow == 2? 'checked' : '' }} type="radio" name="childallow"
                      value="2">
                    Yes, living together
                  </label>

                </div>

              </div>
              @if ($errors->has('childallow'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('childallow') }}</strong>
              </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_childallow"></strong>
              </span>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-4">
              <label for="height" class=" col-form-label">Height
              </label>
              <div class="row">
                <div class="col-sm-6">
                  <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                    uk-form-custom="target: > * > span:first-child">
                    <select name="minheight" id="input" class="uk-input" required="required">
                      <option value="">Select Min Height</option>
                      @foreach (height_arr() as $key => $value)
                      <option {{ Auth::user()->preference_min_height == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                        }}</option>
                      @endforeach
                    </select>
                    <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                      <span>
                        Relativeship
                      </span>
                      <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                    </button>
                    @if ($errors->has('minheight'))
                    <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('minheight') }}</strong>
                    </span>
                    @endif
                    <span class="text-danger" role="alert">
                      <strong id="err_height"></strong>
                    </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                    uk-form-custom="target: > * > span:first-child">
                    <select name="maxheight" id="input" class="uk-input" required="required">
                      <option value="">Select Max Height</option>
                      @foreach (height_arr() as $key => $value)
                      <option {{ Auth::user()->preference_max_height == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value
                        }}</option>
                      @endforeach
                    </select>
                    <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                      <span>
                        Relativeship
                      </span>
                      <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                    </button>
                    @if ($errors->has('maxheight'))
                    <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('maxheight') }}</strong>
                    </span>
                    @endif
                    <span class="text-danger" role="alert">
                      <strong id="err_height"></strong>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <label for="religion" class="col-form-label">Religion
              </label>
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select required='required' name="religion" id="religion" class="uk-input">
                  <option value="">Select Religion ...</option>
                  @foreach (religion() as $key => $value)
                  <option {{ Auth::user()->preference_religion == $key ? 'selected' : '' }} value="{{ $key }}">{{
                        $value }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                </button>
                @if ($errors->has('religion'))
                <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('religion') }}</strong>
                </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_religion"></strong>
                </span>
              </div>
            </div>
            <div class="col-sm-4">
              <label for="skintone" class=" col-form-label">Skin Tone
              </label>
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select name="skintone" id="input" class="uk-input" required="required">
                  <option value="">Select...</option>
                  @foreach (skintonePreference() as $key => $value)
                  <option {{ Auth::user()->preference_skintone == $key ? 'selected' : '' }} value="{{ $key }}">{{
                          $value
                        }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                </button>
                @if ($errors->has('skintone'))
                <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('skintone') }}</strong>
                </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_skintone"></strong>
                </span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <br />
              <h4>Education and Career</h4>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-6">
              <label class="control-label" for="profession">Prefered Profession</label>
              <p>
                <input type="radio" name="radio_profession"
                  {{ (Auth::user()->preference_profession == 0)?" checked":"" }} value="1"> <small>Any
                  Profession</small>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="radio_profession" {{ (Auth::user()->preference_profession)?" checked":"" }}
                  value="2"> <small>Custom Profession</small>
              </p>
              <div class="profession_row" {!! (Auth::user()->preference_profession)?" style='display: initial'":"" !!}>
                <div class="row">
                  <div class="col-sm-5">
                    <select id="prefered_profession" class="form-control" size="9" multiple="multiple">
                      @php
                      $temp_list = [];
                      if(Auth::user()->preference_profession){
                      $temp_list = explode("|", Auth::user()->preference_profession);
                      }
                      $profession = (Auth::user()->gender==1)?professionTypeMale():professionTypeFemale();
                      @endphp

                      @foreach ($profession as $key => $value)
                      @if(!$temp_list)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @elseif(!in_array($key, $temp_list))
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-2">
                    <button type="button" id="prefered_profession_rightAll" class="btn btn-block"><i
                        class="fas fa-angle-double-right"></i></button>
                    <button type="button" id="prefered_profession_rightSelected" class="btn btn-block"><i
                        class="fas fa-chevron-right"></i></button>
                    <button type="button" id="prefered_profession_leftSelected" class="btn btn-block"><i
                        class="fas fa-chevron-left"></i></button>
                    <button type="button" id="prefered_profession_leftAll" class="btn btn-block"><i
                        class="fas fa-angle-double-left"></i></button>
                  </div>

                  <div class="col-sm-5">
                    <select name="profession[]" id="prefered_profession_to" class="form-control" size="9"
                      multiple="multiple">
                      @foreach ($profession as $key => $value)
                      @if($temp_list && in_array($key, $temp_list))
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label class="control-label" for="profession">Education Level</label>
              <p>
                <input type="radio" name="radio_education" {{ (Auth::user()->preference_education == 0)?" checked":"" }}
                  value="1"> <small>Any Education Level</small>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="radio_education" {{ (Auth::user()->preference_education)?" checked":"" }}
                  value="2"> <small>Custom Education Level</small>
              </p>
              <div class="education_row" {!! (Auth::user()->preference_education)?" style='display: initial'":"" !!}>
                <div class="row">
                  <div class="col-sm-5">
                    <select id="education_lavel" class="form-control" size="9" multiple="multiple">
                      @php
                      $temp_list = [];
                      if(Auth::user()->preference_education){
                      $temp_list = explode("|", Auth::user()->preference_education);
                      }
                      @endphp
                      @foreach (educationLevel() as $key => $value)
                      @if(!$temp_list)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @elseif(!in_array($key, $temp_list))
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-2">
                    <button type="button" id="education_lavel_rightAll" class="btn btn-block"><i
                        class="fas fa-angle-double-right"></i></button>
                    <button type="button" id="education_lavel_rightSelected" class="btn btn-block"><i
                        class="fas fa-chevron-right"></i></button>
                    <button type="button" id="education_lavel_leftSelected" class="btn btn-block"><i
                        class="fas fa-chevron-left"></i></button>
                    <button type="button" id="education_lavel_leftAll" class="btn btn-block"><i
                        class="fas fa-angle-double-left"></i></button>
                  </div>

                  <div class="col-sm-5">
                    <select name="education[]" id="education_lavel_to" class="form-control" size="9"
                      multiple="multiple">
                      @foreach (educationLevel() as $key => $value)
                      @if($temp_list && in_array($key, $temp_list))
                      <option value="{{ $key }}">{{ $value }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="form-group">
            <div class="col-xs-12">
              <h4>Location</h4>
            </div>
          </div> --}}

          {{-- <div class="form-group row">
            <div class="col-sm-6">
              <label class="control-label">Prefered Living District</label>
              <p>
                <input type="radio" name="radio_district"
                  {{ (Auth::user()->preference_home_district == 0)?" checked":"" }} value="1"> <small>Any
                  District</small>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="radio_district" {{ (Auth::user()->preference_home_district)?" checked":"" }}
                  value="2"> <small>Custom District</small>
              </p>
              <div class="district_row" {!! (Auth::user()->preference_home_district)?" style='display: initial'":"" !!}>
                <div class="row">
                  <div class="col-sm-5">
                    <select id="home_district" class="form-control" size="9" multiple="multiple">
                      @php
                      $temp_list = [];
                      if(Auth::user()->preference_home_district){
                      $temp_list = explode("|", Auth::user()->preference_home_district);
                      }
                      @endphp

                      @foreach ($districts as $item)
                      @if(!$temp_list)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @elseif(!in_array($item->id, $temp_list))
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-2">
                    <button type="button" id="home_district_rightAll" class="btn btn-block"><i
                        class="fas fa-angle-double-right"></i></button>
                    <button type="button" id="home_district_rightSelected" class="btn btn-block"><i
                        class="fas fa-chevron-right"></i></button>
                    <button type="button" id="home_district_leftSelected" class="btn btn-block"><i
                        class="fas fa-chevron-left"></i></button>
                    <button type="button" id="home_district_leftAll" class="btn btn-block"><i
                        class="fas fa-angle-double-left"></i></button>
                  </div>

                  <div class="col-sm-5">
                    <select name="district[]" id="home_district_to" class="form-control" size="9" multiple="multiple">
                      @foreach ($districts as $item)
                      @if($temp_list && in_array($item->id, $temp_list))
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label class="control-label">Prefered Living Country</label>
              <p>
                <input type="radio" name="radio_country"
                  {{ (Auth::user()->preference_living_country == 0)?" checked":"" }} value="1"> <small>Any
                  Country</small>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="radio_country" {{ (Auth::user()->preference_living_country)?" checked":"" }}
                  value="2"> <small>Custom Country</small>
              </p>
              <div class="country_row" {!! (Auth::user()->preference_living_country)?" style='display: initial'":"" !!}>
                <div class="row">
                  <div class="col-sm-5">
                    <select id="living_country" class="form-control" size="9" multiple="multiple">
                      @php
                      $temp_list = [];
                      if(Auth::user()->preference_living_country){
                      $temp_list = explode("|", Auth::user()->preference_living_country);
                      }
                      @endphp

                      @foreach ($countries as $item)
                      @if(!$temp_list)
                      <option value="{{ $key }}">{{ $value }}</option>
                      @elseif(!in_array($item->id, $temp_list))
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>

                  <div class="col-sm-2">
                    <button type="button" id="living_country_rightAll" class="btn btn-block"><i
                        class="fas fa-angle-double-right"></i></button>
                    <button type="button" id="living_country_rightSelected" class="btn btn-block"><i
                        class="fas fa-chevron-right"></i></button>
                    <button type="button" id="living_country_leftSelected" class="btn btn-block"><i
                        class="fas fa-chevron-left"></i></button>
                    <button type="button" id="living_country_leftAll" class="btn btn-block"><i
                        class="fas fa-angle-double-left"></i></button>
                  </div>

                  <div class="col-sm-5">
                    <select name="country[]" id="living_country_to" class="form-control" size="9" multiple="multiple">
                      @foreach ($countries as $item)
                      @if($temp_list && in_array($item->id, $temp_list))
                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}

          <div class="row">

            <div class="col-sm-12">
              <br /><br />
              <h4>Additional Information</h4>
            </div>

            <div class="col-sm-12">
              <label for="describe" class=" col-form-label">More about partner or partner family
              </label>
              <div class="">
                <textarea placeholder="Provide some additional preference about partner." class="uk-input"
                  name="describe" id="describe" cols="30" rows="4">{{ Auth::user()->preference_moreinfo }}</textarea>
                @if ($errors->has('describe'))
                <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('describe') }}</strong>
                </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_describe"></strong>
                </span>
                <span class="text-danger" role="alert">
                  <strong id="err_describe"></strong>
                </span>
              </div>
            </div>




            <div class="col-sm-3"> <br>
              <button type="submit" id="submit" class="uk-button uk-button-block create_acc">
                Update
              </button>

            </div>
        </form>

    </div>
  </div>
</div>

@include('sections.javascripts.signup_preference')
<link href="{{ asset('assets/fselect/fselect.css') }}" rel="stylesheet">
<script src="{{ asset('assets/fselect/fselect.js') }}"></script>

<script type="text/javascript" src="{{ asset("final/assets/js/multiselect.min.js") }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
          @php
            if(Auth::user()->preference_marital_status == 1){
              echo '$("#myallowchildren").hide();';
            }
          @endphp
          $("#mstatus").change(function(event) {
            var val = parseInt($(this).val());
            if(val == 1){
              $("#myallowchildren").hide();
            }
            else{
              $("#myallowchildren").show();
            }
          });

          // make code pretty
          window.prettyPrint && prettyPrint();

          // hack for iPhone 7.0.3 multiselects bug
          if(navigator.userAgent.match(/iPhone/i)) {
            $('select[multiple]').each(function(){
              var select = $(this).on({
                "focusout": function(){
                  var values = select.val() || [];
                  setTimeout(function(){
                    select.val(values.length ? values : ['']).change();
                  }, 1000);
                }
              });
              var firstOption = '<option value="" disabled="disabled"';
              firstOption += (select.val() || []).length > 0 ? '' : ' selected="selected"';
              firstOption += '>Select ' + (select.attr('title') || 'Options') + '';
              firstOption += '</option>';
              select.prepend(firstOption);
            });
          }

          $('#prefered_profession, #education_lavel, #home_district, #living_country').multiselect();

          $("input[name='radio_profession']").change(function(event) {
            if(parseInt($('input[name=radio_profession]:checked').val()) == 1){
              $(".profession_row").hide();
            }
            else{
              $(".profession_row").show();
            }
          });

          $("input[name='radio_education']").change(function(event) {
            if(parseInt($('input[name=radio_education]:checked').val()) == 1){
              $(".education_row").hide();
            }
            else{
              $(".education_row").show();
            }
          });

          $("input[name='radio_district']").change(function(event) {
            if(parseInt($('input[name=radio_district]:checked').val()) == 1){
              $(".district_row").hide();
            }
            else{
              $(".district_row").show();
            }
          });

          $("input[name='radio_country']").change(function(event) {
            if(parseInt($('input[name=radio_country]:checked').val()) == 1){
              $(".country_row").hide();
            }
            else{
              $(".country_row").show();
            }
          });
        });
</script>

<style>
  .fs-wrap {
    display: inline-block !important;
    cursor: pointer !important;
    width: 100% !important;
  }

  .fs-label-wrap {
    border-radius: 5px !important;
    border-radius: 4px !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075) !important;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075) !important;
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s !important;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s !important;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s !important;
    display: block !important;
    width: 100% !important;
    height: 34px !important;
    text-indent: 7px !important;
    padding-top: 3px !important;
  }
</style>
<script type="text/javascript">
  $(document).ready(function () {

          $('#profession').fSelect();
          $('#education').fSelect();
          $('#country').fSelect();
          $('#familydistrict').fSelect();
          //===========================================================
          $("body").on("click", "#submit", function () {
            var err = 0;
            $(
              "#err_minage, #err_maxage , #err_mstatus , #err_childallow  , #err_height, #err_religion, #err_,#err_, #err_familydistrict,#err_country,#err_skintone,#err_describe"
            ).text("");

            var minage = $("input[name='minage']").val();
            var maxage = $("input[name='maxage']").val();
            var mstatus = $("select[name='mstatus']").val();
            var height = $("select[name='height']").val();
            var religion = $("select[name='religion']").val();
            //var profession = $("select[name='profession']").val();
            var familydistrict = $("select[name='familydistrict']").val();
            var country = $("select[name='country']").val();
            var skintone = $("select[name='skintone']").val();

            if (minage == "") {
              $("#err_minage").text("Age Between Required");
              err++;
            }
            if (maxage == "") {
              $("#err_maxage").text("Max age  Required");
              err++;
            }
            if (mstatus == "") {
              $("#err_mstatus").text("Marital Status  Required");
              err++;
                }
            if (!$(".chilAlow").is(":checked")) {
              $("#err_childallow").text("Children Allow Required");
              err++;
            }
            if (height == "") {
              $("#err_height").text("Height Required");
              err++;
            }
            if (religion == "") {
              $("#err_religion").text("Religion Required");
              err++;
            }
            /* baki ase 2 ta*/

            if (familydistrict == "") {
              $("#err_familydistrict").text("Prefered Home District Required");
              err++;
            }
            /*
            if (country == "") {
            $("#err_country").text("Living Country Required");
            err++;
          }
          */
          if (skintone == "") {
            $("#err_skintone").text("Skin Tone Required");
            err++;
          }
      
          /*
          else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
          $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
          err++;
        }*/

        console.log(err);

        if (err > 0) {
          return false;
        }
        return ture;
      });
      //===========================================================
    });

</script>


<style media="screen">
  select[multiple='multiple'] {
    font-size: 15px;
  }

  .uk-button-default {
    font-size: 12px;
  }
</style>

@endsection