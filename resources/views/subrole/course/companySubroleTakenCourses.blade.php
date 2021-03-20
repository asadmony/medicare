@extends('subrole.layouts.subRoleMaster')

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
                        Course List of {{ $role->user->email }}
                    </h3>
                </div>

                @include('subrole.modules.subroleTakenCoursesTable')


            </div>
        </div>
    </div>
    </div>
</section>
@endsection

@push('js')

@endpush
