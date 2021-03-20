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
  @includeIf('admin.sms.parts.sentSmsBulk')
@endsection

@push('js')

<script>
	$(function(){

		$(document).on("click", ".pagination li a", function(e){
    e.preventDefault();

    var that = $( this );
    var url = that.attr("href");
    var box = that.closest('.box');

    // alert(url);
    
    $.ajax({
      url: url,
      type: 'GET',
      cache: false,
      dataType: 'json',
      success: function(response)
      {
        box.empty().append(response.page);
      },
      error: function(){}
    });
  });
	});

	$(function(){

		$(document).on("click", "a.business-sms-bulk", function(e){
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
	        $('.business-sms-items').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});


	$(function(){

		$(document).on("click", "a.quick-sms-bulk", function(e){
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
	        $('.quick-sms-items').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});

	$(function(){

		$(document).on("click", "a.uploaded-sms-bulk", function(e){
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
	        $('.uploaded-sms-items').empty().append(response.page);
	      },
	      error: function(){}
	    });
  	});
	});

	$(function(){
		$(document).on("click", "a.business-sms-file-delete", function(e){
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
	      		$(".business-sms-file-" + response.bulk_id).remove();
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

	$(function(){
		$(document).on("click", "a.uploaded-contact-file-delete", function(e){
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
	      		$(".draft-bulk-" + response.bulk_id).remove();
	      	}	        
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
