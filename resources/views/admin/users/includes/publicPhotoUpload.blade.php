<div class="box box-widget w3-animate-zoom" style="min-height: 200px;">
  <div class="box-header with-border">
    <h3 class="box-title">Upload Public Photo</h3>
  </div>
  <div class="box-body">



    <div class="w3-border w3-border-purple w3-round">
    <div class="w3-container w3-padding">




  <form class="form-inline" action="{{ route('admin.uploadNewPublicPhotos', [$user, 'public']) }}" method="post" enctype="multipart/form-data">
 <div class="row">
   <div class="col-sm-7">

    <input type="file" class="form-control" id="photos" name="photos[]" multiple style="width: 200px;">
  {{ csrf_field() }}
</div>
   <div class="col-sm-5">
     <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm"><i class="fa fa-upload"></i> Upload</button>
   </div>
 </div>
</form>
      
    </div>
  </div>

    

  <div class="photos-container" style="min-height:100px;">
    <br>

 
 
    @foreach($user->publicPhotos()->chunk(4) as $photo4)
      <div class="row">
          @foreach($photo4 as $photo)
          <div class="col-sm-3">



            <div class="w3-display-container " style="width:100%;margin-top: 15px;">
              <img src="{{ asset($photo->img_url) }}" class="img-thumbnail" alt="Bangali Muslim Marriage" style="width:100%">
              <div class="w3-display-bottomright w3-display-hover ">
                <a class="btn btn-danger btn-sm" href="{{ route('admin.userPhotoDelete',$photo) }}">Delete</a>
              </div>

              <div class="w3-display-topright w3-display-hover ">
                <a target="_blank" class="btn btn-primary btn-sm" href="{{ asset($photo->img_url) }}">See Big</a>
              </div>
            </div>
              




          </div>
          @endforeach
      </div>

      <br>
      
    @endforeach
 
 
    
  </div>
    
  </div>
</div>

