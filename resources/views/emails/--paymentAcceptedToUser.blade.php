<?php $me = Auth::user(); ?>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<body>-->
<!--<div style=" ">-->
<!--  <div style="text-align: justify;white-space: pre-line;line-height: 1.5; min-height: 300px;">-->
<!--  Hello {{$payment->user->email}},-->
<!--  Payment processing successfully completed.-->

<!--  <b>Payment Details:</b>-->

<!--  <b>User: </b> {{$payment->user->username}} ({{$payment->user->email}})-->
<!--  <b>Payment Status: <b/> Pending;-->
<!--  <b>Package: </b>{{ $payment->membership_package_id }} ({{$payment->package_title}}, Duration {{$payment->package_duration}} Days, {{$payment->package_currency}} {{$payment->package_amount}})-->
<!--  <b>Paid Amount: </b> {{$payment->paid_currency}} {{$payment->paid_amount}}-->
<!--  <b>Payment Method: </b>{{$payment->payment_method}}    -->
<!--  <b>Payment Details: </b> {{$payment->payment_details}}        -->
<!--  <b>Payment Update Time: </b> {{$payment->created_at}}-->
<!--  <b>New Expired Date: </b> {{date('d-M-Y', strtotime($payment->user->expired_at))}}-->

<!--  <a href="{{route('user.myPaymentHistory')}}">See Details</a>-->
 
 
<!--   </div>-->

<!-- <div style="background-color:#eee;padding: 5px;">-->
<!--  <p style="font-size: 20px;"><a style="color:#222;text-decoration: none;" href="{{url('/')}}">{{url('/')}}</a></p>-->
<!--  <p style="color:#222;">Copyright © {{date('Y')}} {{url('/')}} | All rights reserved. </p>-->
<!-- </div>-->
<!--</div>-->



<!--</body>-->
<!--</html>-->


<div class="main main-raiseds " style="z-index: 400;">
    <div class="section section-basic" style="min-height: 900px;">

        <div class="container">

            <div class="row">
                <div class="col-sm-3">

@if (Browser::isDesktop())
@include('user.includes.others.myLeftMenu')
@endif

                </div>
                <div class="col-sm-9">

                  

                    <div class="box box-widget mb-3">
                        <div class="box-body box-body-container" style="background: #eee;">

                            <div class="row">
                                <div class="col-sm-12">

                                    @include('alerts.alerts')

                                    <div class="box box-widget">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Upload Profile Picture</h3>
                                        </div>
                                        <div class="box-body">


                                            
                                            <div class="row">
                                                <div class="col-sm-6">

                                                    {{-- @include('user.photos.includes.profilePictureForUpdate') --}}

                                                    @include('user.photos.includes.profilePictureForUpdate2')

                                                    @if ($me->uploadedPP())
                                                         
                                                    
                                                    <br>

                                                    <img src="{{asset($me->userProfilePic)}}" alt="{{ $me->username }}" class="rounded img-bordered" width="160">

                                                    @endif

                                                    <div style="float: left;">
                                                        @if ($me->userProfilePics()->count())
                                                        @if($me->ppStatus() == 'Pending')
                                                        Profile Picture <span class="w3-text-red">Pending</span>
                                                        @elseif($me->ppStatus() == 'Checked')
                                                        Profile Picture <span class="w3-text-green">Checked</span>
                                                        @endif 

                                                        @endif

                                                        <br> <br>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-sm-6">
                                                    <ul>
                                                        <li>Upload Clear Photo.</li>
                                                        <li>Size: Maximum Width: 2000px; Maximum Height: 2000px</li>
                                                        <li>Size: Minimum Width: 160px; Minimum Height: 160px</li>
                                                        <li>Upload Best Looking Face photo.</li>
                                                        <li>Upload Complete Photo, Avoid partial photos.</li>
                                                        <li>Upload your real Photo, Don't use photos from other website.</li>

                                                        @if($me->atLeastOneCheckedPP())
                                                        <li>
                                                            <img class="img-bordered rounded mb-4" src="{{ asset($me->latestCheckedPP()) }}" style="width: 80px;" alt="{{ $me->username }}"> is currently live & checked Profile picture.
                                                        </li>
                                                        @endif
                                                    </ul>




                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                 
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    @include('user.photos.includes.uploadMyPublicPhotos')

                                </div>
                            </div>




                        </div>

                        {{-- overlay here --}}

                         <!-- Loading (remove the following to stop the loading)-->
            <div class="overlay my-loading-overlay" style="display: none;">
              <i class="fa fa-circle-o-notch w3-jumbo w3-text-red fa-spin" style="top: 20%;"></i>

            </div>
            <!-- end loading -->
                    </div>


@if (Browser::isDesktop())
@else
@include('welcome.includes.others.hotLineImage')
@include('welcome.includes.others.ourWebsiteVisitors')
<div class="w3-card-2">
<div class="box box-widget">         
<div class="box-body">
@include('welcome.includes.others.fbPageArea')
</div>
</div>
</div>
@endif


                </div>
            </div>


        </div>
    </div>
</div>
