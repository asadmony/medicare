@extends('theme.prt.layouts.prtMaster')
@section('title')
    Payment | Checkout | {{ env('APP_NAME') }}
@endsection
@section('contents')
@include('theme.prt.payment.parts.paymentPage')
@endsection