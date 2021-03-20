@extends('theme.prt.layouts.prtMaster')
@section('title')
    Checkout | {{ env('APP_NAME') }}
@endsection
@section('contents')
@include('theme.prt.checkout.parts.checkoutDetails')
@endsection

@push('js')
<script>
    $( document ).ready(function() {
    $(document).on('change','#credit', function () {
        console.log('a')
        $('#amount').html('£'+$('#credit').val());
        $('#totalamount').html('£'+$('#credit').val());
    })
  });
</script>
@endpush