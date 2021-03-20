<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>{{ (isset($title)) ? $title : "Bride Groom BD" }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Wedding ceremony">
  <meta name="keywords" content="wedding, picture , marriage, photo">
  <meta name="author" content="">
  <meta name="url" content="{{ url('/') }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link
    href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
  <link rel="stylesheet" href="{{ asset('asset/css/uikit.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  @if (isset($amarStyles) && $amarStyles)
  @foreach ($amarStyles as $value)
  <link rel="stylesheet" href="{{ asset("{$value}") }}">
  @endforeach
  @endif

  @if (isset($amarCDNStyles) && $amarCDNStyles)
  @foreach ($amarCDNStyles as $value)
  <link rel="stylesheet" href="{{ $value }}">
  @endforeach
  @endif
  <script src="{{ asset('asset/js/JQuery.3.4.1.js') }}"></script>
</head>

<body>
  <header id="nav-header">
    <div class="container">
      <div class="row ">
        <div class="col-12 col-md-4 pl-2 pl-sm-0  ml-sm-0">
          <a class="navbar-brand site-logo" href="{{ url('/') }}">
            <img src="{{ asset('asset/images/home/logo.png') }}" width="90%" alt="main logo">
          </a>
          <nav class="navbar navbar-expand-md navbar-light  px-sm-0 pt-0  mt-0 d-block d-sm-none"
            style="display: inline-block !important; position: absolute; top: 40px; right: 0px;">

            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent3" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon text-light"></span>
            </button>
            <div class="collapse navabr-bg-color navbar-collapse" id="navbarSupportedContent3"
              style="width: 200px; position: absolute; right: 15px;">
              <ul class="navbar-nav ml-auto pr-0 mr-0 pb-2 mt-0 d-block d-sm-none">
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/') }}">Homess</a>
                </li>
                @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('users.advanceSearch.showForm') }}">Advance
                    Search</a>
                </li>
                @endauth
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('packages') }}">Our package</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="http://blog.bridegroombd.com">Our Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('wedding-service') }}">Wedding service</a>
                </li>
                <li class="nav-item d-block d-md-none">
                  <a class="nav-link pr-0 mr-0" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item d-block d-md-none ">
                  <a class="nav-link pr-0 mr-0" href="{{ url('/signup') }}">Register</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
        <div class="col-12 col-md-8 pr-sm-0">
          <div class="col-sm-12 d-none d-md-block pr-sm-0">
            <p class="header-top pr-0">
              <i class="fas fa-phone-square-alt color-red-alt"></i>
              <span class="color-red-alt"> + 88 01906 300 900</span>
            </p>
          </div>

          <nav class="navbar navbar-expand-md navbar-light  px-sm-0 pt-0 mt-0 d-none d-sm-block">
            <p class="header-top pr-0 d-block d-md-none">
              <i class="fas fa-phone-square-alt color-red-alt"></i>
              <span class="color-red-alt"> + 88 01906 300 900</span>
            </p>
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse"
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon text-light"></span>
            </button>
            <div class="collapse navabr-bg-color navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto pr-0 mr-0 pb-2">
                <li class="nav-item ">
                  <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                @auth
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('users.advanceSearch.showForm') }}">Advance
                    Search</a>
                </li>
                @endauth
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('packages') }}">Our package</a>
                </li>
                {{-- <li class="nav-item">
                  <a class="nav-link" href="http://blog.bridegroombd.com">Our Blog</a>
                </li> --}}
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('wedding-service') }}">Wedding service</a>
                </li>
                <li class="nav-item d-block d-md-none">
                  <a class="nav-link pr-0 mr-0" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item d-block d-md-none ">
                  <a class="nav-link pr-0 mr-0" href="{{ url('/signup') }}">Register</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </header>
  @include('bgbd.subpage.banner-sm')
  @yield('content')


  <!--footer top-->
  {{-- <footer id="footer-top" class=" ">
    <div class="container">

      <div class="row f-top-content pl-2 pl-sm-0">
        <!-- top section  -->
        <div class="col-md-3 col-sm-6 pl-2 pl-sm-0  footer-logo ">
          <img src="{{ asset('asset/images/home/logo-footer.png') }}" class="img-fluid" alt="logo">
        </div>
        <div class="col-md-3 col-sm-6  footer-icon  pt-4 pl-3 pl-sm-0 ">
          <div class="f-icon">
            <span class="f-icon-text"><i class="fab fa-facebook-f"></i></span>
            <span class="f-icon-text"><i class="fab fa-twitter"></i></span>
            <span class="f-icon-text"><i class="fab fa-linkedin-in"></i></span>
            <span class="f-icon-text"><i class="fab fa-youtube"></i></span>
            <span class="f-icon-text"><i class="fab fa-instagram"></i></span>

          </div>
        </div>

        <!-- top section  -->
        <!--site description-->
        <div class="col-md-6 f-subscribe col-sm-12 pl-2   ">
          <form action="" class="p-4 p-sm-5">
            <label for="validationTooltipUsername" class="newslatter">newsletter</label>
            <div class="input-group">

              <input type="text" class="form-control subscribe-form" id="validationTooltipUsername"
                placeholder="Enter your email here..." aria-describedby="validationTooltipUsernamePrepend" required>
              <div class="input-group-append">
                <span class="input-group-text" id="validationTooltipUsernamePrepend">SUBSCRIBE</span>
              </div>
              <div class="invalid-tooltip">
                Please choose a unique and valid username.
              </div>
            </div>
          </form>
        </div>

      </div>
      <div class="row f-top-bottom-section pl-2 pl-sm-0  pb-5">

        <div class="col-md-3 col-sm-6 pt-3 ">
          <div class="row">
            <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">CONTACT</h6>
            <div class="col-md-12 px-3 px-sm-0  pt-3">
              <ul class="navbar-nav">
                <li>
                  <span class="address-icon"><i class="fas fa-map-marker-alt"></i></span>
                  <span class="address-text">
                    24/1 Chamelibag,<br />
                    Shan Tower(4th Floor)<br />
                    Shantinagar mor<br />
                    Dhaka-1217.

                  </span>
                </li>
                <li class="py-3">
                  <span class="address-icon"><i class="fas fa-phone-volume"></i></span>
                  <span class="address-text">Telephone : (+88) 01906 300 900</span>
                </li>
                <li>
                  <span class="address-icon"><i class="fas fa-globe-americas"></i></span>
                  <span class="address-text">Email:info@BRIDEGROOMBD.com</span>
                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-sm-6 pl-md-5 pt-3 ">
          <div class="row">
            <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">COMPANY</h6>
            <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
              <ul class="pl-3 footer-menu">
                <li class=""><a href="{{ url('/') }}"><span>Home</span></a></li>
                <li class=""><a href="{{ route('about-us') }}">About Us</a></li>
                <li class=""><a href="{{ route('packages') }}">Our Package</a></li>
                <li class=""><a href="{{ route('wedding-service') }}">Wedding Service</a></li>
                <li class=""><a href="{{ route('contact-us') }}">Contact</a></li>
              </ul>

            </div>
          </div>
        </div>
        <div class="col-6 col-md-3 col-sm-6 pl-md-5 pt-3 ">
          <div class="row">
            <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">TERMS OF USE</h6>
            <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
              <ul class="pl-3 footer-menu">
                <li class=""><a href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
                <li class=""><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
              </ul>

            </div>
          </div>
        </div>
        <div class=" col-md-3 col-sm-6 pl-md-5 pt-3 ">
          <div class="row">
            <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">INFORMATION</h6>
            <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
              <ul class="pl-3 footer-menu">
                <li class=""><a href="{{ route('customer-service') }}">Customer Service</a></li>
                <li class=""><a href="{{ route('faqs') }}">FAQs</a></li>

              </ul>

            </div>
          </div>
        </div>
        <!--end address-->
      </div>
      <!--end row-->
    </div>
    <!--end container-->
  </footer> --}}
  <!--end footer top-->

  <!--footer top-->
  <footer id="footer-top" class=" ">
    <div class="container">
        <div class="row f-top-bottom-section pl-2 pl-sm-0  pb-5">

            <div class="col-md-3 col-sm-6 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">CONTACT</h6>
                    <div class="col-md-12 px-3 px-sm-0  pt-3">
                        <ul class="navbar-nav">
                            <li>
                                <span class="address-icon"><i class="fas fa-map-marker-alt"></i></span>
                                <span class="address-text">
                                    24/1 Chamelibag,<br />
                                    Shan Tower(4th Floor)<br />
                                    Shantinagar mor<br />
                                    Dhaka-1217.

                                </span>
                            </li>
                            <li class="py-3">
                                <span class="address-icon"><i class="fas fa-phone-volume"></i></span>
                                <span class="address-text">Telephone : (+88) 01906 300 900</span>
                            </li>
                            <li>
                                <span class="address-icon"><i class="fas fa-globe-americas"></i></span>
                                <span class="address-text">Email:info@BRIDEGROOMBD.com</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-sm-6 pl-md-5 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">COMPANY</h6>
                    <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                        <ul class="pl-3 footer-menu">
                            <li class=""><a href="{{ url('/') }}"><span>Home</span></a></li>
                            <li class=""><a href="{{ route('about-us') }}">About Us</a></li>
                            <li class=""><a href="{{ route('packages') }}">Our Package</a></li>
                            <li><a href="http://blog.bridegroombd.com">Our Blog</a></li>
                            <li><a href=" {{ route('request') }}">Call back</a></li>
                            <li class=""><a href="{{ route('wedding-service') }}">Wedding Service</a></li>
                            <li class=""><a href="{{ route('contact-us') }}">Contact</a></li>                                
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 col-sm-6 pl-md-5 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">TERMS OF USE</h6>
                    <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                        <ul class="pl-3 footer-menu">
                            <li class=""><a href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
                            <li class=""><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class=" col-md-3 col-sm-6 pl-md-5 pt-3 ">
                <div class="row">
                    <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">INFORMATION</h6>
                    <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                        <ul class="pl-3 footer-menu">
                            <li class=""><a href="{{ route('customer-service') }}">Customer Service</a></li>
                            <li class=""><a href="{{ route('faqs') }}">FAQs</a></li>

                        </ul>

                    </div>
                </div>
            </div>
            <!--end address-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top " href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!--footer bottom-->
  <footer class="" id="footer_bottom">
    <div class="container">
      <div class="row py-2">
        <div class="col-md-8 text-light footer-text pl-0">
          <span>CopyRights © 2019 BrideGroom. All Rights Reserved</span>
        </div>
        <div class="col-md-4">
          <img src="{{ asset('asset/images/home/payment.jpg') }}" alt="">

        </div>
      </div>
    </div>
  </footer>
  <script src="{{ asset('asset/js/bootstrap.js') }}"></script>
  <script src="{{ asset('asset/js/uikit.min.js') }}"></script>
  <script src="{{ asset('asset/js/uikit-icons.min.js') }}"></script>
  <script src="{{ asset('asset/js/owl.carousel.js') }}"></script>
  <script src="{{ asset('asset/js/custom.js') }}"></script>
  @if (isset($amarScripts) && $amarScripts)
  @foreach ($amarScripts as $value)
  <script src="{{ asset("{$value}") }}"></script>
  @endforeach
  @endif
</body>

</html>