@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('hasan.subpage.leftmenu')
    <div class="col-sm-9">
      <div class="profileContent">
        <div class="container-fluid">
          <div class="titleHeader">
            <h4>
              Change Your Password
            </h4>
            <hr />

            @if (Session::has('success'))
            <div class="alert alert-success">
              <strong>{{ Session::get('success') }}</strong>
            </div>
            @endif
            @if (Session::has('error'))
            <div class="alert alert-danger">
              <strong>{{ Session::get('error') }}</strong>
            </div>
            @endif

            @if(Session('msg'))
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong> {{ Session('msg') }}</strong>
            </div>
            @endif


            <form action="{{ route('users.password.update') }}" method="post" class="form-horizontal">
              @csrf
              <input type="hidden" value="{{ $myAccount->id }}" name="userid">
              <div class="form-group">
                <label for="oldpasssword" class="col-sm-3">
                  Old Passsword </label>
                <div class="col-sm-9">
                  <input autocomplete="off" required type="password" class="uk-input" id="oldpasssword"
                    name="oldpasssword" placeholder="Enter old password">
                </div>
              </div>
              <div class="form-group">
                <label for="passsword" class="col-sm-3">
                  New Passsword </label>
                <div class="col-sm-9">
                  <input autocomplete="off" required type="password" class="uk-input" id="passsword" name="passsword"
                    placeholder="Add new password">
                </div>
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="col-sm-3">
                  Confirm Passsword </label>
                <div class="col-sm-9">
                  <input autocomplete="off" required type="password" class="uk-input" id="password_confirmation"
                    name="password_confirmation" placeholder="Confirm Password">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection