@extends('theme.prt.layouts.prtMaster')
@section('title')
{{ $course->title }}
@endsection
@push('css')

<style>
 
</style>
@endpush

@section('contents')

@include('alerts.alerts')

@include('theme.prt.course.parts.singleCourse')


@endsection

@push('js')


<script type="text/javascript">
   $(document).ready(function(){



   });
</script>

  @if (auth()->check())


  <div class="modal fade" id="modalBuyCredit" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true" style="z-index: 10000;">
    <div class="modal-dialog text-center">
      <div class="modal-content w3-card">
        <div class="modal-header d-flex justify-content-center">
          <h4 class="modal-title" id="defaultModalLabel">Take this {{ Str::ucfirst($course->course_mode) }} using your credit</h4>
          
        </div>
        <div class="modal-body">
          
          <div class="card card-default">
            <div class="card-header p-0">
              <h4 class="card-title p-0">
                Your Credit Total
              </h4>
            </div>
            <div class="card-body pt-0">
              <h2 class="w3-xxlarge">
                <b>
                  
                  {{auth()->user()->credit}}
                </b>
              </h2>
              
              <br>
              
              @if(auth()->user()->canTakeCourse($course))
              <form action="{{ route('user.takeCourseUsingCredit',$course)}}" method="post">
                @csrf
                <button class="btn btn-info" type="submit" onclick="return confirm('Do you want to take this course?');"> <i class="fa fa-graduation-cap" aria-hidden="true"></i> Take This Course</button>
              </form>
              @else
              
              <a href="{{route('user.checkoutCredit')}}">Buy Credit and take this course</a>
              
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>    
  @endif
 

@endpush