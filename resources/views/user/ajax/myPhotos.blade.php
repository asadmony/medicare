<div class="box-body" style="background: #ddd; min-height: 400px;">
 
    <div class="box box-widget w3-animate-zoom">
        <div class="box-header with-border">
            <h3 class="box-title">Profile Picture</h3>
        </div>
        <div class="box-body">
            <img class="rounded img-bordered" src="{{ asset($me->latestCheckedPP()) }}" alt="{{ $me->username }}">
        </div>
    </div>

    <div class="box box-widget w3-animate-zoom">
        <div class="box-header with-border">
            <h3 class="box-title">Public Photos</h3>
        </div>
        <div class="box-body">

            <div class="d-flex flex-wrap align-content-stretch" style="min-height:300px">

                @foreach ($me->userPhotos as $photo)
                <div class="flex-fill p-1">
                    
                @include('user.photos.includes.photo')
                </div>
            @endforeach
            </div>
    

  </div>


            
        </div>
    </div>
 
 

        

    </div>
