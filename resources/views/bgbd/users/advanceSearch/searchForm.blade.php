@extends('hasan.master')
@section('content')

<!-- search banner start -->
@include('hasan.subpage.banner-sm')
<div class="container m-b-150">

  <div class="col-sm-12">

    <form novalidate class="padding-5" action="{{ route('users.advanceSearch.showResults') }}" method="get"
      class="form">
      <div class="form-group">
        <br />
        <h1 class="title text-center">Advance Search</h1>
        <hr>
      </div>

      <div class="row">
        <div class="col-sm-3">
          <label for="age">Age</label>
          <div class="row">
            <div class="col-sm-6">
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select class="uk-input" name="agemin">
                  <option value="">Min Age</option>
                  @for ($i=18; $i <= 80; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                      <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                    </svg></span>
                </button>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select class="uk-input" name="agemax">
                  <option value="">Max Age</option>
                  @for ($i=18; $i <= 80; $i++) <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                      <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                    </svg></span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <label class="myblock">Height</label>
          <div class="row">
            <div class="col-sm-6">
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select name="minheight" class="uk-input">
                  <option value="">Min Height</option>
                  @foreach (height_arr() as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                      <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                    </svg></span>
                </button>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
                uk-form-custom="target: > * > span:first-child">
                <select name="maxheight" class="uk-input">
                  <option value="">Max Height</option>
                  @foreach (height_arr() as $key => $value)
                  <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Relativeship
                  </span>
                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                      <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                    </svg></span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <label for="religion" class="myblock">Religion</label>
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
          uk-form-custom="target: > * > span:first-child">
          <select name="religion" class="form-control">
            <option value="">Select Religion</option>
            @foreach (religion() as $key=>$value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
          </select>
          <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
            <span>
              Relativeship
            </span>
            <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
              </svg></span>
          </button>
        </div>
        </div>
        <div class="col-sm-3">
          <label for="income" class="myblock">Annual Income</label>
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
            uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="income">
              <option value="0">Dosen't Matter</option>
              <option value="100000-300000">1,00,000-3,00,000</option>
              <option value="300001-600000">3,00,001-6,00,000</option>
              <option value="600001-900000">6,00,001-9,00,000</option>
              <option value="900000-1200000">9,00,000-12,00,000</option>
              <option value="1200001-99999999">12,00,001-Above</option>
            </select>
            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
              <span>
                Relativeship
              </span>
              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
                  <polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
                </svg></span>
            </button>
          </div>
        </div>
      </div>

      <br />

      <div class="row">
        <div class="col-sm-4">
          <label for="education" class="myblock">Education</label>
          <div class="">
            <input type="radio" name="education_radio" checked value="0"> All Education &nbsp; &nbsp; &nbsp;
            <input type="radio" name="education_radio" value="1"> Custom Education
          </div>
          <div id="education">
            <select name="education[]" class="form-control myDropDown" multiple>
              @foreach (educationLevel() as $key=>$value)
              <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="col-sm-4">
          <label for="profession" class="myblock">Profession</label>
          <div class="">
            <input type="radio" name="profession_radio" checked value="0"> All Profession &nbsp; &nbsp; &nbsp;
            <input type="radio" name="profession_radio" value="1"> Custom Profession
          </div>
          <div id="profession">


            <select name="profession[]" id="profession" class="form-control myDropDown" required="required" multiple>
              @foreach (profileProfession() as $key=>$value)
              <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="sunsign" class="myblock">Sun Sign</label>
          <div class="">
            <input type="radio" name="sunsign_radio" checked value="0"> Any Sun Sign &nbsp; &nbsp; &nbsp;
            <input type="radio" name="sunsign_radio" value="1"> Custom Sun Sign
          </div>
          <div id="sunsign">
            <select name="sunsign" class="form-control myDropDown" required="required" multiple>
              <option value="0">Any</option>
              @foreach (sunsign() as $key => $value)
              <option value="{{ $key }}">{{ $value}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <br />

      <div class="row">
        <div class="col-sm-4">
          <label for="mstatus" class="myblock">Marital Status</label>
          <div class="">
            <input type="radio" name="mstatus_radio" checked value="0"> Dosen't Matter &nbsp; &nbsp; &nbsp;
            <input type="radio" name="mstatus_radio" value="1"> Custom Marital Status
          </div>
          <div id="mstatus">
            <select name="mstatus[]" class="myDropDown form-control" required="required" multiple>
              @foreach (maritalstatus() as $key => $value)
              <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="districts" class="myblock">Expected Home District</label>
          <div class="">
            <input type="radio" name="districts_radio" checked value="0"> Any District &nbsp; &nbsp; &nbsp;
            <input type="radio" name="districts_radio" value="1"> Custom District
          </div>
          <div id="districts">
            <select name="districts[]" class="form-control myDropDown" required="required" multiple>
              @foreach ($districts as $item)
              <option value="{{ $item->id }}">{{ $item-> name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="living_country">Living Country</label>
          <div class="">
            <input type="radio" name="living_country_radio" checked value="0"> Any Country &nbsp; &nbsp; &nbsp;
            <input type="radio" name="living_country_radio" value="1"> Custom Country
          </div>
          <div id="living_country">
            <select multiple required='required' name="living_country[]" id="living_country"
              class="myDropDown form-control">
              @foreach ($countries as $item)
              <option value="{{ $item->id }}">{{ $item-> name}}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>



      <br />
      <br />
      <div class="row">
        <div class="hidden-xs col-sm-4"></div>
        <div class="col-sm-4">
          <button type="submit" class="btn btn-success btn-block">Search</button>
        </div>
      </div>
    </form>

  </div>
</div>

@include('sections.javascripts.signup_preference')
<link href="{{ asset('assets/fselect/fselect.css') }}" rel="stylesheet">
<script src="{{ asset('assets/fselect/fselect.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function () {
  $('.myDropDown').fSelect();

  $("#education, #profession, #diet, #skintone, #bodytype, #sunsign, #language, #mstatus, #districts, #living_country").hide();

  $("input[name='education_radio']").change(function(event) {
    if(parseInt($('input[name=education_radio]:checked').val()) == 1) $("#education").show();
    else $("#education").hide();
  });

  $("input[name='profession_radio']").change(function(event) {
    if(parseInt($('input[name=profession_radio]:checked').val()) == 1) $("#profession").show();
    else $("#profession").hide();
  });

  $("input[name='diet_radio']").change(function(event) {
    if(parseInt($('input[name=diet_radio]:checked').val()) == 1) $("#diet").show();
    else $("#diet").hide();
  });

  $("input[name='skintone_radio']").change(function(event) {
    if(parseInt($('input[name=skintone_radio]:checked').val()) == 1) $("#skintone").show();
    else $("#skintone").hide();
  });

  $("input[name='bodytype_radio']").change(function(event) {
    if(parseInt($('input[name=bodytype_radio]:checked').val()) == 1) $("#bodytype").show();
    else $("#bodytype").hide();
  });

  $("input[name='sunsign_radio']").change(function(event) {
    if(parseInt($('input[name=sunsign_radio]:checked').val()) == 1) $("#sunsign").show();
    else $("#sunsign").hide();
  });

  $("input[name='language_radio']").change(function(event) {
    if(parseInt($('input[name=language_radio]:checked').val()) == 1) $("#language").show();
    else $("#language").hide();
  });

  $("input[name='mstatus_radio']").change(function(event) {
    if(parseInt($('input[name=mstatus_radio]:checked').val()) == 1) $("#mstatus").show();
    else $("#mstatus").hide();
  });

  $("input[name='districts_radio']").change(function(event) {
    if(parseInt($('input[name=districts_radio]:checked').val()) == 1) $("#districts").show();
    else $("#districts").hide();
  });

  $("input[name='living_country_radio']").change(function(event) {
    if(parseInt($('input[name=living_country_radio]:checked').val()) == 1) $("#living_country").show();
    else $("#living_country").hide();
  });
});

</script>

<style>
.form-control{
  width: 100%;
}
</style>

@endsection