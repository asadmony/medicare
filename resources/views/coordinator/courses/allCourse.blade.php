@extends('coordinator.layouts.adminMaster')

@section('content')


{{--     <section class="content-header">
      <h1>
        Courses
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Courses</a></li>
        <li class="active">All</li>
      </ol>
    </section> --}}

<br>

<!-- Main content -->
<section class="content">




  <!-- Info cardes -->
  <div class="row">
    <div class="col-md-12">

      @include('alerts')

      <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-th"></i> All Courses  <a class="btn btn-primary btn-sm"  href="{{ route('coordinator.addNewCourse') }}"><i class="fa fa-plus"></i> add new</a></h3>
          <div class="pull-right">



          </div>


        </div>

        <div class="card-body">
          <table class="table table-bordered text-center">
            <thead>
              <tr>
                <th>SL</th>
                <th>Subject</th>

                <th>Course Title</th>
                <th>Course Code</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = (($courses->currentPage() - 1) * $courses->perPage() + 1); ?>
              @foreach($courses as $course)
              <tr>
                <td>{{ $i }}</td>

                <td>

                  {{$course->subject ? $course->subject->title : ''}}</td>
                <td>{{$course->title}}</td>
                <td>{{ $course->course_code }}</td>

                <td>




                  <div class="btn-group">
                    <a class="btn btn-xs btn-warning" href="{{ route('coordinator.updateCourse',$course) }}">Edit</a>
                    {{-- <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                     Delete</button>

                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li class="px-2">

                      <a class="btn btn-xs btn-danger w3-hover-red w3-text-white" href="{{ route('coordinator.deleteCourse',$course) }}">Confirm</a>


                    </li>

                    </ul>
                  </div> --}}
                  <div class="dropdown ">

                    <div class="btn-group ">
                      <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                        Option
                      </button>
                      <div class="dropdown-menu">
                        <a href="{{route('coordinator.addCourseTopic',$course)}}"><button type="button"
                            class="dropdown-item btn btn-primary btn-xs">Topic</button></a>
                        <a href="{{ route('coordinator.courseAssignment', $course) }}"><button type="button" class="dropdown-item btn btn-primary btn-xs">Assignments</button></a>
                        <a onclick="return confirm('Do you really want to delete this company?');"
                          href="{{ route('coordinator.deleteCourse',$course) }}">
                          <button type="button" class="dropdown-item btn btn-primary btn-xs">Delete</button></a>
                      </div>
                    </div>
                  </div>
        </div>





        </td>
        </tr>
        <?php $i++; ?>
        @endforeach
        </tbody>
        </table>
      </div>

      <div class="card-footer text-center">
        {{$courses->render()}}
      </div>
    </div>

  </div>
  </div>
  <!-- /.row -->

</section>


@endsection