<!DOCTYPE html>
<html>
<body>
<div style=" ">
  <div style="text-align: justify;white-space: pre-line;line-height: 1.5; min-height: 300px;">
  Hello info@bdambulance.com,
  New Searching Data for Ambulance Submitted.

  Login link {{url('/login')}}

  From: {{$rentCar->from}} - To: {{$rentCar->to}}
  Amb. Type: {{$rentCar->carType->car_type}}
  Price: {{$rentCar->price}}Tk
  Name: {{$rentCar->name}}
  Mobile: {{$rentCar->mobile}}
  Description: {{$rentCar->comment}}
   
 
   </div>

 <div style="background-color:#eee;padding: 5px;">
  <p style="font-size: 20px;"><a style="color:#222;text-decoration: none;" href="{{url('/')}}">bdambulance.com</a></p>
  <p style="color:#222;">Copyright © 2014 - {{date('Y')}} bdambulance.com | All rights reserved. </p>
 </div>
</div>



</body>
</html>
