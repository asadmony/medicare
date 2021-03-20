@extends("bgbd.master")

@section("content")
  @include('bgbd.subpage.banner-sm')
  <div class="welcome-box">
    <i class="fas fa-envelope"></i>
    <p>
      <span>Congratulation!</span>
      Your account created successfully.<br />
      An email has been sent to your account. Please follow the instructions. If you not receive email yet, please check spam also.
    </p>
  </div>

@endsection
