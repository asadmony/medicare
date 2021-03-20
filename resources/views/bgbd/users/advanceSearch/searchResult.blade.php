@extends('hasan.master')
@section('content')

<!-- search banner start -->
@include('hasan.subpage.banner-sm')
  <div class="container m-b-150">
<!-- search banner end -->
    <div class="col-xm-12" style="margin-left: -42px; padding: 12px;">
      <div class="row" >
        @isset($users)
          @forelse ($users as $item)

            <div class="col-sm-6" style="">

              <div class="row xyz">
                <div class="col-sm-4 myleftstyle-dem">

                  <a href="{{ url($item->profileSlug) }}">
                    @if($item->photo != '' && file_exists($item->photo))
                      <img src="{{ url($item->photo) }}" class="img-fluid img-responsive" alt="{{ $item->name }}">
                    @else
                      @if ($item->gender == 1)
                        <img src="{{ url('assets/defaults/male.png') }}"
                        class="img-fluid" alt="{{ $item->name }}" />
                      @else
                        <img src="{{ url('assets/defaults/female.png') }}"
                        class="img-fluid" alt="{{ $item->name }}" />
                      @endif
                    @endif
                  </a>
                </div>
                <div class="col-sm-8 myrightstyle-dem" style="">
                  <span class="usr-name" id="name-{{ $item->id }}">{{ $item->name }}</span>
                  <span><b>Age/Height:</b> {{ $item->age }}years, {{ $item->height }}</span>
                  <span><b>Religion/Sect:</b> {{ $item->religion }}</span>
                  <span><b>Education:</b> {{ $item->education }}</span>
                  <span><b>Profession:</b> {!! $item->profession !!}</span>
                  <span><b>Residing in:</b> {{ $item->city }}</span>
                  <p>
                    <i class="fas fa-thumbs-up add-like" id="lik-{{ $item->id }}" title="Like this profile"></i>
                    <i class="fas fa-star add-interest" id="int-{{ $item->id }}" title="Express Interest"></i>
                    <i class="fas fa-phone-square add-contact" id="con-{{ $item->id }}" title="Contact Details"></i>
                    <i class="fas fa-envelope send-message" id="msg-{{ $item->id }}" title="Send Message"></i>
                    <i class="fas fa-heart add-favourite" id="fav-{{ $item->id }}" title="Add Favourite"></i>
                    <a href="{{ url($item->profileSlug) }}" class="btn btn-info btn-sm">View Profile</a>
                  </p>
                </div>
              </div>
            </div>

          @empty

            no data
          @endforelse

        @else
          no data
        @endisset


        <div class="col-sm-12">
          <br />
          {!! $rawData->render() !!}
        </div>


      </div>

    </div>
  </div>


  @include('sections.javascripts.signup_preference')
  <link href="{{ asset('assets/fselect/fselect.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/fselect/fselect.js') }}"></script>

  <script type="text/javascript">
  $(document).ready(function () {
    $('#religion').fSelect();
    $('#education').fSelect();
    $('#gender').fSelect();

    /*  #################  Express Interest ################# */
    $(".add-interest").click(function(event) {
      var ids = $(this).attr("id");
      ids = parseInt(ids.substr(4));

      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": ids
      };

      $.ajax({
        url: "{{ route('express_interest_available') }}",
        type: 'post',
        data: formData,
        success: function(response){
          ////response = JSON.parse(response);
          if(parseInt(response['msg'])){
            $("#add-interest-id").val(ids);
            $("#interest-available").text("Total express interest left: " + response['tRemain'] + " and daily express interest left:" +  response['dRemain']);
            $('#add-interest-modal').modal('toggle');
          }
          else{
            $("#invalid_alert_msg").text(response['status']);
            $('#invalid_alert').modal('toggle');
          }
        }
      });
    });

    $("#add-interest-send").click(function(event) {
      var ids = $("#add-interest-id").val();

      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": ids,
        "message": $('input[name=msg-text]:checked').val()
      };

      $.ajax({
        url: "{{ route('express_interest') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $('#add-interest-modal').modal('toggle');
          $("#invalid_alert_msg").text(response);
          $('#invalid_alert').modal('toggle');
        }
      });
    });


    /*  #################  Contact Details ################# */
    $(".add-contact").click(function(event) {
      var ids = $(this).attr("id");
      ids = parseInt(ids.substr(4));
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": ids
      };

      $.ajax({
        url: "{{ route('contact_details') }}",
        type: 'post',
        data: formData,
        success: function(response){
          ////response = JSON.parse(response);
          if(parseInt(response['msg'])){
            $("#bride_groom_contact").text(response['info']['mobile']);
            $("#gurdian_contact").text(response['info']['contact_mobile']);
            $("#present_address").text(response['info']['contact_present_address']);
            $("#permanent_address").text(response['info']['contact_permanent_address']);

            $('#modal_contact_details').modal('toggle');
            $("#contact-details-name").text("Contact Details of " + $("#name-"+ids).text());
            $("#remain-contact-details").text("You have " + response['available'] + " Direct Contact Info left");
          }
          else{
            $("#invalid_alert_msg").text(response['status']);
            $('#invalid_alert').modal('toggle');
          }
        }
      });
    });

    $(".send-message").click(function(event) {
      var ids = $(this).attr("id");
      ids = parseInt(ids.substr(4));
      $("#send-message-name").text("Send message to " + $("#name-"+ids).text());
      $("input[name='msgId']").val(ids);


      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content")
      };

      $.ajax({
        url: "{{ route('check_message_available') }}",
        type: 'post',
        data: formData,
        success: function(response){
          ////response = JSON.parse(response);
          if(parseInt(response['msg'])){
            $('#message_modal').modal('toggle');
            $('#message-available').text("Total message left: " + response['tRemain'] + " and Daily message left: " +  response['dRemain']);
          }
          else{
            $('#invalid_alert').modal('toggle');
            $('#invalid_alert_msg').text(response['status']);
          }
        }
      });
    });

    $("#send_a_message").click(function(event) {
      if($("input[name='title']").val() == ""){
        alert("Please write title");
        event.preventDefault();
        return;
      }
      if($("textarea[name='message']").val() == ""){
        alert("Please write your message");
        event.preventDefault();
        return;
      }

      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": $("input[name='msgId']").val(),
        "title": $("input[name='title']").val(),
        "message": $("textarea[name='message']").val()
      };

      $.ajax({
        url: "{{ route('send_message') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $('#message_modal').modal('hide');
          $("#valid_alert_msg").text(response);
          $('#valid_alert').modal('toggle');
          $("input[name='title']").val("");
          $("textarea[name='message']").val("");
          $("#alert-available").hide();
        }
      });
    });

    $(".add-favourite").click(function(event) {
      var ids = $(this).attr("id");
      ids = parseInt(ids.substr(4));
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": ids
      };

      $.ajax({
        url: "{{ route('add_favourites') }}",
        type: 'post',
        data: formData,
        success: function(response){
          ////response = JSON.parse(response);
          if(parseInt(response['msg'])){
            $("#valid_alert_msg").text(response['status']);
            $('#valid_alert').modal('toggle');
            $("#alert-available").show();
            $("#alert-available").text("You have " + response['available'] + " favourites left.");
          }
          else{
            $("#invalid_alert_msg").text(response['status']);
            $('#invalid_alert').modal('toggle');
          }
        }
      });
    });

    $(".add-like").click(function(event) {
      var ids = $(this).attr("id");
      ids = parseInt(ids.substr(4));
      var formData = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        "rid": ids
      };

      $.ajax({
        url: "{{ route('like_profile') }}",
        type: 'post',
        data: formData,
        success: function(response){
          $("#valid_alert_msg").text("Thank you for like this profile.");
          $('#valid_alert').modal('toggle');
          $("#alert-available").hide();
        }
      });
    });


    $(".message_limit_reach").click(function(event) {
      $("#invalid_alert_msg").text($(".message_limit_reach").attr("alt"));
      $('#invalid_alert').modal('toggle');
    });

  });

</script>


<!-- The Modal -->
<div class="modal fade" id="modal_contact_details">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" id="contact-details-name"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p id='remain-contact-details' class="alert alert-success"></p>
        <table class="table table-striped">
          <tr>
            <td width="40%">Contact Number: </td>
            <td id="bride_groom_contact"></td>
          </tr>
          <tr>
            <td>Gurdian Contact: </td>
            <td id="gurdian_contact"></td>
          </tr>
          <tr>
            <td>Present Address: </td>
            <td id="present_address"></td>
          </tr>
          <tr>
            <td>Permanent Address: </td>
            <td id="permanent_address"></td>
          </tr>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!-- Express Interest Modal -->
<div class="modal fade" id="add-interest-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="" action="index.html" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="send-message-name"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p class="alert alert-success" id="interest-available"></p>
          <input type="hidden" id="add-interest-id" >
          <div class="form-group">
            <input type="radio" name="msg-text" value="I like your profile and would like to communicate, let me know your interest at the earliest" checked>
            <small>I  like your profile and would like to communicate, let me know your interest at the earliest</small>
          </div>
          <div class="form-group">
            <input type="radio" name="msg-text" value="I am interested and serious about your profile. If you are interested, let me know your interest at the earliest">
            <small>
              I am interested and serious about your profile. If you are interested, let me know your interest at the earliest
            </small>
          </div>
          <div class="form-group">
            <input type="radio" name="msg-text" value="My family and I like your profile. we would like to take this foward with your parents/guardian.">
            <small>My family and I like your profile. we would like to take this foward with your parents/guardian.</small>
          </div>
          <div class="form-group">
            <input type="radio" name="msg-text" value="I have gone through your details and found your profile to be a good match. Please contact us to proceed further.">
            <small>I have gone through your details and found your profile to be a good match. Please contact us to proceed further.</small>
          </div>
          <div class="form-group">
            <input type="radio" name="msg-text" value="">
            <small>None(send interest without a message)</small>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" id="add-interest-send">Send Interest</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- The Message Modal -->
<div class="modal fade" id="message_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="" action="index.html" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="send-message-name"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <p class="alert alert-success" id="message-available"></p>
          <div class="form-group">
            <input type="hidden" name="msgId" >
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea required name="message" class="form-control" placeholder="Write your message here"></textarea>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-info" id="send_a_message">Send</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="valid_alert">
  <div class="modal-dialog" style="top: 25%">
    <div class="modal-content">
      <div class="modal-body">
        <i class="far fa-check-circle fa-3x"></i>
        <p id="valid_alert_msg" align="center"></p>
        <p class="alert alert-success" id="alert-available"></p>
        <br />
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="invalid_alert">
  <div class="modal-dialog" style="top: 25%">
    <div class="modal-content">
      <div class="modal-body">
        <i class="fas fa-exclamation-triangle fa-3x"></i>
        <p id="invalid_alert_msg" align="center"></p>

        <br />
      </div>
    </div>
  </div>
</div>



@endsection
