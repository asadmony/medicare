@extends('bgbd.master')
@section('content')
<section id="slider_section" style="background-image: url('{{ asset('asset/images/home/slider.jpg') }}')">
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
          <h2 style="color:#fff; ">Elite Matrimony</h2>
      </div>
    </div>
  </div>
</section>
<section class="mt-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4 class="w3-text-red w3-center"> <b> Finding a perfect match has been never been so easy..! </b> </h4>
        <h4 style="font-size: 18px; text-align: justify; line-height:30px;"> An exclusive and dedicated match-making service by bridegroombd.com for the elite and well off families. What’s make you confuse and what’s more important to you is your privacy. Yes, we value your privacy. 
            Your 100% privacy and confidentiality is our commitment. 
            
            Many elite class families do not believe in public online matching.That’s why we are here to take your responsibility of confidentiality and aristocracy.Our Elite matchmaking professionals are proficient in handling the Elite to meet up their sophisticated requirements. 
            
            Our dedicated expert team is excellent in match-making for fulfilling your requirements. We always offer you distinguished care, guaranteed confidentiality and exclusive attention considering your stature, social dignity, life style and family background.
            
            We respect your trust. We are commited to provide the finest elite matches from suitable families befitting your expectation and life style.We provide multiple essential services to find a relevant soulmate. 
            
            We do everything at every step of the journey to take matchmaking experience to the next level ofsuccess for conducting marriage. We believe in outcome-oriented action. Feel confident with us. Enroll right away to avail our awesome elite matrimony service!!
            
           
        </h4>
      </div>
    </div>
  </div>
</section>
@endsection