@extends('user.layouts.userMaster')

@push('css')
<style>
    #grad1 {
        background-color: : #9C27B0;
        background-image: linear-gradient(120deg, #FF4081, #81D4FA)
    }
</style>
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        @if (isset($certificatesOnly))
                        All successful attempt certificate
                        @else

                        Examination
                        @endif
                    </h3>
                </div>
                <div class="card-body">
                    @if (isset($takenAttempts))
                    @include('company.exam.modules.examAttemptTable')
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
</section>
@endsection
@push('js')
@endpush
