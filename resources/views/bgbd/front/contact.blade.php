@extends('bgbd.master')
@section('content')

<!-- search banner start -->
  <section id="slider_section" style="background-image: url('{{ asset('asset/images/home/slider.jpg') }}')">
  <div class=" float-right login-form"> 
    @guest
    <a href="{{ url('/login') }}" class="btn"> Login</a>
      <a href="{{ url('/register') }}" class="btn"> Register</a>
    @else
      <a class="btn" href="{{ route('users.myprofile') }}">Hi, {{ Auth::user()->first_name}}</a>
      <a href="{{ route("user.inbox") }}" class="btn"><i class="fab fa-facebook-messenger"></i>
          @if (\App\Common::message_notification(Auth::user()->id))
          <span class="my-notification">{{ \App\Common::message_notification(Auth::user()->id) }}</span>
        @endif
      </a>

      <a href="{{ route("user.pending_receive_interest") }}" class="btn">
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

<section class="contact_page_bg">
  <div class="container pb-5">
    <div class="row ">
      <div class="col-sm-12 contact-page pt-5 pl-2 pl-sm-0">
        <span> CONTACT US</span>
      </div>
    </div>
    <div class="row py-5">
      <div class="col-12 col-sm-12 col-md-6 col-lg-8">
        @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
        @endif
        <form action="{{ route('contacts') }}" method="post"
          class=" uk-form-horizontal uk-margin-large contact_page_form">
          @csrf
          
          <div class="uk-margin">
            <div class="uk-inline">
              <input class="uk-input contact_page_field"  name="name" type="text" required placeholder="Name">
            </div>
          </div>

          <div class="uk-margin">
            <div class="uk-inline">
              <input class="uk-input contact_page_field" name="email" type="email" required placeholder="Email">
              <input class="uk-input contact_page_field" name="mobile" type="text" required placeholder="Phone">
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <textarea class="uk-textarea contact_page_field_text" name="desct" rows="4" required
                placeholder="Message"></textarea>
            </div>
          </div>
          <div class="uk-margin submit_btn ">
            <button class="uk-button  uk-button-default m-t-0" type="submit">Submit</button>
          </div>
        </form>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-4  mt-5 mt-md-0">
        <div class="row px-5  contact_page_info p-t-15">
          <div class="col-3 pl-0">
            <div class=" contact_feature_icon">
              <i class="fas fa-phone-alt"></i>
            </div>
          </div>
          <div class="col-9 pl-0 contact_header">
            <h4 class="py-0 my-0">Phone Number</h4>
            <p class="py-2 my-0  contact_page_number">
              + 88 01906 300 900
            </p>
          </div>
        </div>
        <div class="row py-3 px-5 contact_page_info">
          <div class="col-3 pl-0">
            <div class=" contact_feature_icon">
              <i class="far fa-clock"></i>
            </div>
          </div>
          <div class="col-9 pl-0 contact_header">
            <h4 class="py-0 my-0">Address</h4>
            <p class="py-2 my-0  contact_page_number">
              24/1 Chamelibag,<br />
              Shan Tower(4th Floor)<br />
              Shantinagar mor<br />
              Dhaka-1217. 
            </p>
          </div>
        </div>
        <div class="row px-5 contact_page_info  p-b-15">
          <div class="col-3 pl-0">
            <div class=" contact_feature_icon">
              <i class="fas fa-at"></i>
            </div>
          </div>
          <div class="col-9 pl-0 contact_header">
            <h4 class="py-0 my-0">Email</h4>
            <p class="py-2 my-0  contact_page_number">
              info@bridgegroombd.com
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
          <i class="fa fa-map-marker" aria-hidden="true" 
          style="isplay: inline-block;
          width: 120px;
          height: 120px;
          line-height: 120px;
          background-color: rgb(162, 4, 5);
          color: rgb(255, 255, 255);
          border-radius: 100%;
          margin-bottom: 20px;
          font-size: 36px;"></i>
          <h2>Dhaka Office</h2>
          <p>24/1 Chamelibag,
              Shan Tower(4th Floor)
              Shantinagar mor <br>
              Dhaka-1217.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
          <i class="fa fa-phone" aria-hidden="true" 
          style="isplay: inline-block;
          width: 120px;
          height: 120px;
          line-height: 120px;
          background-color: rgb(162, 4, 5);
          color: rgb(255, 255, 255);
          border-radius: 100%;
          margin-bottom: 20px;
          font-size: 36px;"></i>
          <h2>Phone</h2>
          <p>+ 88 01906 300 900</p>
        </div>
      </div>
      <div class="col-md-4">
        <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
          <i class="fa fa-envelope" aria-hidden="true" 
          style="isplay: inline-block;
          width: 120px;
          height: 120px;
          line-height: 120px;
          background-color: rgb(162, 4, 5);
          color: rgb(255, 255, 255);
          border-radius: 100%;
          margin-bottom: 20px;
          font-size: 36px;"></i>
          <h2>Email Us</h2>
                  <p>info@bridgegroombd.com</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="contact_map">
  <div class="mapouter">
    <div class="gmap_canvas"><iframe width="100%" height="290" id="gmap_canvas"
        src="https://maps.google.com/maps?q=Sir%20A.%20F.%20Rahman%20Hall%2C%20University%20of%20Dhaka%2C%20Dhaka%2C%20Bangladesh&t=k&z=19&ie=UTF8&iwloc=&output=embed"
        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
        href="https://www.divi-discounts.com"></a></div>
    <style>
      .mapouter {
        position: relative;
        text-align: right;
        height: 290px;
        width: 100%;
      }

      .gmap_canvas {
        overflow: hidden;
        background: none !important;
        height: 290px;
        width: 100%;
      }
    </style>
  </div>
</section>
@endsection