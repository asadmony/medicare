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
            <a href="{{ route('coordinator.dashboard') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('Dashboard') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
          </li>
          {{-- ./Dashboard --}}


          {{-- subject --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'subject' ? ' menu-open ' : '' }}">
            <a href="{{route('coordinator.allSubjects')}}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Subjects') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{route('coordinator.addNewSubject')}}" class="nav-link {{ session('lsbsm') == 'addNewSubject' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Subject') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{route('coordinator.allSubjects')}}" class="nav-link {{ session('lsbsm') == 'allSubjects' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Subjects') }}</p>
                </a>
              </li>
              
            </ul> --}}
          </li>
          {{-- ./subject --}}

          {{-- course --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'course' ? ' menu-open ' : '' }}">
            <a href="{{ route('coordinator.allCourses') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Courses') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('coordinator.addNewCourse') }}" class="nav-link {{ session('lsbsm') == 'addNewCourse' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Course') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('coordinator.allCourses') }}" class="nav-link {{ session('lsbsm') == 'allCourses' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Courses') }}</p>
                </a>
              </li>
              
            </ul> --}}
          </li>
          {{-- ./course --}}


          {{-- package --}}
          <li class="nav-item has-treeview {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
            <a href="{{ route('coordinator.allPackages') }}" class="nav-link ">
              <i class="nav-icon far fa-circle nav-icon"></i>
              <p>
                {{ __('Packages') }}
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="{{ route('coordinator.addNewPackage') }}" class="nav-link {{ session('lsbsm') == 'addNewPackage' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('Create New Package') }}</p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="{{ route('coordinator.allPackages') }}" class="nav-link {{ session('lsbsm') == 'allPackages' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('All Packages') }}</p>
                </a>
              </li>
              
            </ul> --}}
          </li>
          {{-- ./package --}}


          {{-- <li class="nav-item">
            <a href="{{ route('coordinator.messages') }}"
                    class="nav-link {{ session('Messages') == 'Messages' ? ' active ' : '' }}">
                    <i class="far fa-comments nav-icon"></i>
                    <p>{{ __('Messages') }}</p>
                </a>
          </li> --}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
