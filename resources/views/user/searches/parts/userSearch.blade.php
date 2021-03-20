  <div class="main main-raised">
    <div class="profile-content ">
        <div class="container ">
    <div class="row">
        <div class="col-sm-12">
            

{{-- @include('user.includes.others.profileHead') --}}

<br> <br> 

<div class="row">
    <div class="col-sm-3">

        @include('user.searches.includes.userSearchLinks')
 
    </div>
    <div class="col-sm-9">
        <div class="user-setting-container">
            @include('user.searches.ajax.view.'.$v)
        </div>        
    </div>
</div>
 

</div>
</div>
</div>
        </div>
    </div>
