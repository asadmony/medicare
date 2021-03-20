
    <!-- box widget -->
<div class="box box-widget w3-animate-zoom" style="margin-top: 14px;"><!-- box widget Start -->

<div class="box-body box-top"><!-- Box Body Start -->


<div class="fb-profile">

    <div class="profile-cover-image">

        @include('user.ajax.profileCoverPic')


    </div>

    <img style="display: none;" class="img-responsive" id="crop-cover-image" src="">

    <a id="btn-cover" class="btn-cover" title="Change Cover Picture">
        <span class="fa-stack fa-lg ">
          <i class="fa fa-square-o fa-stack-2x "></i>
          <i class="fa fa-camera-retro w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-blue fa-stack-1x "></i>
        </span>
        </a>

        <form id="form_cover_uploade" method="post" enctype="multipart/form-data" action="{{route('user.profileCoverPicChange')}}">
        {{csrf_field()}}
        <input class="form-control" type="file" id="my_coverpic" name="cover_picture" style="display: none;" />
        <input class="form-control" id="offset_x" step="any" type="number" name="offset_x" style="display: none;" />
        <input class="form-control" id="offset_y" step="any" type="number" name="offset_y" style="display: none;" >
        <input class="form-control" id="new_width" step="any" type="number" name="new_width" style="display: none;" >
        <input class="form-control" id="new_height" step="any" type="number" name="new_height" style="display: none;" >

        <button type="reset" class="w3-card-4 btn-cover-cancel w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-cancel fa-2x w3-text-red"></i></button>
        <button type="submit" class="w3-card-4 btn-cover-submit w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-checkmark-circle fa-2x w3-text-green"></i></button>
        </form>



        <div class="profile-image">
        
        @include('user.ajax.profilePic')


        </div>


        <div class="crop-profilepic-container" >
        <img style="display: none;" class="img-responsive" id="crop-profilepic" src="">
        </div>


        <a id="btn-profilepic" class="btn-profilepic" title="Change Profile Picture">


        <span class="fa-stack fa-lg ">
          <i class="fa fa-square-o fa-stack-2x "></i>
          <i class="fa fa-camera w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-blue fa-stack-1x "></i>
        </span>

        </a>

        <form id="form_profilepic_upload" method="post" enctype="multipart/form-data" action="{{route('user.profilepicChange')}}">
        {{csrf_field()}}
        <input class="form-control" type="file" id="my_profilepic" name="profile_picture" style="display: none;"  />
        <input class="form-control" style="display: none;" id="off_x" step="any" type="number" name="off_x"  />
        <input class="form-control" style="display: none;" id="off_y" step="any" type="number" name="off_y"  >
        <input class="form-control" style="display: none;" id="change_width" step="any" type="number" name="change_width"  >
        <input class="form-control" style="display: none;" id="change_height" step="any" type="number" name="change_height"  >

        <button type="reset" class="btn-card-4 btn-profilepic-cancel w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-cancel fa-2x w3-text-red"></i></button>
        <button type="submit" class="btn-card-4 btn-profilepic-submit w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-checkmark-circle fa-2x w3-text-green"></i></button>
        </form>



        

        

        <div class="fb-profile-text">
            <h1>{{$u->username}}</h1>
            <p>{{$u->about ? $u->about->headline : 'Greetings to visitor'}}</p>
        </div>
    </div>


</div>
</div>



{{-- 

    <!-- box widget -->
<div class="box box-widget w3-animate-zoom"><!-- box widget Start -->

<div class="box-body box-top"><!-- Box Body Start -->



<div class="cs-profile">
        <div class="profile-cover-image">

        <img align="left" class="cs-image-lg w3-animate-zoom img-responsive" src="{{asset('img/'.$u->cp())}}" id="cs-image-lg" alt="Profile image example"/>

        </div>

        
        <img style="display: none;" class="img-responsive" id="crop-cover-image" src="">



        <a id="btn-cover" class="btn-cover" title="Change Cover Picture">
        <span class="fa-stack fa-lg ">
          <i class="fa fa-square-o fa-stack-2x "></i>
          <i class="fa fa-camera-retro w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-gray fa-stack-1x "></i>
        </span>
        </a>
        <form id="form_cover_uploade" method="post" enctype="multipart/form-data" action="{{route('user.profileCoverPicChange')}}">
        {{csrf_field()}}
        <input type="file" id="my_coverpic" name="cover_picture" style="display: none;" />
        <input id="offset_x" step="any" type="number" name="offset_x" style="display: none;" />
        <input id="offset_y" step="any" type="number" name="offset_y" style="display: none;" >
        <input id="new_width" step="any" type="number" name="new_width" style="display: none;" >
        <input id="new_height" step="any" type="number" name="new_height" style="display: none;" >

        <button type="reset" class="w3-card-4 btn-cover-cancel w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-cancel fa-2x w3-text-red"></i></button>
        <button type="submit" class="w3-card-4 btn-cover-submit w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-checkmark-circle fa-2x w3-text-green"></i></button>
        </form>
  

        <div class="profile-image">
        
        <img id="cs-image-profile" align="right" class="cs-image-profile thumbnail w3-animate-zoom" src="{{asset('img/'.$u->pp())}}" alt="alt name"/>

        </div>

        
        <div class="crop-profilepic-container" >
        <img style="display: none;" class="img-responsive" id="crop-profilepic" src="">
        </div>


        <a id="btn-profilepic" class="btn-profilepic" title="Change Profile Picture">
        <span class="fa-stack fa-lg">
          <i class="fa fa-square-o bg-white fa-stack-2x"></i>
          <i class="fa fa-camera w3-text-white w3-hover-shadow w3-hover-deep-orange w3-round w3-card-4 w3-gray fa-stack-1x"></i>
        </span>
        </a>

        <form id="form_profilepic_upload" method="post" enctype="multipart/form-data" action="{{route('user.profilepicChange')}}">
        {{csrf_field()}}
        <input type="file" id="my_profilepic" name="profile_picture" style="display: none;"  />
        <input style="display: none;" id="off_x" step="any" type="number" name="off_x"  />
        <input style="display: none;" id="off_y" step="any" type="number" name="off_y"  >
        <input style="display: none;" id="change_width" step="any" type="number" name="change_width"  >
        <input style="display: none;" id="change_height" step="any" type="number" name="change_height"  >

        <button type="reset" class="btn-card-4 btn-profilepic-cancel w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-cancel fa-2x w3-text-red"></i></button>
        <button type="submit" class="btn-card-4 btn-profilepic-submit w3-btn w3-round w3-white btn-xs"><i class="fa ion-android-checkmark-circle fa-2x w3-text-green"></i></button>
        </form>

        
        <div class="cs-profile-desc">
          <h1>Name



          </h1>

        </div>

        <div class="btn-group btn-group-justified cs-profile-btns">
           
          <a href="#" class="btn w3-white btn-default btn-flat">Settings</a>
 

           
            <a href="#" class="btn w3-white btn-default btn-flat">Update Profile</a>
           

          
        </div>

 </div><!-- cs-profile -->

</div><!-- Box Body End -->

</div> <!-- box widget End--> --}}