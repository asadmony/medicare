@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')

  @include('admin.parts.userSettingFieldValue')

@endsection


@push('js')

<script>
    $(function(){
        $(document).on('click', '.btn-value-edit', function(e){
    e.preventDefault();
    var that = $(this),
    url = that.attr('href'),
    tr = that.closest('tr');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
        })
        .done(function(response) {
         tr.empty().append(response);
       })
        .fail(function() {
          alert("error");
        });
      });

    $(document).on('submit','form.form-value-update',function(s){
    s.preventDefault();

    var form = $(this),
    url = form.attr('action'),
    type = form.attr('method'),
    alldata = new FormData( this ),
    tr = form.closest('tr');
    $.ajax({
      url: url,
      type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,

      }).done(function(response) {
        tr.empty().append(response);
      })
      .fail(function() {
        alert("error");
      });
    });

 

    $(document).on('click', '.btn-value-delete', function(e){
    e.preventDefault();
    var that = $(this),
    url = that.attr('href'),
    table = that.closest('.table-cat');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
        })
        .done(function(response) {
         if(response.success)
         {
          table.remove();
         }
       })
        .fail(function() {
          alert("error");
        });
      });
    });
</script>
@endpush
