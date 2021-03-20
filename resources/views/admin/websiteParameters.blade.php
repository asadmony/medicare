@extends('admin.layouts.adminMaster')

@push('css')
 
@endpush

@section('content')
  <div class="container">
    @include('admin.modules.websiteParameter')
  </div>
@endsection



@push('js')
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('cp/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
 <script>

 </script>

@endpush


