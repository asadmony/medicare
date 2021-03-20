@extends('bgbd.master')
@section('content')

	<!-- search banner start -->
	@include('bgbd.subpage.banner-sm')
	<!-- search banner end -->

	<!-- login section start -->
	<section class="py-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-md-7 login_para">
					<h1>WELCOME TO <span>BRIDE<span class="color-red-alt">GROOM</span>BD</span></h1>
					<p>
						Welcome to <a href="{{ url('/') }}" class="color-red">www.BRIDEGROOMBD.com</a> for matchmaking. Choosing  our website for creating your  profile is a right decision for finding  a &nbsp;dream spouse in your life. You are in the  right place to fulfill your dream.
					</p>
					<p>
						It  is a wonderful online platform for Bangladeshi singles that are searching for their  dream life partner. There are a lot of suitable genuine profiles for your  profound match. We hope that you will definitely meet what you have been  dreaming and longing for a long time.
					</p>
					<p>
						By  creating a profile you can easily communicate with a lot of Bangladeshi patro patri  (bride or groom) at anytime from anywhere in the world. There are many ways to  reach them such as email, phone, express interest and personal messages.
					</p>
					<p>
						Feel  peace of mind on the trustworthy available tools introduced in this website for  your security and confidentiality. Join now to fulfill your imagination.
					</p>
				</div>
				<div class="col-md-5 px-3 px-sm-0">

					<div class="w3-card">
						
					<div class="p-2 w3-white w3-border w3-round m-t-50">
						
						@include('bgbd.subpage.frontRegForm')

					</div>
					</div>
					 
					</div>
				</div>
			</div>
		</section>
		<!-- login section end -->

		{{-- <script>
		$(document).ready(function () {
			$('#religion').on('change', function () {
				$('#subrel').children().remove();
				$('#subrel').append('<option value="">Select ...</option>');

				if($(this).val() == 1 ){
					@foreach (subMuslim() as $key => $value)
					$('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
					@endforeach

				}
				if($(this).val() == 2 ){
					@foreach (subHindu() as $key => $value)
					$('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
					@endforeach
				}
				if($(this).val() == 3 ){
					@foreach (subBuddhist() as $key => $value)
					$('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
					@endforeach
				}
				if($(this).val() == 4 ){
					@foreach (subChristian() as $key => $value)
					$('#subrel').append('<option value="{{ $key }}">{{ $value }}</option>');
					@endforeach
				}
				if($(this).val() == 5 ){
					$('#subrel').children().remove();
					$('#subrel').append('<option selected value="1">Others</option>');
				}

			});












			/* Form Validation */
			$("body").on("click", "#sign-up", function () {
				var err = 0;
				$(
					"#err_profilemadeby, #err_lookingfor, #err_fname , #err_lname, #err_year, #err_month , #err_date, #err_religion, #err_describe, #err_email ,#err_mobile , #err_password , #err_password_confirmation , #err_trueinfo "
				).text("");

				var profilemadeby = $("select[name='profilemadeby']").val();
				var lookingfor = $("select[name='lookingfor']").val();
				var fname = $("#fname").val();
				var lname = $("input[name='lname']").val();
				var year = $("select[name='year']").val();
				var month = $("select[name='month']").val();
				var date = $("select[name='date']").val();
				var religion = $("select[name='religion']").val();
				var religion = $("select[name='subrel']").val();
				var describe = $("textarea[name='describe']").val();
				var email = $("input[name='email']").val();
				var mobile = $("input[name='mobile']").val();
				var password = $("input[name='password']").val();
				var password_confirmation = $("input[name='password_confirmation']").val();
				// var trueinfo = $("input[name='trueinfo']").val(); no need

				if (profilemadeby == "") {
					$("#err_profilemadeby").text("Profile Made by Required");
					err++;
				}
				if (lookingfor == "") {
					$("#err_lookingfor").text("Looking for Required");
					err++;
				}

				if (fname == "") {
					$("#err_fname").text("First Name Required");
					err++;
				} else if (fname.match(/[$,-,'',#,@,&,!_,%]/)) {
					$("#err_fname").text("Please don't use this $,-,'',#,@,&,!_,%");
					err++;
				}
				if (lname == "") {
					$("#err_lname").text("Last Name Required");
					err++;
				}

				if (year == "") {
					$('#err_year').text("Year  Required");
					err++;
				}
				if (month == "") {
					$("#err_month").text("Month Required");
					err++;
				}
				if (date == "") {
					$("#err_date").text("Date Required");
					err++;
				}
				if (religion == "") {
					$("#err_religion").text("Religion is Required");
					err++;
				}
				if (describe == "") {
					$("#err_describe").text("Describe Yourself is Required");
					err++;
				}
				if (email == "") {
					$("#err_email").text("Email is Required");
					err++;
				}
				if (mobile == "") {
					$("#err_mobile").text("Candidate Phone No is Required");
					err++;
				}
				if (subrel == "") {
					$("#err_subrel").text("Candidate Phone No is Required");
					err++;
				}
				if (password == "") {
					$("#err_password").text("Password is Required");
					err++;
				} else if (password_confirmation == "") {
					$("#err_password_confirmation").text("Confirm Password is Required");
					err++;
				} else if (password != password_confirmation) {
					$("#err_password").text("Password and Confirm Password is not match!");
				}

				if (!$("#trueinfo").is(":checked")) {
					$("#err_trueinfo").text("I declare that is Required");
					err++;
				}
				var currentDate = String(year + '-' + month + '-' + date);
				var valdiateDate = moment(currentDate, 'YYYY-MM-DD').isValid();


				if (valdiateDate === true) {
					$("#err_date_false").text("");
					$('#hiddendob').val(currentDate);
				} else {
					err++;
					$("#err_date_false").text("The date of birth is invalid. Please correct it.");
					$("#hiddendob").val("");
				}


				if (err > 0) {
					return false;
				}
				return true;
			});
		});

		</script> --}}
	@endsection