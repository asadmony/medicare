@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
  <div class="container">
    <div class="row">
      <div class="col-sm-12 m-b-100" style="background: #FFF; margin-top: 30px;">
        <h4>{{ $editTitle }}</h4>
        <hr>
        <form class="myregisterform" style="" method="POST" action="{{ route('users.profile.religion.update') }}" aria-label="{{ __('Register') }}"
        role="form">
        @csrf


        <input value="{{ old('hiddendob') }}" type="hidden" id="hiddendob" class="" name="hiddendob">
        <div class="form-group row">
          <div class="col-sm-3">
            <label for="religion" class="col-form-label">Religion*</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select required='required' name="religion" id="religion" class="uk-input">
              @foreach (religion() as $key => $value)
                <option {{  Auth::user()->religion == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
          </div>
          </div>
          <div class="col-sm-3">
            <label for="subrel" class="col-form-label">Caste*</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select required='required' name="religion_section" id="subrel" class="uk-input">
              @foreach (subReligion(Auth::user()->religion, null) as $key => $value)
                <option {{ Auth::user()->religion_section == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
              @endforeach
            </select>
            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
              <span>
                Relativeship
              </span>
              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
            </button>
            @if ($errors->has('subrel'))
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('subrel') }}</strong>
              </span>
            @endif
            <span class="text-danger" role="alert">
              <strong id="err_subrel"></strong>
            </span>
          </div>
          </div>
          <div class="col-sm-3">
            <label for="">Diet</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="diet_type">
              @foreach (diet() as $key => $value)
                <option {{  Auth::user()->diet_type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
            <label for="">Mother Tongue</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="language">
              @foreach (motherTongue() as $key => $value)
                <option {{  Auth::user()->language == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
        <br />

        <div class="form-group row">
          <div class="col-sm-3">
            <label for="">Sun Sign</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="sun_sign">
              @foreach (sunsign() as $key => $value)
                <option {{  Auth::user()->sun_sign == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
            <label for="">Hobby</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="hobby">
              @foreach (hobbyType() as $key => $value)
                <option {{  Auth::user()->hobby == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
            <label for="">Drink</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="drink">
              @foreach (drink() as $key => $value)
                <option {{  Auth::user()->drink == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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
            <label for="">Smoke</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="uk-input" name="smoke">
              @foreach (smoke() as $key => $value)
                <option {{  Auth::user()->smoke == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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

        <br />
        <div class="form-group row">
          <div class="col-sm-3">
            <button type="submit" id="submit" class="uk-button uk-button-block create_acc">
              Update
            </button>
          </div>                  
        </div>

        </form>

      </div>
      <div class="col-md-2 col-sm-12 padding-0 margin-0"></div>
    </div>
  </div>


  <script>
  $(document).ready(function () {
    $('#religion').on('change', function () {
      $('#subrel').children().remove();
      if($(this).val() == 1 ){
        @foreach (subMuslim() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
        @endforeach

      }
      if($(this).val() == 2 ){
        @foreach (subHindu() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
        @endforeach
      }
      if($(this).val() == 3 ){
        @foreach (subBuddhist() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
        @endforeach
      }
      if($(this).val() == 4 ){
        @foreach (subChristian() as $key => $value)
        $('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
        @endforeach
      }
      if($(this).val() == 5 ){
        $('#subrel').children().remove();
        $('#subrel').append('<option selected value="1">Others</option>');
      }
    });












    /* Form Validation */
    $("body").on("click", "#sign-up", function () {
      var err = 0;
      $(
        "#err_profilemadeby, #err_lookingfor, #err_fname , #err_lname, #err_year, #err_month , #err_date, #err_religion, #err_describe, #err_email ,#err_mobile , #err_password , #err_password_confirmation , #err_trueinfo "
      ).text("");

      var profilemadeby = $("select[name='profilemadeby']").val();
      var lookingfor = $("select[name='lookingfor']").val();
      var fname = $("input[name='fname']").val();
      var lname = $("input[name='lname']").val();
      var year = $("select[name='year']").val();
      var month = $("select[name='month']").val();
      var date = $("select[name='date']").val();
      var religion = $("select[name='religion']").val();
      var religion = $("select[name='subrel']").val();
      var describe = $("textarea[name='describe']").val();
      var email = $("input[name='email']").val();
      var mobile = $("input[name='mobile']").val();
      var password = $("input[name='password']").val();
      var password_confirmation = $("input[name='password_confirmation']").val();
      // var trueinfo = $("input[name='trueinfo']").val(); no need


      if (profilemadeby == "") {
        $("#err_profilemadeby").text("Profile Made by Required");
        err++;
      }
      if (lookingfor == "") {
        $("#err_lookingfor").text("Looking for Required");
        err++;
      }

      if (fname == "") {
        $("#err_fname").text("First Name Required");
        err++;
      } else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
        $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
        err++;
      }
      if (lname == "") {
        $("#err_lname").text("Last Name Required");
        err++;
      }

      if (year == "") {
        $('#err_year').text("Year  Required");
        err++;
      }
      if (month == "") {
        $("#err_month").text("Month Required");
        err++;
      }
      if (date == "") {
        $("#err_date").text("Date Required");
        err++;
      }
      if (religion == "") {
        $("#err_religion").text("Religion is Required");
        err++;
      }
      if (describe == "") {
        $("#err_describe").text("Describe Yourself is Required");
        err++;
      }
      if (email == "") {
        $("#err_email").text("Email is Required");
        err++;
      }
      if (mobile == "") {
        $("#err_mobile").text("Candidate Phone No is Required");
        err++;
      }
      if (subrel == "") {
        $("#err_subrel").text("Candidate Phone No is Required");
        err++;
      }
      if (password == "") {
        $("#err_password").text("Password is Required");
        err++;
      } else if (password_confirmation == "") {
        $("#err_password_confirmation").text("Confirm Password is Required");
        err++;
      } else if (password != password_confirmation) {
        $("#err_password").text("Password and Confirm Password is not match!");
      }

      if (!$("#trueinfo").is(":checked")) {
        $("#err_trueinfo").text("I declare that is Required");
        err++;
      }
      var currentDate = String(year + '-' + month + '-' + date);
      var valdiateDate = moment(currentDate, 'YYYY-MM-DD').isValid();

      console.log(currentDate);

      if (valdiateDate === true) {
        $("#err_date_false").text("");
        $('#hiddendob').val(currentDate);
      } else {
        err++;
        $("#err_date_false").text("The date of birth is invalid. Please correct it.");
        $("#hiddendob").val("");
      }


      if (err > 0) {
        return false;
      }
      return true;
    });
  });

  </script>
@endsection
