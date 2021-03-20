@extends('bgbd.master')

@section('content')
@include('bgbd.subpage.banner-sm')

{{-- <section class="pt-5">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 profile_menu_border">
        <ul class="nav nav-tabs p-4">
          <li class="nav-item pl-3">
            <a href="{{ route('user.pending_receive_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Sent</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.accepted_receive_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Accepted</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.pending_sent_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest by me Receive</a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ route('user.accepted_sent_interest') }}" style="text-decoration: none;" class=" active w3-small  p-1  w3-btn w3-round w3-white w3-border w3-border-light mb-2 mr-2 w3-hover-red">Interest to me Accepted</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section> --}}
@include('bgbd.subpage.topmenubar')
<div class="container m-b-150 m-t-50">
  <div class="row">
    @include('bgbd.subpage.leftmenu')
    <div class="col-sm-9">
        <h4>{{ $title }}</h4>

        <div class="row">
          <div class="col-sm-12">
            <table class="table msg-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Time</th>
                  <th width='50%'>Title</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
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
                  <tr class="cursor_pointer" links="{{ route('user.sent_details', $item->msgid) }}">
                  <td>
                    {{ $name }}
                  </td>
                  <td>
                    {{ date("M d, Y h:i A", strtotime($item->created_at)) }}
                  </td>
                  <td>{{ $item->title }}
                  </td>

                  <td align="center" class='msg-delete' id='delete_{{ $item->msgid }}'><i class="fa fa-trash" aria-hidden="true"></i></td>

                </tr>
              @endforeach
            </tbody>
          </table>
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
