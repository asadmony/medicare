<div class="box box-widget mb-3 w3-animate-zoom">
                <div class="box-body" style="min-height: 200px;">

                    <div class="row">
                        <div class="col-sm-3">
                            {{-- <img class="img-bordered rounded mb-4" src="{{ asset($user->latestCheckedPP()) }}" style="width: 100%;" alt=""> --}}

                            <img src="{{ asset($user->latestCheckedPP()) }}" class="rounded img-bordered mb-4 "  alt="{{ $user->username }}" style="max-width: 170px;">
                        </div>
                        <div class="col-sm-9">



                            <div class="row">
                                <div class="col-sm-8">

                                    <!-- Basic ST -->
                                    <div class="profile_basic">

 


<div class="w3-card mb-1">
  
<div class="box box-widget" style="border:1px solid blue;">
  <div class="box-body">


    <div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-100">
Mobile
</div>
  <div class="w3-rest text-left">
    : 
      {{ $user->mobile }}
  </div>
</div>

  
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-100">
  Email
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->email }}
  </div>
</div>

 

    @if($user->contactInfo)


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-100">
  Alternative Email
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->contactInfo->alternative_email }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-100">
  Alternative Mobile
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->contactInfo->alternative_mobile }}
  </div>
</div>

 @endif
           
     
    
  </div>
</div>
</div>


                                       
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Age, Gender
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->age() }},   {{ $user->gender }}
  </div>
</div>


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
Education
</div>
  <div class="w3-rest text-left">
    : 
    @if ($user->personalInfo)
    {{ $user->personalInfo->educationLevel() }}
    @endif
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Profession
</div>
  <div class="w3-rest text-left">
    : 
    @if ($user->personalInfo)
    {{ $user->personalInfo->profession() }}
    @endif
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Marital Status
</div>
  <div class="w3-rest text-left">
    : 
    @if ($user->personalInfo)
    {{ $user->personalInfo->marital_status}}
    @endif
  </div>
</div>                                            
                                             

 

                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    
                                    @include('user.includes.others.btnRightArea')



                                </div>
                            </div>

                            <div class="w3-border-top w3-border-light-gray">

                                <span>{{ str_limit($user->aboutMe(), 50,'..') }}</span> <a href="{{ route('welcome.username', $user->username) }}" class="btn btn-primary btn-link no-padding">More</a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>