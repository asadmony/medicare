<form method="post" action="{{route('user.userBasicInfoPost')}}">
    {{csrf_field()}}
    <div class="box-header with-border">
        <h3 class="box-title">Basic User Information</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 mt-1">
            <div class="box box-default">
                <div class="box-body">
                    

                    <div class="form-group {{ $errors->has('full_name') ? ' has-danger' : '' }}">
                        <label for="full_name" class="w3-text-black text-bold">Full Name</label> <br>
                        <input type="text" id="full_name" 
                            class=" w3-border w-100 w3-round w3-small px-2" 
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            name="full_name"
                            value="{{$me->name}}"        
                            placeholder="Your Full Name" 
                            style="border-radius: 4px;padding-left: 8px;" 
                        />
                        @if($errors->has('full_name'))

                        <span class="help-block">
                            <strong>{{ $errors->first('full_name') }}</strong>
                        </span>

                        @endif
                    </div>

                    {{-- <div class="other-area">
                        <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
                            <label for="country" class="w3-text-black text-bold">Country</label>
                            <select class="simple-select2 w-100 change-with-other" name="country" style="width: 100%;">
                                <option></option>

                                <option selected>{{$me->country}}</option>

                                
                                @foreach ($userSettingFields[2]->values as $value)

                                @if ($me->country != $value->title)
                                <option>{{ $value->title }}</option>
                                @endif

                                @endforeach

                            </select>
                        </div>

                        <input  
                        type="text" 
                        id="country_other" 
                        class="form-control w3-border w3-border-light-gray other-value-field" 
                        name="country_other"        
                        value="{{$me->country_other ? $me->country_other : ''}}"
                        placeholder="Country Other (Please Specify here)" 


                        @if ($me->country == 'Other' || $me->country == 'Others')
                        style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                        @else
                        style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                        @endif

                        />
                    </div> --}}
                    <div class="other-area">
                    <div class="form-group {{ $errors->has('height') ? ' has-danger' : '' }}">
                        <label for="" class="w3-text-black text-bold">Height</label>
                        <select 
                        class=" w3-border w-100 w3-round w3-small px-2" 
                        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" 
                         required id="height" name="height">
                        <option value="" >Height </option>
                
                        @if (old('height'))
                        <option selected value="{{ old('height') }}">{{ old('height') }}</option>
                        @endif
                        
                        {{-- ID:15, title:Height? --}}
                        @foreach ($userSettingFields[14]->values as $value)
                          <option>{{ $value->title }}</option>
                        @endforeach
                
                      </select>
                        @if ($errors->has('height'))
                        <span class="help-block">
                            <strong>{{ $errors->first('height') }}</strong>
                        </span>
                        @else
                
                        @endif
                    </div>
                    
                    </div>

                    <div class="form-group {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
                        <label for="" class="w3-text-black text-bold">Marital Status</label>
                
                        <select 
                        class=" w3-border w-100 w3-round w3-small px-2" 
                        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                        required id="marital_status" name="marital_status">
                        <option value="">Marital Status </option>
                
                        @if (old('marital_status'))
                        <option selected value="{{ old('marital_status') }}">{{ old('marital_status') }}</option>
                        @endif
                        
                        {{-- ID:11, title:marital_status? --}}
                        @foreach ($userSettingFields[10]->values as $value)
                          <option>{{ $value->title }}</option>
                        @endforeach
                
                      </select>
                        @if ($errors->has('marital_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('marital_status') }}</strong>
                        </span>
                        @else
                
                        @endif
                    </div>

                    <div class="other-area">
                        <div class="form-group {{ $errors->has('mejor_subject') ? ' has-danger' : '' }}">
                        <label for="" class="w3-text-black text-bold"> Major Subject</label>
                        <select class="other-value-field w3-border w-100 w3-round w3-small px-2" 
                                style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"  id="mejor_subject" name="mejor_subject" autocomplete="off">
                        <option value=""> Major Subject </option>
                        @if (old('mejor_subject'))
                            <option selected value="{{ old('mejor_subject') }}">{{ old('mejor_subject') }}</option>
                        @endif
                        
                         
                        @foreach ($userSettingFields[40]->values as $value)
                          <option>{{ $value->title }}</option>
                        @endforeach
                      </select>
                        @if ($errors->has('mejor_subject'))
                        <span class="help-block">
                            <strong>{{ $errors->first('mejor_subject') }}</strong>
                        </span>
                        @else
                        {{-- <span class="help-block">mejor_subject is required</span> --}}
                        @endif
                    </div>
                    <input  
                    type="text" 
                    id="mejor_subject_other" 
                    class="form-control other-value-field" 
                    name="mejor_subject_other"        
                    value="{{old('mejor_subject_other')}}"
                    placeholder="mejor_subject Other (Please Specify here)" 
                    @if ((old('mejor_subject') == 'Other') || (old('mejor_subject') == 'Others'))
                    style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                    @else
                    style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                    @endif
                     
                    />
                    </div>


                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-3">
            
            <div class="other-area">
                <div class="form-group {{ $errors->has('skin_color') ? ' has-danger' : '' }}">
                    <label for="" class="w3-text-black text-bold">Skin Color</label>
                    
                    <select class="change-with-other w3-border w-100 w3-round w3-small px-2" 
                    style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" required id="skin_color" name="skin_color">
                    <option value="">Skin Color/Complexion </option>
            
                    @if (old('skin_color'))
                    <option selected value="{{ old('skin_color') }}">{{ old('skin_color') }}</option>
                    @endif
                    
                    {{-- ID:19, title:skin_color? --}}
                    @foreach ($userSettingFields[18]->values as $value)
                      <option>{{ $value->title }}</option>
                    @endforeach
            
                  </select>
                    @if ($errors->has('skin_color'))
                    <span class="help-block">
                        <strong>{{ $errors->first('skin_color') }}</strong>
                    </span>
                    @else
            
                    @endif
                </div>
                <input  
                title="(Please Specify here)" 
                type="text" 
                 
                class="w3-border w-100 w3-round w3-small px-2 other-value-field" 
                name="skin_color"        
                value="{{old('skin_color')}}"
                placeholder="skin color Other (Please Specify here)" 
                @if ((old('skin_color') == 'Other') || (old('skin_color') == 'Others'))
                style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                @endif
                
                />
            </div>
            
            <div class="other-area">
                <div class="form-group {{ $errors->has('education_level') ? ' has-danger' : '' }}">
                    <label for="" class="w3-text-black text-bold">Education Level</label>
                    <select class="change-with-other w3-border w-100 w3-round w3-small px-2" 
                    style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" id="education_level" name="education_level" autocomplete="off">
                    <option value="">Education Level </option>
                    @if (old('education_level'))
                        <option selected value="{{ old('education_level') }}">{{ old('education_level') }}</option>
                    @endif
                    
                    {{-- id:26, title:education_level --}}
                    @foreach ($userSettingFields[25]->values as $value)
                    <option>{{ $value->title }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('education_level'))
                    <span class="help-block">
                        <strong>{{ $errors->first('education_level') }}</strong>
                    </span>
                    @else
                    {{-- <span class="help-block">education_level is required</span> --}}
                    @endif
                </div>
                <input  
                title="Education Level Other (Please Specify here)" 
                type="text" 
                id="education_level_other" 
                class="w3-border w-100 w3-round w3-small px-2 other-value-field" 
                name="education_level_other"        
                value="{{old('education_level_other')}}"
                placeholder="Education Level Other (Please Specify here)" 
                @if ((old('education_level') == 'Other') || (old('education_level') == 'Others'))
                style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                @endif
                
                />
            </div>
            <div class="other-area">
                <div class="form-group {{ $errors->has('profession') ? ' has-danger' : '' }}">
                    <label for="" class="w3-text-black text-bold">Profession</label>
                
                <select class="change-with-other w3-border w-100 w3-round w3-small px-2" 
                style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" id="profession" name="profession" autocomplete="off">
                <option value="">Profession </option>
                @if (old('profession'))
                    <option selected value="{{ old('profession') }}">{{ old('profession') }}</option>
                @endif
                
                {{-- id:27, title:profession --}}
                @foreach ($userSettingFields[26]->values as $value)
                  <option>{{ $value->title }}</option>
                @endforeach
              </select>
                @if ($errors->has('profession'))
                <span class="help-block">
                    <strong>{{ $errors->first('profession') }}</strong>
                </span>
                @else
                {{-- <span class="help-block">profession is required</span> --}}
                @endif
            </div>
            <input  
            title="Profession Other (Please Specify here)" 
            type="text" 
            id="profession_other" 
            {{-- class="form-control other-value-field"  --}}
            class="w3-border w-100 w3-round w3-small px-2 other-value-field" 
             
            name="profession_other"        
            value="{{old('profession_other')}}"
            placeholder="Profession Other (Please Specify here)" 
            @if ((old('profession') == 'Other') || (old('profession') == 'Others'))
            style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
            @else
            style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
            @endif
             
            />
            </div>

            
            {{-- <div class="form-group label-floating {{ $errors->has('district') ? ' has-error' : '' }}">
                <label class="control-label">District</label>
          
                <select class="form-control" id="district" name="district" autocomplete="off">
              <option value="">District</option>
              @if (old('country'))
                  <option selected value="{{ old('district') }}">{{ old('district') }}</option>
              @endif
              
               
              @foreach($districts as $district)
                          <option>{{ $district->name }}</option>
                          @endforeach
            </select>
           
                @if ($errors->has('district'))
                <span class="text-red">
                    <strong>{{ $errors->first('district') }}</strong>
                </span>
          
                @endif
              </div> --}}
        </div>
    </div>
    <div class="box-header with-border">
        <h3 class="box-title">Your Partner Preference</h3>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="box box-default">
                <div class="box-body">
                    <div class="form-group label-floating {{ $errors->has('height_minimum') ? ' has-error' : '' }}">
                        <label class="w3-text-black text-bold">Min Height</label>
                                    
                            <select class=" w3-border w-100 w3-round w3-small px-2" 
                            style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" required id="height_minimum" name="height_minimum">
                    
                            @if (old('height_minimum'))
                            <option selected value="{{ old('height_minimum') }}">{{ old('height_minimum') }}</option>
                            @else
                            <option selected="" disabled="">min height</option>
                            @endif
                            
                            {{-- ID:15, title:height? --}}
                            @foreach ($userSettingFields[14]->values as $value)
                              <option>{{ $value->title }}</option>
                            @endforeach
                    
                          </select>
                            @if ($errors->has('height_minimum'))
                            <span class="help-block">
                                <strong>{{ $errors->first('height_minimum') }}</strong>
                            </span>
                            @else
                    
                            @endif
                    </div>

                    <div class="pt-1 form-group label-floating {{ $errors->has('minimum_age') ? ' has-error' : '' }}" style="width: 100%;">
                        <label for="minimum_age" class="w3-text-black text-bold">Min Age(Year)</label>
                         
                        <select required class="form-control  form-control select2"
                        class=" select2 w3-border w-100 w3-round w3-small px-2" 
                        style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                            data-placeholder="Select Option"
                        id="minimum_age" name="minimum_age">
                
                 
                                @if (old('minimum_age'))
                                    <option selected>{{ old('minimum_age') }}</option>
                                @else
                                <option selected="" disabled="">Min age</option>
                                @endif
                
                                @for ($i = 18; $i <= 60; $i++)
                 
                                        <option>{{ $i }}</option>
                 
                                    
                                @endfor
                                
                        </select>
                
                        @if($errors->has('minimum_age'))
                
                        <span class="help-block">
                            <strong>{{ $errors->first('minimum_age') }}</strong>
                        </span>
                
                        @endif
                    </div>

                    <div class="form-group label-floating {{ $errors->has('partner_marital_status') ? ' has-danger' : '' }}">
                        <label for="partner_marital_status" class="w3-text-black text-bold">Marital Status</label>
                                  
                          <select class="w3-border w-100 w3-round w3-small px-2" 
                          style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" required id="partner_marital_status" name="partner_marital_status">
                           
                  
                          @if (old('partner_marital_status'))
                          <option selected value="{{ old('partner_marital_status') }}">{{ old('partner_marital_status') }}</option>
                          @else
                          <option selected="">Marital Status</option>
                          @endif
                          
                          {{-- ID:11, title:marital_status? --}}
                          @foreach ($userSettingFields[10]->values as $value)
                            <option>{{ $value->title }}</option>
                          @endforeach
                  
                        </select>
                          @if ($errors->has('partner_marital_status'))
                          <span class="help-block">
                              <strong>{{ $errors->first('partner_marital_status') }}</strong>
                          </span>
                          @else
                  
                          @endif
                    </div>

                    <div class="other-area">
                        <div class="form-group {{ $errors->has('partner_profession') ? ' has-danger' : '' }}">
                        <label for=""  class="w3-text-black text-bold">Profession</label>
                        <select 
                        class="change-with-other w3-border w-100 w3-round w3-small px-2" 
                          style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" id="partner_profession" name="partner_profession" autocomplete="off">
                        <option value="">Profession </option>
                        @if (old('partner_profession'))
                            <option selected value="{{ old('partner_profession') }}">{{ old('partner_profession') }}</option>
                        @endif
                        
                        {{-- id:27, title:partner_profession --}}
                        @foreach ($userSettingFields[26]->values as $value)
                          <option>{{ $value->title }}</option>
                        @endforeach
                      </select>
                        @if ($errors->has('partner_profession'))
                        <span class="help-block">
                            <strong>{{ $errors->first('partner_profession') }}</strong>
                        </span>
                        @else
                        {{-- <span class="help-block">partner_profession is required</span> --}}
                        @endif
                    </div>
                    <input  
                    title="Profession Other (Please Specify here)" 
                    type="text" 
                    id="partner_profession_other" 
                    class="w3-border w-100 w3-round w3-small px-2 other-value-field" 
                    name="partner_profession_other"        
                    value="{{old('partner_profession_other')}}"
                    placeholder="Profession Other (Please Specify here)" 
                    @if ((old('partner_profession') == 'Other') || (old('partner_profession') == 'Others'))
                    style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                    @else
                    style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                    @endif
                     
                    />
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-2">
            <div class="form-group label-floating {{ $errors->has('height_maximum') ? ' has-error' : '' }}">
                <label class="w3-text-black text-bold">Max Height</label>
                            
                    <select class="change-with-other w3-border w-100 w3-round w3-small px-2" 
                    style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" required id="height_maximum" name="height_maximum">
             
            
                    @if (old('height_maximum'))
                    <option selected value="{{ old('height_maximum') }}">{{ old('height_maximum') }}</option>
                    @else
                    <option selected="" disabled="">max height</option>
                    @endif
                    
                    {{-- ID:15, title:Height? --}}
                    @foreach ($userSettingFields[14]->values as $value)
                      <option>{{ $value->title }}</option>
                    @endforeach
            
                  </select>
                    @if ($errors->has('height_maximum'))
                    <span class="help-block">
                        <strong>{{ $errors->first('height_maximum') }}</strong>
                    </span>
                    @else
            
                    @endif
            </div>
            <div class="pt-2 form-group label-floating {{ $errors->has('maximum_age') ? ' has-danger' : '' }}" style="width: 100%;">

                <label for="maximum_age" class="w3-text-black text-bold">Max Age(Year)</label>
               
                       <select required 
                       class="select2 change-with-other w3-border w-100 w3-round w3-small px-2" 
                          style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;"
                           data-placeholder="Select Option"
                       id="maximum_age" name="maximum_age">
                
                           @if (old('maximum_age'))
                               <option selected>{{ old('maximum_age') }}</option>
                           @else
                           <option selected="" >Max Age</option>
                           @endif
               
                           @for ($i = 18; $i <= 80; $i++)
                
                                   <option>{{ $i }}</option>
                
                               
                           @endfor
                               
                       </select>
                       
                        
               
                       @if($errors->has('maximum_age'))
               
                       <span class="help-block">
                           <strong>{{ $errors->first('maximum_age') }}</strong>
                       </span>
               
                       @endif
            </div>
            {{-- <div class="other-area">
                <div class="form-group {{ $errors->has('partner_country') ? ' has-danger' : '' }}">
                <label for="" class="w3-text-black text-bold">Present Country </label>
                <select class="form-control change-with-other" id="partner_country" name="partner_country" autocomplete="off">
                <option value="">Present Country </option>
                @if (old('partner_country'))
                    <option selected value="{{ old('partner_country') }}">{{ old('partner_country') }}</option>
                @endif
                
                 
                @foreach ($countries as $value)
                  <option>{{ $value->title }}</option>
                @endforeach
              </select>
                @if ($errors->has('partner_country'))
                <span class="help-block">
                    <strong>{{ $errors->first('partner_country') }}</strong>
                </span>
                @else
                
                @endif
                </div>
                <input  
                type="text" 
                id="partner_country_other" 
                class="form-control other-value-field" 
                name="partner_country_other"        
                value="{{old('partner_country_other')}}"
                placeholder="Country Other (Please Specify here)" 
                @if ((old('partner_country') == 'Other') || (old('partner_country') == 'Others'))
                style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;" 
                @else
                style="border-radius: 4px;padding-left: 8px; display: none;margin-bottom: 25px;" 
                @endif
                
                />
            </div> --}}
            <div class="form-group {{ $errors->has('partner_religion') ? ' has-danger' : '' }}">
                <label for="" class="" class="w3-text-black text-bold">Religion</label>
                <select class=" change-with-other w3-border w-100 w3-round w3-small px-2" 
                style="min-width: 190px;border: 1px solid #ccc; padding-top:6px; padding-bottom: 6px;" required id="partner_religion" name="partner_religion">
                <option value="">Religion/Community </option>
        
                @if (old('partner_religion'))
                <option selected value="{{ old('partner_religion') }}">{{ old('partner_religion') }}</option>
                @endif
                
                {{-- ID:4, title:religion/Community? --}}
                @foreach ($userSettingFields[3]->values as $value)
                  <option>{{ $value->title }}</option>
                @endforeach
        
              </select>
                @if ($errors->has('partner_religion'))
                <span class="help-block">
                    <strong>{{ $errors->first('partner_religion') }}</strong>
                </span>
                @else
        
                @endif
            </div>
            
        </div>
    </div>
    <button type="submit" class="btn btn-danger">Submit</button>
</form>