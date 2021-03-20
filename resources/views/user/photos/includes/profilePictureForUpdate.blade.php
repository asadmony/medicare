 
<div class="fb-profile">

        <div class="profile-image">
        
        @include('user.ajax.myProfilePic')


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



        

        


    </div>
 
