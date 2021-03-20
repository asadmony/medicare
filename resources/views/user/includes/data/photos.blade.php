@foreach($u->photoPublicSix() as $photo)
    
      @include('user.photos.includes.photo')
 
    @endforeach