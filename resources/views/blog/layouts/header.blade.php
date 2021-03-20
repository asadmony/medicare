 

{{-- <div class="w3-container hidden-xs" style="padding: 0;background-color: #0B3E75;">

  <div class="container">
    <div class="w3-bar" style="background-color: #0B3E75;min-height: 27px;">
    <a href="#" class="w3-bar-item w3-left w3-text-white"> </a>
    <a href="#" class="w3-bar-item w3-right w3-text-white"> </a>

    <a href="#" class="w3-bar-item w3-right w3-text-white"> </a>

  </div>
  </div>  
</div> --}}


<header class="main-header">
    <nav class="navbar navbar-static-top w3-{{$blogParameter->header_bg_color}} ">
      <div class="container-fluid">
 
            <div class="navbar-header">
          {{-- <a class="navbar-brand" href="{{ url('/') }}">
             <img src="{{asset('img/logo_bn.jpg')}}" alt="tmm" style="margin-top: -15px;width: 100px;">
          </a> --}}

          <button type="button" class="navbar-toggle collapsed w3-text-{{$blogParameter->header_text_color}}  " data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">

          <ul class="nav navbar-nav">

            <li>
              <a href="{{ url('/') }}" class="photo-gallery w3-text-{{$blogParameter->header_text_color}} "><i class="fa fa- "></i> <img class="img-responsive w3-border w3-round" src="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" alt="{{ env('APP_NAME_BIG') }}" style="width: 50px; margin-top: -24px;"></a>
            </li>

            <li>
              <a href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}" class=" w3-text-{{$blogParameter->header_text_color}} "><i class="fa fa-phone"></i> +{{ bdMobile(env('CONTACT_MOBILE1')) }} </a>

            </li>

            {{-- <li><a href="javascript::void(0)" class="go-archive w3-text-{{$blogParameter->header_text_color}} "><i class="fa fa-archive"></i> পুরনো সংখ্যা </a></li> --}}



          </ul>


          <form class="navbar-form navbar-left" method="get" action="{{route('welcome.topSearch')}}" >
              <div class="input-group" style="width: 350px;">
              <input type="text" name="q" value="{{$q or ''}}" class="form-control search-user-header" placeholder="Search..." style="border-top-left-radius: 4px;border-bottom-left-radius: 4px;">
              <span class="input-group-btn">
                <button type="submit" id="search-btn" class="btn w3-{{$blogParameter->main_color}} "><i class="fa fa-search"></i></button>
              </span>
            </div>
    </form>

          <ul class="nav navbar-nav">
            <li><a  class="w3-text-{{$blogParameter->header_text_color}} " href="{{ url('success/profiles') }}"><i class="fa fa-users"></i> Success Stories</a></li>

            <li><a  class="w3-text-{{$blogParameter->header_text_color}} " href="{{ url('page/membership_package') }}"><i class="fa fa-credit-card"></i> Membership Packages</a></li>

            {{-- <li><a class="w3-text-{{$blogParameter->header_text_color}} "  href="#">English Version</a></li> --}}
            


          </ul>

          
 
 
        </div>
        <!-- /.navbar-collapse -->

                <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            

            @if(Auth::guest())
                <li><a class="w3-text-{{$blogParameter->header_text_color}} " href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                {{-- <li><a href="{{ route('register') }}"><i class="fa fa-sign-up"></i> Register</a></li> --}}
            @else

            <li class="dropdown">
              <a href="#" class="dropdown-toggle w3-text-{{$blogParameter->header_text_color}} " data-toggle="dropdown">{{Auth::user()->name}} <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                @if(Auth::user()->isAdmin())
                <li>
                  <a class="w3-text-{{$blogParameter->header_text_color}} " href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin Dashboard</a>
                </li>
                @endif

                @if(Auth::user()->isBlogAdmin())
                <li>
                  <a class="w3-text-{{$blogParameter->header_text_color}} " href="{{route('blogAdmin.dashboard')}}"><i class="fa fa-dashboard"></i> Blog Admin Dashboard</a>
                </li>
                @endif

                


                

                @if(Auth::check())
                <li>
                  <a class="w3-text-{{$blogParameter->header_text_color}} " href="{{route('welcome.welcome')}}"><i class="fa fa-cog"></i> Dashboard</a>
                </li>
                @endif


                <li class="divider"></li>
                <li>
                  <a class="w3-text-{{$blogParameter->header_text_color}} " href="{{ route('logout') }}"
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

      
      <!-- /.navbar-custom-menu -->


          <!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_inline_follow_toolbox pull-right hidden-xs" style="margin-top: 6px;"></div>




    </div>
    <!-- /.container-fluid -->
  </nav>
</header>


{{-- <div class="w3-container hidden-xs" style="padding: 0;max-height: 26px;background-color: #0166B3;">

  <div class="container">

      <div class="w3-bar" style="background-color: #0166B3;padding: 0;line-height: .8;min-height: 27px;">
    <a href="#" class="w3-bar-item w3-left w3-text-white">Call</a>
    <a href="#" class="w3-bar-item w3-right w3-text-white">Wishlist</a>

    <a href="#" class="w3-bar-item w3-right w3-text-white">Easy Reorder</a>
    
  </div>



  </div>
</div> --}}