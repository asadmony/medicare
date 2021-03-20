@extends('hasan.master')

@section('content')
  @include('hasan.subpage.banner-sm')
  <div class="container" style="margin-top: 30px;">
    <br />
    <div class="row">
      <div class="col-sm-12 padding-0 margin-0">
        <div class="progress">
          <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $completed }}"
          aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
          {{ $completed }}% completed
        </div>
      </div>
    </div>
  </div>
  <br />



    <div class=" col-xs-12 m-b-100"">
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
      <form action="{{ route('signup.storePicture') }}" method="post">
        @csrf
        <div class="row">
          <div class="col-sm-3">
            <label for="">Photo Status</label>
            <select class="form-control" name="private">
              <option value="0">Public</option>
              <option value="1">Private</option>
            </select>
          </div>
          <div class="col-sm-9">
            <label for="" style="display: block;">Upload Photo</label>
            <input type="file" name="pic" value="" required class="btn btn-info" />
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
          <div class="col-sm-12">
            <br />
            <div class="form-group row">
              <div class="col-sm-3">
                <button type="submit" id="submit" class="uk-button uk-button-block create_acc">Save and
                  Continue</button>
                </div>

              </div>
          </div>
        </div>
      </form>
    </div>
  </div>

@endsection
