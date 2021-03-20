@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
  <div class="profileSection">
    <div class="container" style="background: #FFF; margin-top: 30px;">>
      <div class="row">
        <div class="col-sm-12 m-b-100">
          <div class="profileContent">
            <div class="container-fluid">
              <div class="titleHeader">
                <h4>
                  {{ $editTitle }}
                </h4>

                <form class="padding-0-30 margin-bottom-20" method="POST" action="{{ $formAction }}" role="form">
                  @csrf
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="siblingposition" class="col-form-label">Brother/Sister Position</label>
                      <input class="form-control" type="number" name="siblingposition" id="siblingposition" value="{{ old('siblingposition') }}">
                      <span class="text-danger" role="alert">
                        <strong id="err_siblingposition"></strong>
                      </span>
                    </div>
                    <div class="col-md-6">
                      <label for="gender" class=" col-form-label">&nbsp;</label>
                      <div class="">
                        <div class="radio">
                          <label>
                            <input class="gendercheck" {{ 1 == old('gender') ? 'checked' : '' }} type="radio" name="gender" id="gender"
                            value="1">
                            Brother
                          </label>
                          <label>
                            <input class="gendercheck" {{ 2 == old('gender') ? 'checked' : '' }} type="radio" name="gender" id="gender"
                            value="2">
                            Sister
                          </label>
                        </div>

                        @if ($errors->has('gender'))
                          <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                          </span>
                        @endif
                        <span class="text-danger" role="alert">
                          <strong id="err_gender"></strong>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">

                    <div class="col-md-6">
                      <label for="sibling_living" class=" col-form-label">Living Status
                      </label>
                      <div class="">
                        <input {{ 1 == old('sibling_living') ? 'checked' : '' }} type="radio" name="sibling_living"
                        id="sibling_living1" value="1" class="liveStatusClass livCheck" />
                        Alive
                        <input {{ 2 == old('sibling_living') ? 'checked' : '' }} type="radio" name="sibling_living"
                        id="sibling_living" value="2" class="liveStatusClass livCheck" />
                        Passed
                        Away
                        @if ($errors->has('sibling_living'))
                          <br>
                          <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('sibling_living') }}</strong>
                          </span>
                        @endif
                        <br>
                        <span class="text-danger" role="alert">
                          <strong id="err_sibling_living"></strong>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="marital_status" class="col-form-label">Marital Status
                      </label>
                      <div class="">
                        <input {{ 1 == old('marital_status') ? 'checked' : '' }} type="radio" name="marital_status"
                        class="marital_status maritStaCheck" id="marital_status1" value="1" />
                        Married
                        <input {{ 2 == old('marital_status') ? 'checked' : '' }} type="radio" name="marital_status"
                        class="marital_status maritStaCheck" value="2" />
                        Not
                        Married
                        @if ($errors->has('marital_status'))
                          <br>
                          <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('marital_status') }}</strong>
                          </span>
                        @endif
                        <br>
                        <span class="text-danger" role="alert">
                          <strong id="err_marital_status"></strong>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div id="liveStatusToLinkRelProfessionId" style="display:none">
                    <div class="form-group row">
                      <!---liveStatusToLinkRelProfessionId-->
                      <div class="col-md-6">
                        <label for="sibling_profession" class="col-form-label">Brother's / Sister's Profession
                        </label>
                        <div class="">
                          <select name="sibling_profession" id="sibling_profession" class="form-control">
                            <option value="0">Select One</option>
                            @foreach (professionType() as $key=>$item)
                              <option {{ old('sibling_profession') == $key ?'selected': '' }}  value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                          </select>
                          @if ($errors->has('sibling_profession'))
                            <br>
                            <span class="text-danger" role="alert">
                              <strong>{{ $errors->first('sibling_profession') }}</strong>
                            </span>
                          @endif
                          <br>
                          <span class="text-danger" role="alert">
                            <strong id="err_sibling_profession"></strong>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-6 bs_profe">
                        <label for="fdesignation" class=" col-form-label">Brother's / Sister's Profession Details</label>
                        <div class="">
                          <input  value="{{ old('profesion_details') }}"  name="profesion_details"
                          placeholder="Profession Details" class="form-control here" type="text">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!---liveStatusToLinkRelProfessionId-->
                  <div class="spouse-infos">
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label for="sibling_spouse_living" class=" col-form-label">Brother's / Sister
                          's Spouse Living Status*
                        </label>
                        <div class="">
                          <input {{ 1 == old('sibling_spouse_living') ? 'checked' : '' }} type="radio" name="sibling_spouse_living"
                          id="sibling_spouse_living1" value="1" class="liveStatusClassRS" />
                          Alive
                          <input {{ 2 == old('sibling_spouse_living') ? 'checked' : '' }} type="radio" name="sibling_spouse_living"
                          id="sibling_spouse_living" value="2" class="liveStatusClassRS" />
                          Passed Away
                          @if ($errors->has('sibling_spouse_living'))
                            <br>
                            <span class="text-danger" role="alert">
                              <strong>{{ $errors->first('sibling_spouse_living') }}</strong>
                            </span>
                          @endif
                        </div>
                      </div>
                    </div>
                    <div id="liveStatusToLinkRelProfessionIdRS" style="display:none">
                      <!---liveStatusToLinkRelProfessionIdRS-->
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label for="sibling_spouse_profession" class=" col-form-label">Brother's / Sister
                            's Spouse Profession
                          </label>
                          <div class="">
                            <select name="sibling_spouse_profession" id="sibling_spouse_profession" class="form-control">
                              <option value="">Select One</option>
                              @foreach (professionType() as $key=>$item)
                                <option {{ old('sibling_spouse_profession') == $key ?'selected':'' }}  value="{{ $key }}">{{ $item }}</option>
                              @endforeach
                            </select>
                            @if ($errors->has('sibling_spouse_profession'))
                              <br>
                              <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('sibling_spouse_profession') }}</strong>
                              </span>
                            @endif
                          </div>
                        </div>
                        <div class="col-md-6 spouse_profe">
                          <label for="fdesignation" class=" col-form-label">Brother's / Sister's Spouse Profession Details</label>
                          <div class="">
                            <input  value="{{ old('spouse_profesion_details') }}"  name="spouse_profesion_details"
                            placeholder="Profession Details" class="form-control here" type="text">
                          </div>
                        </div>
                      </div>
                      <!--relativeSpouseProfession Div --->
                    </div>
                    <!---liveStatusToLinkRelProfessionIdRS-->
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


    <script type="text/javascript">
    $(document).ready(function() {
      $("#sibling_profession").change(function(event) {
        var fids  = parseInt($(this).val());
        if(fids == 14 || fids == 16){
          $('.bs_profe').hide();
        }
        else{
          $('.bs_profe').show();
        }
      });

      $("#sibling_spouse_profession").change(function(event) {
        var mids  = parseInt($(this).val());
        if(mids == 14 || mids == 16){
          $('.spouse_profe').hide();
        }
        else{
          $('.spouse_profe').show();
        }
      });
    });
    </script>
  @endsection


  @section('footerscript')
    @include('sections.javascripts.signupsiblings')
  @endsection
