<div class="card card-nav-tabs">
  <h4 class="card-header {{$u->isMale() ? 'card-header-info' : 'card-header-rose'}}"><a class="w3-text-white" href="{{route('user.myAllPhotos', 'private')}}"><i class="fa fa-image"></i> &nbsp; Private Photos All</a></h4>
  <div class="card-body" style="min-height: 500px;">

  
  <div class="w3-card-4 w3-round">
    <div class="w3-container w3-padding">



      {{-- <a class="w3-btn w3-white w3-round w3-border w3-border-blue w3-left w3-hover-blue btn-upload-private-photo" href="#">Choose Photos</a> --}}

 


  <form class="form-inline" action="{{ route('user.uploadNewPhotos', 'private') }}" method="post" enctype="multipart/form-data">
 <div class="row">
   <div class="col-sm-7">

    <input type="file" class="form-control" id="photos" name="photos[]" multiple style="width: 200px;">
  {{ csrf_field() }}
</div>
   <div class="col-sm-5">
     <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-blue w3-right w3-hover-blue btn-sm"><i class="fa fa-upload"></i> Upload</button>
   </div>
 </div>
</form>
      
    </div>
  </div>

  <div class="photos-container" style="min-height:500px;">

    @foreach($u->photoPrivateSix() as $photo)
    @include('user.photos.includes.photo')
    
    @endforeach
    
  </div>
    

@if ($u->moreThanSixPrivatePhotos())

<br>

<div class="text-center">
    <a class="w3-btn w3-round w3-border w3-border-blue w3-white btn-xs " href="{{route('user.myAllPhotos', 'private')}}">See All Private Photos</a>
</div>
@endif



            </div>  
        </div>