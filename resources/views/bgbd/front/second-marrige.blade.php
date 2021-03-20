@extends('bgbd.master')

@section('content')
<section id="slider_section" style="background-image: url('{{ asset('asset/images/home/Second_ marrige.jpg') }}')">
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

<section>
  <div style="width: 100%; height: auto; background: #d81f26;">
    <div class="container">
      <div class="row">
          <h2 style="color:#fff;" class="w3-text-center">Second Marriage</h2>
      </div>
    </div>
  </div>
</section>
<section class="mt-5">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 w3-mobile">
            <p>
              Second marriage is an important part of our matrimony services. Bridegroombd.com is the right place for pursuing remarriage for divorcee, separated, widow/widower or late marriage candidates. 
            </p>
            <p>We give special attention with 100% privacy and confidentiality for remarriage for finding a new life partner for bring back happiness and love in your life.</p>
            <p>We have a lot of profiles of widows and divorcees including those who are not yet married but want to marry divorcees or widow or widowers. So, don’t think about what your marital status is, whether divorced or widowed, married or unmarried.</p>
            <p>Getting married after divorce or loss of spouse is not easy like first marriage. Many factors influence the likelihood of remarrying. We will make your journey for finding a new life partner comfortable without any difficulty with complete satisfaction. </p>

            <p>Second (and third and so on) marriage in the society is not a normal issue. Though remarriage is not forbidden, it is not taken so easily in the eye of society or even in the family. </p>
            <p>Little attention has been paid to this topic. Nobody comes forward to handle the matter willingly in a natural way like first marriage. People don’t feel comfort to take initiative for second marriage. </p>

            <p>Life becomes challenging after divorce or loss of spouse as he has to pass the time adjusting with despair, lack of faith and loneliness. </p>

            <p>Now a day divorce rate is increasing due to various reasons. Increases in rates of divorce, second marriages have taken place.  </p>
            <p> We live in a couple-oriented society. Marriage is very important to have a wonderful blessed life for both man and woman. Marriage is gives us a life partner to move through the challenges of life together.</p>

           <p>Bridegroombd.com is the right place to register your profile for second marriage. You may drop your details, we will communicate you. <a href="{{url('/signup')}}"><span class="w3-text-red">Register Free</span></a>.</p>
      </div>
    </div>
  </div>
</section>
@endsection