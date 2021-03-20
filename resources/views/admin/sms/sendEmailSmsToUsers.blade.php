@extends('admin.layouts.adminMaster')

@section('title', 'Admin Dashboard | TMM')

@section('css')
	    <style>
	    	
	    </style>
@endsection

@section('leftSidebar')
@include('admin.layouts.leftSidebar')
@endsection


@section('content')

  @include('admin.sms.parts.sendEmailSmsToUsersPart')
  
@endsection

@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}
@endpush
