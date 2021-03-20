@extends('user.layouts.userMaster')

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

                                <?php $i = (($takenPackages->currentPage() - 1) * $takenPackages->perPage() + 1); ?>
                                @foreach ($takenPackages as $package)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$package->pack->title}}</td>
                                    <td>{{$package->no_of_courses}}</td>
                                    <td>{{$package->no_of_credits}}</td>
                                    <td>{{$package->no_of_attempts}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('user.takenPackageDetails', $package->id)}}">Details</a>

                                        </div>
                                    </td>



                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>

                        {{ $takenPackages->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
