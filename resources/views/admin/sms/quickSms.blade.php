@extends('admin.layouts.adminMaster')

@section('title', 'Admin Dashboard | Lynk')

@section('css')
	    <style>
	    	
	    </style>
@endsection

@section('leftSidebar')
@include('admin.layouts.leftSidebar')
@endsection

@section('content')
  @includeIf('admin.sms.parts.quickSms')
@endsection

@section('js')
@endsection
