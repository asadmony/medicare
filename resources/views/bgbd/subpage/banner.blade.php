<section class="col d-none d-sm-block" id="slider_section" style="background-image: url('{{ asset('asset/images/home/Marriage-media-in-Dhaka.jpg') }}')">
  <div class="slider-overlay- ">
    {{-- registrations starts --}}
    @guest
      <div class="container">
        <div class="row">
          <div class="col-8"></div>
          <div class="col-4 w3-white w3-border w3-round mt-5 d-none d-md-block d-lg-block" id="registration-form-bg" style="height: 411px;">
            @include('bgbd.subpage.frontRegForm')
            
          </div>
        </div>
      </div>
    @endguest
    {{-- registration ends --}}

    <div class="float-right login-form d-none d-md-block">
      @guest
      <a href="{{ url('/login') }}" class="btn"> Login</a>
      <a href="{{ url('/signup') }}" class="btn"> Register</a>
      @else
      @if(Auth::user()->status)
      <a class="btn" href="{{ route('users.myprofile') }}">Hi, {{ Auth::user()->first_name}}</a>
      <a href="{{ route("user.inbox") }}" class="btn"><i class="fab fa-facebook-messenger"></i>
        @if (\App\Common::message_notification(Auth::user()->id))
        <span class="my-notification">{{ \App\Common::message_notification(Auth::user()->id) }}</span>
        @endif
      </a>

      <a href="{{ route('user.pending_receive_interest') }}" class="btn">
        <i class="fas fa-bell"></i>
        @if (\App\Common::interest_notification(Auth::user()->id))
        <span class="my-notification">{{ \App\Common::interest_notification(Auth::user()->id) }}</span>
        @endif
      </a>
      @else
        <a class="btn" href="#">Hi, {{ Auth::user()->first_name}}</a>
        <a class="btn" href="#">Pending</a>
      @endif


      <a class="btn" href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="fa fa-sign-out"></span> {{ __('Logout') }}
      </a>
      <form id="logout-form" action="#" method="POST" style="display: none;">
        @csrf
      </form>
      @endguest
    </div>

  </div>
</section>

<section class="d-md-none d-lg-none d-xl-none d-sm-none"  style="height:417px;background-position: 40% 7%;background-repeat: no-repeat;background-image: url('{{ asset('asset/images/home/Marriage-media-in-Dhaka.jpg') }}')">

  

</section>