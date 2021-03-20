<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Page
        <small>Add New</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Page</a></li>
        <li class="active">Add New</li>
      </ol>
    </section>


   <!-- Main content -->
    <section class="content"> 



<!-- Info boxes -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">

            @if(session('success'))

             <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success! </strong> {{session('success')}}
              </div>
              @endif
            

            <div class="box box-widget">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-edit"></i> Add New Page</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{route('admin.newPagePost')}}">
            {{csrf_field()}}
              <div class="box-body">


                <div class="form-group{{ $errors->has('page_route') ? ' has-error' : '' }}">
                  <label for="page_route" class="col-sm-2 control-label">Page Route</label>

                  <div class="col-sm-10">
                    <input type="text" name="page_route" class="form-control" value="{{ old('page_route') }}" id="page_route" placeholder="Page Route Name" required autofocus>

                    @if ($errors->has('page_route'))
                        <span class="help-block">
                            <strong>{{ $errors->first('page_route') }}</strong>
                        </span>
                    @endif

                  </div>
                </div>

                <div class="form-group{{ $errors->has('pageTitle') ? ' has-error' : '' }}">
                  <label for="pageTitle" class="col-sm-2 control-label">Title</label>

                  <div class="col-sm-10">
                    <input type="text" name="pageTitle" class="form-control" value="{{ old('pageTitle') }}" id="pageTitle" placeholder="New Page Title" required autofocus>

                    @if ($errors->has('pageTitle'))
                        <span class="help-block">
                            <strong>{{ $errors->first('pageTitle') }}</strong>
                        </span>
                    @endif

                  </div>
                </div>

                <div class="form-group{{ $errors->has('page_type') ? ' has-error' : '' }}">
                  <label for="page_type" class="col-sm-2 control-label">Page Type</label>

                  <div class="col-sm-10">
                    <select name="page_type" id="page_type" class="form-control">

                      <option>Full Page</option>
                      <option>Part Page</option>
                    </select>

                    @if ($errors->has('page_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('page_type') }}</strong>
                        </span>
                    @endif

                  </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="titleHide"> Title Hide
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked name="active"> Active 
                            </label>
                        </div>
                    </div>
                </div>

                
                {{-- <div class="form-group{{ $errors->has('categoryTitleBn') ? ' has-error' : '' }}">
                  <label for="title" class="col-sm-2 control-label">বাংলা টাইটেল</label>

                  <div class="col-sm-10">
                    <input type="text" name="categoryTitleBn" class="form-control" value="{{ old('categoryTitleBn') }}" id="title" placeholder="বাংলা ক্যাটেগরি টাইটেল" required autofocus>

                    @if ($errors->has('categoryTitleBn'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoryTitleBn') }}</strong>
                        </span>
                    @endif

                  </div>
                </div> --}}



                {{-- <div class="form-group{{ $errors->has('categoryDescription') ? ' has-error' : '' }}">
                  <label for="description" class="col-sm-2 control-label">Details</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="categoryDescription" id="description" value="{{ old('categoryDescription') }}" placeholder=" Category Description">


                  </div>
                </div> --}}

                <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                  <label for="description" class="col-sm-2 control-label">Details</label>

                  <div class="col-sm-10">
                    <textarea class="details" id="content" name="details" placeholder="Write your content here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>


                  </div>
                </div>

                <div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
                  <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>

                  <div class="col-sm-10">
                    <textarea class="meta_title form-control" id="meta_title" name="meta_title" placeholder="Meta Title" rows="2">{!! old('meta_title') !!}</textarea>


                  </div>
                </div>

                <div class="form-group{{ $errors->has('meta_description') ? ' has-error' : '' }}">
                  <label for="meta_description" class="col-sm-2 control-label">Meta Description</label>

                  <div class="col-sm-10">
                    <textarea class="meta_description form-control" id="meta_description" name="meta_description" placeholder="Meta Description" rows="2">{!! old('meta_description') !!}</textarea>


                  </div>
                </div>

                  <div class="form-group{{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                  <label for="meta_keywords" class="col-sm-2 control-label">Meta Keywords</label>

                  <div class="col-sm-10">
                    <textarea class="meta_keywords form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" rows="2">{!! old('meta_keywords') !!}</textarea>


                  </div>
                </div>

                

                {{-- <div class="form-group{{ $errors->has('categoryImage') ? ' has-error' : '' }}">
                  <label for="title" class="col-sm-2 control-label">Image</label>

                  <div class="col-sm-10">

                <input type="file" name="categoryImage" class="form-control">
                <span class="help-block">
                  <strong>Image Ratio Need: 800 / 350 </strong>
                        </span>



                    @if ($errors->has('categoryImage'))
                        <span class="help-block">
                            <strong>{{ $errors->first('categoryImage') }}</strong>
                        </span>
                    @endif

                  </div>
                </div> --}}
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">

                    <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>


        </div>
      </div>
      <!-- /.row -->

      

    </section>
    <!-- /.content -->