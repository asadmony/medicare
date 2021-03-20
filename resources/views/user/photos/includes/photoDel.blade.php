<div class="w3-display-container " style="width:100%;margin-top: 15px;">
    <img src="{{ asset($photo->img_url) }}" class="img-thumbnail" alt="Bangali Muslim Marriage" style="width:100%">
    <div class="w3-display-bottomright w3-display-hover ">
      <a class="btn btn-danger btn-sm" href="{{ route('user.photoDelete',$photo) }}">Delete</a>
    </div>

    <div class="w3-display-topright w3-display-hover ">
      <a target="_blank" class="btn btn-primary btn-sm" href="{{ asset($photo->img_url) }}">See Big</a>
    </div>
  </div>