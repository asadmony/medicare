 




    <div class="w3-border w3-border-purple w3-round">
    <div class="w3-container w3-padding">




  <form class="" action="{{ route('user.profilepicChangePost', 'public') }}" method="post" enctype="multipart/form-data">
 
 

    <input type="file" class="form-control float-left" id="photos" name="profile_picture" required style="width: 70%;">
  {{ csrf_field() }}

  <!--<br>-->

  <!--<br>-->
    
  <!--  <br>-->

  <!--   <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm float-left"><i class="fa fa-upload"></i> Submit</button>-->
  <!--    <input type="file" class="form-control float-left" id="photos" name="profile_picture" required style="width: 70%;">-->
  <!--{{ csrf_field() }}-->


     <button type="submit" class="w3-btn w3-round w3-border w3-border-purple w3-right btn-sm float-right" style="background-color: #d52379 !important; color: white;border:#d52379 !important; ">Upload</button>
     <br> <br>
     <span class="help-block">Please upload Square Image. Image Size: Minimum <span class="w3-text-red">160px</span></span>
 
</form>
      <style type="text/css">
  
  .w3-padding {
    padding: 31px 16px !important;
}

</style>
    </div>
  </div>

    
 