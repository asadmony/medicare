
    <section class="content-header">
      <h1>
        Income / Member
        <small>Reports</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Income / Member </a></li>
        <li class="active">Reports</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 



 
    <div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Pending Payment (TK)</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$pending_payments_bd}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Pending Payment (USD)</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$pending_payments_usa}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Paid Payment (TK)</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$paid_payments_bd}} </h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Paid Payment (USD)</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{ $paid_payments_usa }}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->



            <div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">All Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$all_users}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Active Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{ $active_users }}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Deactive Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$deactivate_users}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        

        
		<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Free Package Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$free_package_users}} </h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->


       <div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Subscribers</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$subscribers}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Golden Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$golden_users}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Golden Plus Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$golden_plus_users}} </h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Diamond Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{ $diamond_users }}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
    	<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Diamond Plus Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$diamond_plus_users}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

       {{--  <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Golden Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$golden_users}}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->
        
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Golden Plus Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{$golden_plus_users}} </h3>
             </div>             
          </div> 
        </div>
        <!-- /.col -->

        

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="box box-widget">
          	<div class="box-header text-center">
          		<h3 class="box-title">Diamond Users</h3>
          	</div>
             <div class="box-body text-center">
             	<h3>{{ $diamond_users }}</h3>
             </div>             
          </div> 
        </div>
        <!-- /.col --> --}}
        </div>
        <!-- /.row -->


    </section>
