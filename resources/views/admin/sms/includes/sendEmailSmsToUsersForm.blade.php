<div class="box box-widget">
  <div class="box-header with-border">
   <h3 class="box-title">
    Send Email/Sms to Users
  </h3>
</div>

<form method="post" action="{{route('admin.sendEmailSmsToUsersPost')}}" enctype="multipart/form-data">
  <div class="box-body" style="background-color: #ccc;">
    <div class="row">
     <div class="col-md-12">

      <div class="box box-widget">
        <div class="box-body">

         {{csrf_field()}}


<div class="form-group {{ $errors->has('message_to_users') ? ' has-error' : '' }}">
        <label for="message_to_users" class="control-label">Message</label>

        <textarea  name="message_to_users" class="form-control" rows="5" id="message_to_users" placeholder="Write Message">{!! old('message_to_users') ?: $post->message_to_users !!}</textarea>

        @if ($errors->has('message_to_users'))
        <span class="help-block">
         <strong>{{ $errors->first('message_to_users') }}</strong>
       </span>
       @endif
     </div>

     <div class="form-group {{ $errors->has('send_to') ? ' has-error' : '' }}">
        <label for="send_to" class="control-label">Send to</label>

        <label class="radio-inline">
      <input type="radio" name="send_to" value="incomplete_users" checked>Incomplete Profile Users
    </label>
    <label class="radio-inline">
      <input type="radio" name="send_to" value="all_users">All (Active) Users
    </label>

    <label class="radio-inline">
      <input type="radio" name="send_to" value="completed_users">Completed Profile Users
    </label>

    <label class="radio-inline">
      <input type="radio" name="send_to" value="no_login_thirty_days">Users No Login 30 days
    </label>




    <label class="radio-inline">
      <input type="radio" name="send_to" value="free_users">Free Users
    </label>

    <label class="radio-inline">
      <input type="radio" name="send_to" value="paid_members">Paid Members
    </label>

    <label class="radio-inline">
      <input type="radio" name="send_to" value="deactivate_users">Deactivated Users
    </label>

    

        @if ($errors->has('send_to'))
        <span class="help-block">
         <strong>{{ $errors->first('send_to') }}</strong>
       </span>
       @endif
     </div>


     <div class="form-group {{ $errors->has('send_type') ? ' has-error' : '' }}">
        <label for="send_type" class="control-label">Type</label>


        <label class="radio-inline">
      <input type="radio" name="send_type" checked value="sms">SMS
    </label>

        <label class="radio-inline">
      <input type="radio" name="send_type" value="email" >Email
    </label>
    

    <label class="radio-inline">
      <input type="radio" name="send_type" value="email_sms">Email & SMS
    </label>

        @if ($errors->has('send_type'))
        <span class="help-block">
         <strong>{{ $errors->first('send_type') }}</strong>
       </span>
       @endif
     </div>

  
  </div>






</div>




</div>
</div>

</div>

<div class="box-footer">
  <button type="submit" class="btn btn-primary pull-right">Send</button>
</div>
</form>
</div>