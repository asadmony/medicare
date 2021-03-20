@if((Auth::user()->contactInfoViewPermissionOf($user) and Auth::user()->isPaidAndValidate()) or (Auth::user()->isMyContact($user) and Auth::user()->isPaidAndValidate()) or (Auth::user()->isAdmin()) or (Auth::id() == $user->id))
<div class="w3-border-top w3-border-light-gray">
	{{-- <h4 class="mt-0  w3-button w3-round-xxlarge w3-red w3-hover-red">Contact Information</h4> --}}
	<h5 class="mt-0 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Basic Information</h5>

  <div style="min-height: 200px;">


	@if($user->id == Auth::id())
	<small class="help-block"> Users related with proposal (Accepted) can see your contact Information</small> <br>
	@endif

<div class="row">
<div class="col-sm-6">
  
    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Email
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->email }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Mobile
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->mobile }}
      </div>
    </div>

        @if($user->contactInfo)


    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Alternative Email
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->alternative_email }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Alternative Mobile
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->alternative_mobile }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Name of Contact Person
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->name_of_contact_person }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Relation with Contact Person
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->relation_with_contact_person }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Present Address
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->present_address }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Permanent Address
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->permanent_address }}
      </div>
    </div>

    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      Family Background
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->about_family }}
      </div>
    </div>

    @if(Auth::user()->isAdmin())
    <div class="w3-row">
      <div class="text-left w3-text-gray w3-small w3-col width-140">
      NID/Smart Card/Passport Number
    </div>
      <div class="w3-rest text-left">
        : 
        {{ $user->contactInfo->nid }}
        <span class="help-block"> (You have seen this because you are admin.)</span>
      </div>
    </div>
</div>
<div class="col-sm-6">
  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      District
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->district }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Thana
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->thana }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Zip Code / Post Code
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->zip_code }}

    </div>
  </div>

  <br>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      My Height
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->height }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Blood Group
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->blood_group }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Body Type
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->body_build }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Marital Status
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->marital_status }}

    </div>
  </div>

  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Do you have children?
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->do_u_have_children }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Hair Color
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->hairColor() }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Eye Color
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->eyeColor() }}

    </div>
  </div>


  <div class="w3-row">
    <div class="text-left w3-text-gray w3-small w3-col width-140">
      Skin Color
    </div>
    <div class="w3-rest text-left">
      :
      {{ $user->personalInfo->skinColor() }}

    </div>
  </div>

</div>
</div>
@endif


		@endif



	</div>
</div>
@endif