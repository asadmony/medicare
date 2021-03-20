  <header class="main-header">

    <a class="logo" href="{{ url('/') }}">
      <span class="logo-mini">Amb</span>
      <span class="logo-lg">{{ config('app.name', 'Laravel') }}</span>      
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          @if(Auth::guest())
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if(Auth::user()->isAdmin())
                <li>
                  <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
                </li>
                @endif

                @if(Auth::user()->isEditor())
                <li>
                  <a href="{{route('editor.dashboard')}}"><i class="fa fa-dashboard"></i> Editor Dashboard</a>
                </li>
                @endif

                @if(Auth::user()->isDistEditor())
                <li>
                  <a href="{{route('distEditor.dashboard')}}"><i class="fa fa-dashboard"></i> Dist. Repr. Dashboard</a>
                </li>
                @endif

                @if(Auth::user()->isThanaEditor())
                <li>
                  <a href="{{route('thanaEditor.dashboard')}}"><i class="fa fa-dashboard"></i> Thana Repr. Dashboard</a>
                </li>
                @endif

                @if(Auth::check())
                <li>
                  <a href="{{route('customer.dashboard')}}"><i class="fa fa-cog"></i> Settings</a>
                </li>
                @endif



                <li class="divider"></li>
                <li>
                  <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fa fa-sign-out"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>

          @endif


 
        </ul>
      </div>
    </nav>
  </header>