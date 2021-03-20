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
              <h4>
                {{ $editTitle }}
              </h4>
              <hr />
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              
              <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ $formAction }}" role="form">
                @csrf
                
                <div class="form-group row">
                  <div class="col-sm-3">
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <label for="height" class=" col-form-label">Profile as</label>
                      <select name="gender" class="uk-input" required="required">
                        @foreach (lookingFor() as $key => $value)
                        <option {{ Auth::user()->gender == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <label for="height" class=" col-form-label">Height
                      </label>
                      <select name="height" id="input" class="uk-input" required="required">
                        @foreach (height_arr() as $key => $value)
                        <option {{ Auth::user()->height == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                      
                      @if ($errors->has('height'))
                      <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('height') }}</strong>
                      </span>
                      @endif
                      <span class="text-danger" role="alert">
                        <strong id="err_height"></strong>
                      </span>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <label for="weight" class=" col-form-label">Weight
                    </label>
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      
                      <select name="weight" id="input" class="uk-input" required="required">
                        <option value="">Select Weight ....</option>
                        @for ($i = 30; $i < 121; $i++) <option
                        {{ Auth::user()->weight == $i ? 'selected' : '' }} value="{{ $i }}">{{
                          $i
                        }} kg</option>
                        @endfor
                      </select>
                      <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                        <span>
                          Relativeship
                        </span>
                        <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                      </button>
                      @if ($errors->has('weight'))
                      <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('weight') }}</strong>
                      </span>
                      @endif
                      <span class="text-danger" role="alert">
                        <strong id="err_weight"></strong>
                      </span>
                    </div>
                  </div>
                  
                  <div class="col-sm-3">
                    <label for="bodytype" class=" col-form-label">Body Type
                    </label>
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <select name="bodytype" id="input" class="uk-input" required="required">
                        <option value="">Select Body Type</option>
                        @foreach (bodytype() as $key => $value)
                        <option {{ Auth::user()->body_type == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                      @if ($errors->has('bodytype'))
                      <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('bodytype') }}</strong>
                      </span>
                      @endif
                      <span class="text-danger" role="alert">
                        <strong id="err_bodytype"></strong>
                      </span>
                    </div>
                  </div>
                </div>
                
                <div class="form-group row">
                  
                  <div class="col-sm-4">
                    <label for="blood_group" class=" col-form-label">Blood Group
                    </label>
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <select name="blood_group" id="input" class="uk-input" required="required">
                        <option value="">Select Blood Group</option>
                        @foreach (bloodGroups() as $key => $value)
                        <option {{ Auth::user()->blood_group == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                      @if ($errors->has('blood_group'))
                      <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('blood_group') }}</strong>
                      </span>
                      @endif
                      <span class="text-danger" role="alert">
                        <strong id="err_blood_group"></strong>
                      </span>
                    </div>
                    
                  </div>
                  <div class="col-sm-4">
                    <label for="skintone" class=" col-form-label">Skin Tone
                    </label>
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <select name="skintone" id="input" class="uk-input" required="required">
                        <option value="">Select Skin Tone</option>
                        @foreach (skintone() as $key => $value)
                        <option {{ Auth::user()->skin_tone == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                  <div class="col-sm-4">
                    <label for="diet" class=" col-form-label">
                      Diet Type
                    </label>
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <select name="diet" id="diet" class="uk-input" required="required">
                        <option value="">Select Diet ... </option>
                        @foreach (diet() as $key => $item)
                        <option {{ Auth::user()->diet_type == $key ? 'selected' : '' }} value="{{ $key }}">{{
                          $item }}</option>
                          @endforeach
                        </select>
                        <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                          <span>
                            Relativeship
                          </span>
                          <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                        </button>
                        @if ($errors->has('diet'))
                        <span class="text-danger" role="alert">
                          <strong>{{ $errors->first('diet') }}</strong>
                        </span>
                        @endif
                        <span class="text-danger" role="alert">
                          <strong id="err_diet"></strong>
                        </span>
                      </div>
                      
                    </div>
                  </div>
                  
                  
                  <div class="form-group row">
                    <div class="col-sm-4">
                      <label for="sunsign" class=" col-form-label">
                        Sun Sign
                      </label>
                      <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                        <select name="sunsign" id="sunsign" class="uk-input" required="required">
                          <option value="">Select sunsign ... </option>
                          @foreach (sunsign() as $key => $item)
                          <option {{ Auth::user()->sun_sign == $key ? 'selected' : '' }} value="{{ $key }}">{{
                            $item }}</option>
                            @endforeach
                          </select>
                          <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                            <span>
                              Relativeship
                            </span>
                            <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                          </button>
                          @if ($errors->has('sunsign'))
                          <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('sunsign') }}</strong>
                          </span>
                          @endif
                          <span class="text-danger" role="alert">
                            <strong id="err_sunsign"></strong>
                          </span>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <label for="drinks" class=" col-form-label">Do you Drink?
                        </label>
                        <div class="">
                          <div class="radio">
                            <label>
                              <input class="drickCla" required="required"
                              {{ Auth::user()->drink == 1? 'checked' : '' }} type="radio"
                              name="drinks" value="1">
                              No.
                            </label>
                            <label>
                              <input class="drickCla" required="required"
                              {{ Auth::user()->drink == 2? 'checked' : '' }} type="radio"
                              name="drinks" value="2">
                              Yes.
                            </label>
                            <label>
                              <input class="drickCla" required="required"
                              {{ Auth::user()->drink == 3? 'checked' : '' }} type="radio"
                              name="drinks" value="3">
                              Occasionally.
                            </label>
                          </div>
                          @if ($errors->has('drinks'))
                          <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('drinks') }}</strong>
                          </span>
                          @endif
                          <span class="text-danger" role="alert">
                            <strong id="err_drinks"></strong>
                          </span>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <label for="smoke" class=" col-form-label">Do you Smoke?
                        </label>
                        <div class="">
                          <div class="radio">
                            <label>
                              <input class="claSmok" required="required"
                              {{ Auth::user()->smoke == 1? 'checked' : '' }} type="radio"
                              name="smoke" value="1">
                              No.
                            </label>
                            <label>
                              <input class="claSmok" required="required"
                              {{ Auth::user()->smoke == 2? 'checked' : '' }} type="radio"
                              name="smoke" value="2">
                              Yes.
                            </label>
                            <label>
                              <input class="claSmok" required="required"
                              {{ Auth::user()->smoke == 3? 'checked' : '' }} type="radio"
                              name="smoke" value="3">
                              Occasionally.
                            </label>
                          </div>
                          @if ($errors->has('smoke'))
                          <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('smoke') }}</strong>
                          </span>
                          @endif
                          <span class="text-danger" role="alert">
                            <strong id="err_smoke"></strong>
                          </span>
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-6">
                        <label for="income" class=" col-form-label">Annual Income
                        </label>
                        <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                          <select class="uk-input" name="income">
                            <option {{ (Auth::user()->annual_min_income == 100000)?" selected":"" }} value="100000-300000">1,00,000-3,00,000</option>
                            <option {{ (Auth::user()->annual_min_income == 300001)?" selected":"" }} value="300001-600000">3,00,001-6,00,000</option>
                            <option {{ (Auth::user()->annual_min_income == 600001)?" selected":"" }} value="600001-900000">6,00,001-9,00,000</option>
                            <option {{ (Auth::user()->annual_min_income == 900000)?" selected":"" }} value="900000-1200000">9,00,000-12,00,000</option>
                            <option {{ (Auth::user()->annual_min_income == 1200001)?" selected":"" }} value="1200001-99999999">12,00,001-Above</option>
                          </select>
                          <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                            <span>
                              Relativeship
                            </span>
                            <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                          </button>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="">
                          <label for="hobbies" class=" col-form-label">Interests and Hobbies</label>
                          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                            <select name="hobbies" class="uk-input" required="required">
                              @foreach (hobbyType() as $key => $item)
                              <option {{ old('hobbies') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $item }}</option>
                                @endforeach
                              </select>
                              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                <span>
                                  Relativeship
                                </span>
                                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="col-sm-3">
                          <label for="mstatus" class=" col-form-label">Personal Value</label>
                          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                            <select name="personal_value" class="uk-input" required="required">
                              @foreach (personalValue() as $key => $value)
                              <option {{ old('personal_value') == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                $value }}</option>
                                @endforeach
                              </select>
                              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                <span>
                                  Relativeship
                                </span>
                                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                              </button>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <label for="mstatus" class=" col-form-label">Marital Status</label>
                            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                              <select name="mstatus" id="mstatus" class="classMarital form-control"
                              required="required">
                              <option value="">Select... </option>
                              @foreach (maritalstatus() as $key => $value)
                              <option {{ Auth::user()->marital_status == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{
                                  $value }}</option>
                                  @endforeach
                                </select>
                                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                  <span>
                                    Relativeship
                                  </span>
                                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                                </button>
                                <span class="text-danger" role="alert">
                                  <strong id="err_mstatus"></strong>
                                </span>
                              </div>
                            </div>
                            <div class="col-sm-3 howmanychildform" style="display: none">
                              <div class="">
                                <label for="howmanychild" class=" col-form-label">Children have?</label>
                                <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                                  <select id="howmanychild" name="howmanychild" class="uk-input">
                                    <option value="0">None</option>
                                    <option {{ (Auth::user()->how_many_children == 1)?" selected":"" }} value="1">1</option>
                                    <option {{ (Auth::user()->how_many_children == 2)?" selected":"" }} value="2">2</option>
                                    <option {{ (Auth::user()->how_many_children == 3)?" selected":"" }} value="3">3</option>
                                    <option {{ (Auth::user()->how_many_children == 4)?" selected":"" }} value="4">4</option>
                                  </select>
                                  <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                    <span>
                                      Relativeship
                                    </span>
                                    <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                                  </button>
                                  @if ($errors->has('howmanychild'))
                                  <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('howmanychild') }}</strong>
                                  </span>
                                  @endif
                                </div>
                              </div>
                            </div>
                            <div class="col-sm-3 howmanychildform">
                              <div class="child_living">
                                <label for="childrenliving" class=" col-form-label">Living with?</label>
                                <div class="">
                                  <label>
                                    <input class="childrenliving" required="required"
                                    {{ (Auth::user()->children_living_with_me == 0)? 'checked' : 'checked' }} type="radio" name="childrenliving" value="0"> No.
                                  </label>
                                  <label>
                                    <input class="childrenliving" required="required"
                                    {{ (Auth::user()->children_living_with_me == 1)? 'checked' : '' }} type="radio" name="childrenliving" value="1"> Yes.
                                  </label>
                                  
                                  @if ($errors->has('childrenliving'))
                                  <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('childrenliving') }}</strong>
                                  </span>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            
                            <div class="col-sm-3">
                              <label for="language" class=" col-form-label">Mother Tongue
                              </label>
                              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                                <select name="language" id="language" class="classMarital form-control"
                                required="required">
                                @foreach (motherTongue() as $key => $value)
                                <option {{ Auth::user()->language == $key ? 'selected' : '' }} value="{{ $key }}">{{
                                  $value }}</option>
                                  @endforeach
                                </select>
                                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                  <span>
                                    Relativeship
                                  </span>
                                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                                </button>
                              </div>
                            </div>
                            
                            <div class="col-sm-4">
                              <label for="disability" class=" col-form-label">Do you have disability?
                              </label>
                              <div class="">
                                <div class="radio">
                                  <label>
                                    <input class="inputDisability" required="required"
                                    {{ Auth::user()->disability == 0? 'checked' : '' }} type="radio"
                                    name="disability" value="0">
                                    No.
                                  </label>
                                  <label>
                                    <input id="inputDisabilityYes" class="inputDisability" required="required"
                                    {{ Auth::user()->disability == 1? 'checked' : '' }} type="radio"
                                    name="disability" value="1">
                                    Yes.
                                  </label>
                                </div>
                                @if ($errors->has('disability'))
                                <span class="text-danger" role="alert">
                                  <strong>{{ $errors->first('disability') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            
                            <div class="col-sm-5 explain_disability">
                              <label for="explain_disability" class=" col-form-label">Please provide details
                                about your disability.
                              </label>
                              <textarea name="explain_disability" id="explain_disability" class="uk-input"
                              rows="3">{{ Auth::user()->explain_disability }}</textarea>
                            </div>
                          </div>
                          
                          
                          
                          @if(Auth::user()->religion == 1)
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="religious" class=" col-form-label">Are you Religious?
                              </label>
                              <div class="">
                                <div class="radio">
                                  <label>
                                    <input {{ Auth::user()->is_religious == 1? 'checked' : 'checked' }} type="radio" name="religious"
                                    value="1">
                                    Religious
                                  </label>
                                  <label>
                                    <input {{ Auth::user()->is_religious == 2 ? 'checked' : '' }} type="radio" name="religious"
                                    value="2">
                                    Very Religious.
                                  </label>
                                  <label>
                                    <input {{ Auth::user()->is_religious == 3 ? 'checked' : '' }} type="radio" name="religious"
                                    value="3">
                                    Not Religious.
                                  </label>
                                </div>
                                @if ($errors->has('religious'))
                                <span class="text-danger" role="alert">
                                  <strong>{{ $errors->first('religious') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="saypayers" class=" col-form-label">How offen you Say Prayer?
                              </label>
                              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                                <select name="saypayers" id="input" class="uk-input" required="required">
                                  @foreach (sayPayer() as $key => $value)
                                  <option {{ Auth::user()->says_payer == $key ? 'selected' : '' }} value="{{ $key }}">{{
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
                              </div>
                            </div>
                          </div>
                          
                          @if (Auth::user()->gender==2)
                          <div class="form-group row">
                            <div class="col-md-6">
                              <label for="wearhijab" class="col-form-label">Wearing Hijab/Borka</label>
                              <div class="">
                                <div class="radio">
                                  <label>
                                    <input {{ Auth::user()->wear_hijab == 1? 'checked' : 'checked' }} type="radio" name="wearhijab"
                                    value="1">
                                    Yes
                                  </label>
                                  &nbsp;&nbsp;&nbsp;
                                  <label>
                                    <input {{ Auth::user()->wear_hijab == 2? 'checked' : '' }} type="radio" name="wearhijab"
                                    value="2">
                                    No
                                  </label>
                                  &nbsp;&nbsp;&nbsp;
                                  <label>
                                    <input {{ Auth::user()->wear_hijab == 3? 'checked' : '' }} type="radio" name="wearhijab"
                                    value="3">
                                    Occasionally
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="willwearhijab" class=" col-form-label">Wearing Hijab/Borka after marrige</label>
                              <div class="">
                                <div class="radio">
                                  <label>
                                    <input {{ Auth::user()->wear_hijab_after_marriage == 1? 'checked' : 'checked' }} type="radio" name="willwearhijab"
                                    value="1">
                                    Yes.
                                  </label>
                                  &nbsp;&nbsp;&nbsp;
                                  <label>
                                    <input {{ Auth::user()->wear_hijab_after_marriage == 2? 'checked' : '' }} type="radio" name="willwearhijab"
                                    value="2">
                                    No.
                                  </label>
                                  &nbsp;&nbsp;&nbsp;
                                  <label>
                                    <input {{ Auth::user()->wear_hijab_after_marriage == 3? 'checked' : '' }} type="radio" name="willwearhijab"
                                    value="3">
                                    As partner wish
                                  </label>
                                </div>
                                @if ($errors->has('willwearhijab'))
                                <span class="text-danger" role="alert">
                                  <strong>{{ $errors->first('willwearhijab') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          @endif
                          @endif
                          
                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="presentaddress" class=" col-form-label">About {{ (Auth::user()->gender==1)?"Groom":"Bride" }}
                              </label>
                              <div class="">
                                <textarea class="uk-input" name="description" id="" cols="30" rows="5">{{ Auth::user()->description }}</textarea>
                                @if ($errors->has('description'))
                                <span class="text-danger" role="alert">
                                  <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                                <span class="text-danger" role="alert">
                                  <strong id="err_presentaddress"></strong>
                                </span>
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <script>
            $(document).ready(function() {
              
              howmanychild();
              
              function howmanychild(mstatus_value) {
                if ($('#mstatus').val() > 1) {
                  $('.howmanychildform').show(100);
                  $('#howmanychild').attr('required', 'required');
                  
                } else {
                  $('.howmanychildform').hide(100);
                  $('#howmanychild').removeAttr('required');
                }
              }
              $('#mstatus').change(function (e) {
                howmanychild();
              });
              
              @php
              if(Auth::user()->how_many_children > 0){
                echo "$('.child_living').show()";
              }
              else{
                echo "$('.child_living').hide()";
              }
              @endphp
              
              $("body").on("change", "#howmanychild", function(){
                var val = $(this).val();
                if(val.length > 0){
                  val = parseInt(val);
                  if(val > 0){
                    $(".child_living").show();
                  }
                  else{
                    $(".child_living").hide();
                  }
                }
                else{
                  $(".child_living").hide();
                }
              });
            });
            $(function () {
              //==================================================================
              $("body").on("click", "#submit", function () {
                var err = 0; // check box
                $(
                "#err_height, #err_weight  , #err_bodytype , #err_blood_group, #err_skintone ,#err_diet , #err_sunsign, #err_drinks, #err_smoke ,#err_income , #err_hobbies ,#err_mstatus "
                ).text("");
                
                var height = $("select[name='height']").val();
                var weight = $("select[name='weight']").val();
                var bodytype = $("select[name='bodytype']").val();
                var blood_group = $("select[name='blood_group']").val();
                var skintone = $("select[name='skintone']").val();
                var diet = $("select[name='diet']").val();
                var sunsign = $("select[name='sunsign']").val();
                //var drinks = $("input[name='drinks']").val();
                //var smoke = $("input[name='smoke']").val();
                var income = $("input[name='income']").val();
                var hobbies = $("input[name='hobbies']").val();
                var mstatus = $("select[name='mstatus']").val();
                
                
                if (height == "") {
                  $("#err_height").text("Height Required");
                  err++;
                }
                if (weight == "") {
                  $("#err_weight").text("Weight Required");
                  err++;
                }
                
                if (bodytype == "") {
                  $("#err_bodytype").text("Body Type Required");
                  err++;
                }
                /*
                else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
                  $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
                  err++;
                }*/
                if (blood_group == "") {
                  $("#err_blood_group").text("Blood Group Required");
                  err++;
                }
                if (skintone == "") {
                  $('#err_skintone').text("Skin Tone  Required");
                  err++;
                }
                if (diet == "") {
                  $("#err_diet").text("Diet Type Required");
                  err++;
                }
                if (sunsign == "") {
                  $("#err_sunsign").text("Sun Sign Required");
                  err++;
                }
                if (!$(".drickCla").is(":checked")) {
                  $("#err_drinks").text("Do you Drink Required");
                  err++;
                }
                if (!$(".claSmok").is(":checked")) {
                  $("#err_smoke").text("Do you Smoke Required");
                  err++;
                }
                if (income == "") {
                  $("#err_income").text("Annual Income Required");
                  err++;
                }
                
                if (hobbies == "") {
                  $("#err_hobbies").text("Interests and Hobbies Required");
                  err++;
                }
                if (mstatus == "") {
                  $("#err_mstatus").text("Marital Status Required");
                  err++;
                }
                
                if (err > 0) {
                  return false;
                }
                return true;
              });
              
              //==================================================================
              
              
              
              $('.explain_disability').hide();
              
              
              if ($('#inputDisabilityYes').is(':checked')) {
                $('.explain_disability').show(100);
                $('#explain_disability').attr('required', 'required');
              } else {
                $('.explain_disability').hide(50);
                $('#explain_disability').removeAttr('required');
              }
              $('.inputDisability').on('click', function () {
                if ($(this).val() == 1) {
                  $('.explain_disability').show(100);
                  $('#explain_disability').attr('required', 'required');
                } else {
                  $('.explain_disability').hide(50);
                  $('#explain_disability').removeAttr('required');
                  
                }
              });
              
              
              
            });
            
          </script>
          @endsection
          