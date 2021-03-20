<!DOCTYPE html>
<html>
<body>
<div style="background-color:#F0F5FF;">
  <div style="background-color:#f44336;padding: 5px;">

   <p style="font-size:28px;color:#fff;">New Match | <a style="color:#fff;text-decoration: none;" href="{{url('/')}}">{{ env('APP_NAME_BIG') }}</a></p>

   
    
  </div>
  <div style="padding:10px;">
  <p>Dear {{ $email }}, <br> <br>
  Meet a few members matching your preference.</p> 

  <hr>

 





<div style="background-color:#FFFAF0;">
          <table style="width: 100%;border-collapse: collapse;border: 1px solid #dcdcdc;">
            <thead>
              <tr style="background-color:#778899;">
                <th style="border:1px solid #fff; height: 50px;color:#fff;text-align:center;">User</th>
                <th style="border:1px solid #fff; height: 50px;color:#fff;text-align:center;">Details</th>
                <th>CV / Bio Data</th>
              </tr>
            </thead>
            <tbody>
 

            @foreach ($users as $item)

                  <tr class="">
                  <td style="border:1px solid #dcdcdc; width:120px;">

                  <img src="{{$message->embed($item->latestCheckedPP())}}" alt="" width="110" height="110">
                  </td>
                  <td style="border:1px solid #dcdcdc; padding: 5px;">

                  <b>Name:</b> {{$item->name}} <br>
                  <b>Age, Gender:</b> {{ $item->age() }},   {{ $item->gender }}<br> 
                  <b>Religion/Community:</b> {{ $item->religion }}<br> 
                  @if($pi = $item->personalInfo)
                  @if ($pi->district)                    
                  <b>District:</b> {{ $pi->district }},
                  @endif
                  @if ($pi->my_profession)
                    <b>Profession: </b> {{ $pi->my_profession }},
                  @endif
                  @if ($pi->education_level)
                  <b>Education Level:</b> {{ $pi->education_level }},
                  @endif
                  @if ($pi->marital_status)
                    <b>Marital Status:</b> {{ $pi->marital_status }} 
                  @endif
                    <br>
                  @endif


                  <a style="color:#333;" href="{{url('/', $item->username)}}">Click to See Details</a>
                  </td>
                  <td>

                    
                  </td>
                   
                  </tr>

                  

            @endforeach
            </tbody>
 
          </table>
        </div>



   </div>

 <div style="background-color:#f44336;padding: 5px;">
  <p style="font-size: 20px;"><a style="color:#fff;text-decoration: none;" href="{{url('/')}}">{{ env('APP_NAME_BIG') }}</a></p>
  <p style="color:#fff;">Copyright © {{date('Y')}} {{ env('APP_NAME_BIG') }} | All rights reserved. </p>
 </div>
</div>



</body>
</html>
