@extends('admin.layouts.adminMaster')

@push('css')
@endpush

@section('content')
  @include('admin.parts.blogAdminsAll')
@endsection


@push('js')
<script>
  $(document).ready(function () {
  $('.select2').select2({
    minimumInputLength: 1,
    ajax: {
      data: function (params) {
        return {
          q: params.term, // search term
          page: params.page
        };
      },
      processResults: function (data, params) {
        params.page = params.page || 1;
        // alert(data[0].s);
        var data = $.map(data, function (obj) {
          obj.id = obj.id || obj.email;
          return obj;
        });
        var data = $.map(data, function (obj) {
          obj.text = obj.text || obj.email;
          return obj;
        });
        return {
          results: data,
          pagination: {
            more: (params.page * 30) < data.total_count
          }
        };
      }
    },
  });
});
</script>
 
@endpush

