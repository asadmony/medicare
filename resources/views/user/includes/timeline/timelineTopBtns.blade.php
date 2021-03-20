<div class="nav-tabs-navigation">
    <div class="nav-tabs-wrapper">
        <ul class="nav nav-tabs" data-tabs="tabs">

            <li class="nav-item">
                <a class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred" href="{{ url('/') }}">
                  Timeline
              </a>             

          </li>
          <li class="nav-item">
            <a class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred" href="{{ route('welcome.username', $me->username) }}">
              My Profile
          </a>
      </li>

      <li class="nav-item">
            <a class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred btn-menu-to-container" href="" data-url="{{ route('user.myAsset', 'membership_packages') }}">
              Package
          </a>
      </li>
 
  <li class="nav-item">
        <a data-url="{{ route('user.myAsset','search_setting') }}" class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred btn-menu-to-container" href="" >
          Preference Setting
      </a>

  </li>

    <li class="nav-item">
        <a data-url="{{ route('user.myAsset','search_preference') }}" class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred btn-menu-to-container" href="" >
          Partner Preference
      </a>

  </li>






  <li class="nav-item">
    <a class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred btn-menu-to-container" href="" data-url="{{ route('user.myAsset','search_all') }}" >
      Search
    </a>
  </li>

  <li class="nav-item">
    <a class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred " href="{{ route('user.myPhotoUpload') }}" >
       Upload Photo
    </a>
  </li>

 

  {{-- <li class="nav-item">
    <a class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred " href="{{ route('user.myCvUpload') }}" >
       Upload CV
    </a>
  </li>

  <li class="nav-item">
    <a class=" w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred " href="{{ url('blog/index') }}" >
      <i class="fa fa-book"></i> Blog
    </a>
  </li> --}}

 

<li class="nav-item ">
  

   
   <a class=" w3-small  p-1  w3-btn w3-round w3-bgred w3-border w3-border-maroon mb-2 mr-2 w3-hover-bgred " style="" href="{{ route('user.myNotifications') }}" >
                            @if(Auth::user()->touchMains())
                            <span class="w3-large">
                             <i class="material-icons w3-xlarge">notifications_active</i> 
                         <span style="margin-left: -10px;" class="badge ntfy-badge badge-default w3-white w3-card text-red ">{{ Auth::user()->touchMains() }}</span></span>
                         @else
                         <i class="material-icons w3-xlarge">notifications_none</i> 
                         @endif
                         Notifications
                        </a>
 

</li>

</ul>
</div>
</div>