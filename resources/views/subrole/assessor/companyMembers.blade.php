@extends('subrole.layouts.subRoleMaster')

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
                            @else
                            Members
                        @endif
                        @if (auth()->user()->companyRole->title == 'administrator')
                            <a class="btn btn-info p-1" href="{{ route('administrator.subroleAdd', $subrole) }}"> <i class="fa fa-plus"></i> new </a>
                        @endif

                    </h3>
                </div>
                <div class="card-body">

                    @include('company.modules.subrolesTable')

                </div>
            </div>
        </div>
    </div>

{{-- @include('message.conversation') --}}

</section>
@endsection


@push('js')

@endpush
