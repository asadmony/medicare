 




    <div class="w3-border w3-border-purple w3-round mb-3">
    <div class="w3-container w3-padding">




  <form class="" action="{{ route('user.myCvChangePost') }}" method="post" enctype="multipart/form-data">
 
 

    <input type="file" class="form-control float-left" id="cv" name="cv" required>
  {{ csrf_field() }}

  <br>

  <br>
    
    <br>

     <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm float-left"><i class="fa fa-upload"></i> Upload</button>
     <br> <br>
     <span class="help-block">please upload file with following extensions: .pdf, .docx, .doc, .png, .jpg, .jpeg</span>
 
</form>
      
    </div>
  </div>

    
 