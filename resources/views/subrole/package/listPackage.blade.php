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
                                    <th>Company</th>
                                    <th>Package Title</th>
                                    <th>Number Of Courses</th>
                                    <th>Total Credits</th>

                                    <th width="30"># of Attempts</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php $i = (($takenPackUsers->currentPage() - 1) * $takenPackUsers->perPage() + 1); ?>
                                @foreach ($takenPackUsers as $tpu)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$tpu->company->title}}</td>
                                    <td>{{$tpu->takenPackage->title}}</td>
                                    <td>{{$tpu->takenPackage->no_of_courses}}</td>
                                    <td>{{$tpu->takenPackage->no_of_credits}}</td>
                                    <td>{{$tpu->takenPackage->no_of_attempts}}</td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
                                            <a class="btn btn-primary btn-xs"
                                                href="{{route('subrole.packageDetails',[$subrole,$tpu])}}">Details</a>
                                        </div>
                                    </td>

                                </tr>
                                <?php $i++; ?>
                                @endforeach
                            </tbody>

                        </table>

                        {{ $takenPackUsers->render() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')

@endpush
