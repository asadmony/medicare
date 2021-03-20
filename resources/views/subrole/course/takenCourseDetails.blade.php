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
                        Course Details / Course Title : {{$takenCourse->course->title}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Course Elements
                                    </h3>
                                </div>
                                <div class="card-body p-1">
                                    <table
                                        class="table table-striped table-sm table-hover w3-small table-bordered w3-centered">
                                        <tbody>
                                            <tr>
                                                <th>Syllabus</th>
                                                @if($takenCourse->course->syllabus_file)
                                                <td>
                                                    <a href="{{asset('storage/course/'. $takenCourse->course->syllabus_file)}}"
                                                        download><i class="fa fa-download" aria-hidden="true"></i>
                                                        Syllabus</a>
                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Brochure</th>
                                                @if($takenCourse->course->image_name)
                                                <td>
                                                    <a href="{{asset('storage/course/'.$takenCourse->course->image_name)}}"
                                                        download><i class="fa fa-download" aria-hidden="true"></i>
                                                        Brochure</a>
                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Course Description
                                    </h3>
                                </div>
                                <div class="card-body p-3" style="background: #e3e3e0;">
                                    <p style="text-align: justify;">
                                        @php
                                        echo nl2br($takenCourse->course->description);
                                        @endphp
                                    </p>
                                    <a href="{{route('subrole.takeAttemptCourseExam',[$subrole,$takenCourse])}}"
                                        class="btn btn-primary btn-lg">Take Attempt</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card card-widget">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        Course others Info
                                    </h3>
                                </div>
                                <div class="card-body p-1">
                                    <table
                                        class="table table-striped table-sm table-hover w3-small table-bordered w3-centered">
                                        <tbody>
                                            <tr>
                                                <th>Course For</th>
                                                <td>{{$takenCourse->course->course_type}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Level</th>
                                                <td>{{$takenCourse->course->course_level ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Code</th>
                                                <td>{{$takenCourse->course->course_code ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Code</th>
                                                <td>{{$takenCourse->course->course_code ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Credit</th>
                                                <td>{{$takenCourse->course->course_credit ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Mode</th>
                                                <td>{{$takenCourse->course->course_mode ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mandatory Unit</th>
                                                <td>{{$takenCourse->course->mandatory_unit ? : 'N/A'}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Entry Requirement</th>
                                                <td>{{$takenCourse->course->entry_requirement}}</td>
                                            </tr> --}}
                                            <tr>
                                                <th>Assesments</th>
                                                <td>{{$takenCourse->course->assesments ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Accreditation</th>
                                                <td>{{$takenCourse->course->accreditation ? : 'N/A'}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($subrole->title == 'member')
                    <div class="row mt-2">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover">
                                <thead>
                                    <th>#</th>
                                    <th>Assignment</th>
                                    <th>Answer</th>
                                </thead>
                                <tbody>
                                    @php
                                        $assignments = $takenCourse->course->assignmentsByCompany($takenCourse->company_id);
                                    @endphp
                                    @if ($assignments->count() > 0)
                                    @foreach ($assignments as $assignment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div><b>Title</b>: {{ $assignment->title }}</div>
                                            <div><b>File</b>: @if($assignment->file_name != null)
                                                    <a href="{{asset('storage/course/assignment/'. $assignment->file_name)}}"
                                                        download><i class="fa fa-download" aria-hidden="true"></i>
                                                        Download</a>
                                                @else
                                                No file attached.
                                                @endif
                                            </div>
                                            <div>
                                                <small>{{ now()->parse($assignment->created_at )->format('d-M-Y h:m a')}}</small>
                                            </div>
                                            </div>
                                            <div class="col-md-8">
                                                <b>Description</b>:
                                                {!! $assignment->description !!}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($subrole->assignmentAnswer($assignment->id))
                                        @php
                                            $answer = $subrole->assignmentAnswer($assignment->id);
                                        @endphp
                                            <div class="">
                                                <small>{{ now()->parse($answer->created_at )->format('d-M-Y h:m a')}}</small>
                                            </div>
                                            <div class="">
                                                <b>Answer</b>: {{ $answer->answer }}
                                            </div>
                                            <div>
                                                <b>Attached file</b>: @if($answer->file_name != null)
                                                                    <a href="{{asset('storage/course/assignment/'. $answer->file_name)}}"
                                                                        download><i class="fa fa-download" aria-hidden="true"></i>
                                                                        Download</a>
                                                                @else
                                                                No file attached.
                                                                @endif
                                            </div>
                                        @else
                                            <a href="{{ route('subrole.submitAssignment', [$subrole, $takenCourse, $assignment]) }}" class="btn btn-primary btn-sm text-white">Submit</a>
                                        @endif
                                        
                                    </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    No assignment found.
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
