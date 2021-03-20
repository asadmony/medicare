@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css') 
{{-- <link href="{{asset('css/userProfile.css')}}" rel="stylesheet" /> --}}
@endpush

@section('content')
<?php $u = Auth::user(); ?>
@include('user.parts.myVisitorsAll')

@endsection

@push('js') 

{{-- <script src="{{asset('js/userProfile.js')}}"></script> --}}
@endpush
