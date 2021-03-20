<div class="box box-widget mb-0" style="min-height: 600px;">

	<div class="box-header with-border">
		<h3 class="box-title"><i class="fa fa-bell text-red"></i> Notice</h3>
	</div>

	<div class="box-body">

		@if ($noticeMessageFor == 'uploadPP')

		<p>Dear <b class="text-red w3-large">{{ $me->username  }}</b>, Upload your profile picture and try again.</p>

		<p>To upload your profile picture 
			<a href="{{ route('user.myPhotoUpload') }}" class="w3-btn w3-round  w3-blue w3-hover-deep-orange btn-sm"> Click Here</a>
		</p>

		@elseif($noticeMessageFor == 'ppPending')

		<p>Dear <b class="text-red w3-large">{{ $me->username  }}</b>, Your profile picture is <u class="w3-large text-red">under review.</u></p>

		<p>If you want to change your profile picture again, Please 
			<a href="{{ route('user.myPhotoUpload') }}" class="w3-btn w3-round  w3-blue w3-hover-deep-orange btn-sm"> Click Here</a>
		</p>

		<br>

		<p>You can change your account information in <a class="w3-btn btn-sm w3-round w3-white w3-border w3-border-purple btn-sm btn-menu-to-container" href="" data-url="{{ route('user.myAsset','setting_basic_info') }}">
			<i class="fa fa-cog fa-spin w3-text-purple"></i> Settings
		</a> menu area</p>
		
		@elseif($noticeMessageFor == 'freeAccount')

		<p>Dear <b class="text-red w3-large">{{ $me->username  }}</b>, You are our successful subscriber. Please, select a membership package and enjoy our exclusive membership features to connect your soulmate.</p>

		<p>Pay your money to our account and submit the <b class="w3-text-purple">Pay Now</b> form 
			<a href="" class="w3-btn w3-round w3-deep-orange  w3-blue w3-hover-green btn-sm btn-menu-to-container" data-url="{{ route('user.myAsset','pay_now') }}"> Pay Now <i class="fa fa-credit-card"></i></a>
		</p>

		<br>


		<p>You can see the Membership Packages to know the features
			<a href="" class="w3-btn w3-round w3-deep-orange  w3-purple w3-hover-deep-orange btn-sm btn-menu-to-container" data-url="{{ route('user.myAsset','membership_packages') }}"> Membership Packages <i class="fa fa-credit-card"></i></a>
		</p>



		<br>


		<div class="box box-widget w3-border w3-border-purple">
			<div class="box-body">


				<div class="row">
					<div class="col-sm-3">

						<img style="width: 120px;" src="{{ asset('img/paymentoptions.png') }}" class="align-self-start mr-3 rounded">
					</div>
					<div class="col-sm-9">

						<h4 class="no-margin">Send Money to any account below and click the <u>Pay Now</u> button to submit the payment form. </h4> 


						<br>
						<p>

							bKash (Personal) {{ env('BKASH_PERSONAL_MOBILE1') }}

							


						</p>

					</div>
				</div>


			</div>
		</div>


		@endif


		<br>

		<div class="row">
			<div class="col-sm-5">
				<div class="box box-widget w3-border w3-border-purple">
			<div class="box-body">

Your Information
<hr class="no-margin">

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Your username
</div>
  <div class="w3-rest text-left">
  	: 
	{{ $me->username }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Your email
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $me->email }}

  </div>
</div>

<div class="w3-row">
  <div class="text-left w3-text-gray w3-small w3-col width-140">
  Your mobile
</div>
  <div class="w3-rest text-left">
  	: 
  	{{ $me->mobile }}

  </div>
</div>


			</div>
		</div>
			</div>
		</div>


		


		<br>


		<div class="box box-widget w3-border w3-border-purple">
			<div class="box-body">


				<div class="row">
					<div class="col-sm-3">

						<img style="width: 120px;" src="{{ asset('img/contact-us.jpg') }}" class="align-self-start mr-3 rounded">
					</div>
					<div class="col-sm-9">

						<h4 class="no-margin">To get quick response, Please Contact Us </h4> 


						<br>
						<p>

							   Contact: {{ env('CONTACT_MOBILE2') }}  

							   <br>

							   Contact {{ env('CONTACT_MOBILE1') }}


						</p>

					</div>
				</div>


			</div>
		</div>



	</div>






</div>