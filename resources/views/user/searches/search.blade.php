@extends('welcome.layouts.welcomeMasterForUser')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css') 
{{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}
@endpush

@section('content')

@include('user.searches.parts.userSearch')
@endsection

@push('js') 
<script src="{{asset('js/userSetting.js')}}"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('keypress', '.input-profession', function(e) {
			    if(e.which == 13) {
			        e.preventDefault();
			    }  
	  	});

	$(document).on("keyup", ".input-profession", function(e){
	    e.preventDefault();
	    var that = $( this );
	    var q = e.target.value;
	    var url = that.attr("data-url");
	    var urls = url+'?q='+q;
	    // var datalist = $("#products");
	    // datalist.empty();
	    // alert(urls);
	    
	    $.ajax({
	      url: urls,
	      type: 'GET',
	      cache: false,
	      dataType: 'json',
	      success: function(response)
	      {
	      	// console.log(response);
	        $(".profession-search-container").empty().append(response);
	      },
	      error: function(){}
	    });
	  });

	});
</script>

@endpush