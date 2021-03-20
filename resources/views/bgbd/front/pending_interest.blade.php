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
            <div class="col-sm-12 margin-bottom-30">
              <table class="table table-striped">
                <tr>
                  <td width="150">
                    <a href="{{ \App\Common::getUserUrl($item->id) }}">
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
                    </a>
                  </td>
                  <td>
                    <h5>
                      <a href="{{ \App\Common::getUserUrl($item->id) }}">
                        {{ $item->first_name . ' ' . $item->last_name }}
                      </a>
                    </h5>
                    <p>Age: {{ \App\Common::getAge($item->date_of_birth) }} yrs. <br />
                      Height: {{ height($item->height) }} <br />
                      Religion: {{ religion($item->religion) }}</p>
                  </td>
                  <td>
                    {{ $item->user_message }}
                  </td>
                  <td>
                    <p align="center">
                      <button type="button" class="btn btn-info btn-sm btn-accept" name="button" id="accept_{{ $item->id }}">Accept</button>
                      <button type="button" class="btn btn-warning btn-sm btn-delete" name="button" id="delete_{{ $item->id }}">Delete</button>
                    </p>
                  </td>
                </tr>
              </table>

            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  $(document).ready(function() {
    $(".btn-accept").click(function(event) {
      $(this).parent().parent().parent().parent().parent().hide();
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "sid": $(this).attr("id")
      };

      $.ajax({
        url: "{{ route('express_accept') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $("#invalid_alert_msg").text(response);
          $('#invalid_alert').modal('toggle');
        }
      });
      event.preventDefault();
    });

    $(".btn-delete").click(function(event) {
      if (!confirm("Do you want to delete interest?")){
        return false;
      }
      $(this).parent().parent().parent().parent().parent().hide();
      rid = $(this).attr("id");
      rid = rid.substr(7);
      alert(rid);
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
