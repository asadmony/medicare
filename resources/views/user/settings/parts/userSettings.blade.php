
  <div class="main main-raised">
    <div class="profile-content">
        <div class="container">
    <div class="row">
        {{-- <div class="col-sm-10 mx-auto"> --}}
        <div class="col-sm-12">
            

@include('user.includes.others.profileHead')

<br>

<div class="row">
    <div class="col-sm-4">

        @include('user.settings.includes.userSettingLinks')
 
    </div>
    <div class="col-sm-8">
        <div class="user-setting-container">
            @include('user.settings.ajax.view.'.$v)
        </div>        
    </div>
</div>
 

</div>
</div>
</div>
        </div>
    </div>
