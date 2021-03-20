@auth

<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user-circle"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        {{-- <span class="dropdown-header">15 Notifications</span> --}}
        {{-- <div class="dropdown-divider"></div> --}}
        @if(Auth::user()->isAdmin())
        <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> {{ __('Admin Dashboard') }}
        </a>
        @endif

        @if(Auth::user()->isCoordinator())
        <a href="{{ route('coordinator.dashboard') }}" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> {{ __('Coordinator Dashboard') }}
        </a>
        @endif


        @if(Auth::user()->hasCompanyRole())

        @foreach(Auth::user()->activeCompanies() as $company)
        <a title="{{ $company->title }}" href="{{ route('company.dashboard', $company) }}" class="dropdown-item">
            <i class="fas fa-user-circle mr-2"></i>

            Company: {{ custom_title($company->company_code,10,'..') }}

            {{-- <span class="float-right text-muted text-sm"></span> --}}

        </a>
        @endforeach
        @endif



        @if(Auth::user()->hasSubrole())
        @foreach (Auth::user()->activeSubroles() as $subrole)
        <a title="company: {{$subrole->company? $subrole->company->title : ''}}"
            href="{{ route('subrole.dashboard', $subrole) }}" class="dropdown-item">

            <i class="fas fa-user-tag mr-2"></i>
            Member Role: {{$subrole->title}}
        </a>
        @endforeach

        @endif
        @if(Auth::user())
        <a class="dropdown-item" href="{{route('user.dashboard')}}">
            <i class="fas fa-user-tag mr-2"></i>
            User Dashboard</a>
        @endif


        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> {{ __('logout') }}
            {{-- <span class="float-right text-muted text-sm"></span> --}}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

</li>

@else


<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('login') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('register') }}</a></li>

@endauth
