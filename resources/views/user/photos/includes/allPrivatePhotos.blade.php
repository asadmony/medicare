<div class="card card-nav-tabs" style="min-height: 500px;">
    <div class="card-header {{Auth::user()->isMale() ? 'card-header-info' : 'card-header-rose'}}">
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#photos" data-toggle="tab">My Private Photos</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div><div class="card-body ">

        @include('alerts.alerts') 
            
        <div class="tab-content ">
            <div class="tab-pane active" id="photos">

                <div class="photos-container" style="min-height:500px;">


@auth
    @if (Auth::user()->id === $u->id)
    @foreach($u->privatePhotos()->chunk(3) as $photo3)
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
            <br>

                 
                    {{ $u->publicPhotos()->links() }}
                
                
            </div>
        </div>
    </div>
  </div>