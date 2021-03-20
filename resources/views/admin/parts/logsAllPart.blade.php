
    <section class="content-header">
      <h1>
        Logs 
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Logs </a></li>
        <li class="active">All</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 

      <div class="row">
        <div class="col-sm-12">

 

          <div class="box box-widget">
            <div class="box-body">
              <table class="table table-bordered ">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>User</th>
                    <th>Log, Status & Description</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
          @foreach($logs as $log)   

          <tr>
            <td>
                {{ date('d M Y', strtotime($log->created_at)) }}  
            </td>
            <td>
              <b>ID:</b> {{ $log->user_id }} <br>
              <b>Email:</b> {{ $log->user->email }}<br>
              <b>Mobile:</b> {{ $log->user->mobile }} <br>
              <b>Name:</b> {{ $log->user->name }}
              
            </td>

            <td>
              <b>Complete Status:</b> {{ $log->completed ? ' Completed ' : ' Not Completed' }} <br>

              <b>Updated by:</b> 
              @if($log->addedby_id)
              {{ $log->addedBy->email }}
               
              @endif

              <p class=""><b>Status:</b> {{ $log->status }}, <br><b class="w3-large">Note:</b> {{ $log->note }}</p>

              
            </td>

            <td>
              <a class="btn btn-primary btn-xs m-1" href="{{ route('admin.userDetailsEdit', $log->user_id) }}">User Edit</a> 

              <a class="btn btn-xs btn-primary m-1" href="{{ route('admin.userLogs', $log->user_id) }}">Logs: {{ $log->user->incompleteLogCount() }}, {{ $log->user->completedLogCount() }}</a>
              
            </td>
            
          </tr>             
 
                  
          @endforeach
                </tbody>                
              </table>
          {{ $logs->render() }}
            </div>
          </div>


        </div>
      </div>



</section>