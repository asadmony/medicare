
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        {{-- <li class="header">WEBSITE AREA</li> --}}

        <li class=" treeview{{ session('lsbm') == 'dashboard' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard </a></li>

            <li class="{{ session('lsbsm') == 'websiteParameter' ? ' active ' : '' }}"><a href="{{route('admin.websiteParameter')}}"><i class="fa fa-circle-o"></i> Website Parameters </a></li>

          </ul>
        </li>

      <li class=" treeview{{ session('lsbm') == 'website' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Website</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'allUserSettingList' ? ' active ' : '' }}"><a href="{{route('admin.userSettingList')}}"><i class="fa fa-circle-o"></i> All User Setting Field </a></li>

            <li class="{{ session('lsbsm') == 'userSettingFieldValue' ? ' active ' : '' }}"><a href="{{route('admin.userSettingFieldValue')}}"><i class="fa fa-circle-o"></i> Setting Field Value </a></li>

          </ul>
        </li>

        <li class="treeview {{ session('lsbm') == 'frontSlider' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-th" aria-hidden="true"></i>
            <span>Front Slider</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 
            <li class="{{ session('lsbsm') == 'frontSlidersAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.frontSlidersAll')}}"><i class="fa fa-circle-o"></i> All Front Sliders</a></li>
          </ul>
        </li>

        <li class="treeview {{ session('lsbm') == 'page' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-tag" aria-hidden="true"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'newPage' ? 'active' : '' }}"><a class=" "  href="{{route('admin.newPage')}}"><i class="fa fa-circle-o"></i> Add New Page</a></li>
            <li class="{{ session('lsbsm') == 'allPages' ? 'active' : '' }}"><a class=" "  href="{{route('admin.allPages')}}"><i class="fa fa-circle-o"></i> All Pages</a></li>
          </ul>
        </li>


        <li class="treeview {{ session('lsbm') == 'successStory' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
            <span>Success Stories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'newStory' ? 'active' : '' }}"><a class=" "  href="{{route('admin.newStory')}}"><i class="fa fa-circle-o"></i> Add New Story</a></li>
            <li class="{{ session('lsbsm') == 'allStories' ? 'active' : '' }}"><a class=" "  href="{{route('admin.allStories')}}"><i class="fa fa-circle-o"></i> All Stories</a></li>
          </ul>
        </li>


        <li class="treeview {{ session('lsbm') == 'package' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <span>Membership Packages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ session('lsbsm') == 'membershipPackageAddNew' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.membershipPackageAddNew')}}"><i class="fa fa-circle-o"></i> New Package</a></li>
 
            <li class="{{ session('lsbsm') == 'allMembershipPackages' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.allMembershipPackages')}}"><i class="fa fa-circle-o"></i> All Packages</a></li>



          </ul>
        </li>

        <li class="treeview {{ session('lsbm') == 'payments' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <span>Payment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ session('lsbsm') == 'paymentAddNew' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.paymentAddNew')}}"><i class="fa fa-circle-o"></i> Add New Payment</a></li>
 
            <li class="{{ session('lsbsm') == 'allPendingPayments' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.allPendingPayments')}}"><i class="fa fa-circle-o"></i> All Pending Payments</a></li>

            <li class="{{ session('lsbsm') == 'allPaidPayments' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.allPaidPayments')}}"><i class="fa fa-circle-o"></i> All Paid Payments</a></li>

            <li class="{{ session('lsbsm') == 'allFreePayments' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.allFreePayments')}}"><i class="fa fa-circle-o"></i> All Free Payments</a></li>
          </ul>
        </li>

        <li class="treeview {{ session('lsbm') == 'incomeReport' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <span>Income/Member Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 
            <li class="{{ session('lsbsm') == 'incomeReportSummary' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.incomeReportSummary')}}"><i class="fa fa-circle-o"></i> All Report Summary</a></li>
            
            <li class="{{ session('lsbsm') == 'incomeReportPayment' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.incomeReportPayment')}}"><i class="fa fa-circle-o"></i> Payment Report</a></li>

            <li class="{{ session('lsbsm') == 'incomeReportUser' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.incomeReportUser')}}"><i class="fa fa-circle-o"></i> Member Report</a></li>

          </ul>
        </li>

        <li class="treeview {{ session('lsbm') == 'proposal' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <span>Proposal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ session('lsbsm') == 'all_proposals' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.proposalsGroup', 'all_proposals')}}"><i class="fa fa-circle-o"></i> All Proposals</a></li>
 
            <li class="{{ session('lsbsm') == 'pending_proposals' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.proposalsGroup', 'pending_proposals')}}"><i class="fa fa-circle-o"></i> All Pending Proposals</a></li>

            <li class="{{ session('lsbsm') == 'accepted_proposals' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.proposalsGroup', 'accepted_proposals')}}"><i class="fa fa-circle-o"></i> All Accepted Proposals</a></li>
            
          </ul>
        </li>


        <li class="treeview {{ session('lsbm') == 'report' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <span>Report/Complain</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 
            <li class="{{ session('lsbsm') == 'reportsAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.reportsAll')}}"><i class="fa fa-circle-o"></i> All Rports</a></li>
          </ul>
        </li>



        <li class="treeview  {{ session('lsbm') == 'sms' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-th-list" aria-hidden="true"></i>
            <span>SMS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li  class="{{ session('lsbsm') == 'quickSmsBalanceCheck' ? ' active ' : '' }}"><a href="{{ route('admin.quickSmsBalanceCheck') }}"><i class="fa fa-circle-o"></i>SMS Remaining</a></li>

            <li  class="{{ session('lsbsm') == 'quickSmsDraft' ? ' active ' : '' }}"><a  href="{{route('admin.quickSmsDraft')}}"><i class="fa fa-circle-o"></i>Drafts</a></li>

            {{-- <li  class="{{ session('lsbsm') == 'uploadedContactDraft' ? ' active ' : '' }}"><a  href="{{route('admin.uploadedContactDraft')}}"><i class="fa fa-circle-o"></i>Uploaded Contacts</a></li> --}}

            {{-- <li  class="{{ session('lsbsm') == 'sendSmsToBusiness' ? ' active ' : '' }}"><a  href="{{route('admin.sendSmsToBusiness')}}"><i class="fa fa-circle-o"></i> SMS Send to Business</a></li> --}}
            

            <li  class="{{ session('lsbsm') == 'quickSms' ? ' active ' : '' }}"><a  href="{{route('admin.quickSms')}}"><i class="fa fa-circle-o"></i>Quick SMS</a></li>

            <li  class="{{ session('lsbsm') == 'sentSmsBulk' ? ' active ' : '' }}"><a  href="{{route('admin.sentSmsBulk')}}"><i class="fa fa-circle-o"></i> SMS Analytics</a></li>
          </ul>
        </li>



        <li class="treeview {{ session('lsbm') == 'roles' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <span>Role</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
 
            <li class="{{ session('lsbsm') == 'adminsAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.adminsAll')}}"><i class="fa fa-circle-o"></i> All Admins</a></li>

            <li class="{{ session('lsbsm') == 'blogAdminsAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.blogAdminsAll')}}"><i class="fa fa-circle-o"></i> All Blog Admins</a></li>
          </ul>
        </li>
        

        <li class="treeview {{ session('lsbm') == 'users' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li class="{{ session('lsbsm') == 'all_unchecked_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','all_unchecked_users')}}"><i class="fa fa-circle-o"></i> All Unchecked Users</a></li> 

            <li class="{{ session('lsbsm') == 'all_checked_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','all_checked_users')}}"><i class="fa fa-circle-o"></i> All Checked and Active Users</a></li>

            {{-- <li class="{{ session('lsbsm') == 'active_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','active_users')}}"><i class="fa fa-circle-o"></i> Active Users</a></li> --}}

            <li class="{{ session('lsbsm') == 'inactive_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','inactive_users')}}"><i class="fa fa-circle-o"></i>All Deactivated Users</a></li>




            <li class="{{ session('lsbsm') == 'profile_picture_pending' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','profile_picture_pending')}}"><i class="fa fa-circle-o"></i> Profile Picture Pending</a></li>

            <li class="{{ session('lsbsm') == 'final_check_pending' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'final_check_pending')}}"><i class="fa fa-circle-o"></i> Final Check Pending</a></li>

            <li class="{{ session('lsbsm') == 'validity_10' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'validity_10')}}"><i class="fa fa-circle-o"></i> Validity less than 10 days</a></li>

            <li class="{{ session('lsbsm') == 'order_by_age' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','order_by_age')}}"><i class="fa fa-circle-o"></i> Order By Age</a></li>

            <li class="{{ session('lsbsm') == 'basic_info_pending' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','basic_info_pending')}}"><i class="fa fa-circle-o"></i> Basic Info Pending</a></li>

            <li class="{{ session('lsbsm') == 'personal_info_pending' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'personal_info_pending')}}"><i class="fa fa-circle-o"></i> Personal Info Pending</a></li>

            <li class="{{ session('lsbsm') == 'personal_activity_pending' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'personal_activity_pending')}}"><i class="fa fa-circle-o"></i> Personal Activities Pending</a></li>

            <li class="{{ session('lsbsm') == 'golden' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'golden')}}"><i class="fa fa-circle-o"></i> Golden Users</a></li>

            <li class="{{ session('lsbsm') == 'golden_plus' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'golden_plus')}}"><i class="fa fa-circle-o"></i> Golden Plus Users</a></li>

            <li class="{{ session('lsbsm') == 'diamond' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'diamond')}}"><i class="fa fa-circle-o"></i> Diamond Users</a></li>

            <li class="{{ session('lsbsm') == 'diamond_plus' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'diamond_plus')}}"><i class="fa fa-circle-o"></i> Diamond Plus Users</a></li>



            <li class="{{ session('lsbsm') == 'free_package' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'free_package')}}"><i class="fa fa-circle-o"></i> Free Package Users</a></li>

            <li class="{{ session('lsbsm') == 'subscribers' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'subscribers')}}"><i class="fa fa-circle-o"></i> All Subscribers</a></li>            

            

            

            <li class="{{ session('lsbsm') == 'male_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup', 'male_users')}}"><i class="fa fa-circle-o"></i> Only Male Profile</a></li>

            <li class="{{ session('lsbsm') == 'female_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','female_users')}}"><i class="fa fa-circle-o"></i> Only Female Profile</a></li> 

            <li class="{{ session('lsbsm') == 'online_users' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersGroup','online_users')}}"><i class="fa fa-circle-o"></i> Online Users</a></li>   

            <li class="{{ session('lsbsm') == 'usersAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.usersAll')}}"><i class="fa fa-circle-o"></i> All Users</a></li>         

          </ul>
        </li>


        <li class="treeview {{ session('lsbm') == 'mobileAndEmail' ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-id-card" aria-hidden="true"></i>
            <span>Mobile & Email Numbers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'mobileNumbersAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.mobileNumbersAll')}}"><i class="fa fa-circle-o"></i>All Mobile Numbers</a></li>
 
            <li class="{{ session('lsbsm') == 'emailNumbersAll' ? 'active' : '' }}"><a class="changed-menu" href="{{route('admin.emailNumbersAll')}}"><i class="fa fa-circle-o"></i> All Email Numbers</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>