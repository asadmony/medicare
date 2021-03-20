<section class="content-header">
  <h1>
    All	
    <small>Divisions</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-plus"></i> All </a></li>
    <li class="active">Divisions</li>
  </ol>
</section>

<section class="content">
 
 

    <div class="row">
        <div class="col-sm-12">

        	@include('alerts')

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">All Divisions</h3>

              <div class="box-tools">
                {{-- <a class="btn btn-primary btn-sm" href="{{route('admin.divisionAddNew')}}">Add New Division</a> --}}
                <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" href="#">Add New Division</a>

              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive ">
              <table class="table">
              	<thead>
	              	<tr>
	                  <th style="width: 50px;">ID</th>
	                  <th >Division Name</th>
	                  <th style="width: 150px;">Action</th>
	                </tr>
              	</thead>                
              </table>

              </div>
            <!-- /.box-body -->
 
          </div>
          <!-- /.box -->
 
          			
 
 									@if($divs->count())
 									<div class="box box-widget">
 										<div class="box-body">
 											@foreach($divs as $div)
 
					          <table class="table table-condensed table-cat">
			              	@include('blogAdmin.divisions.ajax.divTable')
			              </table>
 
		             	 @endforeach
 										</div>
 									</div>
 									@endif 
        </div>
      </div>
 
	</section>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Division</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="{{route('admin.divisionAddNewPost')}}">

                

                {{csrf_field()}}

                



                
                <div class="form-group {{ $errors->has('division') ? ' has-error' : '' }}">
                  <label for="division" class="col-sm-3 control-label">Division</label>
                  <div class="col-sm-9">
                    <input type="text" name="division" class="form-control" value="{{old('division')}}" id="division" placeholder="Division" autocomplete="off">
                    @if ($errors->has('division'))
                      <span class="help-block">
                          <strong>{{ $errors->first('division') }}</strong>
                      </span>
                  @endif
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <button type="reset" class="btn btn-default">Cancel</button>

                  <button type="submit" class="btn btn-primary pull-right">Create</button>

                  </div>
                </div> 
                </form>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>