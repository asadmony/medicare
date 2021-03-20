@extends('bgbd.master')

@section('content')
@include('bgbd.subpage.banner-sm')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('bgbd.subpage.leftmenu')
    <div class="col-sm-9">
        <h4>{{ $title }}</h4>
        <hr />

        <div class="row">
          @foreach ($result as $item)
            @php
            if ($item->settings_name == 1){
              $name = trim($item->first_name)  ." ". trim($item->last_name);
            }
            elseif ($item->settings_name == 2){
              $name = trim($item->first_name);
            }
            else{
              $name = trim($item->last_name);
            }
            @endphp
            <div class="col-sm-3 margin-bottom-30">
              <a href="{{ \App\Common::getUserUrl($item->id) }}">
                <div class="home-porfile">
                  @if($item->picid != '' && file_exists("profiles/pics/{$item->id}/{$item->picext}"))
                    <img src="{{ url('profiles/pics/' . $item->id ) . '/' . $item->picext  }}"
                    class="img-fluid" alt="{{ $name }}" />
                  @else
                    @if ($item->gender == 1)
                      <img src="{{ url('assets/defaults/male.png') }}"
                      class="img-fluid" alt="{{ $name }}" />
                    @else
                      <img src="{{ url('assets/defaults/female.png') }}"
                      class="img-fluid" alt="{{ $name }}" />
                    @endif
                  @endif
                  <div class="home-profile-details">
                    <h5>{{ $name }}</h5>
                    <p>Age: {{ \App\Common::getAge($item->date_of_birth) }} yrs.</p>
                    <p>Height: {{ height($item->height) }}</p>
                    <p>Religion: {{ religion($item->religion) }}</p>
                    <br />
                    <p align="center">
                      <button type="button" class="btn btn-warning btn-sm btn-delete" name="button" id="delete_{{ $item->id }}">Delete</button>
                    </p>
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
      if (!confirm("Do you want to delete interest?")){
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
        url: "{{ route('express_delete') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $("#invalid_alert_msg").text(response);
          $('#invalid_alert').modal('toggle');
        }
      });
      event.preventDefault();
    });
  });
  </script>

  <!-- The Modal -->
  <div class="modal fade" id="invalid_alert">
    <div class="modal-dialog" style="top: 30%">
      <div class="modal-content">
        <div class="modal-body">
          <i class="far fa-check-circle fa-3x"></i>
          <p id="invalid_alert_msg" align="center"></p>
          <br />
        </div>
      </div>
    </div>
  </div>

@endsection
