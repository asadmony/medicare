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
                        Pakcages
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package Title</th>
                                    <th>Number Of Courses</th>
                                    <th>Number Of Users</th>
                                    <th width="30"># of Attempts</th>
                                    <th>Total Credits</th>
                                    <th>Used Credits</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($packages->currentPage() - 1) * $packages->perPage() + 1); ?>
                                @foreach ($packages as $package)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$package->pack->title}}</td>
                                    <td>{{$package->takenCourses->groupBy('course_id')->count()}}</td>
                                    <td>
                                        @if ( isset($subrole) && $subrole->title == 'member')
                                        {{$package->packageUsers->count()}}
                                        @else
                                        <a
                                        href="{{ route('company.takenPackageCompanyUsers', [$company, $package->id]) }}">{{$package->packageUsers->count()}}
                                    </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('company.takenPackageCompanyAttempts', [$company, $package->id]) }}">{{$package->attempts->where('total_question', '<>', null)->count()}}
                                        </a>
                                    </td>
                                    <td>{{$package->no_of_credits}}</td>
                                    <td>{{$package->used_credit}}</td>
                                    <td>{{$package->expired_date}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('company.packageDetails',[$company,$package])}}">Details</a>
                                        </div>
                                    </td>

                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>

                        {{ $packages->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
