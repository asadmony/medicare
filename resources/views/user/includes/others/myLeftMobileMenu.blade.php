<li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <img src="{{ asset('img/online.gif') }}" alt="Online" style="width: 20px;"> My Profile
    </a>
    <div class="dropdown-menu dropdown-with-icons">

            {{-- <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'my_photos') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> My Photos / Pictures
            </a> --}}

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'my_favourite_users') }}">
            <img src="{{ asset('img/heart1.svg') }}" style="width: 18px;" alt="Favourite Taslima Marriage Media"> Favourite Users 
            <span class="ml-2 text-red">(
              {{ Auth::user()->favs()->count() }}
            )</span>
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'my_visitor_users') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> My Visitors 
            <span class="ml-2 text-red">(
              {{ Auth::user()->visitors()->count() }}
            )</span>
            </a>

            

            

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'proposal_pending') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Proposal Pending 
            <span class="ml-2 text-red">(
              {{ Auth::user()->pendingProposalToMeCount() }}
            )</span>
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'proposal_to_me') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Proposal to me 
            <span class="ml-2 text-red">(
              {{ Auth::user()->proposalToMeCount() }}
            )</span>
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'proposal_by_me') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Proposal by me 
            <span class="ml-2 text-red">(
              {{ Auth::user()->proposalFromMeCount() }}
            )</span>
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'my_contacts') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Contacts ({{ Auth::user()->contactLimit() }}) 
            <span class="ml-2 text-red">(
              {{ Auth::user()->cont()->count() }}
            )</span>
            </a>

            {{-- <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'my_blocked_users') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Blocked Users 
            <span class="ml-2 text-red">(
              {{ Auth::user()->blockss()->count() }}
            )</span>
            </a> --}}

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'pay_now') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Upgrade / Pay Now 
            </a>   

             

            {{-- <a href="{{ route('user.myComments') }}" 
            class="dropdown-item btn btn-primary btn-link">
            <i class="mr-1 fa fa-circle-o text-purple"></i> Complain to Admin
            </a>   --}}

                        

    </div>
</li>




 




<li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <i class="fa fa-wrench w3-text-purple"></i>  Settings
    </a>
    <div class="dropdown-menu dropdown-with-icons">

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_basic_info') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Basic Info 
            {{-- <span class="ml-1 text-red">({{ Auth::user()->basicInfoStatus() }})</span> --}}
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_contact_info') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Contact Info 
            {{-- <span class="ml-1 text-red">({{ Auth::user()->contactInfoStatus() }})</span> --}}
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_personal_info') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Personal Info 
            {{-- <span class="ml-1 text-red">({{ Auth::user()->personalInfoStatus() }})</span> --}}
            </a>

            <a href="" class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_education') }}">
              <i class="fa fa-circle-o text-bgmaroon"></i> Education Info
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_personal_activity') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Personal Act
            {{-- <span class="ml-1 text-red">({{ Auth::user()->personalActivityStatus() }})</span> --}}
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset','search_setting') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Partner Preference
            </a>

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_email') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Edit Email 
            </a>

            {{-- <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_mobile') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Edit Mobile 
            </a> --}}

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'setting_password') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Edit Password
            </a>

            
    </div>
</li>

<li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <i class="fa fa-comments w3-text-purple"></i> 

                      Message
    </a>
    <div class="dropdown-menu dropdown-with-icons">

            <a href="{{ route('userMessageDashboard') }}" 
            class="dropdown-item btn w3-text-bgred btn-link">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> My All Messages

            </a>
    </div>
</li>

<li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <i class="fa fa-search w3-text-purple"></i> Search
    </a>
    <div class="dropdown-menu dropdown-with-icons">  

            <a href=""
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'search_profession') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Profession Search 
            </a>        

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'search_district') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> District Search 
            </a>   

            {{-- <a href="" 
            class="dropdown-item btn btn-primary btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'search_country') }}">
            <i class="mr-1 fa fa-circle-o text-purple"></i> Country Search 
            </a>  --}}

            {{-- <a href="" 
            class="dropdown-item btn btn-primary btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'search_zodiac') }}">
            <i class="mr-1 fa fa-circle-o text-purple"></i> Zodiac Search 
            </a>      --}}    

        
           {{--  <a href="" 
            class="dropdown-item btn btn-primary btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'search_community') }}">
            <i class="mr-1 fa fa-circle-o text-purple"></i> Community Search 
            </a>       --}}

            

            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset','search_marital_status') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Marital Status Search 
            </a>     
        
            <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'search_education') }}">
            <i class="mr-1 fa fa-circle-o  text-bgmaroon"></i> Education Search 
            </a>         


            <a href="" data-url="{{ route('user.myAsset','search_setting') }}" class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"><i class=" mr-1 fa fa-cog text-bgmaroon"></i> Search (Preference) Setting</a> 

            <a href="" data-url="{{ route('user.myAsset','search_preference') }}" class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"><i class=" mr-1 fa fa-circle-o text-bgmaroon"></i> Preference / Custom Search</a>

    </div>
</li>

<li class="dropdown nav-item">
  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">    
    <i class="fa fa-user w3-text-purple"></i> Accounts
  </a>
  <div class="dropdown-menu dropdown-with-icons">
    <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'pay_now') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> Upgrade / Pay Now 
    </a> 
    <a href="" 
    class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
    data-url="{{ route('user.myAsset', 'my_payments') }}">
    <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> My Invoice
    </a>
    <a href="" 
            class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
            data-url="{{ route('user.myAsset', 'my_photos') }}">
            <i class="mr-1 fa fa-circle-o text-bgmaroon"></i> My Photos / Pictures
    </a>  
    <a href="" 
    class="dropdown-item btn w3-text-bgred btn-link  btn-menu-to-container"  
    data-url="{{ route('user.myAsset', 'my_blocked_users') }}">
    <i class="mr-1 fa fa-circle-o text-bgmaroon"></i>My Blocked Users 
    <span class="ml-2 text-red">(
      {{ Auth::user()->blockss()->count() }}
    )</span>
    </a>
  </div>
</li>

 
{{-- 
<li class="nav-item">
    <a class="nav-link" href="https://www.taslimamarriagemedia.com/diary/" >
         <img src="{{ asset('img/book.svg') }}" alt="{{ env('APP_NAME_BIG') }}" width="27"> Blog
    </a>
</li> --}}


