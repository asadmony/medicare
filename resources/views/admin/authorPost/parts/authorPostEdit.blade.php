 
    <section class="content-header">
      <h1>
        Author Post
        <small>Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Author Post</a></li>
        <li class="active">Update</li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content"> 

<div class="box box-widget">
      <div class="box-header with-border">
        <h3 class="box-title">
          {{ $post->title }}
        </h3>
      </div>
      <form  method="post" action="{{route('admin.authorPostEditPost', $post)}}" enctype="multipart/form-data">
        <div class="box-body" style="background-color: #ccc;">
          <div class="row">
           <div class="col-md-7">

            <div class="box box-widget">
              <div class="box-body">

                @include('alerts')

                {{csrf_field()}}


                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class=" control-label">Name</label>

                    <input type="text" name="title" class="form-control" value="{{old('title') ?: $post->title }}" id="title" placeholder="Name of Author" autocomplete="off" required>
                    @if ($errors->has('title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
                   </span>
                   @endif
               
               </div>

               <div class="form-group {{ $errors->has('role_name') ? ' has-error' : '' }}">
                  <label for="role_name" class=" control-label">Title Or Role</label>

                    <input type="text" name="role_name" class="form-control" value="{{old('role_name') ?: $post->role_name}}" id="role_name" placeholder="Title or Role" >
                    @if ($errors->has('role_name'))
                    <span class="help-block">
                     <strong>{{ $errors->first('role_name') }}</strong>
                   </span>
                   @endif
               
               </div>




               <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="control-label"> Description</label>

                  <textarea  name="description" class="form-control" rows="10" id="description" placeholder="Description" required>{!! old('description') ?: $post->description !!}</textarea>

                  @if ($errors->has('description'))
                  <span class="help-block">
                   <strong>{{ $errors->first('description') }}</strong>
                 </span>
                 @endif

             </div>



             
  





        <div class="form-group">


            <div class="checkbox">
              <label><input type="checkbox"  name="active" {{ $post->active ? 'checked' : '' }}>Active</label>
            </div>                  

        </div>

 

        




      </div>
    </div>





  </div>
  <div class="col-md-5">
    <style>
    .btn-feature{
      text-shadow: 2px 2px 4px #000000;
    }
  </style>



<div class="box box-widget">
  <div class="box-header with-border">
    <h3 class="box-title">Update Feature Image</h3>
  </div>
  <div class="box-body">


    <div class="form-group {{ $errors->has('feature_image') ? ' has-error' : '' }}">
      <label for="feature_image" class="col-sm-4 control-label">Feature Image <br>
        @if($post->imgFeature())
          <img class="img-responsive" width="100" src="{{asset($post->fi())}}">
        @endif
      </label>
      <div class="col-sm-8">
        <input type="file" name="feature_image" class="" id="feature_image" >
        <span class="help-block">Image Dimention 300px X 200px or larger and Ratio 3/2. If new image upload, old Image will be replaced by new image.</span>

        @if ($errors->has('feature_image'))
        <span class="help-block">
          <strong>{{ $errors->first('feature_image') }}</strong>
        </span>
        @endif
      </div>
    </div>


  </div>
</div>






</div>
</div>








</div>

<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right">Update</button>
</div>
</form>
</div>

    </section>
 