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
                        Submit Assignment for the course : {{$takenCourse->course->title}}
                    </h3>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Title</th>
                            <td> : </td>
                            <td>{{ $assignment->title }}</td>
                        </tr>
                        <tr>
                            <th>Attached File</th>
                            <td> : </td>
                            <td>
                                @if($assignment->file_name != null)
                                    <a href="{{asset('storage/course/assignment/'. $assignment->file_name)}}"
                                        download><i class="fa fa-download" aria-hidden="true"></i>
                                        Download</a>
                                @else
                                No file attached.
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td> : </td>
                            <td>
                                {!! $assignment->description !!}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="container py-3">
                    <form action="{{ route('subrole.submitAssignmentPost', [$subrole, $takenCourse, $assignment]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="col-md-3">
                                <label for="answer">Your Answer</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" id="answer" name="answer" placeholder="Type your answer"></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="col-md-3">
                                <label for="file">Attach File</label>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" type="file" id="file" name="file" >
                            </div>
                        </div>
                        <div class="col-xs-4 offset-3 mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
