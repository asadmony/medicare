@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
<div class="container">
  <div class="row">
    <div class="col-sm-12 m-b-100" style="background: #FFF; margin-top: 30px;">
      <h4>{{ $editTitle }}</h4>
      <hr>

      <form class="myregisterform" style="" method="POST" action="{{ route('users.profile.religion_activity.update') }}"
        aria-label="{{ __('Register') }}" role="form">
        @csrf


        <input value="{{ old('hiddendob') }}" type="hidden" id="hiddendob" class="" name="hiddendob">
        <div class="form-group row">
          <div class="col-sm-3">
            <label for="is_religious" class="col-form-label">Religious Type*</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
              uk-form-custom="target: > * > span:first-child">
              <select required='required' name="is_religious" class="uk-input">
                @foreach (religionType() as $key => $value)
                <option {{  Auth::user()->is_religious == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}
                </option>
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
            <label for="says_payer" class="col-form-label">Offen you Say Prayer*</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
              uk-form-custom="target: > * > span:first-child">
              <select required='required' name="says_payer" class="uk-input">
                @foreach (sayPayer() as $key => $value)
                <option {{  Auth::user()->says_payer == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}
                </option>
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
          @if (Auth::user()->gender == 2)
          <div class="col-sm-3">
            <label for="wear_hijab" class="col-form-label">Offen you Say Prayer*</label>
            <select required='required' name="wear_hijab" class="uk-input">
              @foreach (wearHijab() as $key => $value)
              <option {{  Auth::user()->wear_hijab == $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>
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

          <div class="col-sm-3">
            <label for="wear_hijab_after_marriage" class="col-form-label">Offen you Say Prayer*</label>
            <div class="uk-form-controls religion_caste_lg uk-form-custom uk-form-controls-lg"
              uk-form-custom="target: > * > span:first-child">
              <select required='required' name="wear_hijab_after_marriage" class="uk-input">
                @foreach (afterMarriage() as $key => $value)
                <option {{  Auth::user()->wear_hijab_after_marriage == $key ? 'selected' : '' }} value="{{ $key }}">
                  {{ $value }}</option>
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
          @endif

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
  </div>
</div>

@endsection