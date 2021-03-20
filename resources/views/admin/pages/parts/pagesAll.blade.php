{{-- 
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
 --}}


    <!-- Main content -->
    <section class="content"> 
<br>



<!-- Info cardes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts.alerts')

        <div class="card card-primary">
            <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-plus"></i> Add New Page</h3>
               

              
            </div>

            <div class="card-body">

            	<div class="card card-widget mb-0">
            		<div class="card-body w3-gray ">


            			<div class="card card-widget mb-0">
            				<div class="card-body">
            					

 								@include('admin.pages.includes.pageCreateForm')

            				</div>
            			</div>
            			

            		</div>
            	</div>


 

               
            </div>

 
        </div>







    	<div class="card card-widget">
          <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-th"></i> All Pages</h3>
          </div>

            <div class="card-body">
            	<div class="card card-widget mb-0">
            		<div class="card-body w3-gray ">
            			   
<div class="row">
  <div class="col-sm-12 connectedSortable"  id="sortablePanel" data-url="{{route('admin.pageSort')}}">
    
@foreach($pages as $page)

@include('admin.pages.includes.pageSingle')

@endforeach 
</div>
</div>
            		</div>
            	</div>
            </div>
        </div>


        
      </div>        
      </div>
      <!-- /.row -->

 
      

    </section>
