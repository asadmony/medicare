<div class="box box-widget">
     	<div class="box-header with-border">
     		<h3 class="box-title">
     			New Video Gallery 
     		</h3>
     	</div>
     	
        <div class="box-body" style="background-color: #ccc;">
          <div class="row">
           <div class="col-md-7">

            <form class="form-horizontal" method="post" action="{{route('admin.videoGalleryAddNewPost')}}">

            <div class="box box-widget">
              <div class="box-body">

              	@include('alerts')

              	{{csrf_field()}}


                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                  <label for="title" class="col-sm-3 control-label">Video Gallery Title</label>
                  <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="{{old('title')}}" id="title" placeholder="Title of Video Gallery" autocomplete="off">
                    @if ($errors->has('title'))
                    <span class="help-block">
                     <strong>{{ $errors->first('title') }}</strong>
                   </span>
                   @endif
                 </div>                  
               </div>

               <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                  <label for="description" class="col-sm-3 control-label">Description</label>
                  <div class="col-sm-9">
                    <input type="text" name="description" class="form-control" value="{{old('description')}}" id="description" placeholder="Short Description about the video gallery" autocomplete="off">
                    @if ($errors->has('description'))
                    <span class="help-block">
                     <strong>{{ $errors->first('description') }}</strong>
                   </span>
                   @endif
                 </div>                  
               </div>

               <div class="form-group {{ $errors->has('videoUrl') ? ' has-error' : '' }}">
                  <label for="videoUrl" class="col-sm-3 control-label">Youtube Video Url</label>
                  <div class="col-sm-9">
                    <input type="text" name="videoUrl" class="form-control" value="{{old('videoUrl')}}" id="videoUrl" placeholder="https://www.youtube.com/embed/WB8BgVGF6mo" autocomplete="off">
                    @if ($errors->has('videoUrl'))
                    <span class="help-block">
                     <strong>{{ $errors->first('videoUrl') }}</strong>
                   </span>
                   @endif
                 </div>                  
               </div>





        <div class="form-group">

          <div class="col-sm-9 col-sm-offset-3">
            <div class="checkbox">
              <label><input type="checkbox"  name="publish" checked>Publish Instantly</label>
            </div>                  
          </div>
        </div>

      <button type="submit" class="btn btn-primary pull-right">Save</button>





      </div>
    </div>
  </form>

   

  </div>
  <div class="col-md-5">
 


</div>
</div>








</div>

<div class="box-footer">
  
</div>
 
</div>