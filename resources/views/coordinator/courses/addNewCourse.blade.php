@extends('coordinator.layouts.adminMaster')

@push('css')
  <link href="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css') }}" rel="stylesheet">



  <style>
    .note-group-select-from-files {
      display: none;
    }
  </style>
@endpush

@section('content')

  <!-- 
    <section class="content-header">
      <h1>
        Website
        <small>Parameters</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Website</a></li>
        <li class="active">Parameters</li>
      </ol>
    </section> -->



    <!-- Main content -->
    <section class="content"> 

      <br>


<!-- Info cardes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts')

        <div class="card card-widget">
            <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-th"></i> {{ $course->status == 'temp' ? 'Add new course' : 'Update '. $course->title }} </h3>
              

              
            </div>

            <div class="card-body pb-0" style="background-color: #ccc;">

              @include('coordinator.courses.includes.forms.addNewCourse')

            </div>

            <div class="card-footer text-center">
              
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->

    </section>


@endsection

@push('js')
<script src="{{ asset('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js') }}"></script>
<script>

  $(document).ready(function() {
    $('#description').summernote({
      placeholder: 'Write description of the post here...',
      minHeight: 160,
      // codemirror: { // codemirror options
      //   theme: 'monokai',
      //   lineNumbers: true,
      //   lineWrapping: true,
      // }
    });
  });
  </script>
@endpush