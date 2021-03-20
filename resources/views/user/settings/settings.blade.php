@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Banglali Muslim Marriage Media') --}}

@push('css') 
@endpush

@section('content')
@include('user.settings.parts.userSettings')
@endsection

@push('js') 
<script src="{{asset('js/userSetting.js')}}"></script>
@endpush
