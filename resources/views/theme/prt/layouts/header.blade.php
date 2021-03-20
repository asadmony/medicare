<header id="header" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 108, 'stickySetTop': '-108px', 'stickyChangeLogo': true}">
<div class="header-body border-color-primary border-top-0 box-shadow-none">
<div class="header-container container z-index-2">
<div class="header-row">
<div class="header-column">
<div class="header-row">
<div class="header-logo header-logo-sticky-change">
<a href="/">
@isset($websiteParameter->logo_alt)
<img class="header-logo-sticky opacity-0" alt="{{env('APP_NAME_BIG')}}" width="140" height="40" data-sticky-width="100" data-sticky-height="30" data-sticky-top="88" src="{{asset('storage/logo/'. $websiteParameter->logo_alt)}}">
@endisset
@isset($websiteParameter->logo)
<img class="header-logo-non-sticky opacity-0" alt="Porto" width="170" height="48" src="{{asset('storage/logo/'. $websiteParameter->logo)}}">
@endisset
@if (!isset($websiteParameter->logo_alt) && !isset($websiteParameter->logo))
    <b>{{ env('APP_NAME') }}</b>
@endif

</a>
</div>
</div>
</div>

<div class="d-none d-sm-block">
<div class="w3-card rounded">

<img class="rounded" width="200" src="{{asset('img/newteam.png')}}" alt="">
</div>
</div>
<div class="header-column justify-content-end">
<div class="header-row h-100">
<ul class="header-extra-info d-flex h-100 align-items-center">
<li class="align-items-center h-100 py-4 header-border-right pr-4 d-none d-md-inline-flex">
<div class="header-extra-info-text h-100 py-2">
<div class="feature-box feature-box-style-2 align-items-center">
<div class="feature-box-icon">
<i class="far fa-envelope text-7 p-relative"></i>
</div>
<div class="feature-box-info pl-1">
<label>SEND US AN EMAIL</label>
<strong>
    <a href="mailto:{{ $websiteParameter->contact_email ?? '' }}">{{ $websiteParameter->contact_email ?? '' }}</a>
</strong>
</div>
</div>
</div>
</li>
<li class="align-items-center h-100 py-4">
<div class="header-extra-info-text h-100 py-2">
<div class="feature-box feature-box-style-2 align-items-center">
<div class="feature-box-icon">
<i class="fab fa-whatsapp text-7 p-relative"></i>
</div>
<div class="feature-box-info pl-1">
<label>CALL US NOW</label>
<strong><a href="tel:{{ $websiteParameter->contact_mobile ?? '' }}">{{ $websiteParameter->contact_mobile ?? '' }}</a></strong>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="header-nav-bar bg-primary" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'background-color': '#0088cc'}">
<div class="container">
<div class="header-row">
<div class="header-column">
<div class="header-row">
<div class="header-colum order-2 order-lg-1">
<div class="header-row">
<div class="header-nav header-nav-stripe header-nav-divisor header-nav-force-light-text justify-content-start" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-left': '110px'}" data-sticky-header-style-deactive="{'margin-left': '0'}">
<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
<nav class="collapse">
<ul class="nav nav-pills" id="mainNav">
<li class="dropdown dropdown-full-color dropdown-light">
<a class="  dropdown-item dropdown-toggle" href="/">
Home
</a>

</li>
 
<li class="dropdown dropdown-full-color dropdown-light">
<a class="dropdown-item dropdown-toggle " href="{{route('welcome.allCoursesQualificationByMode', 'course')}}">
Course
</a>

</li>
<li class="dropdown dropdown-full-color dropdown-light">
<a class="dropdown-item dropdown-toggle" href="{{route('welcome.allCoursesQualificationByMode', 'qualification')}}">
Qualification
</a>

</li>


@if(Auth::guest())

<li class="dropdown dropdown-full-color dropdown-light">
<a class="dropdown-item dropdown-toggle" href="{{route('login')}}">
Login
</a>

</li>

<li class="dropdown dropdown-full-color dropdown-light">
<a class="dropdown-item dropdown-toggle" href="{{route('welcome.registrationOption')}}">
Register
</a>

</li>





@else



<li class="dropdown dropdown-full-color dropdown-light">
<a title="{{ Auth::user()->name }}" class="dropdown-item dropdown-toggle" href="#">
<i class="fas fa-user-circle mr-2"></i> {{Str::limit(Auth::user()->email, 10)}}
</a>

<ul class="dropdown-menu">

@if(Auth::user()->isAdmin())
<li>
<a class="dropdown-item w3-hover-blue" href="{{route('admin.dashboard')}}">
<i class="fas fa-th mr-2 w3-text-deep-orange"></i> Admin Dashboard
</a>
</li>
@endif

@if(Auth::user()->isCoordinator())
<li>
<a class="dropdown-item w3-hover-blue" href="{{route('coordinator.dashboard')}}">
<i class="fas fa-th mr-2 w3-text-deep-orange"></i> Coordinator Dashboard
</a>
</li>
@endif

<li>
<a class="dropdown-item w3-hover-blue" href="{{route('user.dashboard')}}">
<i class="fas fa-user-tag mr-2 w3-text-blue"></i> My Dashboard
</a>
</li>




@if(Auth::user()->hasCompanyRole())
<li class="dropdown-submenu">
<a class="dropdown-item w3-hover-blue" href="#"><i class="fas fa-th mr-2 w3-text-green"></i> Company</a>
<ul class="dropdown-menu">
@foreach(Auth::user()->activeCompanies() as $company)
<li><a title="{{ $company->title }}" class="dropdown-item w3-hover-blue" href="{{ route('company.dashboard', $company) }}"><i class="fas fa-tag mr-2 w3-text-blue"></i> Company: {{ custom_title($company->company_code,10,'..') }}</a>
</li>
@endforeach

</ul>
</li>
@endif

@if(Auth::user()->hasSubrole())
<li class="dropdown-submenu">
<a class="dropdown-item w3-hover-blue" href="#"><i class="fas fa-user mr-2"></i> Company Member</a>
<ul class="dropdown-menu">
@foreach (Auth::user()->activeSubroles() as $subrole)

<li><a  title="company: {{$subrole->company? $subrole->company->title : ''}}" class="dropdown-item w3-hover-blue" href="{{ route('subrole.dashboard', $subrole) }}"><i class="fas fa-user-tag mr-2"></i>
Member Role: {{$subrole->title}}</a></li>

@endforeach
</ul>
</li>
@endif

<li>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form-header').submit();" class="dropdown-item w3-hover-blue">
        <i class="fas fa-sign-out-alt mr-2"></i> {{ __('logout') }}
        {{-- <span class="float-right text-muted text-sm"></span> --}}
    </a>
</li>

<form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>


</ul>
</li>
 




@endif
<li class="dropdown dropdown-full-color dropdown-light">
    <a title="#" class="dropdown-item dropdown-toggle" href="#">
        About  <i class="fa fa-angle-down pl-1"></i>
    </a>
    @isset($headerMenuPages)
        
    <ul class="dropdown-menu">
        @foreach ($headerMenuPages as $page)
        <li>
            <a class="dropdown-item w3-hover-blue" href="{{ route('welcome.page', [$page->id,$page->route_name] ) }}">
                {{ $page->page_title }}
            </a>
        </li>
        @endforeach
    </ul>
    @endisset
</li>








</ul>
</nav>
</div>
<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
<i class="fas fa-bars"></i>
</button>
</div>
</div>
</div>
<div class="header-column order-1 order-lg-2">
<div class="header-row justify-content-end">
<div class="header-nav-features header-nav-features-no-border w-75 w-auto-mobile d-none d-sm-flex">
<form role="search" class="d-flex w-100" action="{{ route('welcome.search') }}" method="get">
<div class="simple-search input-group w-100">
<input class="form-control border-0" id="headerSearch" name="q" type="search" value="@isset($search){{ $search }}@endisset" placeholder="Search...">
<span class="input-group-append bg-light border-0">
<button class="btn" type="submit">
<i class="fa fa-search header-nav-top-icon"></i>
</button>
</span>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>