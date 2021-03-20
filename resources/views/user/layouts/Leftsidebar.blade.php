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
                <a href="{{ route('user.dashboard') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Dashboard') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ route('user.dashboard') }}"
                            class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Dashboard') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>


            {{-- Credit --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'credit' ? ' menu-open ' : '' }}">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Credits') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('user.checkoutCredit') }}"
                            class="nav-link {{ session('lsbsm') == 'buyCredit' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Buy Credits') }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.creditHistory') }}"
                            class="nav-link {{ session('lsbsm') == 'creditHistory' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Credit History') }}</p>
                        </a>
                    </li>

                </ul>
            </li>
            {{-- ./Credit --}}

            {{-- package --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Packages') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="/#buyPackage"
                            class="nav-link {{ session('lsbsm') == 'addNewPackage' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Buy new Package') }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{ route('user.listPackage') }}"
                            class="nav-link {{ session('lsbsm') == 'allPackages' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Packages') }}</p>
                        </a>
                    </li>

                </ul>
            </li>
            {{-- ./package --}}

            {{-- all course --}}

            <li class="nav-item has-treeview {{ session('lsbm') == 'course' ? ' menu-open ' : '' }}">
                <a href="{{ route('user.allTakenCourses') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Courses') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{ route('user.allTakenCourses') }}"
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
                <a href="{{ route('user.allTakenCourseExams') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Exams') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ route('user.allTakenCourseExams') }}"
                            class="nav-link {{ session('lsbsm') == 'examResult' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Exams') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>
            {{-- ./exam --}}

            {{-- company --}}
            {{-- <li class="nav-item has-treeview {{ session('lsbm') == 'company' ? ' menu-open ' : '' }}">
            <a href="{{ route('company.companyDetails', $company) }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>{{ __('Company') }} <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
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
            </ul>
            </li> --}}
            {{-- ./company --}}
            {{-- user --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'user' ? ' menu-open ' : '' }}">
                <a href="" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ __('User Info') }} <i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('user.editUserDetails',auth()->user()->id)}}"
                            class="nav-link {{ session('lsbsm') == 'editUserDetails' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('User Details Update') }}</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ route('user.editUserPassword', auth()->user()->id) }}"
                            class="nav-link {{ session('lsbsm') == 'editUserPassword' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('User Password Update') }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            {{-- ./ user --}}
            {{-- certificates --}}

            <li class="nav-item has-treeview {{ session('lsbm') == 'certificate' ? ' menu-open ' : '' }}">
                <a href="{{ route('user.takenAttemptCertificates') }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('Certificate') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ route('user.takenAttemptCertificates') }}"
                            class="nav-link {{ session('lsbsm') == 'certificate' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Exam Certificates') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>
            <li class="nav-item">
                <a href="{{ route('read.messages') }}"
                            class="nav-link {{ session('lsbsm') == 'Messages' ? ' active ' : '' }}">
                            <i class="far fa-comments nav-icon"></i>
                            <p>{{ __('Messages') }}</p>
                        </a>
            </li>
            {{-- ./certificates --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
