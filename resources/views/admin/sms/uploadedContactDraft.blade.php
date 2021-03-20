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
  @includeIf('admin.sms.parts.uploadedContactDraft')
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
		$(document).on("click", "a.uploaded-contact-delete", function(e){
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
	      		$(".draft-bulk-" + response.bulk_id).remove();
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


    $(document).on('submit','.form-sms-to-contact-send',function(s){

      s.preventDefault();
      var form = $(this),
      // box = $(this).closest(".box"),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
      // alert(alldata);

      $(".help-block").remove();
      $(".success-js-alert").hide();


      $.ajax({
        url: url,
        type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,
        // beforeSend: function()
        // {

        // },
        // complete: function()
        // {

        // },
      }).done(function(response){

        if(response.success == true)
        {
          // var dir = ".dir-tr-" + response.dir_id;
          // $(dir).empty().append(response.page);
          //
          $(".success-js-alert").show();
          $(".js-alert-success-data").text(response.js_success);
          $(".draft-bulk-" + response.bulk_id).remove();
          

        }
        else
        {
          $.each( response.errors, function( key, value ) {
            $("input[name~='"+key+"']").after( "<span class='help-block text-red'><strong>"+value+"</strong></span>" );
            $("textarea[name~='"+key+"']").after( "<span class='help-block text-red'><strong>"+value+"</strong></span>" );
          });
          $(".error-js-alert").show();
          $(".js-alert-error-data").text(response.js_error);
        }

      }).fail(function(){
        alert('error');
      });
    });
  });

	
	
</script>
@endpush
