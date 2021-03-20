<!DOCTYPE html>
<html class="sticky-header-reveal">
	<head>
		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	
		
		<title>
			@yield('title')
		</title>

        @yield('meta')


		<meta name="keywords" content="kazi masud porfolio" />
		<meta name="author" content="a2sys.co">
		<meta name="description" content="{{ $websiteParameter->meta_description ?? 'Matrimony Service in Bangladesh' }}">

		{{-- <meta name="author" content="{{ $websiteParameter->meta_author ?? 'Marriage Solution' }}"> --}}
		<meta name="keywords" content="{{ $websiteParameter->meta_keyword ?? 'Matchmaker Service in Bangladesh' }}">
	
		@if (isset($websiteParameter->google_analytics_code))
		{!! $websiteParameter->google_analytics_code !!}
		@endif
	
		@if (isset($websiteParameter->facebook_pixel_code))
		{!! $websiteParameter->facebook_pixel_code !!}
		@endif
		<!-- Favicon -->
		@if (isset($websiteParameter->favicon))
		<link rel="shortcut icon" href="{{asset('storage/favicon/'.$websiteParameter->favicon)}}" type="image/x-icon" />
		<link rel="apple-touch-icon" href="{{asset('storage/favicon/'.$websiteParameter->favicon)}}">
		@endif
		
		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('prt/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/animate/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
        <link rel="stylesheet" href="{{asset('prt/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/magnific-popup/magnific-popup.min.css')}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('prt/css/theme.css')}}">
		<link rel="stylesheet" href="{{asset('prt/css/theme-elements.css')}}">
		<link rel="stylesheet" href="{{asset('prt/css/theme-blog.css')}}">
		<link rel="stylesheet" href="{{asset('prt/css/theme-shop.css')}}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{asset('prt/vendor/rs-plugin/css/settings.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/rs-plugin/css/layers.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/rs-plugin/css/navigation.css')}}">
		<link rel="stylesheet" href="{{asset('prt/vendor/circle-flip-slideshow/css/component.css')}}">
		<link rel="stylesheet" href="{{asset('prt/css/w3.css')}}">
		
		<!-- Demo CSS -->


		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{asset('prt/css/skins/default.css')}}"> 

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('prt/css/custom.css')}}">

		<!-- Head Libs -->
        <script src="{{asset('prt/vendor/modernizr/modernizr.min.js')}}"></script>

        <style type="text/css">
        	a.no-decoration:hover{
    			text-decoration: none;
			}
        </style>
        @stack('css')



	</head>
	<body>
		<div class="body">
			@include('theme.prt.layouts.header')

			<div role="main" class="main">
				@yield('contents')
			</div>

			@include('theme.prt.layouts.footer')
		</div>

		<!-- Vendor -->
		<script src="{{asset('prt/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
		<script src="{{asset('prt/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{asset('prt/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('prt/vendor/common/common.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
		<script src="{{asset('prt/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
		<script src="{{asset('prt/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script src="{{asset('prt/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script src="{{asset('prt/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('prt/vendor/vide/jquery.vide.min.js')}}"></script>
		<script src="{{asset('prt/vendor/vivus/vivus.min.js')}}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{asset('prt/js/theme.js')}}"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="{{asset('prt/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
		<script src="{{asset('prt/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
		<script src="{{asset('prt/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js')}}"></script>
		<script src="{{asset('prt/js/views/view.home.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{asset('prt/js/custom.js')}}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{asset('prt/js/theme.init.js')}}"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
         -->
         @stack('js')

	</body>
</html>