@extends('admin.layouts.adminMaster')

@section('title', 'Admin Dashboard | Lynk')

@section('css')
	    <style>
	    	
	    </style>
@endsection

@section('leftSidebar')
@include('admin.layouts.leftSidebar')
@endsection


@section('content')

  @include('admin.sms.parts.quickSmsDraft')
  
@endsection

@push('js')
<script>

	$(function(){
		$(document).on("click", "a.sms-draft-bulk", function(e){
	    e.preventDefault();

	    var that = $( this );
	    var url = that.attr("href");

	    // alert(url);
	    
	    $.ajax({
	      url: url,
	      type: 'GET',
	      cache: false,
	      dataType: 'json',
	      success: function(response)
	      {
	        $('.sms-draft').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});


		$(function(){
		$(document).on("click", "a.quick-sms-file-delete", function(e){
	    e.preventDefault();

	    var that = $( this );
	    var url = that.attr("href");

	    // alert(url);
	    
	    $.ajax({
	      url: url,
	      type: 'GET',
	      cache: false,
	      dataType: 'json',
	      success: function(response)
	      {
	      	if(response.success && response.bulk_deleted)
	      	{
	      		that.closest('tr').remove();
	      		$(".quick-sms-file-" + response.bulk_id).remove();
	      	}
	      	else if(response.success)
	      	{
	      		that.closest('tr').remove();
	      	}
	        
	      },
	      error: function(){}
	    });
  	});
	});
	
</script>
@endpush

