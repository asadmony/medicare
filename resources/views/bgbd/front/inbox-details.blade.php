@extends('bgbd.master')

@section('content')
@include('bgbd.subpage.banner-sm')

<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('bgbd.subpage.leftmenu')
    <div class="col-sm-9">
        <div class="row">
          <div class="col-sm-12">
            @php
            if ($result->settings_name == 1){
              $name = trim($result->first_name)  ." ". trim($result->last_name);
            }
            elseif ($result->settings_name == 2){
              $name = trim($result->first_name);
            }
            else{
              $name = trim($result->last_name);
            }
            @endphp
            <h4>{{ $result->title }}</h4>
            <p><small>From {{ $name }} | {{ date("M d, Y h:i A", strtotime($result->created_at)) }}</small></p>
            <hr>
            <p>{{ $result->message }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script type="text/javascript">
  $(document).ready(function() {
    $(".msg-delete").click(function(event) {
      if (!confirm("Do you want to delete")){
        return false;
      }

      $(this).parent().hide();
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "sid": $(this).attr("id")
      };

      $.ajax({
        url: "{{ route('delete_sent') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $("#invalid_alert_msg").text(response);
          $('#invalid_alert').modal('toggle');
        }
      });
      event.preventDefault();
      return false;
    });
    $(".cursor_pointer").click(function(event) {
      window.location = $(this).attr("links");
    });
  });
</script>

<!-- The Modal -->
<div class="modal fade" id="invalid_alert">
  <div class="modal-dialog" style="top: 30%">
    <div class="modal-content">
      <div class="modal-body">
        <i class="fas fa-exclamation-triangle fa-2x"></i>
        <p id="invalid_alert_msg" align="center"></p>
        <br />
      </div>
    </div>
  </div>
</div>

@endsection
