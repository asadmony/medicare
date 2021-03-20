@extends('admin.layouts.adminMaster')

@push('css')
 
@endpush

@section('content')
  @include('admin.pages.parts.pagesAll')
@endsection



@push('js')
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('cp/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
 <script>
   $(document).ready(function () {
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   })
   $( "#sortablePanel" ).sortable({
      connectWith: ".connectedSortable",
      distance: 5,
    delay: 300,
    opacity: 0.6,
    cursor: 'move',
        update : function () {
          var order = $('#sortablePanel').sortable('toArray'),
            url = $("#sortablePanel").attr('data-url');
            $.ajax({
            url: url,
            type: 'Post',
            cache: false,
            dataType: 'json',
            data: {sorted_data:order},
            success: function(response)
            {
              if(response.success == true)
              {
              }
              else
              {
                alert('fail');
              }
            },
            error: function(){}
          }); //ajax
      }
    }).disableSelection();
 </script>

@endpush


