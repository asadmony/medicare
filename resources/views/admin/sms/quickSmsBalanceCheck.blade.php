@extends('admin.layouts.adminMaster')


@section('css')
	    <style>
	    	
	    </style>
@endsection

@section('leftSidebar')
@include('admin.layouts.leftSidebar')
@endsection

@section('content')
  @includeIf('admin.sms.parts.quickSmsBalanceCheck')
@endsection

@section('js')
@endsection