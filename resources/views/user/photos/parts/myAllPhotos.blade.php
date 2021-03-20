  <div class="main main-raised">
    <div class="profile-content ">
        <div class="container ">
    <div class="row">
        <div class="col-sm-12">
            

{{-- @include('user.includes.others.profileHead') --}}

<br> <br> 

<div class="row">
    <div class="col-sm-3">

        @include('user.settings.includes.userSettingLinks')
 
    </div>
    <div class="col-sm-9">
        <div class="user-setting-container">
             @if ($type == 'private')
                @include('user.photos.includes.allPrivatePhotos')
            @else
            @include('user.photos.includes.allPublicPhotos')
            @endif
        </div>        
    </div>
</div>
 

</div>
</div>
</div>
        </div>
    </div>
