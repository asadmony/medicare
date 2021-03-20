@extends('bgbd.master')

@section('content')
<section id="slider_section" style="background-image: url('{{ asset('asset/images/home/Online-matchmaking.jpg') }}')">
  <div class="float-right login-form d-none d-md-block">
    @guest
    <a href="{{ url('/login') }}" class="btn"> Login</a>
    <a href="{{ url('/register') }}" class="btn"> Register</a>
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


    <a class="btn" href="{{ route('logout') }}"
      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <span class="fa fa-sign-out"></span> {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    @endguest
  </div>
</section>  
{{-- <section class="pb-5 contact_page_bg">
  <div class="container pb-5">
    <div class="row ">
      
    </div>
  </div>
</section> --}}
<section>
  <div style="color: #000; width: 100%; height: auto; background: #d81f26;">
    <div class="container">
      <div class="row">
          <h2 class="w3-text-center" style="color:#fff; text-align: justify;">An Exclusive And Dedicated Matchmaking for Elite Class</h2>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container mt-5">
      <div class="row">
        <div class="w3-container w3-half" style="margin-top: -10px;">
          <div class="w3-card w3-mobile" style="min-height: 100%;">
            <div class="container">
              <h3 class="w3-text-red" style="text-transform:uppercase; padding-top:15px; text-align:center;">Confidential Matchmaking</h3>
              <p style="text-align: justify; line-height: 26px;">
                Confidential matchmaking is an exclusive and dedicated service by bridegroombd.com for the elite and well off families befitting their dignity and expectation. We respect your privacy and dignity.
                <br> <br>
                What’s make you confuse and what’s more important to you is your privacy. Yes, we value your privacy. Your 100% privacy and confidentiality is our commitment. 
                <br><br>
                Many elite class families do not believe in public online matching. That’s why we are here to take your responsibility of confidentiality and aristocracy. 
                <br> <br>
                Our matchmaking professionals are proficient in handling the Elite to meet up their sophisticated requirements. Our dedicated expert team is excellent in match-making for fulfilling your requirements. 
                <br> <br>
                We always offer you distinguished care, guaranteed confidentiality and exclusive attention considering your stature, social dignity, life style and family background. 
                <br> <br>
                We respect your trust. We are committed to provide the finest elite matches from suitable families befitting your expectation and life style. We provide multiple essential services to find a relevant soul mate. 
                <br><br>
                We do everything at every step of the journey to take matchmaking experience to the next level of success for conducting marriage. We believe in outcome-oriented action. 
                <br> <br>
                Feel confident with us. Enroll right away to avail our awesome confidential elite service!!

              </p>
              <h3>Success Fee</h3>
              <p class="pl-5">1. <span style="color: red">BDT 50,000</span> if we get you a match within 2 months. </p>
              <p class="pl-5">2. <span style="color: red">BDT 40,000</span> if we get you a match within 4 months. </p>
              <p class="pl-5">3. <span style="color: red">BDT 30,000</span> if we get you a match within 5 months. </p>
              <p class="pl-5">4. <span style="color: red">BDT 20,000</span> if we get you a match within 6 months. </p>
            </div>
          </div>
        </div>
        <div class=" w3-container w3-half">
          <div class="w3-card w3-mobile">
            <div class="w3-container">
              <h2 style="text-align: center; color:#a09797;">Elite Matchmaking</h2>
              <h4 style="text-align: center; font-weight: 500;" class="w3-text-deep-orange">Upload your CV , we will keep it confidential.</h4>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
          <form class="w3-container" style="padding: 15px !important;" method="POST" action="{{route('contacts')}}" enctype="multipart/form-data">
              @csrf
  
              <input required class="w3-input w3-border w3-round-small " name="name" style="padding: 4px !important;" type="text" placeholder="Your Name*">
              @if ($errors->has('name'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_name"></strong>
                </span>
              {{-- Start --}}
              <select required='required' name="profilemadeby" id="profilemadeby" class="mt-2 w3-input w3-border w3-round-small" style="padding: 4px !important;">
                <option selected value="">Seeking match for</option>
                @foreach (profileMadefor() as $key => $value)
                  <option {{ old('profilemadeby') == $value ? 'selected' : '' }} value="{{ $value }}">
                    {{  $value }}
                  </option>
                @endforeach
              </select>
              {{-- End --}}
  
              {{-- input field --}}
              <input required class="w3-input w3-border w3-round-small mt-2" name="mobile" style="padding: 4px !important;" type="text" placeholder="Mobile Number*">
              @if ($errors->has('mobile'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('mobile') }}</strong>
                  </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_mobile"></strong>
                </span>
              <input required class="w3-input w3-border w3-round-small mt-2" name="email" style="padding: 4px !important;" type="email" placeholder="Email ID*">
              @if ($errors->has('email'))
                  <span class="text-danger" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
                <span class="text-danger" role="alert">
                  <strong id="err_email"></strong>
                </span>
              {{-- end --}}
  
              <textarea class="w3-input w3-border w3-round-small mt-2" name="desct" style="padding: 4px !important;" type="text" placeholder="Description"></textarea>
              

              <div class="row">
                  <div class="col-sm-6">
                    <span class="badge badge-default">Upload CV (We will keep it confidential)</span>
                <input type="file" class="w3-input w3-border w3-round-small mt-2" name="file" style="padding: 4px !important;">
                  @if ($errors->has('file'))
                    <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('file') }}</strong>
                    </span>
                  @endif
                  <span class="text-danger" role="alert">
                    <strong id="err_file"></strong>
                  </span>
                  </div>
                  <div class="col-sm-6">
                    
                    <span class="badge badge-default">Upload Your Picture</span>
                <input type="file" class="w3-input w3-border w3-round-small mt-2" name="image_file" style="padding: 4px !important;">
                  @if ($errors->has('file'))
                    <span class="text-danger" role="alert">
                      <strong>{{ $errors->first('image_file') }}</strong>
                    </span>
                  @endif
                  <span class="text-danger" role="alert">
                    <strong id="err_image_file"></strong>
                  </span>

                  </div>
                </div>
              {{-- button --}}
              <button class="uk-button uk-button-block create_acc mt-4" id="sign-up">Request A Call Back</button>
              {{-- btn end --}}
            </form>
          </div>
        </div>
      </div>
  </div>
</section>
@endsection