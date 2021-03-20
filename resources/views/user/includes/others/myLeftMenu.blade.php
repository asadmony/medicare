        <div class="w3-card-2">
            <div class="box box-widget  w3-hover-shadow" >
                <div class="box-header with-border">
                  <img src="{{ asset('img/online.svg') }}" alt="Online" style="width: 20px;"> Welcome {{ str_limit($me->name, 17,'..') }}

                  <div class="box-tool pull-right">
                    <i class="fa fa-circle-o-notch w3-text-purple fa-spin btn-speener" style="display:none;"></i>
                  </div>
              </div>
              <div class="box-body">


                <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"  data-url="{{ route('user.myAsset', 'my_favourite_users') }}"><img src="{{ asset('img/heart1.svg') }}" style="width: 18px;" alt="Favourite Taslima Marriage Media"> &nbsp;  My  Favourite Users</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->favs()->count() }}</span><br>


                 

              <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"  data-url="{{ route('user.myAsset', 'my_visitor_users') }}"><img src="{{ asset('img/visitor.svg') }}" alt="Online" style="width: 20px;"> &nbsp; My Visitors</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->visitors()->count() }}</span><br>


              <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'proposal_pending') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Proposal Pending</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->pendingProposalToMeCount() }}</span> <br>

                <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'proposal_to_me') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Proposal to me</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->proposalToMeCount() }}</span> <br>

                <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'proposal_by_me') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Proposal sent by me</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->proposalFromMeCount() }}</span><br>

                <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'my_contacts') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; My Contacts ({{ $me->contactLimit() }} remaining)</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->cont()->count() }}</span>
                <br>
              

                


<hr>

<a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset','setting_basic_info') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; Edit Basic Info 
    </a> 
    {{-- <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->basicInfoStatus() }}</span> --}}
    <br>

    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_contact_info') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Edit Contact Info</a> 
    {{-- <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->contactInfoStatus() }}</span> --}}
    <br>

    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_personal_info') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Edit Personal Info</a> 
    {{-- <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->personalInfoStatus() }}</span> --}}
    <br>

    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_education') }}">
      <i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Edit Education Info
    </a>
    <br>
    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'setting_personal_activity') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Edit Personal Act..</a> 
    {{-- <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->personalActivityStatus() }}</span> --}}
    <br>

    {{-- <a href="" class="btn btn-primary btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset','setting_username') }}">
      <i class="fa fa-circle-o text-purple"></i> 
    &nbsp; &nbsp; 
  Edit Username / User ID
  </a> <br> --}}

  {{-- <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset','setting_mobile') }}">
      <i class="fa fa-circle-o text-bgmaroon"></i> 
    &nbsp; &nbsp; 
  Edit Mobile
  </a> <br> --}}

    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset','setting_email') }}">
      <i class="fa fa-circle-o text-bgmaroon"></i> 
      &nbsp; &nbsp; Edit Email
    </a> <br>


    

    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"  data-url="{{ route('user.myAsset','setting_password') }}">
      <i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Edit Password
    </a> 
    <a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"  data-url="{{ route('user.myAsset','alldatainfoedit') }}">
      <i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; All Info Edit
    </a> 
    <hr>

    <a href="{{ route('userMessageDashboard') }}" class="btn w3-text-bgred btn-link no-padding">
      <i class="fa fa-circle-o text-bgmaroon"></i> 
    &nbsp; &nbsp; 
  My All Messages
  </a> 

  <hr>

    {{-- <a href="" data-url="{{ route('user.myAsset','search_all') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Search All</a> <br> --}}

{{-- <a href="" data-url="{{ route('user.myAsset','search_username') }}" class="btn btn-primary btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-purple"></i> &nbsp; &nbsp; Username Search</a> <br> --}}

{{-- <a href="" data-url="{{ route('user.myAsset','search_photo') }}" class="btn btn-primary btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-purple"></i> &nbsp; &nbsp; Photo Search</a> <br> --}}
<a href="" data-url="{{ route('user.myAsset','search_advance') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; Advance Search</a> <br>

<a href="" data-url="{{ route('user.myAsset','search_profession') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; Profession Search</a> <br>

<a href="" data-url="{{ route('user.myAsset','search_district') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; District Search</a> <br>

{{-- <a href="" data-url="{{ route('user.myAsset','search_country') }}" class="btn btn-primary btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-purple"></i> &nbsp; &nbsp; Country Search</a> <br> --}}

{{-- <a href="" data-url="{{ route('user.myAsset','search_zodiac') }}" class="btn btn-primary btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-purple"></i> &nbsp; &nbsp; Zodiac Search</a> <br> --}}

{{-- <a href="" data-url="{{ route('user.myAsset','search_community') }}" class="btn btn-primary btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-purple"></i> &nbsp; &nbsp; Community Search</a> <br> --}}

<a href="" data-url="{{ route('user.myAsset','search_marital_status') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; Marital Status Search</a> <br>

<a href="" data-url="{{ route('user.myAsset','search_education') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; Education Search</a> <br>

<a href="" data-url="{{ route('user.myAsset','search_setting') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-cog text-bgmaroon"></i> &nbsp; &nbsp; Search (Preference) Setting</a> <br>

<a href="" data-url="{{ route('user.myAsset','search_preference') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; Preference / Custom Search</a> 

<hr>               

<a href="" data-url="{{ route('user.myAsset', 'pay_now') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  Upgrade Account / Pay Now</a> <br>


<a href="" data-url="{{ route('user.myAsset', 'my_payments') }}" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  My Invoice</a> <br>

<a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'my_photos') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp;  My Photos/Pictures</a>
<a href="" class="btn w3-text-bgred btn-link no-padding btn-menu-to-container" data-url="{{ route('user.myAsset', 'my_blocked_users') }}"><i class="fa fa-circle-o text-bgmaroon"></i> &nbsp; &nbsp; My  Blocked Users</a> <span class="btn-link btn btn-danger pull-right no-padding">{{ $me->blockss()->count() }}</span> <br>

            
</div>
</div>
</div>
