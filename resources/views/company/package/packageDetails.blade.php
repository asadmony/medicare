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
                        <table class="table table-hover table-sm table-bordered table-striped">
                            {{-- <thead>
                                <tr>
                                    <th>Package Title</th>
                                    <th>No of persons</th>
                                    <th>Attempts Duration</th>
                                    <th>Expire Date</th>
                                    <th>Package type</th>
                                    <th>Total Credits</th>
                                </tr>
                            </thead>
                            <tbody class="w3-small">
                                <tr>
                                    <td>{{$takenpackage->pack->title}}</td>
                            <td>{{$takenpackage->pack->no_of_persons}}</td>
                            <td>{{$takenpackage->attempt_duration}} Days</td>
                            <td>{{$takenpackage->expired_date}}</td>
                            <td>{{$takenpackage->pack->package_type}}</td>
                            <td>{{$takenpackage->pack->no_of_credits}}</td>
                            </tr>
                            </tbody> --}}
                            <tr>
                                <th>Package Title</th>
                                <td>{{$takenpackage->title}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $takenpackage->pack->description !!}</td>
                            </tr>
                            <tr>
                                <th>Taken Date</th>
                                <td>{{$takenpackage->taken_date}}</td>
                            </tr>
                            <tr>
                                <th>Expire Date</th>
                                <td>{{$takenpackage->expired_date}}
                                    @php
                                    $date = now()->parse($takenpackage->expired_date);
                                    $now = now();

                                    $diff = $now->diffInDays($date);
                                    @endphp
                                    <span class="w3-blue px-1 rounded">({{ $diff }} days left )</span>
                                </td>
                            </tr>
                            <tr>
                                <th>No of persons</th>
                                <td>{{$takenpackage->no_of_persons}}
                                    <span class="w3-blue px-1 rounded">({{ $takenpackage->packageUsers->count() }}
                                        persons added)<span>
                                </td>
                            </tr>
                            <tr>
                                <th>Package type</th>
                                <td>{{$takenpackage->package_type}}</td>
                            </tr>
                            <tr>
                                <th>Total Credits</th>
                                <td>{{$takenpackage->no_of_credits}}</td>
                            </tr>
                            <tr>
                                <th>Used Credits</th>
                                <td>{{$takenpackage->used_credit}}</td>
                            </tr>
                            <tr>
                                <th>Remaining Credits</th>
                                <td>{{$takenpackage->no_of_credits - $takenpackage->used_credit}}</td>
                            </tr>
                            <tr>
                                <th>Total Courses</th>
                                <td>{{$takenpackage->no_of_courses}}
                                    <span class="w3-blue px-1 rounded">
                                        ({{ $takenpackage->takenCourses->groupBy('course_id')->count() }}
                                        courses added)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Maximum Attempts</th>
                                <td>{{$takenpackage->no_of_attempts}}
                                    <span class="w3-blue px-1 rounded">
                                        ({{ $takenpackage->attempts()->where('total_question', '<>', null)->count() }}
                                        attempts
                                        done)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{$takenpackage->price}}</td>
                            </tr>
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
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Course Code
                                                </th>
                                                <th>
                                                    Course Name
                                                </th>
                                            </tr>
                                            @foreach ($takenCoursesByUsers as $takenCourse)
                                            <tr>
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
                                            </tr>
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
                                <form action="{{route('user.userEnrolled',[$company,$takenpackage])}}" method="post">
                                    @csrf

                                    <div class="form-group col-sm-4">
                                        <label>Select New User</label>
                                        <div class="select2-purple">
                                            <select class="select2-another" multiple="multiple" name="user[]"
                                                data-placeholder="Select Company" style="width: 100%;">
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->email}}</option>


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
                                            @if($takenUsers)
                                            <tbody class="w3-small">

                                                @foreach ($takenUsers as $tu)
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
                                                    <th>Date</th>
                                                    <th>Course</th>
                                                    <th>User</th>
                                                    <th>Score</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="w3-small">
                                                @foreach ($takenExamsByUsers as $attempt)
                                                <tr>
                                                    <td>{{ $attempt->last_attempt_started_at }}</td>
                                                    <td>{{ $attempt->course->title }}</td>
                                                    <td>{{ $attempt->user->email }}</td>
                                                    <td>
                                                        @php
                                                        $total = $attempt->takenCourseExamItems->count();
                                                        if ($total > 0) {
                                                        $correct = $attempt->takenCourseExamItems->where('correct',
                                                        1)->count();
                                                        $result = round($correct/$total*100, 2);
                                                        }
                                                        @endphp
                                                        {{ $result }}%
                                                    </td>
                                                    <td class="text-left">
                                                        <a class="btn btn-primary"
                                                            href="{{ route('company.courseExamAttemptDetails', [$company, $attempt]) }}">Details</a>
                                                        @if ($attempt->certificate_file)
                                                        <a class="btn btn-success"
                                                            href="{{ asset($attempt->certificate_file) }}"
                                                            target="_blank">view certificate</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h2 class="card-title">
                                        Credit history for this package
                                    </h2>
                                </div>
                                <div class="card-body p-1">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Date</th>
                                                    <th>Type</th>
                                                    <th>From</th>
                                                    <th>For</th>
                                                    <th>Previous Balance</th>
                                                    <th>Transferred</th>
                                                    <th>After Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @isset($creditHistory)
                                                @foreach ($creditHistory as $history)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ now()->parse($history->transaction_date)->format('d-M-Y H:i a') }}
                                                    </td>
                                                    <td>
                                                       {{ ucfirst($history->transaction_type) }}
                                                    </td>
                                                    <td>{{ Str::camel($history->credit_from) }}</td>
                                                    <td>
                
                                                        @if($history->credit_for == 'taken_course')
                                                            <a href="{{ route('company.packageDetails', [$company, $history->taken_course_id]) }}">
                                                                Taken Course
                                                            </a>
                                                        @elseif($history->credit_for == 'taken_package')
                                                            <a href="{{ route('company.courseDetails', [$company,$history->taken_package_id]) }}">
                                                                Taken Package
                                                            </a>
                                                        @elseif($history->credit_for == 'taken_exam')
                                                            <a href="{{ route('company.courseExamAttemptDetails', [$company->id,$history->taken_course_exam_id]) }}">
                                                                Taken Course Exam <br> Exam Id: {{ $history->taken_course_exam_id }}
                                                            </a>
                                                        @else
                                                            Credit Added to Account
                                                        @endif
                                                    </td>
                                                    <td>{{ $history->previous_credit }}</td>
                                                    <td>{{ $history->transferred_credit }}</td>
                                                    <td>{{ $history->current_credit }}</td>
                                                </tr>
                                                @endforeach
                
                
                                                @endisset
                                            </tbody>
                
                                        </table>
                                        {{ $creditHistory->links() }}
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
