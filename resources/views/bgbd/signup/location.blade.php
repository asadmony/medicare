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
      </h4>
      <hr>


      <form method="POST" action="{{ route('signup.locationStore') }}" role="form">
        @csrf

        <div class="form-group row">
          <div class="col-sm-6">
            <label for="living_country" class="col-form-label">Living Country
            </label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
              <select required='required' name="living_country" id="living_country" class="uk-input">
                <option value="">Select ...</option>
                @foreach ($countries as $item)
                  <option {{ old('living_country') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                    $item-> name}}</option>
                  @endforeach
                </select>
                <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                  <span>
                    Living Country
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
                <input required='required' value="{{ old('living_city') }}" id="living_city" name="living_city"
                placeholder="Living City" class="uk-input here" type="text">
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
                      <option {{ old('immigrationstatus') == $key ? 'selected' : ''}} value="{{  $key }}">
                        {{ $value }}</option>
                      @endforeach
                    </select>
                    <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                      <span>
                        Immigration Status*
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
                        <option {{ old('growing_country') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                          $item-> name}}</option>
                        @endforeach
                      </select>
                      <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                        <span>
                          Growing up Country*
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
                      <select data-oldval="{{ old('districts') }}" name="districts" id="districts" class="uk-input"
                      required="required">
                      <option value="">Select districts ...</option>
                      @foreach ($districts as $item)
                        <option {{ old('districts') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{
                          $item-> name}}</option>
                        @endforeach
                      </select>
                      <button class="uk-button birth_day_btn uk-button-default px-0 mx-0 " type="button" tabindex="-1">
                        <span>
                          Home District
                        </span>
                        <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                      </button>

                      @if ($errors->has('districts'))
                        <span class="text-danger" role="alert">
                          <strong>{{ $errors->first('districts') }}</strong>
                        </span>
                      @endif
                      <span class="text-danger" role="alert">
                        <strong id="err_districts"></strong>
                      </span>
                    </div>
                  </div>


                  {{-- <div class="col-sm-6">
                    <label for="upzila" class=" col-form-label">Home Upzila
                    </label>
                    <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg" uk-form-custom="target: > * > span:first-child">
                      <select name="upzila" data-oldval="{{ old('upzila') }}" id="upzila" class="uk-input"
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
                        Home Upzila
                      </span>
                      <span class="uk-icon" uk-icon="icon: chevron-down"><svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down"><polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline></svg></span>
                    </button>
                    <span class="text-danger" role="alert">
                      <strong id="err_upzila"></strong>
                    </span>
                  </div>
                </div> --}}
              </div>

              <div class="form-group row">
                <div class="col-sm-3">
                  <button type="submit" id="submit" class="uk-button uk-button-block create_acc">Save and
                    Continue</button>
                  </div>
                </div>
              </form>
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
            var districts = $("select[name='districts']").val();
            var upzila = $("select[name='upzila']").val();

            if (living_country == "") {
              $("#err_living_country").text("Living Country Required");
              err++;
            }
            if (living_city == "") {
              $("#err_living_city").text("Current Living City Required");
              err++;
            }

            if (districts == "") {
              $('#err_districts').text("District  Required");
              err++;
            }
            if (upzila == "") {
              $("#err_upzila").text("Upzila Required");
              err++;
            }

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

          $('.bideshi').hide();
          $('.familylocation').hide();
          $('.familydeshi').hide();

          $('#living_country').change(function (e) {
            if ($(this).val() == 1) {

              $('.bideshi').hide('200');
              $('#immigrationstatus').removeAttr('required');
              $('#growing_country').removeAttr('required');
              $('#family_living_country').attr('required', 'required');
              $('.familylocation').show(200);
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
                  $('#upzila').html('');
                  $('#upzila').append('<option value="">Select Thana Now ...</option>')
                  $.each(data, function (i, item) {
                    $('#upzila').append("<option value='" + item.id + "'" + ">" +
                    item.name + "</option>");
                  });
                }
              });
            }
          }
        });
        </script>
      @endsection
