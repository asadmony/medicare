@extends('admin.layouts.adminMaster')

@push('css')

<style type="text/css" media="print">
   .no-print { display: none; }
</style>

@endpush

@section('content')

  @include('admin.parts.mobileNumbersAll')

@endsection


@push('js')
@endpush