@extends('admin.layouts.adminMaster')

@push('css')

<link href="{{asset('css/userProfile.css')}}" rel="stylesheet" />
@endpush

@section('content')
  @include('admin.users.parts.newUser')
@endsection


@push('js')

@endpush

