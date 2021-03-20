@extends('theme.prt.layouts.prtMaster')

@section('title')
{{ env('APP_NAME') }}
@endsection
@section('meta')
@endsection

@push('css')

@endpush

@section('contents')
@include('alerts.alerts')
@include('theme.prt.include.home')
@endsection

@push('js')
@endpush