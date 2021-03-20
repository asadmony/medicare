<section class="content-header">
    <h1>
    Users
    <small>All</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        <li class="active">All</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12">
            @include('alerts.alerts')
            <div class="box box-widget ">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-th"></i> All Users</h3>
                    <form class="pull-right">
        <div class="box-tools">
          <div class="input-group input-group-sm" style="width: 280px;">
            <input type="text" name="q" class="form-control input-xs pull-right user-search" placeholder="Search By ID, Email, username" data-url="{{ route('admin.userSearchAjax') }}">

            <div class="input-group-btn">
              <button type="button" class="btn btn-warning"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
        </form> 
                    
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="100">Changed</th>
                                <th>Live</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Status</th>
                                                                
                                <th width="100">Action</th>
                            </tr>
                        </thead>
                        <tbody class="user-table-body">
                            

                        @include('admin.users.ajax.usersTbody') 
                        
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="box-footer text-center">
                    {{$usersAll->render()}}
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.row -->
    
    
</section>