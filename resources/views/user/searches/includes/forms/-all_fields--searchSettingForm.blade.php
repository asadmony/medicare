<form method="post" class="form-user-setting" action="{{route('user.settingSearchTermPost')}}">
    {{csrf_field()}}

 

            <div class="w3-border w3-border-purple w3-round w3-white">
                        <div class="w3-container w3-padding">

            <div class="row">
                <div class="col-sm-3">


                    <div class="form-group {{ $errors->has('minimum_age') ? ' has-danger' : '' }}" style="width: 100%;">
        <label for="minimum_age">Minimum Age (Year) *</label>
         
        <select class="form-control  simple-select2 w-100" id="minimum_age" name="minimum_age">

                <option value="">Select Minimum Age </option>
                @if ($me->searchTerm->min_age)
                    <option selected>{{ $me->searchTerm->min_age }}</option>
                @endif

                @for ($i = 18; $i <= 60; $i++)
                    @if ($me->searchTerm->min_age != $i)
                        <option>{{ $i }}</option>
                    @endif
                    
                @endfor
                
        </select>

        @if($errors->has('minimum_age'))

        <span class="help-block">
            <strong>{{ $errors->first('minimum_age') }}</strong>
        </span>

        @endif
    </div>



    <div class="form-group {{ $errors->has('maximum_age') ? ' has-danger' : '' }}" style="width: 100%;">
        <label for="maximum_age">Maximum Age *</label>

        <select class="form-control  simple-select2 w-100" id="maximum_age" name="maximum_age">

            <option value="">Select Maximum Age </option>
            @if ($me->searchTerm->max_age)
                <option selected>{{ $me->searchTerm->max_age }}</option>
            @endif

            @for ($i = 18; $i <= 80; $i++)
                @if ($me->searchTerm->max_age != $i)
                    <option>{{ $i }}</option>
                @endif
                
            @endfor
                
        </select>
        
         

        @if($errors->has('maximum_age'))

        <span class="help-block">
            <strong>{{ $errors->first('maximum_age') }}</strong>
        </span>

        @endif
    </div>


                </div>
                <div class="col-sm-3">

    <div class="form-group {{ $errors->has('minimum_height') ? ' has-danger' : '' }}">
        <label for="minimum_height">Minimum Height *</label>
        <select class="simple-select2 w-100" name="minimum_height" style="width: 100%;">
            <option></option>
            @if($me->searchTerm->min_height)
            <option selected>{{$me->searchTerm->min_height}}</option>
            @endif
            {{-- ID: 15     My Height --}}
            @foreach ($userSettingFields[14]->values as $value)
            @if($me->searchTerm)
            @if ($me->searchTerm->min_height != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('maximum_height') ? ' has-danger' : '' }}">
        <label for="maximum_height">Maximum Height *</label>
        <select class="simple-select2 w-100" name="maximum_height" style="width: 100%;">
            <option></option>
            @if($me->searchTerm->max_height)
            <option selected>{{$me->searchTerm->max_height}}</option>
            @endif
            {{-- ID: 15     My Height --}}
            @foreach ($userSettingFields[14]->values as $value)
            @if($me->searchTerm)
            @if ($me->searchTerm->max_height != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>
                    



                </div>
                <div class="col-sm-3">
                    

<div class="form-group {{ $errors->has('marital_status') ? ' has-danger' : '' }}">
        <label for="marital_status">Marital Status *</label>
        <select class="simple-select2 w-100" name="marital_status" style="width: 100%;">
            
            <option></option>
            @if($me->searchTerm->marital_status)
            <option selected>{{$me->searchTerm->marital_status}}</option>
            @endif
            {{-- ID: 11     Marital Status --}}
            @foreach ($userSettingFields[10]->values as $value)
            @if($me->searchTerm)
            @if ($me->searchTerm->marital_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('do_u_have_children') ? ' has-danger' : '' }}">
        <label for="do_u_have_children">Have children?</label>
        <select class="simple-select2 w-100" name="do_u_have_children" style="width: 100%;">
            <option></option>
            @if($me->searchTerm->do_u_have_children)
            <option selected>{{$me->searchTerm->do_u_have_children}}</option>
            @endif
            {{-- ID: 13     Do you have children? --}}
            @foreach ($userSettingFields[12]->values as $value)
            @if($me->searchTerm)
            @if ($me->searchTerm->do_u_have_children != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>



                </div>
                <div class="col-sm-3">
                    


                    <div class="form-group {{ $errors->has('religion') ? ' has-danger' : '' }}">
                        <label for="religion">Religion/Community</label>
                        <select class="simple-select2 w-100" name="religion" style="width: 100%;">

                            <option></option>

                            @if($me->searchTerm->religion)
                            <option selected>{{$me->searchTerm->religion}}</option>
                            @endif

                            {{-- ID: 4   Religion --}}
                            @foreach ($userSettingFields[3]->values as $value)

                            @if ($me->searchTerm->religion != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('social_order') ? ' has-danger' : '' }}">
                        <label for="social_order">Caste/Social Order</label>
                        <select class="simple-select2 w-100" name="social_order" style="width: 100%;"> 

                            <option></option> 
                            @if($me->searchTerm->social_order)
                            <option selected>{{$me->searchTerm->social_order}}</option>
                            @endif 
                            {{-- ID: 29   social order --}}
                            @foreach ($userSettingFields[28]->values as $value)   
                            @if ($me->searchTerm->social_order != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>




                </div>
            </div>
        </div>
    </div>



    <br>

<div class="w3-border w3-border-purple w3-round w3-white">
    <div class="w3-container w3-padding">


<div class="row">
    <div class="col-sm-3">



        <!-- skin color -->

        <div class="form-group {{ $errors->has('skin_color') ? ' has-danger' : '' }}">
                        <label for="skin_color">Skin Color</label>
                        <select class="simple-select2 w-100" name="skin_color" style="width: 100%;"> 

                            <option></option> 
                            @if($me->searchTerm->skin_color)
                            <option selected>{{$me->searchTerm->skin_color}}</option>
                            @endif 
                            {{-- ID: 19   skin_color --}}
                            @foreach ($userSettingFields[18]->values as $value)   
                            @if ($me->searchTerm->skin_color != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>






        
    </div>
    <div class="col-sm-3">
        
    <!-- body type  -->

        <div class="form-group {{ $errors->has('body_build') ? ' has-danger' : '' }}">
                        <label for="body_build">Body Type</label>
                        <select class="simple-select2 w-100" name="body_build" style="width: 100%;"> 

                            <option></option> 
                            @if($me->searchTerm->body_build)
                            <option selected>{{$me->searchTerm->body_build}}</option>
                            @endif 
                            {{-- ID: 16   body_build --}}
                            @foreach ($userSettingFields[15]->values as $value)   
                            @if ($me->searchTerm->body_build != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>


    </div>
    <div class="col-sm-3">
        
    <!-- smoke status  -->

        <div class="form-group {{ $errors->has('smoke_status') ? ' has-danger' : '' }}">
                <label for="smoke_status">Smoke Status</label>
                <select class="simple-select2 w-100" name="smoke_status" style="width: 100%;"> 

                    <option></option> 
                    @if($me->searchTerm->smoke_status)
                    <option selected>{{$me->searchTerm->smoke_status}}</option>
                    @endif 
                    {{-- ID: 21   smoke_status --}}
                    @foreach ($userSettingFields[20]->values as $value)   
                    @if ($me->searchTerm->smoke_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif 
                    @endforeach
                </select>
            </div>


    </div>
    <div class="col-sm-3">
        
    <!-- alcohol status  -->

        <div class="form-group {{ $errors->has('alcohol_status') ? ' has-danger' : '' }}">
                <label for="alcohol_status">Alcohol Status</label>
                <select class="simple-select2 w-100" name="alcohol_status" style="width: 100%;"> 

                    <option></option> 
                    @if($me->searchTerm->alcohol_status)
                    <option selected>{{$me->searchTerm->alcohol_status}}</option>
                    @endif 
                    {{-- ID: 21   alcohol_status --}}
                    @foreach ($userSettingFields[20]->values as $value)   
                    @if ($me->searchTerm->alcohol_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif 
                    @endforeach
                </select>
            </div>


    </div>
</div>



</div>
</div>



 
  <br>

 <div class="w3-border w3-border-purple w3-round w3-white">
    <div class="w3-container w3-padding">

        <div class="form-group ">
                        <label for="education_level">Select Education Level </label>

                       {{-- ID: 26     Education Level --}}


                        <div class="row">
                            @foreach ($userSettingFields[25]->values->chunk($userSettingFields[25]->values->count()/4) as $value3)
                            <div class="col-sm-3">

                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="education_level[]" value="{{ $value->title }}" 

                                        @if ($me->searchTerm->education_level)
                                        <?php  
                                        $arr =  explode(", ",$me->searchTerm->education_level);
                                        ?>
                                        @foreach ($arr as $element)
                                            {{ ($element == $value->title) ? 'checked' : ''}}
                                        @endforeach
                                            
                                        @endif
                                         
                                        

                                        > {{ $value->title }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                @endforeach
                            </div>
                            @endforeach
                        </div>


                    </div>

    </div>
</div>

<br>

<div class="w3-border w3-border-purple w3-round w3-white">
    <div class="w3-container w3-padding">

        <div class="form-group ">
                        <label for="professions">Select Professions </label>

                        {{-- ID: 27   my profession --}}

                        <div class="row">
                            @foreach ($userSettingFields[26]->values->chunk($userSettingFields[26]->values->count()/4) as $value3)
                            <div class="col-sm-3">


                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="professions[]" value="{{ $value->title }}" 

                                        @if ($me->searchTerm->my_profession)
                                        <?php  
                                        $arr =  explode(", ",$me->searchTerm->my_profession);
                                        ?>
                                        @foreach ($arr as $element)
                                            {{ ($element == $value->title) ? 'checked' : ''}}
                                        @endforeach
                                            
                                        @endif
                                         
                                        

                                        > {{ $value->title }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                @endforeach
                            </div>
                            @endforeach
                        </div>


                    </div>

    </div>
</div>

<br>

<div class="w3-border w3-border-purple w3-round w3-white">
    <div class="w3-container w3-padding">

        <div class="form-group ">
                        <label for="country_of_residence">Select Country of Residence </label>

                        {{-- ID: 3   country --}}

                        <div class="row">
                            @foreach ($userSettingFields[2]->values->chunk($userSettingFields[2]->values->count()/4) as $value3)
                            <div class="col-sm-3">


                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="country_of_residence[]" value="{{ $value->title }}" 

                                        @if ($me->searchTerm->country_of_residence)
                                        <?php  
                                        $arr =  explode(", ",$me->searchTerm->country_of_residence);
                                        ?>
                                        @foreach ($arr as $element)
                                            {{ ($element == $value->title) ? 'checked' : ''}}
                                        @endforeach
                                            
                                        @endif
                                         
                                        

                                        > {{ $value->title }}
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>

                                @endforeach
                            </div>
                            @endforeach
                        </div>


                    </div>

    </div>
</div>


<br>

<div class="w3-border w3-border-purple w3-round w3-white">
    <div class="w3-container w3-padding">


<div class="row">
    <div class="col-sm-3">



        <div class="other-area">
    <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
        <label for="country">Country of Origin</label>
        <select class="form-control simple-select2 w-100 change-with-other" 
        id="country" 
        name="country" 
        data-placeholder="Select Option"
        style="width: 100%;"
        >
        <option></option>
        @if ($me->searchTerm->country)
            <option selected>{{ $me->searchTerm->country }}</option>
        @endif
        {{-- ID: 3     Country --}}
        @foreach ($userSettingFields[2]->values as $value)

        @if ($me->searchTerm->country != $value->title)
        <option>{{ $value->title }}</option>
        @endif
        @endforeach
    </select>
</div>
<input  
type="text" 
id="country_other" 
class="form-control other-value-field" 
name="country_other"        
value="{{$me->searchTerm->country_other ?: ''}}"
placeholder="Country Other (Please Specify here)" 

@if ($me->searchTerm->country == 'Other' || $me->searchTerm->country == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;width: 250px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none; margin-bottom: 25px;width: 250px;" 
@endif

/>
</div>









        
    </div>
    <div class="col-sm-3">
        
    <!-- state/division -->

    <div class="form-group {{ $errors->has('state_of_residence') ? ' has-danger' : '' }}" >
        <label for="state_of_residence">State/Division of Residence</label>

        <input type="text" class="form-control w3-border pl-1" name="state_of_residence" placeholder="State" 
        @if ($me->searchTerm)
            value="{{ $me->searchTerm->state_of_residence }}" 
        @endif
        >
        
         

        @if($errors->has('state_of_residence'))

        <span class="help-block">
            <strong>{{ $errors->first('state_of_residence') }}</strong>
        </span>

        @endif
    </div>


    </div>
    <div class="col-sm-3">
        
    <!-- city/district -->

    <div class="form-group {{ $errors->has('city_of_residence') ? ' has-danger' : '' }}" >
        <label for="city_of_residence">City/District of Residence</label>

        <input type="text" class="form-control w3-border pl-1" name="city_of_residence" placeholder="City/District"
        @if ($me->searchTerm)
            value="{{ $me->searchTerm->city_of_residence }}" 
        @endif
        >
        
         

        @if($errors->has('city_of_residence'))

        <span class="help-block">
            <strong>{{ $errors->first('city_of_residence') }}</strong>
        </span>

        @endif
    </div>


    </div>
    <div class="col-sm-3">
        
        <!-- mother tongue -->

        <div class="form-group {{ $errors->has('mother_tongue') ? ' has-danger' : '' }}">
                        <label for="mother_tongue">Mother Tongue</label>
                        <select class="simple-select2 w-100" name="mother_tongue" style="width: 100%;"> 

                            <option></option> 
                            @if($me->searchTerm->mother_tongue)
                            <option selected>{{$me->searchTerm->mother_tongue}}</option>
                            @endif 
                            {{-- ID: 31   mother tongue --}}
                            @foreach ($userSettingFields[30]->values as $value)   
                            @if ($me->searchTerm->mother_tongue != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>



    </div>
</div>



</div>
</div>





    


<!-- 

<div class="other-area">
    <div class="form-group {{ $errors->has('country') ? ' has-danger' : '' }}">
        <label for="country">Country</label>
        <select class="form-control simple-select2 w-100 change-with-other" 
        id="country" 
        name="country" 
        data-placeholder="Select Option"
        style="width: 250px;"
        >
        <option></option>
        @if ($me->searchTerm->country)
            <option selected>{{ $me->searchTerm->country }}</option>
        @endif
        {{-- ID: 3     Country --}}
        @foreach ($userSettingFields[2]->values as $value)

        @if ($me->searchTerm->country != $value->title)
        <option>{{ $value->title }}</option>
        @endif
        @endforeach
    </select>
</div>
<input  
type="text" 
id="country_other" 
class="form-control other-value-field" 
name="country_other"        
value="{{$me->searchTerm->country_other ?: ''}}"
placeholder="Country Other (Please Specify here)" 

@if ($me->searchTerm->country == 'Other' || $me->searchTerm->country == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;width: 250px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none; margin-bottom: 25px;width: 250px;" 
@endif

/>
</div>






    <div class="form-group {{ $errors->has('location') ? ' has-danger' : '' }}" >
        <label for="location">Location (District, Place)</label>

        <select class="form-control simple-select2 w-100" id="location" name="location" style="width: 250px;">

            <option value="">Select Location</option>
            @if ($me->searchTerm->location)
                <option selected>{{ $me->searchTerm->location }}</option>
            @endif

            {{-- ID: 2     Location (District, Place) --}}
                @foreach ($userSettingFields[1]->values as $value)
                  @if ($me->searchTerm->location != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
 
        </select>
        
         

        @if($errors->has('location'))

        <span class="help-block">
            <strong>{{ $errors->first('location') }}</strong>
        </span>

        @endif
    </div>

    

    <div class="form-group {{ $errors->has('user_status') ? ' has-danger' : '' }}" >
        <label for="user_status">User Status</label>

        <select class="form-control simple-select2 w-100" id="user_status" name="user_status" style="width: 250px;">

            <option value="">Select User Status</option>
            @if ($me->searchTerm->user_status)
                <option selected>{{ $me->searchTerm->user_status }}</option>
            @endif

            {{-- ID: 35     User Status --}}
                @foreach ($userSettingFields[34]->values as $value)
                  @if ($me->searchTerm->user_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif
                @endforeach
 
        </select>
        
         

        @if($errors->has('user_status'))

        <span class="help-block">
            <strong>{{ $errors->first('user_status') }}</strong>
        </span>

        @endif
    </div>
 -->

    


    <br>
    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>