<section  id="profile_display_bg" > 
  {{-- <div class="slider-overlay-">
    style="background-image: url('{{ asset('asset/images/home/slider.jpg') }}')"
  </div> --}}
  <div class=" float-right login-form">
    @guest
      <a href="{{ url('/login') }}" class="btn"> Login</a>
      <a href="{{ url('/signup') }}" class="btn"> Register</a>
    @else
      <div class="btn">
        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Hi, {{ Auth::user()->first_name}}
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="{{ route('users.myprofile') }}">Home</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
      {{-- <a class="btn" href="{{ route('users.myprofile') }}">Hi, {{ Auth::user()->first_name}}</a> --}}
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


      <a class="btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="fa fa-sign-out"></span> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
    @endguest

  </div>
</section>
