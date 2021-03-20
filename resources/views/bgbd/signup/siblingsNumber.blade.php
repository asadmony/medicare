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
      </h2>
      <hr>


      <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ route('signup.storeSiblingNumber') }}"
      aria-label="{{ __('Register') }}" role="form">
      @csrf

      <div class="form-group">
        <div class="col-xs-12">
          <div class="">
            <input required="required" {{ old('havesiblings') == 1 ? 'checked':'' }} type="radio" name="havesiblings"
            class="havesiblings chekhavesiblings" value="1" />
            No
            <input required="required" {{ old('havesiblings') == 2 ? 'checked':'' }} type="radio" name="havesiblings"
            class="havesiblings chekhavesiblings" value="2" id="havesiblingsId" />
            yes
            @if ($errors->has('havesiblings'))
              <br>
              <span class="text-danger" role="alert">
                <strong>{{ $errors->first('havesiblings') }}</strong>
              </span>
            @endif
          </div>
          <span class="text-danger" role="alert">
            <strong id="err_havesiblings"></strong>
          </span>
        </div>

      </div>

      <div class="row moreinfo">

        <div class="col-sm-3 ">
          <label for="brothersnumber" class="col-form-label padding-10-0 ">No. of
            Brothers {{ (Auth::user()->gender==1)?"except me":'' }}
            <br>
            <span class="text-danger" role="alert">
              <strong id="err_brothersnumber"></strong>
            </span>
          </label>
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="form-control" name="brothersnumber">
              <option value="0">None</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
              <span>
                Relativeship
              </span>
              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
            </button>
          </div>
        </div>

        <div class="col-sm-3 ">
          <label for="brothersnumber" class="col-form-label padding-10-0">Of
            whom Married
            <br>
            <span class="text-danger" role="alert">
              <strong id="err_brothersnumber"></strong>
            </span>
          </label>
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="form-control" name="brothersmarriednumber" readonly>
              <option value="0">None</option>
            </select>
            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
              <span>
                Relativeship
              </span>
              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
            </button>
          </div>
        </div>


        <div class="col-sm-3 ">
          <label for="sistersnumber" class="col-form-label padding-10-0 ">No. of
            Sisters {{ (Auth::user()->gender==2)?"except me":'' }}
            <br/>
            <span class="text-danger" role="alert">
              <strong id="err_sistersnumber"></strong>
            </span>
          </label>
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="form-control" name="sistersnumber">
              <option value="0">None</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
              <span>
                Relativeship
              </span>
              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
            </button>
          </div>
        </div>

        <div class="col-sm-3 ">
          <label for="sistersnumber" class="col-form-label padding-10-0 ">Of
            whom Married
            <br/>
            <span class="text-danger" role="alert">
              <strong id="err_sistersnumber"></strong>
            </span>
          </label>
          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
            <select class="form-control" name="sistersmarriednumber" readonly>
              <option value="0">None</option>
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
          <button type="submit" id="submit" class="uk-button uk-button-block create_acc">Save and
            Continue</button>
          </div>

        </div>
      </div>

    </form>

  </div>
</div>
</div>

<script>
$(document).ready(function() {
  //brothersnumber brothersmarriednumber
  $("body").on("change", "select[name='brothersnumber']", function(){
    var val = parseInt($(this).val());
    html = "";
    $("select[name='brothersmarriednumber']").removeAttr("readonly");

    if(val > 0){
      for(i=0; i<=val; i++){
        if(i){
          html += "<option value='"+i+"'>"+i+"</option>"
        }
        else{
          html += "<option value='"+i+"'>None</option>"
        }
      }
    }
    else{
      html = "<option value='0'>None</option>"
      $("select[name='brothersmarriednumber']").attr("readonly", "readonly");
    }
    $("select[name='brothersmarriednumber']").html(html);
  });


  $("body").on("change", "select[name='sistersnumber']", function(){
    var val = parseInt($(this).val());
    html = "";
    $("select[name='sistersmarriednumber']").removeAttr("readonly");

    if(val > 0){
      for(i=0; i<=val; i++){
        if(i){
          html += "<option value='"+i+"'>"+i+"</option>"
        }
        else{
          html += "<option value='"+i+"'>None</option>"
        }
      }
    }
    else{
      html = "<option value='0'>None</option>"
      $("select[name='sistersmarriednumber']").attr("readonly", "readonly");
    }
    $("select[name='sistersmarriednumber']").html(html);
  });
});
$(function () {
  $('.moreinfo').hide();

  changeRequired($('.havesiblings').val());

  $('.havesiblings').on('click', function () {
    changeRequired($(this).val());
  });

  function changeRequired(currentvalue) {
    if (currentvalue == 2) {
      $('.addrequired').attr('required', 'required');
      $('.moreinfo').show(300);
    } else if (currentvalue == 1) {
      $('.moreinfo').hide(300);
      $('.addrequired').removeAttr('required');
    } else {
      $('.moreinfo').hide(300);
    }
  }

  //===========================================================
  $("body").on("click", "#submit", function () {
    var err = 0;
    $("#err_havesiblings, #err_brothersnumber , #err_brothersmarriednumber , #err_sistersnumber  , #err_sistersmarriednumber" ).text("");

    var brothersnumber = $("input[name='brothersnumber']").val();
    var brothersmarriednumber = $("input[name='brothersmarriednumber']").val();
    var sistersnumber = $("input[name='sistersnumber']").val();
    var sistersmarriednumber = $("input[name='sistersmarriednumber']").val();
    //var permanentaddress = $("textarea[name='permanentaddress']").val();


    if (!$(".chekhavesiblings").is(":checked")) {
      $("#err_havesiblings").text("Do you have brothers and sisters Required");
      err++;
    }

    if($("#havesiblingsId").is(":checked")){

      if (brothersnumber == "") {
        $("#err_brothersnumber").text("Number of Brothers Required");
        err++;
      }
      if (brothersmarriednumber == "") {
        $("#err_brothersmarriednumber").text("Number of Brothers Married Required");
        err++;
      }
      if (sistersnumber == "") {
        $("#err_sistersnumber").text("Number of Sisters Required");
        err++;
      }
      if (sistersmarriednumber == "") {
        $("#err_sistersmarriednumber").text("Number of Sisters Married Required");
        err++;
      }
    }

    /*
    else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
    $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
    err++;
  }*/

  if (err > 0) {
    return false;
  }
  return true;
});
//===========================================================

});

</script>
@endsection
