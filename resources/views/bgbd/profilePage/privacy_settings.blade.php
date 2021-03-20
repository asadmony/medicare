@extends('hasan.master')

@section('content')
@include('hasan.subpage.banner-sm')
@include('hasan.subpage.topmenubar')
  <!--Main Content Start -->
  <div class="container">
    <br />
    <div class="row">      
        @include('hasan.subpage.leftmenu')      

      <div class="col-sm-9">
        <div style="background: #FFF; padding: 15px">
        <h3>Privacy Settings</h3>
        <hr>

        @if(session()->has('msg'))
          <div class="alert alert-success">
            {{ session()->get('msg') }}
          </div>
        @endif

        @if(session()->has('err'))
          <div class="alert alert-danger">
            {{ session()->get('err') }}
          </div>
        @endif

        <form action="{{ route('users.privacy.update') }}" method="post">
          @csrf
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label>Profile name as <small>(premium members only)</small>:</label>
                <div class="">
                  <input type="radio" name="settings_name" value="1" {{ (Auth::user()->settings_name == 1)?" checked":"" }}> <small>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} &nbsp;&nbsp;&nbsp;</small>

                  <input type="radio" name="settings_name" value="2"  {{ (Auth::user()->settings_name == 2)?" checked":"" }}> <small>{{ Auth::user()->first_name }}&nbsp;&nbsp;&nbsp;</small>

                  <input type="radio" name="settings_name" value="3" {{ (Auth::user()->settings_name == 3)?" checked":"" }}> <small>{{ Auth::user()->last_name }}</small>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label>Make my profile <small>(premium members only)</small>:</label>
                <div class="">
                  <input type="radio" name="settings_visibility" value="1" {{ Auth::user()->settings_visibility?" checked":"" }}> <small>Unhide &nbsp;&nbsp;&nbsp;</small>
                  <input type="radio" name="settings_visibility" value="0" {{ !Auth::user()->settings_visibility?" checked":"" }}> <small>Hide</small>
                </div>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label>Delete my Profile <small>(premium members only)</small>:</label>
                <div class="">
                  <input type="radio" name="delete_profile" value="1" {{ Auth::user()->delete_profile?" checked":"" }}> <small>Yes &nbsp;&nbsp;&nbsp;</small>
                  <input type="radio" name="delete_profile" value="0" {{ !Auth::user()->delete_profile?" checked":"" }}> <small>No</small>
                </div>
              </div>
            </div>

            <div class="col-sm-6" id="delete_profile_row">
              <div class="form-group">
                <label>Reason for delete:</label>
                <div class="">
                  <select class="form-control" name="delete_reason">
                    @foreach (deleteProfile() as $key => $value)
                      <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>

            <div class="col-sm-3">              
                <button type="submit" id="submit" class="uk-button uk-button-block create_acc">
                  Save Change
                </button>              
            </div>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
    @php
    if(!Auth::user()->delete_profile){
      echo '$("#delete_profile_row").hide();';
    }
    else{
      echo '$("#delete_profile_row").show();';
    }
    @endphp
    $("input[name='delete_profile']").change(function(event) {
      if(parseInt($('input[name=delete_profile]:checked').val()) != 1) $("#delete_profile_row").hide();
      else $("#delete_profile_row").show();
    });
  });
</script>
@endsection
