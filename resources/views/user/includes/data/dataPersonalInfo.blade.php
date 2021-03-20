<div class="w3-border-top w3-border-light-gray">
  {{-- <h3 class="mt-0">Personal Information</h3>
   --}}
  <h5 class="mt-2 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Education Background</h5>

  <div>

    @if($user->personalInfo)

    <div class="row">
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Education Level
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->educationLevel() }}

          </div>
        </div>



        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Major Subject
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->major_subject }}

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Graduation Instution
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->graduate_from }}

          </div>
        </div>
      </div>
    </div>
    <div class="row">
      
      {{-- <div class="col-sm-6">






      </div> --}}
    </div>

    <br>


    @endif
  </div>
  <h5 class="mt-2 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Proffession Information</h5>
  <div >
    <div class="row">
      <div class="col-sm-6">

        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Job Title
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->job_title }}

          </div>
        </div>

        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Company Name
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->job_company_name }}

          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Profession
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->profession() }}

          </div>
        </div>

        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Annual Income (BDT)
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->income }}

          </div>
        </div>
      </div>
    </div>
  </div>
  <h5 class="mt-2 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Location Information</h5>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Citizenship
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->citizen() }}

          </div>
        </div>

        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            City of Residence
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->city_of_residence }}

          </div>
        </div>


        {{-- <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            State / Division of Residence
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->state_of_residence }}

          </div>
        </div>  --}}
      </div>
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Country of Residence
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->countryOfResidence() }}

          </div>
        </div>
      </div>
    </div>
  </div>
  <h5 class="mt-2 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Religion & Others Information</h5>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Religion/Community
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->religion }}

          </div>
        </div>
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
          Interests
        </div>
          <div class="w3-rest text-left">
            : 
            {{ $user->personalActivity->interests }}
          </div>
        </div>

        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Zodiac Sign
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->zodiac_sign }}
      
          </div>
        </div>

        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Any disabilities?
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->anyDisabilities() }}

          </div>
        </div>

        <br>


        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Do I smoke?
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->smoke_status }}

          </div>
        </div>


        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Do I addicted to alcohol?
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->alcohol_status }}

          </div>
        </div>


        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Diat Status
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->diat_status }}

          </div>
        </div>

        <br>


        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Mother Tongue
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->mother_tongue }}

          </div>
        </div>


        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Can speak in
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->can_speak }}

          </div>
        </div>
        
        
        
      </div>
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
          Favourite Music
        </div>
          <div class="w3-rest text-left">
            : 
            {{ $user->personalActivity->favourite_music }}
          </div>
        </div>
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
          Favourite Reads
        </div>
          <div class="w3-rest text-left">
            : 
            {{ $user->personalActivity->favourite_reads }}
          </div>
        </div>
        
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
          Favourite Movies
        </div>
          <div class="w3-rest text-left">
            : 
            {{ $user->personalActivity->favourite_movies }}
          </div>
        </div>
        
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
          Favourite Cooking
        </div>
          <div class="w3-rest text-left">
            : 
            {{ $user->personalActivity->favourite_cooking }}
          </div>
        </div>
        
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
          Favourite Dress Style
        </div>
          <div class="w3-rest text-left">
            : 
            {{ $user->personalActivity->dress_style }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <h5 class="mt-2 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Parents Information</h5>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Father's Name
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->father_name }}
  
          </div>
        </div>
  
  
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Father's Occupation
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->father_occupation }}
  
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Mother's Name
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->mother_name }}
  
          </div>
        </div>
  
  
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Mother's Occupation
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->mother_occupation }}
  
          </div>
        </div>
      </div>
    </div>
  </div>
  <h5 class="mt-2 p-2 w3-button w3-round-xlarge w3-red w3-hover-red">Siblings Information</h5>
  <div>
    <div class="row">
      <div class="col-sm-6">
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Number of Brother
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->number_of_brother }}
  
          </div>
        </div>
  
  
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            How many brother Married?
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->how_many_brother_married }}
  
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        
  
  
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            Number of Sister
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->number_of_sister }}
  
          </div>
        </div>
  
  
        <div class="w3-row">
          <div class="text-left w3-text-gray w3-small w3-col width-140">
            How many sister Married?
          </div>
          <div class="w3-rest text-left">
            :
            {{ $user->personalInfo->how_many_sister_married }}
  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>