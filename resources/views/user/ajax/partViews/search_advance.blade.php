<div class="box box-widget mb-0" >
    <div class="card card-nav-tabs">
        <h4 class="card-header 
        @auth
        {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}
        @else
        card-header-info
        @endauth
        "><a class="w3-text-white" href=""><i class="fa fa-search "></i> &nbsp; Advance Search </a></h4>
        <div class="card-body">
      
      
      
        <form method="get" action="{{ route('welcome.userAdvanceSearch') }}">
          {{csrf_field()}}
      
      
          <div class="row">
            <div class="form-group {{ $errors->has('gender') ? ' has-danger' : '' }} col-md-6">
                <label for="gender">I am Seeking (Gender)</label>
          
                  <select class="form-control  simple-select2 w-100" id="gender" name="gender">
          
                      <option value="">Select Gender</option>
                      {{-- @if ($u->searchTerm->gender)
                          <option selected>{{ $u->searchTerm->gender }}</option>
                      @endif --}}
          
                      @if(isset($gender))
                      <option selected>{{ $gender }}</option>
                      @endif
          
                      
                          @foreach ($userSettingFields[0]->values as $value)
                            {{-- @if ($u->searchTerm->gender != $value->title) --}}
                              <option>{{ $value->title }}</option>
                              {{-- @endif --}}
                          @endforeach
          
          
                          
                  </select>
                  
                   
          
                  @if($errors->has('gender'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('gender') }}</strong>
                  </span>
          
                  @endif
            </div>
          
            <div class="form-group col-md-6 {{ $errors->has('minimum_age') ? ' has-danger' : '' }}">
                  <label for="minimum_age">Minimum Age (Year) *</label>
                   
                  <select class="form-control  simple-select2 w-100" id="minimum_age" name="minimum_age">
          
                          <option value="">Select Minimum Age </option>
                          {{-- @if ($u->searchTerm->min_age)
                              <option selected>{{ $u->searchTerm->min_age }}</option>
                          @endif --}}
          
                          @if(isset($minimum_age))
                           <option selected>{{ $minimum_age }}</option>
                          @endif
          
                          @for ($i = 16; $i <= 60; $i++)
                              {{-- @if ($u->searchTerm->min_age != $i) --}}
                                  <option>{{ $i }}</option>
                              {{-- @endif --}}
                              
                          @endfor
                          
                  </select>
          
                  @if($errors->has('minimum_age'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('minimum_age') }}</strong>
                  </span>
          
                  @endif
            </div>
          
          
            <div class="form-group col-md-6 {{ $errors->has('maximum_age') ? ' has-danger' : '' }}" >
                <label for="maximum_age">Maximum Age *</label>
          
                  <select class="form-control  simple-select2 w-100" id="maximum_age" name="maximum_age">
          
                      <option value="">Select Maximum Age </option>
                      {{-- @if ($u->searchTerm->max_age)
                          <option selected>{{ $u->searchTerm->max_age }}</option>
                      @endif --}}
          
                      @if(isset($maximum_age))
                           <option selected>{{ $maximum_age }}</option>
                          @endif
          
                      @for ($i = 18; $i <= 80; $i++)
                          {{-- @if ($u->searchTerm->max_age != $i) --}}
                              <option>{{ $i }}</option>
                          {{-- @endif --}}
                          
                      @endfor
                          
                  </select>
                  
                   
          
                  @if($errors->has('maximum_age'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('maximum_age') }}</strong>
                  </span>
          
                  @endif
            </div>
          
          
              <div class="form-group col-md-6 {{ $errors->has('religion') ? ' has-danger' : '' }}">
                  <label for="religion">Religion</label>
          
                  <select class="form-control  simple-select2 w-100" id="religion" name="religion">
          
                      <option value="">Select Religion</option>
                      {{-- @if ($u->searchTerm->gender)
                          <option selected>{{ $u->searchTerm->gender }}</option>
                      @endif --}}
          
                      @if(isset($religion))
                      <option selected>{{ $religion }}</option>
                      @endif
          
                      
                          <option>Muslim</option>
                        <option>Hindu</option>
                        <option>Christian</option>
                        <option>Buddist</option>
                        <option>Other</option>
          
          
                          
                  </select>
                  
                   
          
                  @if($errors->has('religion'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('religion') }}</strong>
                  </span>
          
                  @endif
              </div>
          
              <div class="form-group col-md-6 {{ $errors->has('marital_status') ? ' has-danger' : '' }}" >
                  <label for="marital_status">Marital Status</label>
          
                  <select class="form-control  simple-select2 w-100" id="marital_status" name="marital_status">
          
                      <option value="">Select Marital Status</option>
                      
          
                      @if(isset($marital_status))
                      <option selected>{{ $marital_status }}</option>
                      @endif
          
                      
                        {{-- id:11, title:marital_status --}}
                      @foreach ($userSettingFields[10]->values as $value)
                        <option>{{ $value->title }}</option>
                      @endforeach 
          
          
                          
                  </select>
                  
                   
          
                  @if($errors->has('marital_status'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('marital_status') }}</strong>
                  </span>
          
                  @endif
              </div>
          
              <div class="form-group col-md-6 {{ $errors->has('location') ? ' has-danger' : '' }}">
                  <label for="location">District</label>
          
                  <select class="form-control  simple-select2 w-100" id="location" name="location">
          
                      <option value="">Select District</option>
                      
          
                      @if(isset($location))
                      <option selected>{{ $location }}</option>
                      @endif
          
                      
                        {{-- id:1, title:location --}}
                      @foreach ($userSettingFields[7]->values as $value)
                        <option>{{ $value->title }}</option>
                      @endforeach 
                        {{-- @foreach ($allDistricts as $value)
                        <option>{{ $value->name }}</option>
    
                            
                        @endforeach --}}
          
                          
                  </select>
                  
                   
          
                  @if($errors->has('location'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('location') }}</strong>
                  </span>
          
                  @endif
              </div>
          
              <div class="form-group col-md-6 {{ $errors->has('education_level') ? ' has-danger' : '' }}" >
                  <label for="education_level">Education Level</label>
          
                  <select class="form-control  simple-select2 w-100" id="education_level" name="education_level">
          
                      <option value="">Select Education Level</option>
                      
          
                      @if(isset($education_level))
                      <option selected>{{ $education_level }}</option>
                      @endif
          
                      
                      {{-- id:26, title:education_level --}}
                      @foreach ($userSettingFields[25]->values as $value)
                        <option>{{ $value->title }}</option>
                      @endforeach
                          
                  </select>
                  
                   
          
                  @if($errors->has('education_level'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('education_level') }}</strong>
                  </span>
          
                  @endif
              </div>
          
          
            <div class="form-group col-md-6 {{ $errors->has('profession') ? ' has-danger' : '' }}" >
                  <label for="profession">Profession</label>
          
                  <select class="form-control  simple-select2 w-100" id="profession" name="profession">
          
                      <option value="">Select Profession</option>
                      
          
                      @if(isset($profession))
                      <option selected>{{ $profession }}</option>
                      @endif
          
                      
                      {{-- id:27, title:profession --}}
                      @foreach ($userSettingFields[26]->values as $value)
                        <option>{{ $value->title }}</option>
                      @endforeach
                          
                  </select>
                  
                   
          
                  @if($errors->has('profession'))
          
                  <span class="help-block">
                      <strong>{{ $errors->first('profession') }}</strong>
                  </span>
          
                  @endif
              </div>
          
           
              <br>
          
            <div class=" col-md-6 pull-left">
                <button type="submit" class="btn @auth {{Auth::user()->isMale() ? 'btn-info' : 'btn-rose'}} @else btn-info @endauth">
                    Submit
                </button>
            </div>
          </div>
      
      </form>
       
        </div>
    </div>
</div>





