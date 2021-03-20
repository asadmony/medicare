<div class="box box-widget">
    <div class="box-header with-border">
        <h3 class="box-title">
            Partner Preference
        </h3>
    </div>
    <div class="box-body">




    	<div class="w3-border w3-border-gray w3-round w3-white">
                        <div class="w3-container w3-padding">

            <div class="row">
                <div class="col-sm-3">


                    <div class="form-group {{ $errors->has('minimum_age') ? ' has-danger' : '' }}" style="width: 100%;">
        <label for="minimum_age">Minimum Age (Year) *</label>
         
        <select class="form-control  form-control select2" 
						data-placeholder="Select Option"
        id="minimum_age" name="minimum_age">

                <option value="">Select Minimum Age </option>
                @if ($user->searchTerm->min_age)
                    <option selected>{{ $user->searchTerm->min_age }}</option>
                @endif

                @for ($i = 18; $i <= 60; $i++)
                    @if ($user->searchTerm->min_age != $i)
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

        <select class="form-control  form-control select2" 
						data-placeholder="Select Option"
        id="maximum_age" name="maximum_age">

            <option value="">Select Maximum Age </option>
            @if ($user->searchTerm->max_age)
                <option selected>{{ $user->searchTerm->max_age }}</option>
            @endif

            @for ($i = 18; $i <= 80; $i++)
                @if ($user->searchTerm->max_age != $i)
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
        <select class="form-control select2" 
						data-placeholder="Select Option"
        name="minimum_height" style="width: 100%;">
            <option></option>
            @if($user->searchTerm->min_height)
            <option selected>{{$user->searchTerm->min_height}}</option>
            @endif
            {{-- ID: 15     My Height --}}
            @foreach ($userSettingFields[14]->values as $value)
            @if($user->searchTerm)
            @if ($user->searchTerm->min_height != $value->title)
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
        <select class="form-control select2" 
						data-placeholder="Select Option"
        name="maximum_height" style="width: 100%;">
            <option></option>
            @if($user->searchTerm->max_height)
            <option selected>{{$user->searchTerm->max_height}}</option>
            @endif
            {{-- ID: 15     My Height --}}
            @foreach ($userSettingFields[14]->values as $value)
            @if($user->searchTerm)
            @if ($user->searchTerm->max_height != $value->title)
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
                    

<div class="form-group {{ $errors->has('search_marital_status') ? ' has-danger' : '' }}">
        <label for="search_marital_status">Marital Status *</label>
        <select class="form-control select2" 
						data-placeholder="Select Option"
        name="search_marital_status" style="width: 100%;">
            
            <option></option>
            @if($user->searchTerm->marital_status)
            <option selected>{{$user->searchTerm->marital_status}}</option>
            @endif
            {{-- ID: 11     Marital Status --}}
            @foreach ($userSettingFields[10]->values as $value)
            @if($user->searchTerm)
            @if ($user->searchTerm->marital_status != $value->title)
            <option>{{ $value->title }}</option>
            @endif
            @else
            <option>{{ $value->title }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group {{ $errors->has('search_have_children') ? ' has-danger' : '' }}">
        <label for="search_have_children">Have children?</label>
        <select class="form-control select2" 
						data-placeholder="Select Option"
        name="search_have_children" style="width: 100%;">
            <option></option>
            @if($user->searchTerm->do_u_have_children)
            <option selected>{{$user->searchTerm->do_u_have_children}}</option>
            @endif
            {{-- ID: 13     Do you have children? --}}
            @foreach ($userSettingFields[12]->values as $value)
            @if($user->searchTerm)
            @if ($user->searchTerm->do_u_have_children != $value->title)
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
                    


                    <div class="form-group {{ $errors->has('search_religion') ? ' has-danger' : '' }}">
                        <label for="search_religion">Religion/Community</label>
                        <select class="form-control select2" 
						data-placeholder="Select Option"
                        name="search_religion" style="width: 100%;">

                            <option></option>

                            @if($user->searchTerm->religion)
                            <option selected>{{$user->searchTerm->religion}}</option>
                            @endif

                            {{-- ID: 4   Religion --}}
                            @foreach ($userSettingFields[3]->values as $value)

                            @if ($user->searchTerm->religion != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group {{ $errors->has('search_social_order') ? ' has-danger' : '' }}">
                        <label for="search_social_order">Caste/Social Order</label>
                        <select class="form-control select2" 
						data-placeholder="Select Option"
                        name="search_social_order" style="width: 100%;"> 

                            <option></option> 
                            @if($user->searchTerm->social_order)
                            <option selected>{{$user->searchTerm->social_order}}</option>
                            @endif 
                            {{-- ID: 29   social order --}}
                            @foreach ($userSettingFields[28]->values as $value)   
                            @if ($user->searchTerm->social_order != $value->title)
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

<div class="w3-border w3-border-gray w3-round w3-white">
    <div class="w3-container w3-padding">


<div class="row">
    <div class="col-sm-3">



        <!-- skin color -->

        <div class="form-group {{ $errors->has('search_skin_color') ? ' has-danger' : '' }}">
                        <label for="search_skin_color">Skin Color</label>
                        <select class="form-control select2" 
						data-placeholder="Select Option"
                        name="search_skin_color" style="width: 100%;"> 

                            <option></option> 
                            @if($user->searchTerm->skin_color)
                            <option selected>{{$user->searchTerm->skin_color}}</option>
                            @endif 
                            {{-- ID: 19   skin_color --}}
                            @foreach ($userSettingFields[18]->values as $value)   
                            @if ($user->searchTerm->skin_color != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>






        
    </div>
    <div class="col-sm-3">
        
    <!-- body type  -->

        <div class="form-group {{ $errors->has('search_body_build') ? ' has-danger' : '' }}">
                        <label for="search_body_build">Body Type</label>
                        <select class="form-control select2" 
						data-placeholder="Select Option"
                        name="search_body_build" style="width: 100%;"> 

                            <option></option> 
                            @if($user->searchTerm->body_build)
                            <option selected>{{$user->searchTerm->body_build}}</option>
                            @endif 
                            {{-- ID: 16   body_build --}}
                            @foreach ($userSettingFields[15]->values as $value)   
                            @if ($user->searchTerm->body_build != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>


    </div>
    <div class="col-sm-3">
        
    <!-- smoke status  -->

        <div class="form-group {{ $errors->has('search_smoke_status') ? ' has-danger' : '' }}">
                <label for="search_smoke_status">Smoke Status</label>
                <select class="form-control select2" 
						data-placeholder="Select Option"
                name="search_smoke_status" style="width: 100%;"> 

                    <option></option> 
                    @if($user->searchTerm->smoke_status)
                    <option selected>{{$user->searchTerm->smoke_status}}</option>
                    @endif 
                    {{-- ID: 21   smoke_status --}}
                    @foreach ($userSettingFields[20]->values as $value)   
                    @if ($user->searchTerm->smoke_status != $value->title)
                    <option>{{ $value->title }}</option>
                    @endif 
                    @endforeach
                </select>
            </div>


    </div>
    <div class="col-sm-3">
        
    <!-- alcohol status  -->

        <div class="form-group {{ $errors->has('search_alcohol_status') ? ' has-danger' : '' }}">
                <label for="search_alcohol_status">Alcohol Status</label>
                <select class="form-control select2" 
						data-placeholder="Select Option"
                name="search_alcohol_status" style="width: 100%;"> 

                    <option></option> 
                    @if($user->searchTerm->alcohol_status)
                    <option selected>{{$user->searchTerm->alcohol_status}}</option>
                    @endif 
                    {{-- ID: 21   alcohol_status --}}
                    @foreach ($userSettingFields[20]->values as $value)   
                    @if ($user->searchTerm->alcohol_status != $value->title)
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

 <div class="w3-border w3-border-gray w3-round w3-white">
    <div class="w3-container w3-padding">

        <div class="form-group ">
                        <label for="search_education_level">Select Education Level </label>

                       {{-- ID: 26     Education Level --}}


                        <div class="row">
                            @foreach ($userSettingFields[25]->values->chunk($userSettingFields[25]->values->count()/4) as $value3)
                            <div class="col-sm-3">

                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="search_education_level[]" value="{{ $value->title }}" 

                                        @if ($user->searchTerm->education_level)
                                        <?php  
                                        $arr =  explode(", ",$user->searchTerm->education_level);
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

<div class="w3-border w3-border-gray w3-round w3-white">
    <div class="w3-container w3-padding">

        <div class="form-group ">
                        <label for="search_professions">Select Professions </label>

                        {{-- ID: 27   my profession --}}

                        <div class="row">
                            @foreach ($userSettingFields[26]->values->chunk($userSettingFields[26]->values->count()/4) as $value3)
                            <div class="col-sm-3">


                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="search_professions[]" value="{{ $value->title }}" 

                                        @if ($user->searchTerm->my_profession)
                                        <?php  
                                        $arr =  explode(", ",$user->searchTerm->my_profession);
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

<div class="w3-border w3-border-gray w3-round w3-white">
    <div class="w3-container w3-padding">

        <div class="form-group ">
                        <label for="search_country_of_residence">Select Country of Residence </label>

                        {{-- ID: 3   country --}}

                        <div class="row">
                            @foreach ($userSettingFields[2]->values->chunk($userSettingFields[2]->values->count()/4) as $value3)
                            <div class="col-sm-3">


                                @foreach($value3 as $value)

                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input form-check-input-select" type="checkbox" name="search_country_of_residence[]" value="{{ $value->title }}" 

                                        @if ($user->searchTerm->country_of_residence)
                                        <?php  
                                        $arr =  explode(", ",$user->searchTerm->country_of_residence);
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

<div class="w3-border w3-border-gray w3-round w3-white">
    <div class="w3-container w3-padding">


<div class="row">
    <div class="col-sm-3">



        <div class="other-area">
    <div class="form-group {{ $errors->has('search_country') ? ' has-danger' : '' }}">
        <label for="search_country">Country of Origin</label>
        <select class="form-control form-control select2 change-with-other"
						data-placeholder="Select Option"
        hange-with-other" 
        id="search_country" 
        name="search_country" 
        data-placeholder="Select Option"
        style="width: 100%;"
        >
        <option></option>
        @if ($user->searchTerm->country)
            <option selected>{{ $user->searchTerm->country }}</option>
        @endif
        {{-- ID: 3     Country --}}
        @foreach ($userSettingFields[2]->values as $value)

        @if ($user->searchTerm->country != $value->title)
        <option>{{ $value->title }}</option>
        @endif
        @endforeach
    </select>
</div>
<input  
type="text" 
id="search_country_other" 
class="form-control other-value-field" 
name="search_country_other"        
value="{{$user->searchTerm->country_other ?: ''}}"
placeholder="Country Other (Please Specify here)" 

@if ($user->searchTerm->country == 'Other' || $user->searchTerm->country == 'Others')
style="border-radius: 4px;padding-left: 8px;margin-bottom: 25px;width: 250px;" 
@else
style="border-radius: 4px;padding-left: 8px; display: none; margin-bottom: 25px;width: 250px;" 
@endif

/>
</div>









        
    </div>
    <div class="col-sm-3">
        
    <!-- state/division -->

    <div class="form-group {{ $errors->has('search_state_of_residence') ? ' has-danger' : '' }}" >
        <label for="search_state_of_residence">State/Division of Residence</label>

        <input type="text" class="form-control w3-border pl-1" name="search_state_of_residence" placeholder="State" 
        @if ($user->searchTerm)
            value="{{ $user->searchTerm->state_of_residence }}" 
        @endif
        >
        
         

        @if($errors->has('search_state_of_residence'))

        <span class="help-block">
            <strong>{{ $errors->first('search_state_of_residence') }}</strong>
        </span>

        @endif
    </div>


    </div>
    <div class="col-sm-3">
        
    <!-- city/district -->

    <div class="form-group {{ $errors->has('search_city_of_residence') ? ' has-danger' : '' }}" >
        <label for="search_city_of_residence">City/District of Residence</label>

        <input type="text" class="form-control w3-border pl-1" name="search_city_of_residence" placeholder="City/District"
        @if ($user->searchTerm)
            value="{{ $user->searchTerm->city_of_residence }}" 
        @endif
        >
        
         

        @if($errors->has('search_city_of_residence'))

        <span class="help-block">
            <strong>{{ $errors->first('search_city_of_residence') }}</strong>
        </span>

        @endif
    </div>


    </div>
    <div class="col-sm-3">
        
        <!-- mother tongue -->

        <div class="form-group {{ $errors->has('search_mother_tongue') ? ' has-danger' : '' }}">
                        <label for="search_mother_tongue">Mother Tongue</label>
                        <select class="form-control select2" 
						data-placeholder="Select Option"
                        name="search_mother_tongue" style="width: 100%;"> 

                            <option></option> 
                            @if($user->searchTerm->mother_tongue)
                            <option selected>{{$user->searchTerm->mother_tongue}}</option>
                            @endif 
                            {{-- ID: 31   mother tongue --}}
                            @foreach ($userSettingFields[30]->values as $value)   
                            @if ($user->searchTerm->mother_tongue != $value->title)
                            <option>{{ $value->title }}</option>
                            @endif 
                            @endforeach
                        </select>
                    </div>



    </div>
</div>



</div>
</div>





    	 

			


			


			

	



	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
			
			                <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="search_checked"
            @if ($user->searchTerm)
                
            {{$user->searchTerm->checked ? 'checked' : ''}} 

            @endif

            /> Data Checked (Partner Preference)</label>
        </div>
        
        <div class="checkbox">
        <label>
            <input 
            type="checkbox"
            name="search_can_edit"

            @if ($user->searchTerm)
                
            {{$user->searchTerm->can_edit ? 'checked' : ''}} 

            @endif
            /> Can Edit (Partner Preference)</label>
        </div> 

		</div>
	</div>








    </div>
</div>