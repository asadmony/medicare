  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link bg-primary">
      {{-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('cp/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
 --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <!-- Dashboard -->
          <li class="nav-item has-treeview {{ session('lsbm') == 'dashboard' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Dashboard') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               
              <li class="nav-item ">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Dashboard') }}</p>
                </a>
              </li>
              
              <li class="nav-item ">
                <a href="{{ route('admin.websiteParameters') }}" class="nav-link {{ session('lsbsm') == 'webparameter' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Web Parameters') }}</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- ./Dashboard --}}


          {{-- Pages --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'pages' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.pagesAll') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Pages') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.pagesAll') }}" class="nav-link {{ session('lsbsm') == 'allpages' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Pages') }}</p>
                </a>
              </li>
            </ul> --}}
          </li>
          {{-- ./pages --}}

          {{-- Pages --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'media' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.mediaAll') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Media') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.mediaAll') }}" class="nav-link {{ session('lsbsm') == 'allMedia' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Media') }}</p>
                </a>
              </li>
            </ul> --}}
          </li>
          {{-- ./pages --}}


          {{-- Company --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'company' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Company') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.companiesAll') }}" class="nav-link {{ session('lsbsm') == 'companiesAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Companies') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.companiesAll',['status' =>'active']) }}" class="nav-link {{ session('lsbsm') == 'companiesAllactive' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Active Companies') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.companiesAll',['status' =>'inactive']) }}" class="nav-link {{ session('lsbsm') == 'companiesAllinactive' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Inactive Companies') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.companyAddNew') }}" class="nav-link {{ session('lsbsm') == 'companyAddNew' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Company') }}</p> 
                </a>
              </li>
            </ul>
          </li>
          {{-- ./company --}}

          {{-- subject --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'subject' ? ' menu-open ' : '' }}">
            <a href="{{route('admin.allSubjects')}}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Subjects') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('admin.addNewSubject')}}" class="nav-link {{ session('lsbsm') == 'addNewSubject' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Subject') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('admin.allSubjects')}}" class="nav-link {{ session('lsbsm') == 'allSubjects' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Subjects') }}</p>
                </a>
              </li>
              
            </ul> --}}
          </li>
          {{-- ./subject --}}

          {{-- course --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'course' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.allCourses') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Courses') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.addNewCourse') }}" class="nav-link {{ session('lsbsm') == 'addNewCourse' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Course') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.allCourses') }}" class="nav-link {{ session('lsbsm') == 'allCourses' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Courses') }}</p>
                </a>
              </li>
              
            </ul> --}}
          </li>
          {{-- ./course --}}


          {{-- package --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.allPackages') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Packages') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('admin.addNewPackage') }}" class="nav-link {{ session('lsbsm') == 'addNewPackage' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Package') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('admin.allPackages') }}" class="nav-link {{ session('lsbsm') == 'allPackages' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Packages') }}</p>
                </a>
              </li>
              
            </ul> --}}
          </li>
          {{-- ./package --}}

          {{-- order --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'order' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.order', 'pending') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              @php
                  $pendingOrderCount = App\Model\Order::where('order_status', 'pending')->get()->count();
              @endphp
              <span>Orders </span> 

              @if ($pendingOrderCount > 0)
              <span class="badge badge-info right">{{ $pendingOrderCount }}</span>
              @endif
              <p>
                <span class="pull-right-container">
                  <span class="label label-primary pull-right">  </span>
                </span>
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <?php $type = "pending" ?>
                <a href="{{ route('admin.order',$type) }}" class="nav-link {{ session('lsbsm') == 'orderpending' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Pending Order') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <?php $type = "confirmed" ?>
                <a href="{{ route('admin.order',$type) }}" class="nav-link {{ session('lsbsm') == 'orderconfirmed' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Complete Order') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <?php $type = "delivered" ?>
                <a href="{{ route('admin.order',$type) }}" class="nav-link {{ session('lsbsm') == 'orderdelivered' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Delivered Order') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <?php $type = "cancelled" ?>
                <a href="{{ route('admin.order',$type) }}" class="nav-link {{ session('lsbsm') == 'ordercancelled' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Cancelled Order') }}</p>
                </a>
              </li>
            </ul> --}}
          </li>
          {{-- ./order --}}

          {{-- User --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'user' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.usersAll') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('User') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">

              <li class="nav-item ">
                <a href="{{ route('admin.newUserCreate') }}" class="nav-link {{ session('lsbsm') == 'newUserCreate' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Add New User') }}</p>
                </a>
              </li>

              <li class="nav-item ">
                <a href="{{ route('admin.usersAll') }}" class="nav-link {{ session('lsbsm') == 'usersAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Users') }}</p>
                </a>
              </li>
            </ul> --}}
          </li>
          {{-- ./user --}}

          {{-- role --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'role' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Role') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
 

              <li class="nav-item ">
                <a href="{{ route('admin.adminsAll') }}" class="nav-link {{ session('lsbsm') == 'adminsAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Admins/Coordinators') }}</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{ session('report') == 'role' ? ' menu-open ' : '' }}">
            <a href="{{ route('admin.report', 'all') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Report') }}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.messages') }}"
                    class="nav-link {{ session('Messages') == 'Messages' ? ' active ' : '' }}">
                    <i class="far fa-comments nav-icon"></i>
                    <p>{{ __('Messages') }}</p>
                </a>
          </li>

          {{-- ./role --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
