<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link bg-primary">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-compact" data-widget="treeview" role="menu"
                data-accordion="true">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview {{ session('lsbm') == 'dashboard' ? ' menu-open ' : '' }}">
                    <a href="{{ route('subrole.dashboard', $subrole) }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">

                        <li class="nav-item ">
                            <a href="{{ route('subrole.dashboard', $subrole) }}"
                                class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Dashboard') }}</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>

                {{-- packages --}}

                <li class="nav-item has-treeview {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
                    <a href="{{route('subrole.allPackages',$subrole)}}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('My Packages') }}
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('subrole.allPackages',$subrole)}}"
                                class="nav-link {{ session('lsbsm') == 'allPackage' ? ' active ' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('All Packages') }}</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                {{-- ./packages --}}


                {{-- all course --}}

                <li class="nav-item has-treeview {{ session('lsbm') == 'course' ? ' menu-open ' : '' }}">
                    <a href="{{ route('subrole.takenCourses', $subrole) }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('My Courses') }}
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('subrole.takenCourses', $subrole) }}"
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
                    <a href="{{ route('subrole.takenAttempts', $subrole) }}" class="nav-link ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('My Exams') }}
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">

                        <li class="nav-item ">
                            <a href="" class="nav-link {{ session('lsbsm') == 'examSchedule' ? ' active ' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('All Exams Schedule') }}</p>
                        </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{ route('subrole.takenAttempts', $subrole) }}"
                                    class="nav-link {{ session('lsbsm') == 'examResult' ? ' active ' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('All Exam Results') }}</p>
                                </a>
                            </li>
                    </ul> --}}
            </li>
            {{-- ./exam --}}

            
            {{-- certificates --}}

            <li class="nav-item has-treeview {{ session('lsbm') == 'certificate' ? ' menu-open ' : '' }}">
                <a href="{{ route('subrole.takenAttemptCertificates', $subrole) }}" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        {{ __('My Certificate') }}
                        {{-- <i class="right fas fa-angle-left"></i> --}}
                    </p>
                </a>
                {{-- <ul class="nav nav-treeview">

                    <li class="nav-item ">
                        <a href="{{ route('subrole.takenAttemptCertificates', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'certificate' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('All Exam Certificates') }}</p>
                        </a>
                    </li>
                </ul> --}}
            </li>
            {{-- ./certificates --}}

            {{-- users data --}}
            <li class="nav-item has-treeview {{ session('lsbm') == 'userInfo' ? ' menu-open ' : '' }}">
                <a href="#" class="nav-link ">
                    <i class="nav-icon far fa-circle nav-icon"></i>
                    <p>
                        {{ __('User Info') }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{route('subrole.editUserDetails', $subrole)}}"
                            class="nav-link {{ session('lsbsm') == 'editUserDetails' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('User Details Update') }}</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{route('subrole.editUserPassword', $subrole)}}"
                            class="nav-link {{ session('lsbsm') == 'editUserPassword' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('User Password Update') }}</p>
                        </a>
                    </li>
                </ul>
            </li>


            @if ($subrole->title != 'member')
                {{-- certificates --}}

            <li class="nav-item has-treeview {{ session('lsbm') == 'assessor' ? ' menu-open ' : '' }}">
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        My {{ Str::ucfirst(auth()->user()->companyRole->title) }} Activity
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a href="{{ route('assessor.assessorAllPackages', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'packages' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Company Packages') }}</p>
                        </a>
                        <a href="{{ route('assessor.allTakenCourses', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'takenCourses' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Taken Courses') }}</p>
                        </a>
                        <a href="{{ route('assessor.takenAttempts', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'takenAttempts' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Taken Attempts') }}</p>
                        </a>
                        <a href="{{ route('assessor.companyMembers', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'Members' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Company Members') }}</p>
                        </a>
                        <a href="{{ route('assessor.courseMatrix', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'courseMatrix' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Course Matrix') }}</p>
                        </a>
                        {{-- <a href="{{ route('assessor.messages', $subrole) }}"
                            class="nav-link {{ session('lsbsm') == 'Messages' ? ' active ' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>{{ __('Messages') }}</p>
                        </a> --}}
                    </li>
                </ul>
            </li>
            {{-- ./certificates --}}
            @endif
            <li class="nav-item {{ session('Messages') == 'Messages' ? ' active ' : '' }}">
                <a href="{{ route('subrole.messages', $subrole) }}"
                    class="nav-link {{ session('Messages') == 'Messages' ? ' active ' : '' }}">
                    <i class="far fa-comments nav-icon"></i>
                    <p>{{ __('Messages') }}</p>
                </a>
            </li>
            {{-- ./users Data --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
