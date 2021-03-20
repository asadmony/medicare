
    <section class="content-header">
      <h1>
        Front Sliders
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Front Sliders</a></li>
        <li class="active">All</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 




<!-- Info boxes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts.alerts')

      <div class="box box-widget">
        <div class="box-body text-center">
          <form class="form-inline" action="{{ route('admin.frontSliderAddNew') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
  <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image">Image (1200 X 450px):</label>
    <input type="file" name="image" class="form-control" id="image" style="height: 40px;">
    @if ($errors->has('image'))
      <p>{{ $errors->first('image') }}</p>
    @endif
  </div>
 
  <button style="height: 40px;" type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
      </div>

        <div class="box box-widget">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-th"></i> All Front Sliders</h3>              
            </div>

            <div class="box-body">
              <table class="table table-bordered ">
          <thead>
            <tr>
              <th width="300">Image</th>
 
              <th>Added By</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach($sliders as $slider)
            <tr>            
               
              <td>
                <img width="300" src="{{ asset($slider->image_url) }}" alt="Front Slider">
              </td>

              <td>
                {{ $slider->addedBy->name }}
              </td>
 
 
              <td width="100">

            <div class="btn-group btn-group-xs">
                <a onclick="return confirm('Do you really want to delete?');" class="w3-btn w3-round w3-red w3-small" href="{{ route('admin.frontSliderDelete', $slider) }}">Delete</a>
 
              </div>
 
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
            </div>

            <div class="box-footer text-center">
               
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
        <h4 class="modal-title">Add New Admin</h4>
      </div>
      <div class="modal-body">
        <div class="box box-widget">
             
            <!-- /.box-header -->
            <!-- form start -->
            <form  class="form-horizontal" method="post" action="{{route('admin.adminAddNewPost')}}">
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
            <button class="btn btn-sm btn-primary">Create Admin</button>
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
