<section class="content-header">
  <h1>
    All	
    <small>Posts</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-plus"></i> All </a></li>
    <li class="active">Posts</li>
  </ol>
</section>

    <section class="content">

    @include('alerts')

    <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">All Posts</h3>

            </div>
            <!-- /.box-header -->
            <div class="profile-table-body">

            <div class="box-body table-responsive no-padding">
  <table class="table table-hover">
    <thead>
      <tr>
        <th width="100">Feature Image</th>
        <th width="200">ID, Name, Title or Role</th>
 
        <th>Content</th>
        <th width="100">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr class="post-tr-{{$post->id}}">
        <td>
                      @if($post->imgFeature())
                        <img class="img-responsive" width="100" src="{{asset($post->fi())}}">
                      @endif
                      
                    </td>
                    <td>
                      <b>ID:</b> {{$post->id}} <br> 
                      <b>Name: {{ $post->title }}</b> <br>
                      <b>Title Or Role:</b> {{$post->role_name}} <br> 
                      <b>Status:</b> {{$post->active ? 'active' : 'inactive'}} <br>
                       
                    </td>
 
 
                    <td>
                       {{str_limit($post->description, $limit = 1200, $end = "..")}}
                    </td>

 
                    <td style="min-width: 100px;">


                <div class="btn-group btn-group-xs pull-right ">
                  <a class="btn btn-primary" target="_blank" href="{{route('admin.authorPostEdit',$post)}}">Edit</a>
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu" role="menu">

 

                    <li><a href="{{route('admin.authorPostDelete',$post)}}" onclick="return confirm('Do you really want to delete this post?');">Delete</a></li>
                  </ul>                  
                </div>

                    </td>
      </tr>
  @endforeach                 
    </tbody>
    
    
  </table>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <div class="pull-right">
    {{$posts->links()}}               
  </div>
</div>

            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
	</section>