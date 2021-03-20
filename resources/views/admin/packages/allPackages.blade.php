@extends('admin.layouts.adminMaster')

@section('content')
 

<br>

    <!-- Main content -->
    <section class="content"> 


<br>

<!-- Info cardes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts')

        <div class="card card-widget">
            <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-th"></i> All Packages <a class="btn btn-primary btn-sm" href="{{ route('admin.addNewPackage') }}"> <i class="fa fa-plus"></i> add mew</a></h3>
              <div class="pull-right">
                
 

              </div>

              
            </div>

            <div class="card-body">
              <table class="table table-bordered text-center table-sm">
          <thead>
            <tr>
              <th>SL</th>
 
              <th>Package Title</th>
              <th>Price</th>
              <th>Credit</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php $i = (($packages->currentPage() - 1) * $packages->perPage() + 1); ?>
          @foreach($packages as $package)
            <tr>
              <td>{{ $i }}</td>
              <td>{{$package->title}}</td>
              <td>{{$package->price}}</td>
              <td>{{ $package->no_of_credits }}</td>
 
              <td>


              

              <div class="btn-group">
                  <a class="btn btn-xs btn-warning" href="{{ route('admin.updatePackage',$package) }}">Edit</a>
                   
                  <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-warning dropdown-toggle" data-toggle="dropdown">
                     option</button>

                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li class="px-2">

                      <a class="btn btn-xs btn-danger w3-hover-red w3-text-white" onClick="return confirm('Do you really want to delete this Package? All the taken courses, exams etc. will be deleted.');" href="{{ route('admin.deletePackage',$package) }}">delete</a>
                        
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

            <div class="card-footer text-center">
              {{$packages->render()}}
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->      

    </section>


@endsection