@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('hasan.subpage.leftmenu')
    <div class="col-sm-9">
        <h3 class="title">My Photos</h3>
        <div class="alert alert-info" role="alert">
          <h4 class="alert-heading">Make sure you photo is</h4>
          <ul>
            <li>Front face, close short or formal photo (Passport size allow) </li>
            <li>Without sunglass and cap, No side face photo allow </li>
            <li>Good resolution photo required </li>
            <li>Photo properties not more than 10 MB</li>
            <li>File Must be in PNG/JPG/JPEG format</li>
          </ul>
        </div>
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{ session('error') }}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        @endif
        {{-- @if ($photoLimit->post_photo > 0) --}}
        <form action="{{ route('users.photos.upload') }}" method="post">
          @csrf
          <input type="file" name="pic" value="" required class="btn btn-info" />
          <div class="col-sm-8">
            <img src="" id="photo" alt="" style="max-width: 100%; height: auto; margin-bottom: 20px;">
            <input type="hidden" id="ratio" name="ratio" value="0" />
            <input type="hidden" id="x1" name="x1" value="0" />
            <input type="hidden" id="y1" name="y1" value="0" />
            <input type="hidden" id="x2" name="x2" value="0" />
            <input type="hidden" id="y2" name="y2" value="0" />
            <input type="hidden" id="w" name="w" value="0" />
            <input type="hidden" id="h" name="h" value="0" />
            <input type="hidden" id="tw" name="tw" value="0" />
            <input type="hidden" id="th" name="th" value="0" />
            <input type="hidden" id="temp_img_src" name="temp_img_src" value="" class="img-fluid" />
          </div>
          <div class="">
            <input type="submit" name="sub" id="upload_profile_picture" value="Upload Profile Picture"
            class="create_acc">
          </div>
        </form>
        {{-- @else
        <a href="{{ route('packages') }}" type="button" class="btn btn-danger  pull-right">
          Upgrade your membership to upload more photos.
        </a>
        @endif --}}
    </div>
  </div>

  @endsection