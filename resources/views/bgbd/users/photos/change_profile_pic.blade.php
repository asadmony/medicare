@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('hasan.subpage.leftmenu')
    <div class="col-sm-9">
      <h3 class="title">Upload Profile Picture</h3>
      
      @include('alerts.alerts')

      <div class="row">
        <div class="col-sm-4">

          <div class="w3-card">
            <div class="p-3">
              
            

          <form action="{{ route('users.photos.change_profile_pic_post') }}" method="post" enctype="multipart/form-data">
          @csrf

          <input type="file" style="padding-bottom: 35px;" name="pic" value="" required class="form-control" />

          <br>

          <input type="submit" name="sub" id="upload_profile_picture" value="Upload Profile Picture"
            class="create_acc btn-block">
           
           
        </form>
          
            </div>
          </div>

        </div>
        <div class="col-sm-8">
          
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

        </div>
      </div>
        
    </div>
  </div>

@endsection
