@extends('company.layouts.companyMaster')

@push('css')
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
                        Company @if (isset($type))
                            {{ Str::plural(Str::ucfirst($type)) }}
                        @endif
                    </h3>
                </div>
                <div class="card-body">

                    @include('company.modules.subrolesTable')

                </div>
            </div>
        </div>
    </div>



</section>
@endsection


@push('js')

@endpush
