<div class="w3-border-top w3-border-light-gray">
<h5 class="mt-0 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Partner Preference</h5>
<div style="min-height: 200px;">
	
@if($user->searchTerm)

<div class="row">
	<div class="col-sm-6">





<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Age (Years)
</div>
  <div class="w3-rest text-left">
  	: 
    {{ $user->searchTerm->min_age }} to 
  	{{ $user->searchTerm->max_age }} years
    

  </div>
</div>



{{-- <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Maximum Age
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->searchTerm->max_age }}

  </div>
</div> --}}


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Height
</div>
  <div class="w3-rest text-left">
  	: 
    {{ $user->searchTerm->min_height }} to 
  	{{ $user->searchTerm->max_height }}
    

  </div>
</div>

{{-- <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Maximum Height
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->searchTerm->max_height }}

  </div>
</div> --}}

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Marital Status
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->searchTerm->marital_status }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Have Children?
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->searchTerm->do_u_have_children }}

  </div>
</div>

<br>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Religion / Community
</div>
  <div class="w3-rest text-left">
  	: 
  	{{-- {{ $user->searchTerm->citizen() }} --}}

    {{ $user->searchTerm->religion }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Caste/Social Order
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $user->searchTerm->social_order }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Skin Color
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->skin_color }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Body Type
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->body_build }}

  </div>
</div>

 



		
	</div>
	<div class="col-sm-6">
		




<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Smoke Status
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->smoke_status }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Alcohol Status
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->alcohol_status }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Education
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->education_level }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Profession
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->my_profession }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Country of Origin
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->countryOfOrigin() }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Country of Residence
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->country_of_residence }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  State/Division of Residence
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->state_of_residence }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  City/District of Residence
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->city_of_residence }}

  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Mother Tongue
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->searchTerm->mother_tongue }}

  </div>
</div>



	</div>
</div>

<br>
 

@endif
</div>
</div>