@extends('theme.prt.layouts.prtMaster')
@section('title')
    {{ $package->title }} | env('APP_NAME')
@endsection
@section('contents')
@include('theme.prt.package.parts.singlePackage')
@endsection