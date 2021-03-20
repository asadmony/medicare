{{-- 
    <section class="content-header">
      <h1>
        Page
        <small>Items</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Page</a></li>
        <li class="active">Items</li>
      </ol>
    </section>
 --}}


    <!-- Main content -->
    <section class="content"> 


      <br>

<!-- Info cardes -->
      <div class="row">
      <div class="col-md-12">

      @include('alerts')

            <div class="card card-widget">
              <div class="card-body">
              <div class="card card-widget mb-0">
                <div class="card-body w3-gray ">
      @include('admin.pages.includes.pageSingleWithoutDel')

      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

          @foreach($page->items as $item)
      @include('admin.pages.includes.pageItemSingle')
          @endforeach
          
        </div>
      </div>

      
                </div>
              </div>
            </div>
          </div>


      <div class="card card-widget">
          <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-edit"></i> Page Item Add of <span class="label label-default">{{ $page->page_title }}</span></h3>
          </div>

            <div class="card-body">
              <div class="card card-widget mb-0">
                <div class="card-body w3-gray ">

                  <div class="row">
                    <div class="col-sm-7">

                      <div class="card card-widget mb-0">
                    <div class="card-body">

                    
                          @include('admin.pages.includes.pageItemCreateForm')
                
                      

                    </div>
                  </div>
                      
                    </div>

                    <div class="col-sm-5">
          
        <div class="card card-widget">
  <div class="card-header with-border">
    <h3 class="card-title">Media Gallery</h3>

    <div class="card-tools pull-right">
                {{-- <button type="button" class="btn btn-card-tool" data-widget="remove"><i class="fa fa-times"></i></button> --}}
                <a href="{{route('admin.mediaAll')}}" class="w3-btn btn-sm w3-round w3-white w3-border w3-border-blue"> <i class="fa fa-image"></i>Upload Image</a>


                   {{-- <div class="">
    <a href="javascript::void()" class="w3-btn w3-round w3-white w3-border w3-border-blue" data-toggle="modal" data-target="#uploadImageModal"> <i class="fa fa-upload"></i> Upload Video</a>
    <a href="javascript::void()" class="w3-btn w3-round w3-white w3-border w3-border-blue"> <i class="fa fa-file-o"></i> Upload File</a>
  </div> --}}

              </div>
  </div>
  <div class="card-body slim-media">

  <div class="card card-widget">
    <div class="card-body" style="background-color: #ccc;">

      @include('admin.media.includes.others.mediaAllForPost')
    
    </div>
  </div>

</div>
</div>
        </div>
                  </div>

                  
 
                </div>
              </div>
            </div>
        </div>


       

 

    	{{-- <div class="card card-widget">
          <div class="card-header with-border">
              <h3 class="card-title"><i class="fa fa-edit"></i> Page Edit <span class="label label-default">{{ $page->page_title }}</span></h3>
          </div>

            <div class="card-body">
            	<div class="card card-widget mb-0">
            		<div class="card-body w3-gray ">
            			   

 

<div class="card card-widget">
	<div class="card-body">
		Page ID: <b>{{ $page->id }}</b>, &nbsp;
		Page Title: <b> {{ $page->page_title }}</b>, &nbsp; 
		Route Name: <b> {{ $page->route_name }}</b>, &nbsp;
		Active: <b>{{ $page->active ? 'Yes' : 'No' }}</b>,
		List In Menu: <b>{{ $page->list_in_menu ? 'Yes' : 'No' }}</b>,
		Title Hide: <b>{{ $page->title_hide ? 'Yes' : 'No' }}</b>,

		<div class="pull-right">
		<a class="w3-btn w3-blue btn btn-xs " href="">Edit</a>
		&nbsp; 
		<a class="w3-btn w3-blue btn btn-xs " href="">Add Page Part</a>
		&nbsp; 
		<a class="w3-btn w3-red btn btn-xs " href="">Delete</a>
		</div>
	</div>
</div>

 

            		</div>
            	</div>
            </div>
        </div> --}}


        
      </div>        
      </div>
      <!-- /.row -->

 
      

    </section>
