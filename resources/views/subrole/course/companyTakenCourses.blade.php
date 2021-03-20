@extends('subrole.layouts.subRoleMaster')

@push('css')
@endpush

@section('content')
<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Your Taken Courses
                    </h3>
                </div>
                @php
                    $role = $subrole;
                @endphp
                @include('subrole.modules.subroleTakenCoursesTable')

            </div>
        </div>
    </div>
</section>
@endsection
