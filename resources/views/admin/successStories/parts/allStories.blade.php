
    <section class="content-header">
      <h1>
        Stories
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Stories</a></li>
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
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-th"></i> All Stories</h3>
            </div>

            <div class="box-body">
              <table class="table table-bordered">
          <thead>
            <tr>
              <th width="50">SL</th>
              <th width="100">Image</th>
              <th>Basic</th>
              <th>Content</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach($stories as $story)
            <tr>
              
              <td width="50">{{$loop->iteration}}</td>
              <td width="100"><img width="200" src="{{ asset('/storage/stories/'.$story->image_name) }}" alt="{{ env('APP_NAME_BIG') }}"></td>
              <td>
                <b>Title: </b> {{ $story->title }} <br>
                <b>Location: </b> {{ $story->location }} <br>
                <b>Bride Username: </b> {{ $story->bride_username }} <br>
                <b>Groom Username: </b> {{ $story->groom_username }} <br>
                <b>Marriage Date: </b> {{ date('d-M-Y', strtotime($story->marriage_date)) }} 
              </td>

              <td>{{ str_limit($story->description,50) }}</td>
              <td width="100">




<div class="btn-group pull-right btn-group-xs">
  <a class="btn btn-primary "  href="{{route('admin.editStory',$story)}}">Edit</a>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a onclick="return confirm('Do you want to delete this story?');" href="{{route('admin.deleteStory', $story)}}">Delete</a></li>
 
  </ul>
</div>

  





              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
            </div>

            <div class="box-footer text-center">
              {{$stories->render()}}
            </div>
        </div>
        
      </div>        
      </div>
      <!-- /.row -->

      

    </section>