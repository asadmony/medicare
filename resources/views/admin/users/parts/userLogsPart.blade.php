<section class="content-header">
<h1>
    User
    <small>Logs</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
    <li class="active">Logs</li>
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
                <h3 class="box-title"><i class="fa fa-th"></i> User-Logs of ID:{{ $user->id }}, {{ $user->email }}, {{ $user->username }} 
                    @if($user->isOffline())
                    | <span class="w3-dark-gray w3-round w3-padding w3-large">Offline Profile</span>
                    @endif
                </h3>
                <div class="pull-right">

                </div>
                
            </div>
            <div class="box-body" style="background: #eee;">



                <div class="box box-widget" id="user-comment" style="min-height: 500px;">
    <div class="box-header with-border">
        <h3 class="box-title">User Logs </h3>
    </div>
    <div class="box-body">
        
        <div class="w3-border w3-border-purple w3-round">
                        <div class="w3-container w3-padding text-center">

<form class="form-inline" method="post" action="{{ route('admin.userLogsPost', $user) }}">
    @csrf
    
  <div class="form-group">
    <label for="status">Status:</label>
    <input type="text" name="status" class="form-control" id="status" placeholder="Add status" list="statusList">

    <datalist id="statusList">
  <option value="checked">
  <option value="paid">
  <option value="unpaid">
  <option value="partially">
  <option value="conversation">
</datalist>

    &nbsp;
  </div>

  <div class="form-group">
    <label for="note">Note:</label>
    <textarea class="form-control" style="min-width: 500px;" name="note" id="note" cols="30" rows="1" placeholder="Add Description"></textarea> &nbsp;
  </div>
  <div class="checkbox">
    <label><input name="completed" type="checkbox"> Completed</label>
    &nbsp;
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


                            {{-- <form  action="{{ route('admin.userCommentByAdminPost', $user) }}" method="post">
                                {{csrf_field()}}


                                <div class="w3-row">
  <div class="w3-col w3-right w3-container " style="width:75px">
    <button type="submit" class="w3-btn w3-purple w3-round w3-border w3-border-purple w3-left w3-hover-purple btn-sm"> Submit</button>
  </div>
  <div class="w3-rest w3-container ">
    <textarea name="comment" class="form-control w3-round w3-border w3-padding" id="comment" placeholder="Write New Comment"  rows="1" style="width: 100%;">{{ old('comment') }}</textarea>
  </div>
</div>
                            </form> --}}





                        </div>
                    </div>

    </div>
    <div class="box-footer w3-round" style="background: #ddd;margin-left: 4px;margin-right: 4px;">
        

        @foreach($user->logs as $message)
                    <div class="mb-2 p-2 border w3-white w3-round">
                     
                        <h4 class="no-margin">
                          <small><i>Posted on {{ date('d M Y', strtotime($message->created_at)) }}</i>, <br>
                          {{ $message->completed ? ' Completed ' : ' Not Completed' }}, <br>
                          <b>Updated by:</b> 
                          @if($message->addedby_id)
                          {{ $message->addedBy->email }}
                           
                          @endif
                          </small>
      
                          <div class="pull-right p-2">

                            @if($message->completed)
                              <a class="btn btn-xs btn-default" href="">Completed</a>
                            @else
                              <a class="btn btn-xs btn-primary" href="{{ route('admin.userLogComplete', $message) }}">Complete</a>
                            @endif
                        </div>

                        </h4>
                        <p class="p-2"><b>Status:</b> {{ $message->status }}, <br><b class="w3-large">Note:</b> {{ $message->note }}</p>



                    </div>

                    @endforeach


    </div>
    <div class="box-footer"></div>
</div>


                

</div>
</div>

</div>
</div>
<!-- /.row -->


</section>