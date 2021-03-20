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
                        All Courses
                        Package:(id:{{$takenPackUser->takenPackage->id}}),{{$takenPackUser->takenPackage->title}}
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
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
                                            href="{{route('subrole.takePackageCourse',[$subrole,$course,'takenPackUser'=>$takenPackUser])}}"
                                            class="btn btn-primary btn-sm">Take Course</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Your Taken Courses
                    </h3>
                </div>
                {{-- @if (isset($subrole) && $subrole->title == 'member') --}}
    @php $role = $subrole @endphp
{{-- @endif --}}
                @include('subrole.modules.subroleTakenCoursesTable')


            </div>
        </div>
    </div>
</section>
@endsection
