@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css')
{{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}
<link href="{{asset('css/userProfile.css')}}" rel="stylesheet" />
@endpush

@section('content')
<?php $me = Auth::user(); ?>


@include('user.parts.userDetails') 


{{-- modal is outside of .main .main-raised class --}}
@include('user.includes.modal.reportModal')
{{-- @include('user.includes.modal.settingModal') --}}

@endsection

@push('js') 

{{-- <script src="{{asset('js/userProfile.min.js')}}"></script> --}}
@endpush