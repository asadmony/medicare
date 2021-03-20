<!DOCTYPE html>
<html>
<body>
<div style="background-color:#F0F5FF;">
  <div style="background-color:#f44336;padding: 5px;">

   <p style="font-size:28px;color:#fff;">Proposal Sent to You | <a style="color:#fff;text-decoration: none;" href="{{url('/')}}">{{ env('APP_NAME_BIG') }}</a></p>
    
  </div>
  <div style="padding:10px;">
  <p>Dear {{$proposal->userSecond->name}}, <br> <br>
  A Proposal is sent to you. Please log in now and see the proposal and see the person who sent you the proposal.</p> 

  <hr>

  Proposal Message: {{ str_limit($proposal->message,120, '...') }}

  <br>


  Login Link: <a href="{{ url('/login') }}">Login</a>

  <br>

   </div>

 <div style="background-color:#f44336;padding: 5px;">
  <p style="font-size: 20px;"><a style="color:#fff;text-decoration: none;" href="{{url('/')}}">{{ env('APP_NAME_BIG') }}</a></p>
  <p style="color:#fff;">Copyright © {{date('Y')}} {{ env('APP_NAME_BIG') }} | All rights reserved. </p>
 </div>
</div>



</body>
</html>
