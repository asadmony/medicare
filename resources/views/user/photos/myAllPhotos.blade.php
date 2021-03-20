@extends('welcome.layouts.welcomeMasterForUser')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css') 
{{-- <link href="{{asset('css/user.css')}}" rel="stylesheet" /> --}}
@endpush

@section('content')

@include('user.photos.parts.myAllPhotos')
@endsection

@push('js') 
<script src="{{asset('js/userSetting.js')}}"></script>
@endpush
