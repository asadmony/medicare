<div class="box box-widget mb-3 w3-hover-shadow">
                <div class="box-header with-border">
                    <h3 class="box-title">My Statistics</h3>
                    <div class="box-tool pull-right">
                        <a href="" data-url="{{ route('user.myAsset', 'membership_packages') }}" class="btn btn-link w3-text-bgred btn-menu-to-container no-padding">Upgrade Account</a>

                    </div>
                </div>
                <div class="box-body" style="min-height: 200px;">

                    <div class="row">
                        <div class="col-sm-6">


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Full Name
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->name }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Username
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->username }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Email
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->email }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Visitor
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->visitors()->count() }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Favourite Users
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->favs()->count() }}
  </div>
</div>
  
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My  Blocked Users
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->blockss()->count() }}
  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My uploaded photos
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->userPhotos()->public()->count() }}
  </div>
</div>
  

   
                            
                        </div>
                        <div class="col-sm-6">





<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Proposal Pending
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->proposalToMe()->whereAccepted(false)->count() }}
  </div>
</div>
  
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Proposal to me
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->proposalToMe()->whereAccepted(true)->count() }}
  </div>
</div>
  
<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Proposal sent by me
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->proposal()->count() }} (Daily Limit: {{ $me->dailyProposalSendingLimit() }}, Total Limit: {{ $me->totalProposalSendingLimit() }})
  </div>
</div>



<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Membership Package
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->myPackage() }}
  </div>
</div>
 



<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Package Expired at
</div>
  <div class="w3-rest text-left">
    : 
    @if($me->expired_at)
    {{ date('d-M-Y', strtotime($user->expired_at)) }}
    @else
    0
    @endif
  </div>
</div>
       

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
Duration (Days)
</div>
  <div class="w3-rest text-left">
    : 
    {{ $user->packageDuration() }}
  </div>
</div>


<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
My Invoice Total
</div>
  <div class="w3-rest text-left">
    : 
    {{ $me->payments()->count() }}
  </div>
</div>

       
                            
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <!-- notifications-->
            {{-- <div class="box box-widget mb-3">
   <a class="nav-link btn btn-primary" style=" font-weight: bold;padding-top: 20px;padding-bottom: 20px;" href="{{ route('user.myNotifications') }}" >
                            @if(Auth::user()->touchMains())
                            <span class="w3-large">
                             <i class="material-icons w3-xlarge">notifications_active</i> 
                         <span style="margin-left: -10px;" class="badge ntfy-badge badge-default w3-white w3-card text-red ">{{ Auth::user()->touchMains() }}</span></span>
                         @else
                         <i class="material-icons w3-xlarge">notifications_none</i> 
                         @endif
                         Check your dailey notifications
                        </a>
</div> --}}
            
            
            
    <!-- blar profile images -->
            
            
            <link type="text/css" href="{{asset('assets/slide_profile/jquerysctipttop.css')}}" rel="stylesheet" >
<!--</head>-->
<!--<body>-->
 
 
 
            
            
            
            
            
            
            
            
            
            