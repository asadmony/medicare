@extends('theme.prt.layouts.prtMaster')

@section('title')
    Complete | {{ env('APP_NAME') }}
@endsection

@section('contents')
@include('theme.prt.payment.parts.paymentComplete')
@endsection