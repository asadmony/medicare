<div class="box box-widget w3-animate-zoom">
  <div class="box-header with-border">
    <h3 class="box-title">Upload Public Photo</h3>
  </div>
  <div class="box-body">


{{-- @include('alerts.alerts') --}}

    <div class="w3-border w3-border-purple w3-round">
    <div class="w3-container w3-padding">




  <form class="form-inline" action="{{ route('user.uploadNewPhotos', 'public') }}" method="post" enctype="multipart/form-data">
 <div class="row">
   <div class="col-sm-7">

    <input type="file" class="form-control float-left" id="photos" name="photos[]" multiple style="width: 200px;">
  {{ csrf_field() }}
</div>
   <div class="col-sm-5">
    <div class="d-sm-none d-lg-none d-md-none"> <br> </div>
     <button type="submit" class="w3-btn w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm float-left" style="background-color: #d52379 !important; color: white;border:#d52379 !important; margin-right: 18px;">Submit</button>
   </div>
 </div>
</form>
      
    </div>
  </div>

    

  <div class="photos-container" style="min-height:500px;">
    <br>
    @auth
    @if (Auth::user()->id === $me->id)
    @foreach($me->publicPhotos()->chunk(3) as $photo3)
      <div class="row">
          @foreach($photo3 as $photo)
          <div class="col-sm-4">
              @include('user.photos.includes.photoDel')
          </div>
          @endforeach
      </div>
      
    @endforeach
    @else 

    

    @endif
@else
@endauth
    
  </div>
    
  </div>
</div>

