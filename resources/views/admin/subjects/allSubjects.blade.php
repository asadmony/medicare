@extends('admin.layouts.adminMaster')

@section('content')

{{--   <section class="content-header">
      <h1>
        Subjects
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Subjects</a></li>
        <li class="active">All</li>
      </ol>
    </section> --}}


    <!-- Main content -->
    <section class="content"> 

    	<br>

      <div class="row">
        <div class="col-sm-12">
          @include('alerts')
        


      <div class="card card-widget">
            <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-plus"></i> Add New Subject</h3>
               

              
            </div>

            <div class="card-body">

              <div class="card card-widget mb-0">
                <div class="card-body" style="background-color: #ccc;">


                  <div class="card card-widget mb-0">
                    <div class="card-body">
                      

                @include('admin.subjects.includes.forms.addNewSubjectInlineForm')

                    </div>
                  </div>
                  

                </div>
              </div>






 

               
            </div>

 
        </div>



<div class="card card-widget">
  <div class="card-header with-border">
    <h3 class="card-title"><i class="fa fa-th"></i> All subjects</h3>
    <div class="card-body">
  <table class="table table-bordered table-condensed">
    <thead>
      <tr>
      <th style="width: 10px">SL</th>
      <th>Subjects</th>
      <th>Action</th>
    </tr>
    </thead>
    <tbody>
      <?php $i = (($subjects->currentPage() - 1) * $subjects->perPage() + 1); ?>
      @foreach($subjects as $subject)
    <tr>
      <td>{{ $i }}</td>
      <td>{{$subject->title}}</td>
      <td>
        <div class="btn-group ">
                  <!-- <button type="button" class="btn btn-sm btn-warning edit-cat" data-url="">Delete</button> -->
                  <div class="btn-group">
                    <a href="{{route('admin.editSubject',$subject)}}">
                      <button type="submit" class="btn btn-xs btn-primary">Edit</button>
                    </a>
                    <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                     Option</button>
                    <ul class="dropdown-menu pl-2 dropdown-menu-right" role="menu">
                      <li>

                      

                    <a class="btn btn-danger w3-text-white btn-xs w3-hover-red" onclick="return confirm('Do you really want to delete this subject?');" href="{{ route('admin.subjectDelete',$subject) }}">delete</a>
                        

                      </li>

                    </ul>
                  </div>
                </div>

      </td>
      
    </tr>
    <?php $i++; ?>
    @endforeach
    </tbody>
   
    
    
  </table>
</div>
  </div>
</div>

{{ $subjects->render() }}

</div>
</div>

</section>

@endsection