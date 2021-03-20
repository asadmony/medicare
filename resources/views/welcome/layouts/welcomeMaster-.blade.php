<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> {{ env('APP_NAME') }} </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('se/assets/img/favicon.ico') }}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{asset('se/assets/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/owl.carousel.min.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/flaticon.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/slicknav.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/animate.min.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/magnific-popup.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/fontawesome-all.min.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/themify-icons.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/slick.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/nice-select.css')}}">
            <link rel="stylesheet" href="{{asset('se/assets/css/style.css')}}">
   </head>

   <body>
       
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('se/assets/img/logo/logo1.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->

@include('welcome.layouts.welcomeHeader')
    <main>

        <!-- Slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center" data-background="{{ asset('se/assets/img/hero/h1_hero.png') }}">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-7 col-md-9 ">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">SAARBS<br> We Provide Solution</h1>
                                    <p data-animation="fadeInLeft" data-delay=".6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravi.</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="industries.html" class="btn hero-btn">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                    <img src="{{ asset('img/details-hero1.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider slider-height d-flex align-items-center" data-background="se/assets/img/hero/h1_hero.png">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <div class="col-lg-7 col-md-9 ">
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">We Serve<br> The Best</h1>
                                    <p data-animation="fadeInLeft" data-delay=".6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravi.</p>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="industries.html" class="btn hero-btn">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                                    <!-- <img src="{{ asset('se/assets/img/hero/hero_right.png') }}" alt=""> -->
                                    <img src="{{ asset('img/details-hero2.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Area End-->
        <!-- What We do start-->
        <div class="what-we-do we-padding">
            <div class="container">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-tittle text-center">
                            <h2>What We Will Do For Your Business​</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-tasks"></span>
                            </div>
                            <div class="do-caption">
                                <h4>Link Building</h4>
                                <p>Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!</p>
                            </div>
                            <div class="do-btn">
                                <a href="#"><i class="ti-arrow-right"></i> get started</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-do active text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-social-media-marketing"></span>
                            </div>
                            <div class="do-caption">
                                <h4>Content marketing</h4>
                                <p>Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!</p>
                            </div>
                            <div class="do-btn">
                                <a href="#"><i class="ti-arrow-right"></i> get started</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-6">
                        <div class="single-do text-center mb-30">
                            <div class="do-icon">
                                <span  class="flaticon-project"></span>
                            </div>
                            <div class="do-caption">
                                <h4>On Page SEO</h4>
                                <p>Hunky dory barney fanny around up the duff no biggie loo cup of tea jolly good ruddy say arse!</p>
                            </div>
                            <div class="do-btn">
                                <a href="#"><i class="ti-arrow-right"></i> get started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- What We do End-->
 

         <!-- have-project Start-->
         <div class="have-project">
            <div class="container">
                <div class="haveAproject"  data-background="{{ asset('se/assets/img/team/have.jpg') }}">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-7 col-lg-9 col-md-12">
                            <div class="wantToWork-caption">
                                <h2>Need any tracking solution?</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut.</p>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 col-md-12">
                           <div class="wantToWork-btn f-right">
                                <a href="#" class="btn btn-ans">Contact Us</a>
                           </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- have-project End -->

    </main>

   @include('welcome.layouts.welcomeFooter')
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('se/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('se/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('se/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('se/assets/js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('se/assets/js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('se/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('se/assets/js/slick.min.js') }}"></script>
        <!-- Date Picker -->
        <script src="{{asset('se/assets/js/gijgo.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{asset('se/assets/js/wow.min.js')}}"></script>
		<script src="{{asset('se/assets/js/animated.headline.js')}}"></script>
        <script src="{{asset('se/assets/js/jquery.magnific-popup.js')}}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{asset('se/assets/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('se/assets/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('se/assets/js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{asset('se/assets/js/contact.js')}}"></script>
        <script src="{{asset('se/assets/js/jquery.form.js')}}"></script>
        <script src="{{asset('se/assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('se/assets/js/mail-script.js') }}"></script>
        <script src="{{ asset('se/assets/js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('se/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('se/assets/js/main.js') }}"></script>
        
    </body>
</html>