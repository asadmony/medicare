@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
  <div class="profileSection">
    <div class="container m-t-15">
      <div class="row">
        
        <div class="col-sm-12 m-b-100">
          <div class="profileContent">
            <div class="container-fluid">
              <div class="titleHeader">
                <h4>
                  {{ $editTitle }}
                </h4>
                <hr />
                <form  class="padding-0-30 margin-bottom-20" method="POST" action="{{ $formAction }}"
                role="form">
                @csrf

                <div class="mylocation">
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="living_country" class="col-form-label">Living Country
                      </label>
                      <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                        <select required='required' name="living_country" id="living_country" class="uk-input">
                          <option value="">Select ...</option>
                          @foreach ($countries as $item)
                            <option {{ Auth::user()->location_living_country == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                              $item-> name}}</option>
                            @endforeach
                          </select>
                          <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                            <span>
                              Relativeship
                            </span>
                            <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                          </button>
                          @if ($errors->has('living_country'))
                            <span class="text-danger" role="alert">
                              <strong>{{ $errors->first('living_country') }}</strong>
                            </span>
                          @endif
                          <span class="text-danger" role="alert">
                            <strong id="err_living_country"></strong>
                          </span>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <label for="living_city" class=" col-form-label">Current Living City*
                        </label>
                        <div class="">
                          <input required='required' value="{{ Auth::user()->location_living_city }}" id="living_city" name="living_city"
                          class="uk-input here" type="text">
                          @if ($errors->has('living_city'))
                            <span class="text-danger" role="alert">
                              <strong>{{ $errors->first('living_city') }}</strong>
                            </span>
                          @endif
                          <span class="text-danger" role="alert">
                            <strong id="err_living_city"></strong>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row bideshi" style="display: none">
                      <div class="col-sm-6">
                        <div>
                          <label for="immigrationstatus" class="col-form-label margin-right-50">Immigration
                            Status*</label>
                          </div>
                          <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                          <select name="immigrationstatus" id="immigrationstatus" class="uk-input">
                            <option value="">Select ...</option>
                            @foreach (immigrationStatus() as $key=>$value)
                              <option {{ Auth::user()->location_immigration_status == $key ? 'selected' : ''}} value="{{  $key }}">
                                {{ $value }}</option>
                              @endforeach
                            </select>
                            <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                              <span>
                                Relativeship
                              </span>
                              <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                            </button>
                            @if ($errors->has('immigrationstatus'))
                              <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('immigrationstatus') }}</strong>
                              </span>
                            @endif
                            <span class="text-danger" role="alert">
                              <strong id="err_immigrationstatus"></strong>
                            </span>

                          </div>
                          </div>
                          <div class="col-sm-6">
                            <label for="growing_country" class="col-form-label">Growing up Country*
                            </label>
                            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                              <select name="growing_country" id="growing_country" class="uk-input">
                                <option value="">Select ...</option>
                                @foreach ($countries as $item)
                                  <option {{ Auth::user()->location_growing_up_country == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                    $item-> name}}</option>
                                  @endforeach
                                </select>
                                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                  <span>
                                    Relativeship
                                  </span>
                                  <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                                </button>
                                @if ($errors->has('growing_country'))
                                  <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('growing_country') }}</strong>
                                  </span>
                                @endif
                                <span class="text-danger" role="alert">
                                  <strong id="err_growing_country"></strong>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class="form-group row">

                            <div class="col-sm-6">
                              <label for="districts" class=" col-form-label">Home District
                              </label>
                              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                              <select data-oldval="{{ Auth::user()->location_district }}" name="districts" id="districts" class="uk-input"
                                required="required">
                                <option value="">Select districts ...</option>
                                @foreach ($districts as $item)
                                  <option {{ Auth::user()->location_district == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                                    $item-> name}}</option>
                                  @endforeach
                                </select>

                                @if ($errors->has('districts'))
                                  <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('districts') }}</strong>
                                  </span>
                                @endif
                                <span class="text-danger" role="alert">
                                  <strong id="err_districts"></strong>
                                </span>
                              </select>
                              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                <span>
                                  Relativeship
                                </span>
                                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                              </button>
                            </div>
                            </div>


                            {{-- <div class="col-sm-6">
                              <label for="upzila" class=" col-form-label">Home Upzila
                              </label>
                              <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                              <select name="upzila" data-oldval="{{ Auth::user()->location_upzila }}" id="upzila" class="uk-input"
                                >
                                <option value="">Select a District First ...</option>

                                @if ($errors->has('upzila'))
                                  <span class="text-danger" role="alert">
                                    <strong>{{ $errors->first('upzila') }}</strong>
                                  </span>
                                @endif
                              </select>
                              <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                                <span>
                                  Relativeship
                                </span>
                                <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                              </button>
                              <span class="text-danger" role="alert">
                                <strong id="err_upzila"></strong>
                              </span>
                            </div>
                            </div> --}}
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
        $(function () {
          //---------------------------------------------------------------------
          $("body").on("click", "#submit", function () {
            var err = 0;
            $("#err_living_country, #err_living_city  , #err_districts , #err_upzila ").text("");

            var living_country = $("select[name='living_country']").val();
            var living_city = $("input[name='living_city']").val();
            // var immigrationstatus = $("select[name='immigrationstatus']").val();
            // var growing_country = $("select[name='growing_country']").val();
            var districts = $("select[name='districts']").val();
            var upzila = $("select[name='upzila']").val();
            //var family_living_country = $("select[name='family_living_country']").val();//
            //var family_districts = $("select[name='family_districts']").val();//
            //var family_living_area = $("input[name='family_living_area']").val();
            //var family_zip_code = $("input[name='family_zip_code']").val();
            //var family_residential_status = $("input[name='family_residential_status']").val();     //...checked..


            if (living_country == "") {
              $("#err_living_country").text("Living Country Required");
              err++;
            }
            if (living_city == "") {
              $("#err_living_city").text("Current Living City Required");
              err++;
            }
            /*
            if (immigrationstatus == "") {
            $("#err_immigrationstatus").text("Immigration Status Required");
            err++;
          }

          else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
          $("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
          err++;
        }
        if (growing_country == "") {
        $("#err_growing_country").text("Growing up Country Required");
        err++;
      }*/
      if (districts == "") {
        $('#err_districts').text("District  Required");
        err++;
      }
      if (upzila == "") {
        $("#err_upzila").text("Upzila Required");
        err++;
      }
      /*
      if (family_living_country == "") {
      $("#err_family_living_country").text("Family Living Country Required");
      err++;
    }
    if (family_districts == "") {
    $("#err_family_districts").text("District of Family Residence Required");
    err++;
  }
  if (family_living_area == "") {
  $("#err_family_living_area").text("Family Living Area Required");
  err++;
}//////
if (family_zip_code == "") {
$("#err_family_zip_code").text("Zip Ccode Required");
err++;
}
/*
if (family_residential_status == "") {
$("#err_family_residential_status").text("Residential Status Required");
err++;
}*/

if (err > 0) {
  return false;
}
return true;
});


//---------------------------------------------------------------------

getUpzilla($("#districts").val());

$('#districts').change(function (e) {
  getUpzilla($("#districts").val());
});



@php
if (Auth::user()->location_living_country == 1) {
  echo "$('.bideshi').hide();";
  echo "$('.familylocation').show();";
}
else{
  echo "$('.bideshi').show();";
  echo "$('.familylocation').hide();";
}
if(Auth::user()->location_family_living_country == 1){
  echo "$('.familydeshi').show();";
}
else{
  echo "$('.familydeshi').hide();";
}
@endphp

$('#living_country').change(function (e) {
  if ($(this).val() == 1) {
    $('.bideshi').hide('200');
    $('#immigrationstatus').removeAttr('required');
    $('#growing_country').removeAttr('required');
    $('#family_living_country').attr('required', 'required');
    $('.familylocation').show(200);
    $('.familydeshi').show(200);
    $('#family_living_country').val('');

  } else {
    $('.bideshi').show('200');
    $('#immigrationstatus').attr('required', 'required');
    $('#growing_country').attr('required', 'required');
    $('#family_living_country').val('');
    $('#family_living_country').removeAttr('required');
    $('.familylocation').hide(300);
    $('.familydeshi').hide(200);
    $('.addrequired').removeAttr('required');
  }
});

$('#family_living_country').change(function (e) {
  if ($(this).val() == 1) {
    $('.familydeshi').show(200);
    $('.addrequired').attr('required', 'required');

  } else {
    $('.familydeshi').hide(200);
    $('.addrequired').removeAttr('required');


  }

});

function getUpzilla(district_id) {
  if (district_id > 0) {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      /* the route pointing to the post function */
      url: "{{ route('signup.locationAjax.upzila') }}",
      type: 'POST',
      /* send the csrf-token and the input to the controller */
      data: {
        _token: CSRF_TOKEN,
        districtid: district_id
      },
      dataType: 'JSON',
      /* remind that 'data' is the response of the AjaxController */
      success: function (data) {
        $('#upzila').html("");
        $.each(data, function (i, item) {
          if (item.id == <?php echo Auth::user()->location_upzila ?>) {
            $('#upzila').append("<option selected value='" + item.id + "'" + ">" + item.name + "</option>");
          }
          else{
            $('#upzila').append("<option value='" + item.id + "'" + ">" + item.name + "</option>");
          }
        });
      }
    });
  }
}


});



</script>
@endsection
