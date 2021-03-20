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
                        Company Packages
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Package Title</th>
                                    <th>Number Of Courses</th>
                                    <th>Total Credits</th>
                                    <th width="30"># of Attempts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($companyTakenPackages->currentPage() - 1) * $companyTakenPackages->perPage() + 1); ?>
                                @foreach ($companyTakenPackages as $pack)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$pack->title}}</td>
                                    <td>{{$pack->no_of_courses}}</td>
                                    <td>{{$pack->no_of_credits}}</td>
                                    <td>{{$pack->no_of_attempts}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('assessor.packageDetails',[$subrole,$pack])}}">Details</a>
                                        </div>
                                    </td>

                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>

                        {{ $companyTakenPackages->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
