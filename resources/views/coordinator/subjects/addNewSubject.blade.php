@extends('coordinator.layouts.adminMaster')

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
              <h3 class="card-title"><i class="fa fa-th"></i> Add new Subject</h3>
              {{-- <div class="pull-right">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Add New Subject</a>

              </div> --}}

              
            </div>

            <div class="card-body">

              @include('coordinator.subjects.includes.forms.addNewSubject')

            </div>

            <div class="card-footer text-center">
              
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->

    </section>


@endsection