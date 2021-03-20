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
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
            data-accordion="true">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item has-treeview {{ session('lsbm') == 'dashboard' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.dashboard', $company) }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Dashboard') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{ route('company.dashboard', $company) }}"
                            class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>

            {{-- packages --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
                <a href="{{route('company.allPackages', $company)}}" class="nav-link ">
                    <i class="nav-icon fa fa-cube"></i>
                    <p>
                        {{ __('Packages') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{route('company.allPackages', $company)}}"
                            class="nav-link {{ session('lsbsm') == 'allpackages' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Packages') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>
            {{-- ./end packages --}}

            {{-- all course --}}

            <li class="nav-item has-treeview {{ session('lsbm') == 'course' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.allTakenCourses', $company) }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Courses') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{ route('company.allTakenCourses', $company) }}"
                            class="nav-link {{ session('lsbsm') == 'allcourses' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Courses') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>

            {{-- ./all course --}}

            {{-- exam --}}

            <li class="nav-item has-treeview {{ session('lsbm') == 'exam' ? ' menu-open ' : '' }}">
                <a href="{{ route('company.takenAttempts', $company) }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Exams') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview"> --}}

                    {{-- <li class="nav-item ">
                        <a href="" class="nav-link {{ session('lsbsm') == 'examSchedule' ? ' active ' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('All Exams Schedule') }}</p>
                    </a>
            </li> --}}
                {{-- <li class="nav-item ">
                    <a href="{{ route('company.takenAttempts', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'examResult' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('All Exams ') }}</p>
                    </a>
                </li> --}}
            {{-- </ul> --}}
        </li>
        {{-- ./exam --}}

        {{-- company --}}
        <li class="nav-item has-treeview {{ session('lsbm') == 'company' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.companyDetails', $company) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Company') }} 
                    {{-- <i class="fas fa-angle-left right"></i> --}}
                </p>
            </a>
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href="{{ route('company.companyDetails', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'companyDetails' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('Company Details') }}</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('company.companyDetailsUpdate', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'companyDetailsUpdate' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('Company Details Update') }}</p>
                    </a>
                </li>
            </ul> --}}
        </li>
        {{-- ./company --}}
        {{-- user --}}
        <li class="nav-item has-treeview {{ session('lsbm') == 'role' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.editUserDetails', $company) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Member User') }} <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href="{{ route('company.editUserDetails', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'editUserDetails' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('User Details Update') }}</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('company.editUserPassword', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'editUserPassword' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('User Password Update') }}</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('company.newSubrole', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'newSubrole' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('New Member') }}</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('company.allSubroles', [$company, 'member']) }}"
                        class="nav-link {{ session('lsbsm') == 'allSubrolesmember' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('All Members') }}</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('company.allSubroles', [$company, 'assessor']) }}"
                        class="nav-link {{ session('lsbsm') == 'allSubrolesassessor' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('All Assessors') }}</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="{{ route('company.allSubroles', [$company, 'administrator']) }}"
                        class="nav-link {{ session('lsbsm') == 'allSubrolesadministrator' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('All Administrators') }}</p>
                    </a>
                </li>
            </ul>
        </li>
        {{-- ./ user --}}
        <li class="nav-item has-treeview {{ session('lsbsm') == 'certificates' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.allCertificates', $company) }}" class="nav-link">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <p>{{ __('Certificates') }} 
                    {{-- <i class="fas fa-angle-left right"></i> --}}
                </p>
            </a>
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href="{{ route('company.allCertificates', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'editUserDetails' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('All successful Attempt certificates') }}</p>
                    </a>
                </li>
            </ul> --}}
        </li>
        <li class="nav-item has-treeview {{ session('lsbm') == 'courseMatrix' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.courseMatrix', $company) }}" class="nav-link">
                <i class="fas fa-tachometer-alt nav-icon"></i>
                <p>{{ __('Course Matrix') }} 
                    {{-- <i class="fas fa-angle-left right"></i> --}}
                </p>
            </a>
            {{-- <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href="{{ route('company.courseMatrix', $company) }}"
                        class="nav-link {{ session('lsbsm') == 'courseMatrix' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('Company Course Matrix') }}</p>
                    </a>
                </li>
            </ul> --}}
        </li>
        <li class="nav-item has-treeview {{ session('lsbm') == 'Messages' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.messages', $company) }}"
                    class="nav-link ">
                    <i class="far fa-comments nav-icon"></i>
                    <p>{{ __('Messages') }}</p>
                </a>
        </li>
        <li class="nav-item has-treeview {{ session('lsbm') == 'comMessages' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.all.messages', $company) }}"
                    class="nav-link">
                    <i class="far fa-comments nav-icon"></i>
                    <p>{{ __('Company Messages') }}</p>
                </a>
        </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
