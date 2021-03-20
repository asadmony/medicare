<div class="row">
                        <div class="col-sm-3">
                            <img class="img-bordered rounded mb-4" src="{{ asset($user->latestCheckedPP()) }}" style="width: 100%;" alt="{{ $user->username }}">
                        </div>
                        <div class="col-sm-9">



                            <div class="row">
                                <div class="col-sm-9">

                                    <!-- Basic ST -->
                                    <div class="profile_basic">


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  {{ $user->username }} 
    @if($user->isOnline())
    <img src="{{ asset('img/online.gif') }}" alt="Online" style="width: 20px;">
    @else
    <i class="fa fa-circle w3-text-light-gray w3-small"></i>
    @endif
</div>
  <div class="w3-rest text-left">
    @include('user.includes.others.stars')
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Profile created by
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->profile_created_by or '(Not set yet)' }}
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
Height
</div>
  <div class="w3-rest text-left">
    : 
    @if($user->personalInfo)
    {{ $user->personalInfo->height }}
    @endif
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
                                        
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Country
</div>
  <div class="w3-rest text-left">
    : 
    @if($user->country == 'Other' || $user->country == 'Others')
    {{$user->country_other}}
    @else
    {{$user->country}}
    @endif
  </div>
</div>


<div class="w3-border-top w3-border-light-gray">

          <span>{{ str_limit($user->aboutMe(), 300,'..') }}</span>

      </div>
                                       

                                    </div>

                                </div>
                                <div class="col-sm-3">


                                @include('user.includes.others.btnRightArea')


                                </div>
                            </div>

                        </div>
                    </div>