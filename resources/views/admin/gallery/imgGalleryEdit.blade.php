@extends('admin.layouts.adminMaster')
@section('title', 'Dhaka Metro News')

@push('css')
@endpush

@section('content')
  @include('admin.gallery.parts.imgGalleryEdit')
@endsection


@push('js')


<script type="text/javascript">
  
$(function(){

      $(document).on('submit','.gallery-item-form',function(s){

      s.preventDefault();
      var form = $(this),
      that = $( this ),
      box = $(this).closest(".box"),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );
      // alert(alldata);

      // $(".help-block").remove();


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
          // form.find('.tr-updater').empty().append(response.page);
          // $(".success-js-alert").show();
          // tr.empty().append(response.page);

          box.find('.submit-btn').removeClass('btn-primary').addClass('btn-success').text('Added');

        }
        else
        {
          $.each( response.errors, function( key, value ) {
            // tr.find("input[name~='"+key+"']").after( "<span class='help-block text-red'><strong>"+value+"</strong></span>" );
            box.find("input[name~='"+key+"']").css({"border":"1px solid red"});
            
          });
        }
      
      }).fail(function(){
          alert('error');
      });
  });
});

</script>

@endpush
