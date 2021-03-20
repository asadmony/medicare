@extends('admin.layouts.adminMaster')
{{-- @section('title', 'TMM') --}}
<?php $me = Auth::user(); ?>
@push('css')

<link rel="stylesheet" href="{{ asset('cp/plugins/iCheck/flat/blue.css') }}">

<link rel="stylesheet" href="{{asset('assets/sweetalert2/dist/sweetalert2.css')}}">
  <script src="{{asset('assets/sweetalert2/dist/sweetalert2.min.js')}}"></script>

@endpush

@section('content')

  @include('admin.users.parts.sendProfileToGivenEmailPart')

@endsection


@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}

<script src="{{ asset('cp/plugins/iCheck/icheck.min.js') }}"></script>

<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
  });



$(function(){

  $(document).on('change', '.select-parameter', function(e){
      // e.preventDefault();

      $(".form-select-mails-user").submit();
      // alert('ok');

    });

  $(document).on('submit','.form-select-mails-user',function(s){

      s.preventDefault();
      var form = $(this),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );

      


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
          $(".emails-tbody").empty().append(response.page);

          //Enable iCheck plugin for checkboxes
          //iCheck for checkbox and radio inputs
          $('.mailbox-messages input[type="checkbox"]').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
          });

          
        }
        else
        {
                    
        }

      }).fail(function(){
        alert('error');
      });
    });

  $(document).on('submit','.form-send-cv-from-user-post',function(s){

      s.preventDefault();

      $(".btn-send").attr('type', 'button');

      var form = $(this),
      url = form.attr('action'),
      type = form.attr('method'),
      alldata = new FormData( this );

      // console.log(alldata);

      
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
          swal({
            text: "CV successfully sent",
            title: "Success!",
            timer: 8000,
            type: "success",
            showConfirmButton: true,
            confirmButtonText: "Close",
            confirmButtonColor: "green"
            });

          $(".emails-tbody").empty();
          $(".btn-send").attr('type', 'submit');
          // location.reload();
        }
        else
        {
                    
        }

      }).fail(function(){
        alert('error');
      });
    });
});


</script>
@endpush
