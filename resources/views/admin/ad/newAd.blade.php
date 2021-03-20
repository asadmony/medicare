@extends('admin.layouts.adminMaster')
@section('title', 'Dhaka Metro News')

@push('css')
@endpush

@section('content')
  @include('admin.ad.parts.newAd')
@endsection



@push('js')
<script src="{{asset('cp/bower_components/ckeditor/ckeditor.js')}}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('description');
  });
 


</script>
@endpush