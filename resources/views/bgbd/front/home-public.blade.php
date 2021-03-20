@extends('bgbd.master')
@section('content')

<!-- search banner start -->
@include('bgbd.subpage.banner')
<!-- search banner end -->

<!-- Rebbon start-->
<section>
    <div style="padding: 0px; color: #000; width: 100%; background: #fff;">
        <div class="container-fluid w3-mobile">
          <div class="row">            
            <div style="width:33.33%;background:#d81f26;color:#fff;" class="w3-card w3-center w3-hover-shadow w3-mobile">
              <i class="mt-3 fas fa-briefcase fa-2x "></i>
              <p style="font-size: 20px;">100% Privacy & Confidentiality</p>
            </div>
            <div style="width:33.33%;background:#f09f1f;color:#fff;" class="w3-card w3-center w3-hover-shadow  w3-mobile">
              <i class="mt-3 fas fa-lock fa-2x"></i>
              <p style="font-size: 20px;">Best Data Security</p>
            </div>
            <div style="width:33.33%;background:#731019;color:#fff;" class=" w3-card w3-center w3-hover-shadow   w3-mobile">
              <i class="mt-3 fas fa-user-check fa-2x"></i>
              <p style="font-size: 20px;">Verified Genuine Profiles</p>
            </div>
          </div>
        </div>
      </div>
</section>
<!--rebbon end-->

<section class="d-block d-sm-block d-md-none">
  <div class="w3-container">
    <div class="w3-center mt-3">
      <a href="{{ url('/signup') }}">
        <button class="w3-btn w3-round-xlarge w3-red">Register Free</button>
      </a>
    </div>
  </div>
</section>

{{-- best match maker --}}
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="w3-card w3-round w3-mobile">
                    <div class="w3-container w3-center pt-3">
                        <h3 class="w3-text-black" style="text-transform:uppercase; text-align:center"> <b> Best matchmaker </b></h3>
                        <h4 style="color:#731019;"><b>Finding a perfect match has never been so easy..!</b></h4>
                        <p style="font-size: 15px;">The best matchmaker and matrimonial site in Bangladesh is bridegroombd.com. It is the most trusted marriage media and leading matrimony matchmaking service provider in Bangladesh. In previous time a ghotok was an important person in the process of marriage. He physically played a vital role for marriage by negotiating between <span id="dots">...</span><span id="more"> two families.
                          <br> <br>
                          In course of time the presence of a marriage broker becomes less important due to improvement of technology. Now a day people expect everything on a click through online. Matrimony site is the online version of traditional marriage matcher.
                          
                          <br> <br>
                          We believe in truth. 100% authentic profiles, user friendly interface and more features make the matchmaking experience smooth and hassle free for finding a perfect match.
                          <br> <br>
                          We are aware of your privacy and confidentiality. It provides the most secure and convenient matchmaking experience to all its members by exclusive privacy options, photo protection features and verification of phone numbers and more information. 
                          <br> <br>
                          The site has a large database of Bangladeshi brides and grooms who have lucrative career and good academic background of aristocratic families. You must find a life partner as you expect.
                          <br> <br>
                          Remarriage for broken families or divorced persons is always left untouched. Our society looks at divorcees, widows and widowers with a different eye. 
                          <br> <br>
                          Revival of a new conjugal life is very important for happiness and social stability. We also takes special initiative for conducting second marriage.
                          <br> <br>
                          Our website is the most favorite online marriage media for Bangladeshi brides and grooms for first marriage or even for second marriage at home and abroad with prime focus on USA, UK, Canada, France, Italy, New Zealand, Switzerland and Australia.
                          <br> <br>
                          Bridegroombd.com is the most recommended matrimonial website by Bangladeshis who are seeking for their halves. It is the best online matchmaker web portal in Bangladesh. We prioritize your preference and status at the time of looking for a spouse or a soul mate. 
                          <br> <br>
                          We have a dedicated customer care team and off line presence for deeper and personal interaction with prospective brides, grooms and/or families. We care your dignity with discretion. 

                        </span>
                        </p>
                        <p><button class="w3-button w3-red w3-round w3-border-red" onclick="myFunction()" id="myBtn">Read More</button></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- best match maker end --}}

{{-- call back --}}
<section>
    <div class="container mt-5">
        <div class="row">
          <div class="w3-container w3-half">
            <div class="w3-card w3-mobile w3-hover-shadow" style="min-height: 377px;">
                <h3 class="w3-center w3-text-black pt-3" style="font-size: 30px;">Confidential Matchmaking</h3>
                <img src="{{ asset('asset/images/home/Best- matrimony-in- bangladesh.jpg')}}" alt="img" >
                <div class="w3-container w3-center pt-3">
                    {{-- <p style="color: black; font-size:20px; ">We Are Waiting For You!!!
                      <br> <br>
                      <a href="{{ route('request') }}"><button class="w3-button w3-small w3-red w3-round">More Details</button></a>
                    </p> --}}
                    <p>
                      {{-- <a href="{{ route('request') }}">
                        <button class="uk-button uk-button-block create_acc mt-4" id="sign-up">More Details</button>
                      </a>--}}
                      <a href="{{ route('request') }}">
                        <button class="uk-button uk-button-block create_acc mt-4" id="sign-up">More Details</button>
                      </a>
                    </p>
                </div>
                

            </div>
          </div>
          
          <div class=" w3-container w3-half w3-mobile">
            <div class="w3-card w3-mobile" style="min-height: 97%; margin-top:10px;">
              <div class="w3-container">
                <h2 style="    font-size: 25px;
                text-align: center;
                color: #766d6d;">Leave Your Details Below, We Will Call Back</h2>

              </div>
              @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            {{-- <form class="w3-container" style="padding: 15px !important;" method="POST" action="{{ route('contacts') }}" enctype="multipart/form-data"> --}}
            <form class="w3-container" style="padding: 15px !important;" method="POST" action="{{ route('contacts') }}" enctype="multipart/form-data">

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
                <button class="uk-button uk-button-block create_acc mt-4" id="sign-up">Request For Call Back</button>
                {{-- btn end --}}
              </form>
            </div>
          </div>
        </div>
      </div>
</section>
{{-- call back end --}}

{{-- services --}}
<section>
    <div class="container mt-5">
        <div class="row">
            <div class="w3-container w3-half mt-2">
                <div class="w3-card w3-mobile w3-border w3-round w3-border-red">
                    <div class="w3-container w3-center pt-3">
                        <h3 style="color: red; text-transform:uppercase; text-align:center"> <b> bg walk-in service </b> </h3>
                        
                        <p style="font-size: 15px;">BG walk-in service is available every day from 10.00 am to 8.00 pm. Our office is at the prime location of Dhaka city where the prospective 
                          brides or grooms or <span id="dot">...</span><span id="more_data"> their parents can easily visit our office. We are very pleased to welcome you. 
                            <br> <br>
                            Your physical visit to the office will make you more confident. Our services in walk-in visit are very effective and comfortable for matchmaking. You will find instant personalized service in a pleasant environment. 
                            <br> <br> 
                            Free registration, photo upload and suggestion to choose the right membership plan; everything will get done with a friendly conversation by our executives.

                             •	Parents and guardians of prospective brides/grooms are welcome to visit our office.
                            <br>
                            •	Your journey for finding a suitable life partners will be smooth and easy.
                            <br>
                            •	 All kinds of supports and suggestions are available at walk-in service.
                            <br>
                            •	You will get instant answer to your queries about our services from our executives. 
                            <br>
                            •	Our executives will do everything in making profiles in the bridegroombd.com website.
                            <br>
                            •	Our team will also show instantly a few matching profiles on the basis of your spouse preference and social status.
                            <br>
                            •	Our executive will explain about effective use of the website and various search options.
                            <br>
                            •	You can share your requirements face to face for better understanding to find a perfect match you desire.
                            <br>
                            •	Special discounts will be given for DIAMOND membership plan with instant activation of your profile for such memberships.

                          </span>
                        </p>
                        <p><button class="w3-button w3-red w3-round" onclick="expandFunction()" id="expBtn">More Details</button></p>
                    </div>
                </div>
            </div>
            <div class="w3-container w3-half mt-2">
                <div class="w3-card w3-mobile w3-border w3-round w3-border-red">
                    <div class="w3-container w3-center pt-3">
                        <h3 style="color: red; text-transform:uppercase;"><b> door step service </b></h3>
                        
                        <p style="font-size: 15px;">Our door step services are very convenient to ease your matchmaking efforts for coping with your busy schedules. We understand the value of 
                          your <span id="dot2">...</span><span id="more_data2"> time.  
                          
                            It will help you save a lot of time. Our executive will reach at your doorstep to make your matchmaking experience comfortable.
                            <br>
                            •	Bridegroombd.com has introduced BG doorstep service to reach the services at your hand.
                            <br> 
                            •	Our executive will come to your home and discuss in details about our plans and services at your convenient schedule.
                            <br> 
                            •	We take all pains to find a right spouse for you in the BG door step service.
                            <br> 
                            •	Our BG door step service will keep you in the right path getting a soul mate in the minimum time.
                            <br> 
                            •	Our experienced executives will be able to offer you the best plans according to your preference for spouse.
                            <br> 
                            •	We will show different matches best suited for your profile considering your personal status.
                            <br> 
                            •	Our staffs will offer on-spot registration, plan activation and discounts for the chosen membership plan.
                            <br> 
                            •	Special discounts will be offered right away after activation of plans if customer chooses DIAMOND membership plans.
                            <br> 
                            •	Our executive will explain about effective use of the website and various search tools and options.
                            <br> 
                            •	Service Charges apply for BG door step service. 

                        </span>
                        </p>
                        <p><button class="w3-button w3-red w3-round" onclick="expandFunction2()" id="expBtn2">More Details</button></p>
                    </div>
                </div>
            </div>
          
        </div>
      </div>
</section>
{{-- services end --}}


<!-- featured section start -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                {{-- <a href="{{ route('feature_profile') }}"> FEATURED</a> --}}
                <a href=""> FEATURED</a>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    
                    <?php 
                      $maleUsers = App\Model\User::Where('featured',true)->where('gender','male')
                      ->inRandomOrder()->take(2)->get();
                    ?>
                    @foreach($maleUsers as $user) 
                    
                    <div class="col-lg col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                        <div class="card border-0">
                            <div class="card-image">
                                
                              <img src="{{asset($user->latestCheckedPP())}}" class="image card-img-top" alt="{{$user->username}}" />
                                
                                <div class="middle">
                                    <div class="text">
                                        <a href="#"><i class="fas fa-thumbs-up"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-phone-alt"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="card-body w3-center arrival-card pl-0 ml-0">
                                
                                <p class="py-0 my-0"><strong>ID: BG-{{($user->created_at->format('ymd').$user->username)}}</strong></p>

                                <p class="card-text arrival-text p-0 m-0 pb-2">
                                    {{$user->age()}} yrs <strong> | </strong>
                                    {{$user->height}} <strong> |
                                    </strong> {{$user->religion}} <strong> | </strong>
                                    {{str_limit($user->education_level, 18)}}</p>
                                {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                    Profile</a> --}}
                                    <a href="{{route('welcome.featureDetails',$user)}}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                      Profile</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    {{-- @foreach ($featuedProfiles_bride as $item)
                    @php
                    if ($item->settings_name == 1){
                    $name = trim($item->first_name) ." ". trim($item->last_name);
                    }
                    elseif ($item->settings_name == 2){
                    $name = trim($item->first_name);
                    }
                    else{
                    $name = trim($item->last_name);
                    }
                    @endphp --}}
                    <?php 
                      $femaleUsers = App\Model\User::Where('featured',true)
                      ->where('gender','Female')
                      ->inRandomOrder()->take(2)->get();
                    ?>
                    @foreach($femaleUsers as $user) 

                    <div class="col-lg col-sm-6 col-md-4 pl-sm-0 ml-sm-0 pr-2">
                        <div class="card border-0">
                            <div class="card-image">
                                {{-- @if(isset(Auth::user()->id) && Auth::user()->premium && $item->picid != '' &&
                                file_exists("profiles/pics/{$item->id}/{$item->picext}")) --}}
                                <img src="{{asset($user->latestCheckedPP())}}" class="image card-img-top" alt="{{$user->username}}" />
                                
                                <div class="middle">
                                    <div class="text">
                                        <a href="#"><i class="fas fa-thumbs-up"></i></a>
                                        <a href="#"><i class="fas fa-star"></i></a>
                                        <a href="#"><i class="fas fa-phone-alt"></i></a>
                                        <a href="#"><i class="fas fa-envelope"></i></a>
                                        <a href="#"><i class="fas fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body w3-center arrival-card pl-0 ml-0">
                              {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}"
                                ($item->created_at->format('ymd').$item->id)
                                  class="py-0 my-0 profile-title">{{ $name }}</a> --}}
                              <p class="py-0 my-0"><strong>ID: BG-{{($user->created_at->format('ymd').$user->username)}}</strong></p>

                              <p class="card-text arrival-text p-0 m-0 pb-2">
                                  {{$user->age()}} yrs <strong> | </strong>
                                  {{$user->height}} <strong> |
                                  </strong> {{$user->religion}} <strong> | </strong>
                                  {{str_limit($user->education_level, 18)}}</p>
                              {{-- <a href="{{ \App\Common::getUserUrl($item->id) }}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                  Profile</a> --}}
                                  <a href="{{route('welcome.featureDetails',$user)}}" class="btn btn-block p-2 m-0 text-bold w3-button w3-red w3-hover-red">View
                                    Profile</a>
                          </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <!-- end card -->
            <div class="col-sm-12 mt-5 arrival-button">
                <a href="{{ route('welcome.feature_profile') }}" class="arrival-btn-text p-1">
                    VIEW MORE <i class="fas fa-chevron-right"></i>
                </a>
                {{-- <a href="{{ route('feature_profile') }}" class="arrival-btn-text p-1">
                    VIEW MORE <i class="fas fa-chevron-right"></i>
                </a> --}}
            </div>
        </div>
    </div>
</section>
<!-- featured section end -->

{{-- Assisted Section start--}}
<section style="margin-top:10%;">
    <div class="container">
        <div class="w3-center mb-5">
            <h2>Assisted Service</h2>
            <p style="font-size: 20px;">Get a Relationship Manager with expertise in matchmaking <br>
            to search, shortlist and initiate contacts on your behalf.</p>
        </div>
      <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-2">
          <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
            <i class="far fa-comments" aria-hidden="true" 
            style="isplay: inline-block;
            width: 120px;
            height: 120px;
            line-height: 120px;
            border: 1px solid red;
            color: red;
            border-radius: 100%;
            margin-bottom: 20px;
            font-size: 36px;"></i>
            <p>Share your responsibility</p>
          </div>
        </div>
        {{-- background-color: rgb(162, 4, 5); --}}
        <div class="col-md-2">
          <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
            <i class="fas fa-search" aria-hidden="true" 
            style="isplay: inline-block;
            width: 120px;
            height: 120px;
            line-height: 120px;
            border: 1px solid red;
            color: red;
            border-radius: 100%;
            margin-bottom: 20px;
            font-size: 36px;"></i>
            <p>Expert search within reach</p>
          </div>
        </div>
        <div class="col-md-2">
          <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
            <i class="fas fa-star" aria-hidden="true" style="isplay: inline-block;
            width: 120px;
            height: 120px;
            line-height: 120px;
            border: 1px solid red;
            color: red;
            border-radius: 100%;
            margin-bottom: 20px;
            font-size: 36px;"></i>
            <p>Shortlisted matches</p>
          </div>
        </div>
        <div class="col-md-2">
            <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
              <i class="fas fa-phone-alt" aria-hidden="true" 
              style="isplay: inline-block;
              width: 120px;
              height: 120px;
              line-height: 120px;
              border: 1px solid red;
            color: red;
              border-radius: 100%;
              margin-bottom: 20px;
              font-size: 36px;"></i>
              <p>Initiate communication</p>
            </div>
        </div>
        <div class="col-md-2">
            <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
            
            <i class="fas fa-handshake" aria-hidden="true" 
            style="isplay: inline-block;
            width: 120px;
            height: 120px;
            line-height: 120px;
            border: 1px solid red;
            color: red;
            border-radius: 100%;
            margin-bottom: 20px;
            font-size: 36px;"></i>
            <p>Meet the prospects</p>
            </div>
        </div>
        <div class="col-md-1">
        </div>
      </div>
    </div>
</section>
{{-- Assisted Section end --}}

{{-- membership Packages start--}}
{{-- <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                
                <a href=""> MEMBERSHIP PLAN</a>

            </div>
            <div class="col-md-12">
                <div class="box box-widget">
                    <div class="box-body" >
                        <div class="row">
                            
                            <div class="col-sm-4 mb-2">
                                <div class="w3-card w3-container w3-round w3-border w3-border-red">
                                    <div class="box box-widget w3-hover-shadow">
                                        <div class="box-header text-center with-border">
                                            <h3 class="box-title">Silver Pack</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="panel panel-default">
                                                <div class="panel-body w3-center">
                                                    Membership for 90 Days
                                                    <hr style="margin: 3px;">
                                                    <div class="w3-large w3-center">
                                                        <p>Price: $75 / ৳6000</p>
                                                        <p><a href="" style="text-decoration: none"><button class="w3-button w3-red w3-round stretched-link">Details</button></a></p>

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4 mb-2">
                                <div class="w3-card w3-container w3-round w3-border w3-border-red">
                                    <div class="box box-widget w3-hover-shadow">
                                        <div class="box-header text-center with-border ">
                                            <h3 class="box-title">Gold Pack</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="panel panel-default">
                                                <div class="panel-body w3-center">
                                                    Membership for 180 Days
                                                    <hr style="margin: 3px;">
                                                    <div class="w3-large w3-center">
                                                        <p>Price: $100 / ৳8000</p>
                                                        <p><a href="" style="text-decoration: none"><button class="w3-button w3-red w3-round stretched-link">Details</button></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="w3-card w3-container w3-round w3-border w3-border-red">
                                    <div class="box box-widget w3-hover-shadow">
                                        <div class="box-header text-center with-border ">
                                            <h3 class="box-title">Diamond Pack</h3>
                                        </div>
                                        <div class="box-body">
                                            <div class="panel panel-default">
                                                <div class="panel-body w3-center">
                                                    Membership for 360 Days
                                                    <hr style="margin: 3px;">
                                                    <div class="w3-large w3-center">
                                                        <p>Price: $125 / ৳10000</p>
                                                        <p><a href="" class="stretched-link" style="text-decoration: none"><button class="w3-button w3-red w3-round stretched-link">Details</button></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 new-arrival py-5 pl-sm-0">
                
        <a href=""> MEMBERSHIP PLAN</a>

    </div>
    </div>
    <div class="box box-widget">
      <div class="box-body ml-4">
            @if($mPackage1)
    
          <div class="row">
                @foreach($mPackage1 as $m)
    
    
         <div class="col-sm-3">
     
          @if ($m->id == 3)
              <!-- <b class="w3-tag w3-large w3-red w3-padding pull-right mr-4" style="margin-top: -28px;border: 1px solid #d52379;background-color:#d52379 !important;color:#fff !important;border-radius: 5px;font-size: 13px !important;width: 44%;">Recommended</b> -->
              {{-- <b class="w3-tag w3-large w3-red w3-padding pull-right  recommended_button" >Recommended</b> --}}
          @endif
          
          <!-- <div class="panel panel-default w3-hover-shadow price_package_border" style="border: 4px solid indigo;"> -->
            <div class="panel panel-default w3-hover-shadow w3-border w3-border-red">
            <!-- <div class="panel-body w3-padding-large price_package_background" style="min-height: 120px;background: white;"> -->
              <div class="panel-body w3-padding-large  ">
    
              <div style="min-height: 120px;">
    
                
    
              <b class="w3-xxlarge">{{ $m->package_title }}</b> <br>
    
     
    
              <br>&nbsp; 
    
              {{-- <br> --}}
              {{-- <b class="w3-large w3-text-purple"><del> Normal Price: 4000TK </del></b> <br> --}}
              <!-- <b class="w3-text-deep-orange w3-xlarge">{{ $m->package_currency }} {{ $m->package_amount }}</b> -->
              <b class=" w3-xlarge">{{ $m->package_currency }} {{ $m->package_amount }}</b>
              {{-- <br> --}}
              {{-- <b class="w3-text-deep-orange w3-large">FREE setup fee</b> --}}
              {{-- <br> --}}
              {{-- <b>On Sale - <span class="w3-yellow w3-padding-small"> Save 30% </span></b> --}}
             <!--  {{-- <br>  --}} -->
                
    
              <br>  
    
    
            </div>
    
    
              {{-- <a class="btn btn-block btn-success w3-btn w3-xlarge" href="http://202.191.120.37/whmcs/cart.php?a=add&amp;pid=5">Order Now</a> --}}
    
              <br>
    
              <ul class="w3-ul w3-large text-left">
     
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> Duration</b> {{ $m->package_duration }} Days</li>
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b> See&nbsp;Contact Details</li>
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b>Private Chating</li>
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b>Total {{ $m->proposal_send_total_limit }} Proposals</li>
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i> </b>Send Per Day {{ $m->proposal_send_daily_limit }} Proposals</li>
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i>  </b>Contact View Limit {{ $m->contact_view_limit }} </li>
                <li class="w3-padding-small w3-small"><b> <i class="fa fa-check-circle-o w3-text-purple"></i>  </b>24/7&nbsp;</b>Customer Support </li>
                 
     
              </ul>
     
    
    
            </div>
    
            <!-- <div class="w3-light-gray text-center w-100 w3-padding"> -->
            <div class=" text-center w-100 w3-padding">
                <p>Looking for additional discount?</p>
               
                <!-- <a class="btn btn-xs btn-default w3-indigo w3-large w3-btn" href="">Contact Us</a> -->
                <a class="btn btn-xs btn-default w3-red w3-btn " href="tel:+{{ bdMobile(env('CONTACT_MOBILE1')) }}">Contact Us</a>
              </div>
    
          </div>
    
          <br> <br> <br>
        </div>
                @endforeach
            </div>
    
            @endif
    
          </div>
    </div>
  </div>
</section>
{{-- membership Packages end --}}


{{-- wedding success story start --}}
<section>
  <div class="container">
      <div class="row">
          <div class="col-sm-12 new-arrival py-5 pl-2 pl-sm-0">
              <a href="">SUCCESS STORY</a>
          </div>
          <div class="row d-block d-md-none d-lg-none">
              @foreach ($stories as $story)
                  <div class="col-md-4 mt-2">
                      <div class="w3-card w3-mobile">
                          <img class="rounded-circle" src="{{ asset('/storage/stories/'.$story->image_name) }}" alt="Alps" style="width:100%">
                          <div class="w3-container w3-center">
                              <h5 class="card-title text-center" style="font-family: 'Great Vibes', cursive; font-weight: 400; font-size: 25px;">{{ $story->bride_username }} & {{ $story->groom_username }}</h5>
                              <p>{{ str_limit($story->description,50) }}</p>
                              {{-- <p><a href="" style="text-decoration: none"><button class="btn btn-lg btn-block w3-red w3-hover-blue">Read More</button></a></p>     --}}
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>

          {{-- testimonial test --}}
          
          <div class="card col-md-12 d-none d-md-block d-lg-block">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
              <div class="w-100 carousel-inner mt-5" role="listbox">
                <?php $i = 0; ?>
                  @foreach ($stories as $story)
                  <div class="carousel-item {{$i==1 ? 'active': ''}}">
                    <div class="carousel-caption">
                      <div class="row">
                        <div class="col-sm-3">
                            <img src="{{ asset('/storage/stories/'.$story->image_name) }}" alt="" class="rounded-circle img-fluid"/>
                        </div>
                        <div class="col-sm-9">
                          <h5 class="card-title text-center" style="font-family: 'Great Vibes', cursive; font-weight: 400; font-size: 25px;">{{ $story->bride_username }} & {{ $story->groom_username }}</h5>
                          <p>{{str_limit($story->description,300)}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; ?>
                  @endforeach
              </div>

              <div class="float-right navi">
              <a class="" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ico" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon ico" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              </div>
            </div>
          </div>
          {{-- testimonial test end --}}
      </div>
  </div>
</section>

{{-- wedding success story end --}}



{{-- contact section --}}
<section class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div style="float: left;width: 100%; text-align: center; margin-bottom: 30px;">
            <i class="fa fa-map-marker" aria-hidden="true" 
            style="isplay: inline-block;
            width: 120px;
            height: 120px;
            line-height: 120px;
            background-color: #d81f26;
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
            background-color:#d81f26;
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
            <i class="fa fa-envelope" aria-hidden="true" style="isplay: inline-block;
            width: 120px;
            height: 120px;
            line-height: 120px;
            background-color: #d81f26;
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
{{-- End --}}



@include('bgbd.subpage.public-js')
@endsection

