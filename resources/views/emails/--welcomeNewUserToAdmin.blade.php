<!DOCTYPE html>
<html>
<body>
<div style=" ">
  <div style="text-align: justify;white-space: pre-line;line-height: 1.5; min-height: 300px;">
  Hello Admin,
  New user registration has been completed.

  <b>User Details:</b>

  <b>ID: </b> {{ $user->id }} <br>
  <b>Name: </b> {{$user->name}} <br>
  <b>Username: </b> {{$user->username}} <br>
  <b>Mobile: </b> {{ $user->mobile }} <br>
  <b>Guardian Mobile: </b> {{ $user->guardian_mobile }} <br>
  <b>Email: </b> {{$user->email}} <br>
  <b>Age: </b> {{ $user->age() }} <br>
  <b>Package: </b> {{$user->package}} <br>
  <b>Expire Date:</b> {{$user->expired_at}} <br>
  <b>Validity (Days): </b> {{ $user->packageDuration() }}

  <b>Gender: </b> {{$user->gender}} <br>
  <b>Date of Birth: </b> {{$user->dob}} <br>                     
  <b>Country: </b>   
  @if($user->country == 'Other' || $user->country == 'Others')
  {{$user->country_other}}
  @else
  {{$user->country}}
  @endif
  <br>  

  <b>Profile Created By: </b> {{$user->profile_created_by}} <br>
  <b>Looking For: </b> {{$user->looking_for}} <br>
  <b>Religion: </b> {{$user->religion}} <br>
  <b>Social Order: </b> {{ $user->social_order }} <br>
  <b>Profile Created at: </b> {{ date('d-M-Y', strtotime($user->created_at)) }} ({{ $user->created_at->diffForHumans() }}) 

  
  <a href="{{url('/', $user->username)}}">See Details</a>
 
   </div>

 <div style="background-color:#eee;padding: 5px;">
  <p style="font-size: 20px;"><a style="color:#222;text-decoration: none;" href="{{url('/')}}">{{url('/')}}</a></p>
  <p style="color:#222;">Copyright © {{date('Y')}} {{url('/')}} | All rights reserved. </p>
 </div>
</div>



</body>
</html>
