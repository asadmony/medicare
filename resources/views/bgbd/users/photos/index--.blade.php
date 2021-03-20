@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
@include('hasan.subpage.topmenubar')
<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('hasan.subpage.leftmenu')
    <div class="col-sm-9">
      <div class="row">
        <div class="col-sm-12">
          <h4 class="title">My Photos
            {{-- @if ($photoLimit->post_photo > 0) --}}
            <a href="{{route("users.photos.upoladPhotos") }}" style="margin-right: -70px;"
            class="create_acc">Upload Photos</a>
            {{-- @else
            <a href="{{ route('packages') }}" type="button" class="btn btn-danger  pull-right">
              Upgrade your membership to upload more photos.
            </a>
            @endif --}}
          </h4>
          



          <!-- Uplaod Modal -->
          @if ($photoLimit)
          <div class="modal fade" id="uploadphotos" tabindex="-1" role="dialog" aria-labelledby="uploadphotostitle"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="uploadphotostitle">Upload Photos</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form enctype="multipart/form-data" method="POST" action="{{ route('users.photos.uploadPhotoPost') }}">
                  @csrf
                  <div class="modal-body">
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

                    <div class="form-group">
                      <label class="custom-file">
                        <input type="file" name="mypic[]" multiple id="" placeholder="" class="form-control"
                          aria-describedby="fileHelpId">
                        <span class="custom-file-control"></span>
                      </label>
                      <br /><br />
                      <label class="">Set Photos Private <input name="private" class="btn btn-sm btn-success"
                          type="checkbox" value="1"></label>
                    </div>

                    <div class="form-group">
                      <input class="btn btn-sm btn-success" type="submit" value="Upload Photos">
                    </div>

                  </div>
                </form>
              </div>
            </div>
          </div>
          @endif
        </div>

      </div>


      <div class="row">


        @isset($myPics)
        @forelse ($myPics as $item)
        <div class="col-sm-4 col-xs-6 my-image-box">
          <img src="{{ url($myPicUrl[$item->id])}}" class="img-fluid">

          @if ($item->is_profilepic == 1)
          <span id="" class="btn btn-default btn-xs btn-block btn-sm" role="button">Current Profile Picture</span>
          <a href="{{ route('users.photos.changeProfilePicture') }}"
            class="btn btn-success btn-xs btn-block btn-sm">Change
            Profile Picture</a>
          @else
          <button type="button" class="btn btn-primary btn-xs btn-block btn-sm" data-toggle="modal"
            data-target="#profilepic-{{ $item->id }}">
            Set Profile Picture
          </button>
          @endif

          @if ($item->private == 1)

          <p>
            <form action="{{ route('users.photos.setPublic',$item->id) }}" method="post">
              @csrf
              <input type="hidden" name="privacypicpublic" value="{{ $item->id }}">

              <input type="submit" name="submit" class="btn btn-info btn-xs btn-block btn-sm" role="button"
                value="Make Photo Public">

            </form>
          </p>
          @else
          <p>
            <form action="{{ route('users.photos.setPrivate',$item->id) }}" method="post">
              @csrf
              <input type="hidden" name="privacypic" value="{{ $item->id }}">

              <input type="submit" name="submit" class="btn btn-warning btn-xs btn-block btn-sm" role="button"
                value="Make Photo Private">

            </form>
          </p>
          @endif

          @if ($item->is_profilepic != 1)


          <p>
            <form action="{{ route('users.photos.delete',$item->id) }}" method="post">
              @csrf
              <input type="hidden" name="deletepic" value="{{ $item->id }}">

              <input type="submit" name="submit" class="btn btn-danger btn-xs btn-block btn-sm" role="button"
                value="Delete Photo">

            </form>
          </p>
          @endif


          <div class="modal fade" id="profilepic-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="profilepic-{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
              <form action="{{ route('users.photos.setprofilepicture',$item->id) }}" method="post">
                @csrf
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="profilepic-{{ $item->id }}">Change Profile
                      Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                    <input type="hidden" name="picid" value="{{ $item->id }}">
                  </div>
                  <div class="modal-body">
                    Are you sure?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Change Profile Picture</button>
                  </div>
                </div>
              </form>
            </div>
          </div>



        </div>
        @empty
        <div class="col-xs-12">
          <div class="alert alert-danger" role="alert">
            <strong>You have not uploaded any image</strong>
          </div>
        </div>

        @endforelse
        @else
        <div class="col-xs-12">
          <div class="alert alert-danger" role="alert">
            <strong>You have not uploaded any image</strong>
          </div>
        </div>

        @endisset
        <div class="col-xs-12">
          {!! $myPics->render() !!}
        </div>
      </div>

    </div>
  </div>
</div>
@endsection