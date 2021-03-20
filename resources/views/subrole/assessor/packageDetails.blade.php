@extends('subrole.layouts.subRoleMaster')

@push('css')
@endpush

@section('content')
<div class="row">
    <div class="col">
        @include('alerts.alerts')
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    All Courses
                    Package
                </h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @if ($courses->count() > 0)
                        
                    @foreach ($courses as $course)
                    <div class="col-sm-2">
                        <div class="card" style="min-height: 250px !important">
                            <img class="rounded-top img-fluid"
                                src="{{ route('imagecache',['template'=>'crspsm', 'filename'=>$course->usliveFi()]) }}"
                                alt="">
                            <div class="p-2">
                                <h5>{{custom_title($course->title,13)}}</h5>
                                <p>{{custom_title($course->excerpt,30)}}</p>
                                <p class="text-center"><a
                                        href="{{ route('assessor.assignCourse', [$subrole, $takenPackage, $course]) }}"
                                        class="btn btn-primary btn-sm">Assign Course</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    @else
                        <h2>No course found according to your level.</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    
                </h3>
            </div>

            {{-- @include('subrole.modules.subroleTakenCoursesTable') --}}


        </div>
    </div>
</div>
@endsection


@push('js')

@endpush