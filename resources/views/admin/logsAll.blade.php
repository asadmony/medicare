@extends('admin.layouts.adminMaster')
{{-- @section('title', 'TMM') --}}
<?php $me = Auth::user(); ?>
@push('css')

@endpush

@section('content')

  @include('admin.parts.logsAllPart')

@endsection


@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}
@endpush
