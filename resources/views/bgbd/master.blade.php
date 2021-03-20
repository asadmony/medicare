<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ (isset($title)) ? $title : "Bride Groom BD | Best Bangladeshi Brides and Grooms Available | Best Matchmaker & Matrimonial Site | Trusted Marriage Media" }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Wedding ceremony, Bridegroombd.com is the best matchmaker and matrimonial Site in Bangladesh. It is most trusted marriage media and Leading Matchmaking Service Provider. Bridegroombd.com is No.1 Site for Second Marriage or Remarriage in Bangladesh. Find lots of genuine widowed, divorced, separated brides and grooms. Bridegroombd.com provides confidential matchmaking which is an exclusive and dedicated service befitting dignity and expectation">
    <meta name="descriptions" content="">

    <meta name="keywords" content="bangladeshi marriageable brides and grooms available, beautiful bangladeshi brides, lucrative professionals bangladeshi grooms">
      <meta name="author" content="bridegroombd.com">
    <meta name="url" content="{{ url('/') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="shortcut icon" href="{{asset('images/fav/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('asset/css/uikit.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/w3.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    {{-- test --}}
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    {{-- end test --}}

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
                            data-target="#navbarSupportedContent3" aria-controls="navbarSupportedContent3"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-light"></span>
                        </button>
                        <div class="collapse navabr-bg-color navbar-collapse" id="navbarSupportedContent3"
                            style="width: 200px; position: absolute; right: 15px;">
                            <ul class="navbar-nav ml-auto pr-0 mt-3 mr-0 pb-2 mt-0 d-block d-sm-none">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Advance
                                        Search</a>
                                </li>
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link" href="">Membership</a>
                                </li>
                                
                                <li class="nav-item">
                                <a class="nav-link" style="background-color: #d81f26; color:#fff !important;" href="{{route('second-marrige')}}">Second Marrige</a>

                                {{-- <a class="nav-link" style="background-color: #d81f26; color:#fff !important;" href="{{route('second-marrige')}}">Second Marrige</a> --}}
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
                            <span class="color-red-alt"> {{ env('CONTACT_MOBILE1') }}</span>
                        </p>
                    </div>

                    <nav class="navbar navbar-expand-md navbar-light  px-sm-0 pt-0 mt-0 d-none d-sm-block">
                        <p class="header-top pr-0 d-block d-md-none">
                            <i class="fas fa-phone-square-alt color-red-alt"></i>
                            <span class="color-red-alt"> {{ env('CONTACT_MOBILE1') }}</span>
                        </p>
                        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon text-light"></span>
                        </button>
                        <div class="collapse navabr-bg-color navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mt-3 pr-0 mr-0 pb-2">
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Search
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="#">Search</a>
                                      <a class="dropdown-item" href="#">Search By Id</a>
                                    </div>
                                  </li> --}}
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Advance
                                        Search</a>
                                </li>
                                @endauth
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Membership</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('wedding-service') }}">Services</a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link w3-red w3-round w3-border-red w3-hover-yellow"  href="{{route('second-marrige')}}">Second Marrige</a>
                                    {{-- <button class="w3-button w3-red w3-round w3-border-red">
                                        <a class="nav-link"  href="{{route('second-marrige')}}">Second Marrige</a>
                                    </button> --}}
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
    @yield('content')


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
                                    <a href="tel:+88{{ env('CONTACT_MOBILE1') }}">
                                    <span class="address-icon"><i class="fas fa-phone-volume"></i></span>
                                    <span class="address-text">Telephone : (+88) {{ env('CONTACT_MOBILE1') }}</span></a>
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
                                {{-- <li class=""><a href="{{ route('about-us') }}">About Us</a>
                                </li> --}}
                                <li class=""><a href="{{url('/page/about-us')}}">About Us</a>
                                </li>
                                <li class=""><a href="{{ route('welcome.membershipPackages') }}">Membership plan</a></li>
                                {{-- <li><a href="http://blog.bridegroombd.com">Our Blog</a></li> --}}
                                {{-- <li><a href=" {{ route('request') }}">Call back</a></li> --}}
                                {{-- <li class=""><a href="{{ route('wedding-service') }}">Services</a></li>
                                <li class=""><a href="{{url('/page/contact-us')}}">Contact</a></li> --}}
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
                                <li class=""><a href="{{url('/page/terms-and-condition')}}">Terms & Conditions</a></li>
                                <li class=""><a href="{{url('/page/privacy-policy')}}">Privacy Policy</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class=" col-md-3 col-sm-6 pl-md-5 pt-3 ">
                    <div class="row">
                        <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">INFORMATION</h6>
                        <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                            <ul class="pl-3 footer-menu">
                                <li class=""><a href="{{url('/page/cookie-policy')}}">Cookie Policy</a></li>
                                <li class=""><a href="{{url('/page/how-to-use')}}">How to Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- google map --}}
                {{-- <div class="col-md-3 col-sm-6 pl-md-5 pt-3">
                    <div class="row">
                        <h6 class="text-xl-left ml-3 ml-sm-0 f-bottom-title ">LOCATION</h6>
                        <div class="col-md-12 text-light px-3 px-sm-0 pt-3  ">
                            <ul class="pl-0 footer-menu">
                                <li style="list-style: none">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d913.0386866455027!2d90.4116626291742!3d23.74186052664262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b9b5c7ac29bf%3A0x215192208b217ef2!2sBride%20Groom%20BD!5e0!3m2!1sen!2sbd!4v1599480163332!5m2!1sen!2sbd" width="250" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
                {{-- google map end --}}
                <!--end address-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </footer>
    <!--end footer top-->

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
