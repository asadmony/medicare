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
                        Pakcage Details
                    </h3>
                </div>
                <div class="card-body" style="background: #f7f7f7;">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm table-bordered table-striped w3-centered">
                            <thead>
                                <tr>
                                    <th>Package Title</th>
                                    <th>Course level</th>
                                    <th>No of persons</th>
                                    <th>Attempts Duration</th>
                                    <th>Expire Date</th>
                                    <th>Package type</th>
                                    <th>Total Credits</th>
                                </tr>
                            </thead>
                            <tbody class="w3-small">
                                <tr>
                                    <td>{{$takenPackage->pack->title}}</td>
                                    <td>{{$takenPackage->pack->course_level}}</td>
                                    <td>{{$takenPackage->pack->no_of_persons}}</td>
                                    <td>{{$takenPackage->attempt_duration}} Days</td>
                                    <td>{{$takenPackage->expired_date}}</td>
                                    <td>{{$takenPackage->pack->package_type}}</td>
                                    <td>{{$takenPackage->pack->no_of_credits}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        Courses
                                    </h2>
                                </div>
                                <div class="card-body p-1">
                                    <table class="table table-striped table-sm table-hover w3-small table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>#</th>
                                                <th>
                                                    Course Name
                                                </th>
                                                <td>
                                                    Details
                                                </td>
                                            </tr>
                                            @foreach ($collection as $item)
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <a target="_blank"
                                                    href="{{ route('welcome.courseDetails', $takenCourse->course->id ) }}">
                                                    {{ $takenCourse->course->course_code }}
                                                </a>
                                            </td>
                                            <td>
                                                <a target="_blank"
                                                    href="{{ route('welcome.courseDetails', $takenCourse->course->id ) }}">
                                                    {{ $takenCourse->course->title }}
                                                </a>
                                            </td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        Users
                                    </h2>

                                </div>
                                <form action="{{route('user.userEnrolled',[$company,$takenPackage])}}" method="post">
                                    @csrf

                                    <div class="form-group col-sm-4">
                                        <label>Select New User</label>
                                        <div class="select2-purple">
                                            <select class="select2-another" multiple="multiple" name="user[]"
                                                data-placeholder="Select Company" style="width: 100%;">
                                                @foreach($users as $userall)
                                                @foreach ($userall as $user)
                                                <option value="{{$user->id}}">{{$user->email}}</option>

                                                @endforeach

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <button class="btn btn-primary">Add</button>
                                    </div>
                                </form>

                                <div class="card-body p-1">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover table-sm table-bordered table-striped w3-centered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Email</th>
                                                    <th>Attempts Start</th>
                                                    <th>Expire Date</th>
                                                    <th>no of attempts</th>
                                                    <th>Total Credits</th>
                                                </tr>
                                            </thead>
                                            @if($takenUser)
                                            <tbody class="w3-small">

                                                @foreach ($takenUser as $tu)
                                                <tr>
                                                    <td>{{$tu->user->name}}</td>
                                                    <td>{{$tu->user->mobile}}</td>
                                                    <td>{{$tu->user->email}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                            @endif
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        Attempts
                                    </h2>
                                </div>
                                <div class="card-body p-1">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-hover table-sm table-bordered table-striped w3-centered">
                                            <thead>
                                                <tr>
                                                    <th>Course</th>
                                                    <th>User</th>
                                                    <th>Score</th>
                                                    <th>Date</th>
                                                    <th>Details</th>
                                                </tr>
                                            </thead>
                                            <tbody class="w3-small">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')
<script src="{{asset('cp/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $( document ).ready(function() {
      $('#all-checked').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        }
        else {
          $(':checkbox').each(function() {
                this.checked = false;
            });
        }
      });
    });

      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      })



      $(function () {
        //Initialize Select2 Elements
        $('.select2-another').select2();
      })

</script>
@endpush
