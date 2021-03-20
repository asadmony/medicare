@php
    if (!isset($subrole)) {
      $subrole = auth()->user()->companyRole;
    }
@endphp
@extends('subrole.layouts.subRoleMaster')

@push('css')
@endpush

@section('content')
<section class="content">
    <br>
    @include('message.conversation')
</section>
@endsection


@push('js')

@endpush
