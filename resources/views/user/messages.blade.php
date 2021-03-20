@extends('user.layouts.userMaster')

@push('css')
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('message.conversation')
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
