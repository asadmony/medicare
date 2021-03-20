@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css') 
{{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}
<link href="{{asset('css/userProfile.css')}}" rel="stylesheet" />
@endpush

@section('content')
<?php $u = Auth::user(); ?>
@include('user.parts.myProfile')

@endsection

@push('js') 

{{-- <script src="{{asset('js/userProfile.min.js')}}"></script> --}}
@endpush
