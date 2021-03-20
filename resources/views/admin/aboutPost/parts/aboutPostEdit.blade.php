 
    <section class="content-header">
      <h1>
        About Post
        <small>Update</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> About Post</a></li>
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
      <form  method="post" action="{{route('admin.aboutPostEditPost', $post)}}" enctype="multipart/form-data">
        <div class="box-body" style="background-color: #ccc;">
          <div class="row">
           <div class="col-md-7">

            <div class="box box-widget">
              <div class="box-body">

                @include('alerts')

                {{csrf_field()}}


                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class=" control-label">Title</label>

                    <input type="text" name="title" class="form-control" value="{{old('title') ?: $post->title }}" id="title" placeholder="Title of Post" autocomplete="off" required>
                    @if ($errors->has('title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
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



             <div class="form-group {{ $errors->has('button_text') ? ' has-error' : '' }}">
                  <label for="button_text" class=" control-label">Button Text</label>

                    <input type="text" name="button_text" class="form-control" value="{{old('button_text') ?: $post->button_text}}" id="button_text" placeholder="Button Text" >
                    @if ($errors->has('button_text'))
                    <span class="help-block">
                     <strong>{{ $errors->first('button_text') }}</strong>
                   </span>
                   @endif
               
               </div>

               <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
                  <label for="url" class=" control-label">Button Url Link</label>

                    <input type="text" name="url" class="form-control" value="{{old('url') ?: $post->url}}" id="url" placeholder="Button Url Link" >
                    @if ($errors->has('url'))
                    <span class="help-block">
                     <strong>{{ $errors->first('url') }}</strong>
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
 