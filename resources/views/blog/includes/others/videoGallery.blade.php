@if($videoGalleries) 
<div class="box box-widget" id="video-gallery">
            <div class="box-header w3-panel w3-leftbar w3-border-green">
              <h3 class="box-title">
                 Video Gallery
              </h3>
            </div>
            <div class="box-body w3-bottombar w3-topbar">

              @foreach($videoGalleries as $gallery)
                <a href="{{route('welcome.videoGallery',$gallery)}}"> 

                      <iframe style="width: 100%;height: 120px;" src="{{asset($gallery->video_url)}}?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>

                    <div class="w3-container">
                      <p class="w3-text-gray">{{str_limit($gallery->title,35,'..')}}</p>
                    </div>
                  </a>
              @endforeach

              <div class="text-center">
                <a href="{{route('welcome.videoGallery')}}">See More Videos</a>
              </div>
              
               
            </div>
          </div>
          @endif