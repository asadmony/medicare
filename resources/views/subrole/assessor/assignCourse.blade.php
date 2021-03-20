@extends('subrole.layouts.subRoleMaster')

@push('css')
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                @if (isset($subroles))
                    
                <div class="card-body border">
                    <div class="container">
                        <h3>Select Members for this course</h3>
                            <form method="POST" action="{{ route('assessor.assignCourseToUser', [$subrole, $takenPackage, $course->id]) }}">
                        
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="btn btn-info mb-3"> <i class="fa fa-check"></i> Add member to this course</button>
                                <div class="table-responsive mailbox-messages">
                                    <table class="table table-sm table-hover table-striped">
                                        <tr>
                                            <th>
                                                <input id="checkall" type="checkbox">
                                            </th>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                        </tr>
                                        @foreach ($subroles as $user)
                                        <tr>
                                            <td>
                                                @if ($user->takenCourses->where('course_id', $course->id)->count() >0)
                                                    <input type="radio" checked disabled>
                                                @else
                                                <input type="checkbox" name="members[]" value="{{ $user->id }}">
                                                @endif
                                            </td>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $user->user->name }}
                                            </td>
                                            <td>
                                                {{ $user->user->email }}
                                            </td>
                                            <td>
                                                {{ $user->title }}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-info mb-3"> <i class="fa fa-check"></i> Add member to this course</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

                @include('company.course.modules.assignmentTable')
            </div>
        </div>
    </div>
</section>
@endsection


@push('js')
<script src="{{ asset('cp/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#checkall').click(function() {
            var checked = $(this).prop('checked');
            $('input:checkbox').prop('checked', checked);
        });
    });
</script>
@endpush