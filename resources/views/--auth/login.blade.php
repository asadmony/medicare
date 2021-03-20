<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Favicons -->
     @if ($websiteParameter->favicon)
  <link rel="shortcut icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">
  <link rel="icon" href="{{ asset('storage/favicon/'. $websiteParameter->favicon) }}" type="image/x-icon">
  @else
  <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">    
  @endif

    <title>Login | Taslima Marriage Media</title>

    <meta name="description" content="Login Your Favorite TMM Application & Find Your Best Match Now.">
    <meta name="author" content="{{ $websiteParameter->meta_author ?: 'Taslima' }}">
    <meta name="keywords" content="Taslima Marriage Media Login, TMM Application Login, Bengali Matrimony Website Login">

@if ($websiteParameter->google_analytics_code)
  {!! $websiteParameter->google_analytics_code !!}
@endif

@if ($websiteParameter->facebook_pixel_code)
  {!! $websiteParameter->facebook_pixel_code !!}
@endif

    <link href="{{asset('css/w3.css')}}" rel="stylesheet" />

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('cp/dist/css/AdminLTE.css')}}">
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="{{asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons')}}" />
    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('mk/mk/BS4/assets/css/material-kit.css?v=2.0.2')}}">
    <!-- Documentation extras -->
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('mk/mk/BS4/assets/assets-for-demo/demo.css')}}" rel="stylesheet" />
    <!-- iframe removal -->

    <style>
        
.navbar.bg-danger {
    /* background-color: #D52379!important; */
    /*background-color: #2E2F96!important;*/
}
    </style>

</head>

<body class="signup-page ">

@include('welcome.layouts.welcomeHeader')

    <div class="page-header header-filter" filter-color="purple" style="background-image: url({{asset('mk/mk/BS4/assets/img/kit/free/bg7.jpg')}}); background-size: cover; background-position: top center;">
        

        @include('auth.parts.signin')
        

        {{-- @include('welcome.layouts.welcomeFooter') --}}
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('mk/mk/BS4/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('mk/mk/BS4/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('mk/mk/BS4/assets/js/bootstrap-material-design.js')}}"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin  -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/moment.min.js')}}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    <!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('mk/mk/BS4/assets/js/plugins/nouislider.min.js')}}"></script>
    <!-- Material Kit Core initialisations of plugins and Bootstrap Material Design Library -->
    <script src="{{asset('mk/mk/BS4/assets/js/material-kit.js?v=2.0.2')}}"></script>
    <!-- Fixed Sidebar Nav - js With initialisations For Demo Purpose, Don't Include it in your project -->
    <script src="{{asset('mk/mk/BS4/assets/assets-for-demo/js/material-kit-demo.js')}}"></script>
</body>

</html>