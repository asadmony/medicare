<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Print User Details of {{$user->name}} ({{$user->email}})</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('cp/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cp/dist/css/AdminLTE.min.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic')}}">

  <style type="text/css">
    .table-condensed>tbody>tr>td, 
    .table-condensed>tbody>tr>th, 
    .table-condensed>tfoot>tr>td, 
    .table-condensed>tfoot>tr>th, 
    .table-condensed>thead>tr>td, 
    .table-condensed>thead>tr>th 
    {
      padding: 0px !important;
    }
  </style>
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> {{env('APP_NAME_BIG')}}
          <small class="pull-right">Date: {{date('d/m/Y')}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-8 invoice-col">

        <div class="panel panel-default" style="margin-bottom: 4px;">
          <div class="panel-body" style="padding: 5px;">
            <u><b>User Information</b></u>
        <address style="margin-bottom: 0;">
          <strong>{{$user->email}}</strong><br>
          <b>ID: </b> {{$user->id}}, <b>Username: </b> {{$user->username}}
        </address>
          </div>
        </div>
        
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
 
        <img class="img-responsive" src="{{asset($user->userProfilePic)}}" alt="{{ $user->username }}" width="90" />      
 
      </div>
      <!-- /.col -->
      <!-- <div class="col-sm-4 invoice-col">
        <b>Invoice #007612</b><br>
        <br>
        <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567
      </div> -->
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-6">

          <b>Basic</b> 
          <hr style="margin: 0;padding: 0;">

            <b>ID: </b> {{ $user->id }} <br>
                <b>Name: </b> {{$user->name}} <br>
                <b>Username: </b> {{$user->username}} <br>
                <b>Email: </b> {{$user->email}} <br>
                <b>Gender: </b> {{$user->gender}} <br>
                <b>Location: </b> {{$user->location}} <br>
                <b>Country: </b>   
                @if($user->country == 'Other' || $user->country == 'Others')
                {{$user->country_other}}
                @else
                {{$user->country}}
                @endif
                <br>
                <b>Reason For Reg: </b> {{$user->reason_for_register}} <br>
                <b>Knew About Company: </b> {{$user->hear_about_us}} <br>
                <b>Headline: </b> {{ $user->about? $user->about->headline : '' }} <br>
                <b>About: </b> {{ $user->about? $user->about->about_me : '' }} <br>
                <b>Looking For: </b> {{$user->looking_for}} <br>
                <b>Date of Birth: </b> {{$user->dob}} <br>
                <b>Package: </b> {{$user->package}} <br>
                <b>Expire Date:</b> 
                @if($user->expired_at)
                {{date('d-M-Y', strtotime($user->expired_at))}}
                @endif
                <br>
                <br>


                <b>Personal Info</b> 
          <hr style="margin: 0;padding: 0;">

              <b>Citizenship: </b>
              @if($user->personalInfo)
              @if($user->personalInfo->citizenship == 'Other' || $user->personalInfo->citizenship == 'Others')
              {{$user->personalInfo->citizenship_other}}
              @else
              {{$user->personalInfo->citizenship}}
              @endif
              @endif

              <br>
              <b>Birth Place: </b> {{ $user->personalInfo ? $user->personalInfo->birth_place : ''}} <br>
              <b>Income: </b> {{ $user->personalInfo ? $user->personalInfo->income : ''}} <br>
              <b>Going To Mary: </b> {{ $user->personalInfo ? $user->personalInfo->going_to_marry : ''}} <br>
              <b>Marital Status: </b> {{ $user->personalInfo ? $user->personalInfo->marital_status : ''}} <br>
              <b>Like to have Children: </b> {{ $user->personalInfo ? $user->personalInfo->like_to_have_children : ''}} <br>
              <b>Have Children: </b> {{ $user->personalInfo ? $user->personalInfo->do_u_have_children : ''}} <br>
              <b>Living With: </b>  
              @if($user->personalInfo)
              @if($user->personalInfo->living_with == 'Other' || $user->personalInfo->living_with == 'Others')
              {{$user->personalInfo->living_with_other}}
              @else
              {{$user->personalInfo->living_with}}
              @endif
              @endif 
              <br>
              <b>Height: </b> {{ $user->personalInfo ? $user->personalInfo->height : ''}} <br>
              <b>Body Build: </b> {{ $user->personalInfo ? $user->personalInfo->body_build : ''}} <br>
              <b>Hair Color: </b> 
              @if($user->personalInfo)
              @if($user->personalInfo->hair_color == 'Other' || $user->personalInfo->hair_color == 'Others')
              {{$user->personalInfo->hair_color_other}}
              @else
              {{$user->personalInfo->hair_color}}
              @endif
              @endif
              <br>
              <b>Eye Color: </b> 
              @if($user->personalInfo)
              @if($user->personalInfo->eye_color == 'Other' || $user->personalInfo->eye_color == 'Others')
              {{$user->personalInfo->eye_color_other}}
              @else
              {{$user->personalInfo->eye_color}}
              @endif
              @endif
              <br>
              <b>Skin Color: </b> 
              @if($user->personalInfo)
              @if($user->personalInfo->skin_color == 'Other' || $user->personalInfo->skin_color == 'Others')
              {{$user->personalInfo->skin_color_other}}
              @else
              {{$user->personalInfo->skin_color}}
              @endif
              @endif
              <br>
              <b>Dress Up: </b> 
              @if($user->personalInfo)
              @if($user->personalInfo->dress_up == 'Other' || $user->personalInfo->dress_up == 'Others')
              {{$user->personalInfo->dress_up_other}}
              @else
              {{$user->personalInfo->dress_up}}
              @endif 
              @endif
              <br>
              <b>Smoke Status: </b> {{ $user->personalInfo ? $user->personalInfo->smoke_status : ''}} <br>
              <b>Disability Status: </b> 
              @if($user->personalInfo)
              @if($user->personalInfo->disabilities_status == 'Other' || $user->personalInfo->disabilities_status == 'Others')
              {{$user->personalInfo->disabilities_status_other}}
              @else
              {{$user->personalInfo->disabilities_status}}
              @endif
              @endif
              <br>
              <b>Siblings: </b> 
              @if($user->personalInfo)
              @if($user->personalInfo->how_many_siblings == 'Other' || $user->personalInfo->how_many_siblings == 'Others')
              {{$user->personalInfo->how_many_siblings_other}}
              @else
              {{$user->personalInfo->how_many_siblings}}
              @endif
              @endif
              <br>
              <b>Alcohol Status: </b> {{ $user->personalInfo ? $user->personalInfo->alcohol_status : ''}} <br>
              <b>Blood Group: </b> {{ $user->personalInfo ? $user->personalInfo->blood_group : ''}} 


            
 



      </div>
      <!-- /.col -->

      <div class="col-xs-6">

        <b>Info for Office</b> 
          <hr style="margin: 0;padding: 0;">

          <b>First Name: </b> {{ $user->infoForOffice ? $user->infoForOffice->first_name : ''}} <br>
                                    <b>Last Name: </b> {{ $user->infoForOffice ? $user->infoForOffice->last_name : ''}} <br>
                                    <b>Mobile: </b> {{ $user->infoForOffice ? $user->infoForOffice->mobile : ''}} <br>
                                    <b>Phone: </b> {{ $user->infoForOffice ? $user->infoForOffice->phone : ''}} <br>
                                    <b>Date Of Birth: </b> {{ $user->infoForOffice ? $user->infoForOffice->dob : ''}} <br>
                                    <b>NID: </b> {{ $user->infoForOffice ? $user->infoForOffice->nid_number : ''}} <br>
                                    <b>Passport: </b> {{ $user->infoForOffice ? $user->infoForOffice->passport_number : ''}} <br>
                                    <b>Present Address: </b> {{ $user->infoForOffice ? $user->infoForOffice->present_address : ''}} <br>
                                    <b>Permanent Address: </b> {{ $user->infoForOffice ? $user->infoForOffice->permanent_address : ''}} <br>
                                    <b>Office Address: </b> {{ $user->infoForOffice ? $user->infoForOffice->office_address : ''}} <br>
                                    <b>Father's Name: </b> {{ $user->infoForOffice ? $user->infoForOffice->father_name : ''}} <br>
                                    <b>Father's Contact: </b> {{ $user->infoForOffice ? $user->infoForOffice->father_contact : ''}} <br>
                                    <b>Mother's Name: </b> {{ $user->infoForOffice ? $user->infoForOffice->mother_name : ''}} <br>
                                    <b>Mother's Contact: </b> {{ $user->infoForOffice ? $user->infoForOffice->mother_contact : ''}} <br>
                                    <br>

                      <b>Education Work Religion</b> 
          <hr style="margin: 0;padding: 0;">

                <b>Education Level: </b> 
                @if($user->educationWork)
                @if($user->educationWork->my_profession == 'Other' || $user->educationWork->my_profession == 'Others')
                {{$user->educationWork->education_level_other}}
                @else
                {{$user->educationWork->education_level}}
                @endif
                @endif

                <br>
                <b>Subject Studied: </b> {{ $user->educationWork ? $user->educationWork->subject_studied :''}}<br>
                <b>Job Title: </b> {{ $user->educationWork ? $user->educationWork->job_title :''}}<br>
                <b>Profession: </b> 
                @if($user->educationWork)
                @if($user->educationWork->my_profession == 'Other' || $user->educationWork->my_profession == 'Others')
                {{$user->educationWork->my_profession_other}}
                @else
                {{$user->educationWork->my_profession}}
                @endif
                @endif

                <br>
                <b>First Language: </b> {{ $user->educationWork ? $user->educationWork->first_language :''}}<br>
                <b>Second Language: </b> {{ $user->educationWork ? $user->educationWork->second_language :''}}<br>
                <b>Religious Status: </b> {{ $user->religion? $user->religion->religious_status : ''}} <br>
                <b>Religious Section: </b> {{ $user->religion? $user->religion->religious_section : ''}} <br>
                <b>Prefer Hijab: </b> {{ $user->religion? $user->religion->prefer_hijab : ''}} <br>
                <b>Prefer Beard: </b> {{ $user->religion? $user->religion->prefer_beard : ''}} <br>
                <b>Are you revert?: </b> {{ $user->religion? $user->religion->are_you_revert : ''}} <br>
                <b>Sala Status: </b> {{ $user->religion? $user->religion->salah_status : ''}} <br>
                <b>Can Read Quran?: </b> {{ $user->religion? $user->religion->can_read_quran : ''}} <br>
 
         

         

      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
