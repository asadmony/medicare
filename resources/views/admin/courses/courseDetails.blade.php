@extends('admin.layouts.adminMaster')

@section('content')

<section class="content">
    <br>
    <div class="row">
        <div class="col-sm-12">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Course Details / Course Title: {{$course->title}}
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
                                                @if($course->syllabus_file)
                                                <td>
                                                    <a href="{{asset('storage/course/'.$course->syllabus_file)}}"
                                                        download><i class="fa fa-download" aria-hidden="true"></i>
                                                        Syllabus</a>

                                                </td>
                                                @else
                                                <td></td>
                                                @endif
                                            </tr>
                                            <tr>

                                                <th>Brochure</th>
                                                @if($course->image_name)
                                                <td>
                                                    <a href="{{asset('storage/course/'.$course->image_name)}}"
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
                                        {!! $course->description !!}
                                    </p>

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
                                                <td>{{$course->course_type}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Level</th>
                                                <td>{{$course->course_level ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Code</th>
                                                <td>{{$course->course_code ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Code</th>
                                                <td>{{$course->course_code ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Credit</th>
                                                <td>{{$course->course_credit ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Course Mode</th>
                                                <td>{{$course->course_mode ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mandatory Unit</th>
                                                <td>{{$course->mandatory_unit ? : 'N/A'}}</td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Entry Requirement</th>
                                                <td>{{$course->entry_requirement}}</td>
                                            </tr> --}}
                                            <tr>
                                                <th>Assesments</th>
                                                <td>{{$course->assesments ? : 'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th>Accreditation</th>
                                                <td>{{$course->accreditation ? : 'N/A'}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                @include('admin.courses.modules.assignmentTable')
            </div>
        </div>
    </div>
</section>
@endsection