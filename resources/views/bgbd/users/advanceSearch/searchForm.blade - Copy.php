@extends('final.master')

@section('content')
  <div class="container">

    <div class="col-sm-12">

      <form novalidate class="padding-5" action="{{ route('users.advanceSearch.showResults') }}" method="get" class="form">
        <div class="form-group">
          <br />
          <h1 class="title text-center">Advance Search</h1>
          <hr>
        </div>



        <div class="row">
          <div class="col-sm-4">
            <label for="age">Age</label>
            <div class="row">
              <div class="col-sm-6">
                <select class="form-control" name="agemin">
                  <option value="">Min Age</option>
                  @for ($i=18; $i <= 80; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </div>
              <div class="col-sm-6">
                <select class="form-control" name="agemax">
                  <option value="">Max Age</option>
                  @for ($i=18; $i <= 80; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <label class="myblock">Height</label>
            <div class="row">
              <div class="col-sm-6">
                <select name="minheight" class="form-control">
                  <option value="">Min Height</option>
                  @foreach (height_arr() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-6">
                <select name="maxheight" class="form-control">
                  <option value="">Max Height</option>
                  @foreach (height_arr() as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-4">
            <label for="religion" class="myblock">Religion</label>
            <select name="religion" class="form-control">
              <option value="">Select Religion</option>
              @foreach (religion() as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
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


              <select name="profession[]" id="profession" class="form-control myDropDown" required="required"
              multiple>
              @foreach (profileProfession() as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="diet" class="myblock">Diet Type</label>
          <div class="">
            <input type="radio" name="diet_radio" checked value="0"> Any Diet Type &nbsp; &nbsp; &nbsp;
            <input type="radio" name="diet_radio" value="1"> Custom Diet Type
          </div>
          <div id="diet">
            <select name="diet[]" class="form-control  myDropDown" required="required" multiple>
              @foreach (diet() as $key => $item)
                <option value="{{ $key }}">{{ $item }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <br />

      <div class="row">
        <div class="col-sm-4">
          <label for="skintone" class="myblock">Skin Tone</label>
          <div class="">
            <input type="radio" name="skintone_radio" checked value="0"> Any Skin Tone &nbsp; &nbsp; &nbsp;
            <input type="radio" name="skintone_radio" value="1"> Custom Skin Tone
          </div>
          <div id="skintone">
            <select name="skintone[]" class="form-control myDropDown" required="required" multiple>
              @foreach (skintone() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="bodytype" class="myblock">Body Type</label>
          <div class="">
            <input type="radio" name="bodytype_radio" checked value="0"> Any Body Type &nbsp; &nbsp; &nbsp;
            <input type="radio" name="bodytype_radio" value="1"> Custom Body Type
          </div>
          <div id="bodytype">
            <select name="bodytype[]" id="input" class="form-control myDropDown" required="required" multiple>
              @foreach (bodytype() as $key => $value)
                <option value="{{ $key }}">{{ $value}}</option>
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
          <label for="language" class="myblock">Mother Tongue</label>
          <div class="">
            <input type="radio" name="language_radio" checked value="0"> Any Tongue &nbsp; &nbsp; &nbsp;
            <input type="radio" name="language_radio" value="1"> Custom Tongue
          </div>
          <div id="language">
            <select name="language[]" class="myDropDown form-control" required="required" multiple>
              @foreach (motherTongue() as $key => $value)
                <option {{ old('language') == $key ? 'selected' : '' }} value="{{ $key }}">
                  {{$value }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
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
      </div>
      <br />

      <div class="row">
        <div class="col-sm-4">
          <label for="living_country">Living Country</label>
          <div class="">
            <input type="radio" name="living_country_radio" checked value="0"> Any Country &nbsp; &nbsp; &nbsp;
            <input type="radio" name="living_country_radio" value="1"> Custom Country
          </div>
          <div id="living_country">
            <select multiple required='required' name="living_country[]" id="living_country" class="myDropDown form-control">
              @foreach ($countries as $item)
                <option value="{{ $item->id }}">{{ $item-> name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-sm-4">
          <label for="income" class="myblock">Annual Income</label>
          <select class="form-control" name="income">
            <option value="0">Dosen't Matter</option>
            <option value="100000-300000">1,00,000-3,00,000</option>
            <option value="300001-600000">3,00,001-6,00,000</option>
            <option value="600001-900000">6,00,001-9,00,000</option>
            <option value="900000-1200000">9,00,000-12,00,000</option>
            <option value="1200001-99999999">12,00,001-Above</option>
          </select>
        </div>
        <div class="col-sm-4">
          <label class="col-xm-12 control-label" for="familyresidentstatus">Family Resident Status</label>
          <div class="radio">
            <label>
              <input class="familResid" type="radio" name="familyresidentstatus" value="1">
              Owner
            </label>
            <label>
              <input class="familResid" type="radio" name="familyresidentstatus" value="2">
              Rental
            </label>
            <label>
              <input class="familResid" type="radio" name="familyresidentstatus" value="3">
              No Preference
            </label>
          </div>
        </div>
      </div>




      <br />

      <div class="row">
        <div class="col-sm-4">
          <label for=" drinks" class="myblock">Drinks?</label>
          <div class="radio">
            <label>
              <input class="drickCla" required="required" type="radio" name="drinks" value="1">
              No.
            </label>
            <label>
              <input class="drickCla" required="required" type="radio" name="drinks" value="2">
              Yes.
            </label>
            <label>
              <input class="drickCla" required="required" type="radio" name="drinks" value="3">
              Occasionally.
            </label>
          </div>
        </div>

        <div class="col-sm-4">
          <label for=" smoke" class="myblock">Smokes?</label>

          <div class="radio">
            <label>
              <input class="claSmok" required="required" type="radio" name="smoke" value="1">
              No.
            </label>
            <label>
              <input class="claSmok" required="required" type="radio" name="smoke" value="2">
              Yes.
            </label>
            <label>
              <input class="claSmok" required="required" type="radio" name="smoke" value="3">
              Occasionally.
            </label>
          </div>
        </div>
        <div class="col-sm-2">
          <label for="disability" class="myblock">Has Disability?</label>
          <div class="radio">
            <label>
              <input class="inputDisability" required="required" type="radio" name="disability" value="0">
              No.
            </label>
            <label>
              <input id="inputDisabilityYes" class="inputDisability" required="required" type="radio" name="disability"
              value="1">
              Yes.
            </label>
          </div>
        </div>
        <div class="col-sm-2">
          <label for="childallow" class="myblock">Children Allow</label>
          <div class="radio">
            <label class="margin-right-10">
              <input class="chilAlow" required="required" type="radio" name="childallow" value="1">
              Yes
            </label>
            <label class="margin-right-10">
              <input class="chilAlow" required="required" type="radio" name="childallow" value="2">
              No
            </label>
          </div>
        </div>

      </div>


      <br />

      <div class="row">
        @if (Auth::user()->religion == 1)
          <div class="col-sm-2">
            <label for="says_payer" class="myblock">Say Payer
            </label>
            <select name="says_payer" id="says_payer" class="form-control" required="required">
              <option value='0'>Dosen't Matter</option>
              @foreach (sayPayer() as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
          </div>
        @endif
        @if (Auth::user()->religion == 1 && Auth::user()->gender == 1)
          <div class="col-sm-4">
            <label for="wear_hijab" class="myblock">Wear Hijab
            </label>
            <div class="radio">
              <label>
                <input class="wear_hijab" required="required" type="radio" name="wear_hijab" value="0">
                No.
              </label>
              <label>
                <input id="wear_hijab" class="wear_hijab" required="required" type="radio" name="wear_hijab" value="1">
                Yes.
              </label>
            </div>
          </div>

        @endif
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

@endsection
