@extends('bgbd.master')

@section('content')
@include('bgbd.subpage.banner-sm')

@include('bgbd.subpage.topmenubar')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('bgbd.subpage.leftmenu')
    <div class="col-sm-9">
        <h4>{{ $title }}</h4>
        <hr />

        <div class="row">
          @foreach ($result as $item)
            <div class="col-sm-3 margin-bottom-30 pb-3">
              <a href="{{ \App\Common::getUserUrl($item->id) }}">
                <div class="home-porfile">
                  @if($item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                    <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                    class="img-fluid" alt="{{ $item->first_name . ' ' . $item->last_name }}" />
                  @else
                    @if ($item->gender == 1)
                      <img src="{{ url('assets/defaults/male.png') }}"
                      class="img-fluid" alt="{{ $item->first_name . ' ' . $item->last_name }}" />
                    @else
                      <img src="{{ url('assets/defaults/female.png') }}"
                      class="img-fluid" alt="{{ $item->first_name . ' ' . $item->last_name }}" />
                    @endif
                  @endif
                  <div class="home-profile-details">
                    <h5>{{ $item->first_name . ' ' . $item->last_name }}</h5>
                    <p>Age: {{ \App\Common::getAge($item->date_of_birth) }} yrs.</p>
                    <p>Height: {{ height($item->height) }}</p>
                    <p>Religion: {{ religion($item->religion) }}</p>
                    <br />
                    {{-- <p align="center">
                      <button type="button" class="btn btn-warning btn-sm btn-delete" name="button" href="delete_{{ $item->id }}">Delete</button>
                    </p> --}}
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
  $(document).ready(function() {
    $(".btn-delete").click(function(event) {
      if (!confirm("Do you want to delete favorite?")){
        return false;
      }

      $(this).parent().parent().parent().parent().parent().hide();
      rid = $(this).attr("id");
      rid = rid.substr(7);
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": rid
      };

      $.ajax({
        url: "{{ route('delete_favourites') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $("#valid_alert_msg").text(response);
          $('#valid_alert').modal('toggle');
        }
      });
      event.preventDefault();
    });
  });
  </script>

  <!-- The Modal -->
  <div class="modal fade" id="valid_alert">
    <div class="modal-dialog" style="top: 30%">
      <div class="modal-content">
        <div class="modal-body">
          <i class="far fa-check-circle fa-3x"></i>
          <p id="valid_alert_msg" align="center"></p>
          <br />
        </div>
      </div>
    </div>
  </div>

@endsection
