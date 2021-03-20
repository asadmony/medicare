<div class="box box-widget w3-animate-zoom" style="min-height: 200px;">
  <div class="box-header with-border">
    <h3 class="box-title">Upload CV / Biodata: File ( Pdf / Image / Ms-Word )</h3>
  </div>
  <div class="box-body">



    <div class="w3-border w3-border-purple w3-round">
    <div class="w3-container w3-padding">




  <form class="form-inline" action="{{ route('admin.uploadNewCv', $user) }}" method="post" enctype="multipart/form-data">
 <div class="row">
   <div class="col-sm-7">

    <input type="file" class="form-control" id="cv" name="cv" multiple style="width: 200px;" required>
  {{ csrf_field() }}
</div>
   <div class="col-sm-5">
     <button type="submit" class="w3-btn w3-white w3-round w3-border w3-border-purple w3-right w3-hover-purple btn-sm"><i class="fa fa-upload"></i> Upload</button>
   </div>
 </div>

</form>
      
    </div>
  </div>

  <span class="help-block">If new cv uploaded, Old cv will be replaced by new one.</span>

    

  <div class="photos-container" style="min-height:100px;">
    <br>


    <div class="">
      @if($user->file_name)






            <br> 
            <b>CV / Biodata:  </b>

            @if($user->fileIsImage())

                <img width="50" src="{{ asset('img/image.png') }}" alt="CV">

            @elseif($user->fileIsPdf())
            <img width="50" src="{{ asset('img/pdf.png') }}" alt="CV">
            @elseif($user->fileIsWord())
            <img width="50" src="{{ asset('img/word.png') }}" alt="CV">
            @endif &nbsp; &nbsp; 

            <b>Status: {{ $user->cvStatus() }}</b>

            <br>  

            <a class="btn btn-xs  w3-btn w3-blue pull-right" href="{{ asset('storage/users/cv/'. $user->file_name) }}" download="id_{{ $user->id }}_email_{{ $user->email }}_mobile_{{ $user->mobile }}_cv.{{ $user->file_ext }}">
                 Download
            </a>

            <div class="checkbox">
        <label>
            <input class="image-check"
            data-url="{{ route('admin.userCvChecked',$user)}}" 
            type="checkbox"
            name="cv_checked"
            
                
            {{$user->cvStatus()}} 

 

            /> Data Checked (CV)</label>
        </div>
        



            

            @endif
    </div>


    

 
 
     
 
 
    
  </div>
    
  </div>
</div>

