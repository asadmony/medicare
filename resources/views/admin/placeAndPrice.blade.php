@extends('admin.layouts.adminMaster')
@section('title', 'Ambulance')

@push('css')
@endpush

@section('content')

  @include('admin.parts.placeAndPrice')

@endsection


@push('js')
{{-- <script type="text/javascript">
  alert('ok');
</script> --}}
@endpush