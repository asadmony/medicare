<div class="w3-container">
              <h4 style="text-align: center; color:#333">Registration</h4>
            </div>
            <form method="POST" action="{{ route('signupPost') }}" class="w3-container" style="padding: 0 !important;">
              @csrf
              {{-- Start --}}
              <select required='required' name="created_by" id="profilemadeby" class="w3-input w3-border w3-round-small" style="padding: 4px !important;">
                <option selected value="">Profile Created by*</option>
                @foreach (profileMadeBy() as $key => $value)
                  <option {{ old('profilemadeby') == $value ? 'selected' : '' }} value="{{ $value }}">
                    {{  $value }}
                  </option>
                @endforeach
              </select>
              {{-- End --}}

              {{-- input field --}}
              <input required class="w3-input w3-border w3-round-small mt-2" name="mobile" value="{{old('mobile')}}" style="padding: 4px !important;" type="text" placeholder="Mobile Number" >
              @if ($errors->has('mobile'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                  </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_mobile"></strong>
                </span>
              <input required class="w3-input w3-border w3-round-small mt-2" name="email" style="padding: 4px !important;" type="email" placeholder="Email ID" value="{{old('email')}}">
              @if ($errors->has('email'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_email"></strong>
                </span>

              <div class="w3-row">
                <input required class="w3-input w3-border w3-round-small w3-half mt-2" name="password" style="padding: 4px !important;" type="password" placeholder="Password">

              <input required class="w3-input w3-border w3-round-small w3-half mt-2" name="password_confirmation" style="padding: 4px !important;" type="password" placeholder="Confirm Password">
              </div>
              {{-- end --}}

              <div class="w3-row">
                {{-- Gender Start --}}
              <select required='required' name="gender" id="lookingfor" class="mt-2 w3-half w3-input w3-border w3-round-small mt-2 mb-2" style="padding: 4px !important;">
                <option selected value="">Gender*</option>
                  @foreach (gender() as $key => $value)
                    <option {{ old('lookingfor') == $value ? 'selected' : '' }} value="{{ $value }}">
                      {{  $value }}
                    </option>
                  @endforeach
              </select>
              @if ($errors->has('lookingfor'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('lookingfor') }}</strong>
                  </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_lookingfor"></strong>
                </span>
              {{-- Gender end --}}

              {{-- region start --}}
              <select required='required' name="religion" id="religion" class="mt-2 w3-half w3-input w3-border w3-round-small mt-2 mb-2" style="padding: 4px !important;">
                <option selected value="">Religion*</option>
                @foreach (religion() as $key => $value)
                  <option {{ old('religion') == $value ? 'selected' : '' }} value="{{ $value }}">{{ $value }}</option>
                @endforeach
              </select> 

              @if ($errors->has('religion'))
                <span class="text-danger" role="alert">
                  <strong>{{ $errors->first('religion') }}</strong>
                </span>
              @endif
              <span class="text-danger" role="alert">
                <strong id="err_religion"></strong>
              </span>
              {{-- religion end --}}
              </div>

              {{-- dob --}}
              <span class="badge badge-default">Date of Birth</span>
              <div class="w3-row"  title="date of birth">
                <select required='required' name="day" class="w3-input w3-border w3-round-small w3-third mt-2">
                  <option>Day</option>
                  @for ($i = 1; $i <= 31; $i++)
                      <option>{{ $i }}</option>
                  @endfor
                </select>             
                <select required='required' name="month" class="w3-input w3-border w3-round-small w3-third mt-2">
                  <option value="">Month</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">Jun</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                
                <select required='required' name="year" class="w3-input w3-border w3-round-small w3-third mt-2">
                  <option value="">Year</option>
                  @for ($i = date('Y') -17; $i >= date('Y') - 60; $i--)
                      <option>{{ $i }}</option>
                  @endfor
                </select>
              </div>

              {{-- end --}}

              {{-- button --}}
              <button class="uk-button uk-button-block create_acc mt-4" id="sign-up" style="margin-top: 8px !important;">Create</button>
              {{-- btn end --}}
            </form>