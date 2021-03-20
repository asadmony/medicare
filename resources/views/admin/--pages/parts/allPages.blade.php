
    <section class="content-header">
      <h1>
        Pages
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Pages</a></li>
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
              <h3 class="box-title"><i class="fa fa-th"></i> All Pages</h3>
            </div>

            <div class="box-body">
              <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>SL</th>
              <th>Route Name</th>
              <th>Page View</th>
              <th>Status</th>
              <th>Page Type</th>
              <th>Page Title</th>
              <th>Title Show/Hide</th>
              <th>Content</th>
              <th width="100">Action</th>
            </tr>
          </thead>
          <tbody>

          @foreach($pages as $page)
            <tr>
              
              <td>{{$loop->iteration}}</td>
              <td>{{$page->route_name}}</td>
              <td>
                @if($page->page_type == 'Full Page')
                <a target="_blank" href="{{route('page',$page->route_name)}}">{{$page->page_title}}</a>
                @endif
              </td>
              <td>{{ $page->active ? 'Active' : 'Inactive' }}</td>
              <td>{{ $page->page_type }}</td>
              <td>{{$page->page_title}}</td>
              <td>{{$page->title_hide ? 'hiden' : 'shown'}}</td>
              <td>{{ str_limit($page->content,50) }}</td>
              <td width="100">




<div class="btn-group pull-right btn-group-xs">
  <a class="btn btn-primary "  href="{{route('admin.editPage',$page)}}">Edit</a>
  {{-- <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button> --}}
  {{-- <ul class="dropdown-menu" role="menu">
    <li><a onclick="return confirm('Do you want to delete this page?');" href="{{route('admin.deletePage', $page)}}">Delete</a></li>
 
  </ul> --}}
</div>

  





              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
            </div>

            {{-- <div class="box-footer text-center">
              {{$pages->render()}}
            </div> --}}
        </div>
        
      </div>        
      </div>
      <!-- /.row -->

      

    </section>