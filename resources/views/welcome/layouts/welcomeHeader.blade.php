<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{ url('/') }}"><img src="{{ asset('se/assets/img/logo/logo1.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="index.html"> Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="services.html">Services</a></li>

                                    @auth

                                    <li><a href="blog.html">{{ Auth::user()->email }}</a>
                                        <ul class="submenu">

                                            @if(Auth::user()->isAdmin())

                                            <li>

                                                <a href="{{ route('admin.dashboard') }}" class="">
                                                    <i class="fas fa-th mr-2"></i> {{ __('Admin') }}


                                                </a>

                                            </li>


                                            @endif



                                            @if(Auth::user()->hasCompanyRole())

                                            @foreach(Auth::user()->activeCompanies() as $company)

                                            <li>

                                                <a title="{{ $company->title }}"
                                                    href="{{ route('company.dashboard', $company) }}" class="">
                                                    <i class="fas fa-user-circle mr-2"></i>

                                                    {{ custom_title($company->title,10,'..') }}

                                                    {{-- <span class="float-right text-muted text-sm"></span> --}}

                                                </a>
                                            </li>
                                            @endforeach
                                            @endif


                                            <div class="dropdown-divider"></div>

                                            <li>

                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="">
                                                    <i class="fas fa-sign-out-alt mr-2"></i> {{ __('logout') }}
                                                    {{-- <span class="float-right text-muted text-sm"></span> --}}
                                                </a>
                                            </li>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>

                                    </li>






                                </ul>
                                </li>


                                @else
                                <li><a href="{{ url('/login') }}">Login</a></li>


                                @endauth

                                <li><a href="#">Pages</a>
                                    <ul class="submenu">
                                        <li><a href="elements.html">Element</a></li>
                                    </ul>
                                </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <a href="#" class="btn header-btn">Contact Us</a>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
