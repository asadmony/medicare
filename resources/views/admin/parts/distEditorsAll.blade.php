
    <section class="content-header">
      <h1>
        District Representative
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> District Representative</a></li>
        <li class="active">All</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 




<!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts')

        <div class="box box-widget">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-th"></i> All District Representative</h3>
              <div class="pull-right">
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal">Add New Dist Repr.</a>
 

              </div>

              
            </div>

            <div class="box-body">
              <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
 
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach($usersAll as $user)
            <tr>
              
              <td>{{$user->user->name}}</td>
              <td>{{$user->user->email}}</td>
 
              <td>


              

              <div class="btn-group">
                  <!-- <button type="button" class="btn btn-sm btn-warning edit-cat" data-url="">Delete</button> -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown">
                     Delete</button>
                    <ul class="dropdown-menu" role="menu">
                      <li>

                      <form class="delete-admin" action="{{route('admin.distEditorDelete',$user)}}" method="POST" >
                        {{ csrf_field() }}

                      <button class="btn btn-xs btn-danger">Confirm</button> 
                    </form>
                        

                      </li>

                    </ul>
                  </div>
                </div>





              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
            </div>

            <div class="box-footer text-center">
              {{$usersAll->render()}}
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->







<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Dist Repr.</h4>
      </div>
      <div class="modal-body">
        <div class="box box-widget">
             
            <!-- /.box-header -->
            <!-- form start -->
            <form  class="form-horizontal" method="post" action="{{route('admin.distEditorAddNewPost')}}">
            {{csrf_field()}}
              <div class="box-body">

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email" class="col-md-3 control-label"> Email:</label>
            <div class="col-md-6">
            <select id="email"
            name="email"
            class="form-control select2-container step2-select select2"
            data-placeholder="Name, Email, Usernam, or Mobile Number"
            data-ajax-url="{{route('admin.selectNewRole')}}"
            data-ajax-cache="true"
            data-ajax-dataType="json"
            data-ajax-delay="200"
            style="width: 100%;">
                <option>{{old('email')}}</option>
              </select>
            @if( $errors->has('email') )
              <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <div class="col-md-3">
            <button class="btn btn-sm btn-primary">Create Dist Repr.</button>
          </div>
          </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
      

    </section>
