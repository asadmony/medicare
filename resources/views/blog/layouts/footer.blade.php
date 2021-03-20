 
 <style>
 	.main-footer a {
 		color: #eee;
 	}
 </style>

<footer class="main-footer w3-{{$blogParameter->footer_bg_color}} w3-text-{{$blogParameter->footer_text_color}}">

<div class="row">
	<div class="col-sm-2">

		<div class="row">
			<div class="col-sm-12">
				<p> 
					 <a href="{{route('welcome.blog')}}" class="w3-text-{{$blogParameter->footer_text_color}}"> <i class="fa fa-home"></i> Home </a> 
            
				</p>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				<p> 
					 <a href="{{ url('/') }}" class="photo-gallery  w3-text-{{$blogParameter->footer_text_color}}"><i class="fa fa-  "></i> <img class="img-responsive w3-border w3-border-white w3-round" src="{{ asset($websiteParameter->logo ? 'storage/logo/'.$websiteParameter->logo : 'img/logo.jpg') }}" alt="{{ env('APP_NAME_BIG') }}" style="width: 60px; margin-top: -21px;background: white;"></a> 
            
				</p>
			</div>
		</div>

		{{-- <div class="row">
			<div class="col-sm-12">
				<p> 
					 <a href="javascript::void(0)" class="photo-gallery  w3-text-{{$blogParameter->footer_text_color}}"><i class="fa fa-camera "></i> ছবি </a> 
            
				</p>
			</div>
		</div> --}}

		{{-- <div class="row">
			<div class="col-sm-12">
				<p> 
					 <a href="javascript::void(0)" class="video-gallery w3-text-{{$blogParameter->footer_text_color}}"><i class="fa fa-play"></i> ভিডিও </a> 
             
				</p>
			</div>
		</div> --}}

		{{-- <div class="row">
			<div class="col-sm-12">
				<p> <a href="javascript::void(0)" class="go-archive w3-text-{{$blogParameter->footer_text_color}}"><i class="fa fa-archive"></i> পুরনো সংখ্যা </a> </p>
			</div>
		</div> --}}
	</div>
	<div class="col-sm-10">

			@foreach($catsAll->chunk(6) as $cats)
				<div class="row">
					@foreach($cats as $cat)
					<div class="col-xs-6 col-sm-3 col-md-2">
						<p>
							<a  href="{{route('welcome.postCategory',[$cat,$cat->title])}}" class="w3-text-{{$blogParameter->footer_text_color}}">{{$cat->title}}</a>
						</p>
					</div>
					@endforeach
				</div>
				@endforeach
		
	</div>
</div>




	<p style="border-bottom: 1px solid #777;width: 100%;"></p>

	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default" style="background: #333;">
				<div class="panel-body">
					<address>
						<p class="w3-large">
						<u>Address:</u>
						</p> 

						{!! $blogParameter->footer_address !!}

					</address>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default" style="background: #333;">
				<div class="panel-body" style="padding: 10px;">
					{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2169.4977834188026!2d90.39931322879269!3d23.86670755957351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c425ae395be3%3A0x902ffbba8e3f7a95!2s7+Road-14%2FC%2C+Dhaka+1230!5e0!3m2!1sen!2sbd!4v1525458187294" width="100%" height="140" frameborder="0" style="border:0;border-radius: 5px;" allowfullscreen></iframe> --}}

					{{-- {!! $blogParameter->google_map_code !!} --}}
					<a target="_blank" href="{{ url('https://www.google.com/maps/place/Tropical+Centre+Shopping+Mall/@23.7412715,90.3877299,16z/data=!4m8!1m2!2m1!1sTropical+Centre,+Dhanmondi,+Dhaka!3m4!1s0x0:0x85b8ebef67fdc42b!8m2!3d23.7391548!4d90.3892261') }}">
						
					<img class="img-responsive" style="width: 100%;" src="{{ asset('img/map.png') }}" alt="{{ env('APP_NAME_BIG') }}">
					</a>

				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default" style="background: #333;">
				<div class="panel-body" style="padding: 10px;">
					<a href="javacript::void();" title="Download our android app"> 
					<img class="img-responsive" style="border-radius: 5px;" src="{{asset('img/and.png')}}" alt="{{$blogParameter->h1}} App" download>
					</a>
				</div>
			</div>
		</div>
	</div>

	<p style="border-bottom: 1px solid #777;width: 100%;"></p>
 

 <div class="pull-right">
      Design & Developed by: <a class="w3-text-{{$blogParameter->footer_text_color}}" target="_blank" href="{{url('https://www.multisoftbd.com
')}}">Multisoft</a> 

 
    </div>

 
 
{!! $blogParameter->footer_copyright !!} 

{{--     <strong>Copyright &copy; {{date('Y')}} <a href="{{url('/')}}">Trust News</a>.</strong> All rights
    reserved. --}}

  </footer>