@extends('admin.layouts.adminMaster')

@push('css')

<style>
   tr.nowrap td {
        white-space:nowrap;
    }
</style>
@endpush

@section('content')
  <section class="content">

    <br>

     <div class="row">
      
      <div class="col-sm-12">

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              
              <span class="badge badge-default">Macid: {{ $product->macid }},Type: {{ucfirst($product->type)}} Title: {{ $product->title }} ({{ $sd->updated_at }})</span>

            </h3>
          </div>
          <div class="card-body" style="background: #f7f7f7;">


             <div class="table-responsive">
          

          <table class="table table-hover table-sm table-bordered table-striped">

            <thead>
              <tr>
                <th colspan="" rowspan="" headers="" scope="">SL</th>
                <th colspan="" rowspan="" headers="" scope="">LastUpdated</th>
                <th colspan="" rowspan="" headers="" scope="">Region</th>
                <th colspan="" rowspan="" headers="" scope="">Zone</th>
                <th colspan="" rowspan="" headers="" scope="">Cluster</th>
                <th colspan="" rowspan="" headers="" scope="">SiteId</th>
                <th colspan="" rowspan="" headers="" scope="">SiteName</th>
                <th>Active SIM (CCID)</th>



              </tr>
            </thead>

            <tbody class="w3-small"> 

              
                <tr class="nowrap">
                  
                  <td>
                    {{ $sd->id }}
                  </td>
                  @if ($sd->productRectData)
                      <td>
                      {!!date('Y-m-d h:i:s',strtotime($sd->productRectData->acSettingUpdateTime))!!}
                      </td>
                  @else
                  <td>
                    {!!date('Y-m-d h:i:s',strtotime($sd->updated_at))!!}

                  </td>
                  @endif
                  <td>{{ $sd->product->region }}</td>

                  <td>{{ $sd->product->zone }}</td>

                  <td>{{ $sd->product->cluster }}</td>


                  <td>{{ $sd->macid }}</td>

                  <td>{{ $sd->productData->title }}</td>
                  <td>{{ $sd->product->iccid }}</td>
                  
                  

                </tr>


              
            </tbody>

          </table>


        </div>
        <div class="row">
          

          <div class="col-md-3">
            

            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                   <div id="div1" class="fa w3-large "></div> &nbsp; Basic Information
                </h3>
              </div>
              <div class="card-body p-1">
                <table class="table table-striped table-sm table-hover w3-small table-bordered">
                  <tbody>
                  <tr><th>Site ID</th> <td>{{$sd->macid}}</td></tr>
                    <tr><th>Site Name</th><td>{{ $sd->productData->title }}</td></tr>
                  <tr><th>Zone</th> <td>{{$sd->productLocationData ? $sd->productLocationData->zone : ''}}</td></tr>
                    <tr><th>Region</th> <td>  {{$sd->productLocationData ? $sd->productLocationData->region : ''}} </td></tr>
                  <tr><th>Lat</th> <td>  {{$sd->productLocationData ? $sd->productLocationData->lat : ''}} </td></tr>
                    <tr><th>Lng</th> <td>  {{$sd->productLocationData ? $sd->productLocationData->lng : ''}} </td></tr>
                    <tr><th>Location</th> <td>  {{$sd->productLocationData ? $sd->productLocationData->location : ''}} </td></tr>

                  </tbody>
                </table>

              </div>
            </div>

            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                   <div id="div1" class="fa w3-large "></div> &nbsp; Device Information
                </h3>
              </div>
              <div class="card-body p-1">
                
                <table class="table table-striped table-sm table-hover w3-small table-bordered">
                  <tbody>
                  
                  <tr><th>Device Name</th> <td>{{$sd->productData->title}}</td></tr>
                    
                    <tr><th>Device ID/EMEI</th> <td>{{$sd->macid}}</td></tr>
                  <tr><th>Device Plate Number</th> <td>{{$sd->productData->platenumber}}</td></tr>
                
                  </tbody>
                </table>

              </div>
            </div>
            @if($product->type == "rectifier")
            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                  Alarms
                </h3>
              </div>
              <div class="card-body p-1" style="transform: translate(0,0); height: 200px; overflow: auto;
                padding: 10px;">

              <table>
                <thead>
                  <tr>
                    <th class="w3-center">Date</th>
                    
                    <th class="w3-center">Alarm Details</th>
                    {{-- <th class="w3-center"></th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach($alarmData as $ad)
                  <tr>
      
                    <td class="w3-center">{!! date("Y-m-d h:i:s",$ad->send_time/1000) !!}</td>
  
                  {{-- <td class="w3-center">{{$ad->type_id}}</td> --}}
                  <td class="pl-4 pr-4">
                    @if ($ad->type_id ==2)
                        Outgoing Fence Alarm
                    @elseif ($ad->type_id ==4)
                        Enter Fence Alarm
                    @elseif ($ad->type_id ==5)
                        Power Failure Alarm
                    @elseif ($ad->type_id ==8)
                      Low Battry Alarm
                    @elseif ($ad->type_id ==9)
                      Vibration Alarm
                    @elseif ($ad->type_id ==10)
                      Motion Alarm
                    @elseif ($ad->type_id ==32)
                      The Bluetooth Module
                    @elseif ($ad->type_id ==37)
                      Offline Alarm
                    @elseif ($ad->type_id ==55)
                      Power On
                    @elseif ($ad->type_id ==67)

                      Loss Connection Alarm

                    @else
                      -
                        
                    @endif
                  </td>
                  {{-- <td class="w3-center">
                    <a href="{{route('company.hideValue',['company'=>'1', $ad->id])}}" class="btn btn-xs btn-default">Hide</a>
                  </td> --}}

                  </tr>
                  @endforeach
                </tbody>
              </table>            

              </div>
            </div>
            @endif

            

          </div>
          @if($product->type == 'battery')
          <div class="col-md-5">
            

            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-th"></i> Cell Information
                </h3>
              </div>
              <div class="card-body p-1" style="min-height: 150px;">

                {{-- <div class="battery-container">
                  <div class="battery">
                    <div class="part"></div>
                  </div>
                </div> --}}

                {{-- <style>

                .battery-container {
                  /*height: 350px;
                  width: 350px;*/
                  position: relative;
                }
                .battery-container * {
                  position: absolute;
                }

                .battery {
                  top: 45px;
                  left: 50%;
                  transform: translate(-50%, -50%);
                  height: 85px;
                  width: 190px;
                  border: 5px solid #ddd;
                  border-radius: 7px;
                  padding: 5px;
                }
                .battery::before {
                  content: '';
                  position: absolute;
                  height: 30px;
                  width: 10px;
                  background: #ddd;
                  left: 188px;
                  top: 50%;
                  transform: translateY(-50%);
                  border-radius: 0 3px 3px 0;
                }
                .part {
                  background: #0F0;
                  top: 5px;
                  left: 5px;
                  bottom: 5px;
                  
                  animation: 7s animate 1s infinite;

                  border-radius: 3px;
                }

                @keyframes animate {

                
                  0% {
                    width: 0%;
                    background: #F00;
                  }

                  @if($sd->productData->BatteryA == 0)
                  50% {
                    width: 48%;
                    background:orange;
                  }

                  @endif

                  @if($sd->productData->BatteryA > 0)
                  50% {
                    width: 48%;
                    background:orange;
                  }

                  100% {
                    width: 95%;
                    background: #0F0;
                  }

                  @endif


                }
                </style> --}}

            <table class="table table-striped table-sm table-hover w3-small table-bordered">
              <tbody>
                <tr><th>Cell 1</th><td>{{ $sd->productData->BetteryV_1 }}</td> <th>Cell 2</th><td>{{ $sd->productData->BetteryV_2 }}</td> <th>Cell 3</th><td>{{ $sd->productData->BetteryV_3 }}</td></tr>
                
                
                <tr><th>Cell 4</th><td>{{ $sd->productData->BetteryV_4 }}</td><th>Cell 5</th><td>{{ $sd->productData->BetteryV_5 }}</td><th>Cell 6</th><td>{{ $sd->productData->BetteryV_6 }}</td></tr>
              
                <tr><th>Cell 7</th><td>{{ $sd->productData->BetteryV_7 }}</td><th>Cell 8</th><td>{{ $sd->productData->BetteryV_8 }}</td><th>Cell 9</th><td>{{ $sd->productData->BetteryV_9 }}</td></tr>
              
                <tr><th>Cell 10</th><td>{{ $sd->productData->BetteryV_10 }}</td><th>Cell 11</th><td>{{ $sd->productData->BetteryV_11 }}</td><th>Cell 12</th><td>{{ $sd->productData->BetteryV_12 }}</td></tr>

                <tr><th>Cell 13</th><td>{{ $sd->productData->BetteryV_13 }}</td><th>Cell 14</th><td>{{ $sd->productData->BetteryV_14 }}</td><th>Cell 15</th><td>{{ $sd->productData->BetteryV_15 }}</td></tr>

              </tbody>
            </table>

                  

                            

                </div>
              </div>


              <div class="card card-widget">
                <div class="card-header">
                  <h3 class="card-title">
                    Alarms
                  </h3>
                </div>
                <div class="card-body p-1" style="transform: translate(0,0); height: 200px; overflow: auto;
                      padding: 10px;">

                <table>
                  <thead>
                    <tr>
                      <th class="w3-center">Date</th>
                      
                      <th class="w3-center">Alarm Details</th>
                      <th class="w3-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($alarmData as $ad)
                    <tr>
        
                      <td class="w3-center">{!! date("Y-m-d h:i:s",$ad->send_time/1000) !!}</td>
    
                    {{-- <td class="w3-center">{{$ad->type_id}}</td> --}}
                    <td class="pl-4 pr-4">
                      @if ($ad->type_id ==2)
                          Outgoing Fence Alarm
                      @elseif ($ad->type_id ==4)
                          Enter Fence Alarm
                      @elseif ($ad->type_id ==5)
                          Power Failure Alarm
                      @elseif ($ad->type_id ==8)
                        Low Battry Alarm
                      @elseif ($ad->type_id ==9)
                        Vibration Alarm
                      @elseif ($ad->type_id ==10)
                        Motion Alarm
                      @elseif ($ad->type_id ==32)
                        The Bluetooth Module
                      @elseif ($ad->type_id ==37)
                        Offline Alarm
                      @elseif ($ad->type_id ==55)
                        Power On
                      @elseif ($ad->type_id ==67)

                        Loss Connection Alarm

                      @else
                        -
                          
                      @endif
                    </td>
                    <td class="w3-center">
                      <a class="btn btn-xs btn-default">Hide</a>
                    </td>

                    </tr>
                    @endforeach
                  </tbody>
                </table>            

                </div>
              </div>

          </div>
          <div class="col-md-4">           

            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-list"></i> BMS State
                </h3>
              </div>

              <div class="card-body">
                <table class="table table-striped table-sm table-hover w3-small table-bordered">
                  <tbody>
                    <tr><th>Status</th> <td>
                      @if($sd->productData->BetteryA ==0)
                      <span class="badge badge-warning">Idle</span>
                      @elseif($sd->productData->BatteryA <0)
                      <span class="badge badge-danger">Discharging</span>
                      @else
                      <span class="badge badge-success">Charging</span>
                      @endif
                    </td></tr>
                  <tr><th>Tracking</th> <td></td></tr>
                      <tr><th>Battery A</th> <td>{{$sd->productData->BetteryA}}</td></tr>
                      <tr><th>Battery V</th> <td>{{$sd->productData->BetteryV_All}}</td></tr>
                      <tr><th>Battery Cycle</th> <td>{{$sd->productData->BXHC}}</td></tr>
                      <tr><th>Battery Charging</th> <td>
                      @if($sd->productData->BetteryA>0)
                      <span class="badge badge-success">Charging...</span>
                      @endif  
                      </td></tr>
                      <tr><th>Battery Discharging</th> <td>
                        @if($sd->productData->BetteryA<0)
                        <span class="badge badge-success">Discharging...</span>
                        @endif    
                      </td></tr>
                      <tr><th>Remaining Capacity</th> <td>{{ $sd->productData->RemainingCapacity }} mAH</td></tr>
                      <tr><th>Full Capacity</th> <td>{{ $sd->productData->FullCapacity }} mAH</td></tr>
                      <tr><th>Design Capacity</th> <td>{{ $sd->productData->DesignCapacity }} mAH</td></tr>
                      <tr><th>MOS Temp</th> <td>{{ $sd->productData->MosTemperature }} °C</td></tr>
                      <tr><th>ENV Temp</th> <td>{{ $sd->productData->EnvironmentTemperature }} °C</td></tr>
                      <tr><th>Version</th> <td>{{ $sd->productData->Version }} </td></tr>
                      <tr><th>BMS SN</th> <td>{{ $sd->productData->BMS_SN }} </td></tr>
                      <tr><th>BMS Model</th> <td> </td></tr>
                      <tr><th>Pack SN</th> <td>{{ $sd->productData->Pack_SN }}</td></tr>
                      <tr><th>SOH</th> <td>{{ $sd->productData->SOH }}%</td></tr>
                      <tr><th>SOC</th> <td>{{ $sd->productData->SOC }}%</td></tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @elseif($product->type == 'rectifier')
          
          <div class="col-md-5">

            @if($rect = $sd->productRectData)
            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-th"></i> System Information
                </h3>
                <table class="w3-table">
                  <tr>
                    <th></th>
                    <th style="width: 40%;">Ac Information</th>
                    <th></th>
                  </tr>
                </table>
                <table class="table table-striped table-sm table-hover w3-small table-bordered">
                  <tr>
                    <th>Refresh Time</th><td>
                      
                      {!!date('Y-m-d h:i:s',strtotime($rect->acUpdateTime))!!}
                    </td>
                </tr>

                <tr>

                
                    <th>AC</th>
                    <td>
                      @if($i1 = $rect->productRectitems()->first())
                      AC.1: {{$i1->acInLineAV}} / {{$i1->acInLineBV}} / {{$i1->acInLineCV}} V
                      @endif
                    </td>
                  </tr>
                  
                </table>
                <table class="w3-table">
                  <tr class="nowrap">
                    <th style="width: 30%"></th>
                    <th style="width: 90%;" >Rectifier Information</th>
                    <th></th>
                  </tr>
                </table>
                <table class="table table-striped table-sm table-hover w3-small table-bordered">
                  <tr>
                    <th>Refresh Time</th>
                    <td>{!!date('Y-m-d h:i:s',strtotime($rect->rectifierUpdateTime))!!}</td>
                  </tr>
                    <tr>
                      <th>Con.Name</th>
                      <td>{{$rect->DeviceType}}</td>
                    </tr>
                    <tr>
                      <th>Con.Version</th>
                      <td>{{$rect->Version}}</td>
                    </tr>
                </table>
                <table class="w3-table">
                  <tr class="nowrap">
                    <th style="width: 30%"></th>
                    <th style="width: 90%;" >DC Information</th>
                    <th></th>
                  </tr>
                </table>
                <div class="w3-responsive">
                  <table class="table table-striped table-sm table-hover w3-small table-bordered">
                    <tr>
                      <th>Refresh Time</th>
                      <td>{!!date('Y-m-d h:i:s',strtotime($rect->acUpdateTime))!!}</td> 
                    </tr>
                    <tr>
                      <th>BUS Volt</th>
                      <td>{{$rect->dcOutVolt}}</td> 
                    </tr>
                    <tr>
                      <th>Load Curr</th>
                      <td>{{$rect->dcTotalLoad}}</td> 
                    </tr>
                    <tr>
                      <th>Batt1Curr:</th>
                      <td>
                        @if($ib1cap = $rect->productRectitems()->where('comment', 'Batt1Curr')->first())
                        {{$ib1cap->array_value}} A
                        @endif  
                      </td> 
                    </tr>
                    <tr>
                      <th>Batt1Cap</th>
                      <td>
                        @if($ib1cap = $rect->productRectitems()->where('comment', 'Batt1Cap')->first())
                          {{$ib1cap->array_value}} %
                        @endif
                      </td> 
                    </tr>
                    <tr>
                      <th>Temp1</th>
                      <td>
                        @if($ib1cap = $rect->productRectitems()->where('comment', 'Temp1')->first())
                        {{$ib1cap->array_value}} °C
                        @endif  
                      </td> 
                    </tr>
                    <tr>
                      <th>Temp2</th>
                      <td>@if($ib1cap = $rect->productRectitems()->where('comment', 'Temp2')->first())
                        {{$ib1cap->array_value}} °C
                        @endif </td> 
                    </tr>
                    <tr>
                      <th>Temp3</th>
                      <td>@if($ib1cap = $rect->productRectitems()->where('comment', 'Temp3')->first())
                        {{$ib1cap->array_value}} °C
                        @endif </td> 
                    </tr>
                    <tr>
                      <th>Temp4</th>
                      <td>@if($ib1cap = $rect->productRectitems()->where('comment', 'Temp4')->first())
                        {{$ib1cap->array_value}} °C
                        @endif </td> 
                    </tr>
                  </table>
                </div>
                
              </div>

            </div>
            @endif
          </div>
          <div class="col-md-4">
            

            <div class="card card-widget">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fa fa-list"></i> AC&DC Informations
                </h3>
              </div>

              <div class="card-body">


              <table class="w3-table">
                <tr class="nowrap">
                  <th style="width: 30%"></th>
                  <th style="width: 90%;" >AC Setting View</th>
                  <th></th>
                </tr>
              </table>
              <table class="table table-striped table-sm table-hover w3-small table-bordered">
                <tbody>
                  <tr>
                    <th>Refresh Time:</th>
                    <td>{!!date('Y-m-d h:i:s',strtotime($rect->acSettingUpdateTime))!!}</td>
                  </tr>
                  <tr>
                    <th>AC OverVolt</th>
                    <td>{{$rect->acInPowVTL}}</td>
                  </tr>
                  <tr>
                    <th>AC LowVolt</th>
                    <td>{{$rect->acInPowVBL}}</td>
                  </tr><tr>
                    <th>AC LostPH</th>
                    <td>{{$rect->acInPowVLL}}</td>
                  </tr>
                </tbody>
              </table>

              <table class="w3-table">
                <tr class="nowrap">
                  <th style="width: 30%"></th>
                  <th style="width: 90%;" >DC Setting View</th>
                  <th></th>
                </tr>
              </table>
              <table class="table table-striped table-sm table-hover w3-small table-bordered">
                <tbody>
                  <tr>
                    <th>Refresh Time</th>
                    <td>{!!date('Y-m-d h:i:s',strtotime($rect->acSettingUpdateTime))!!}</td>
                  </tr>
                  <tr>
                    <th>DC OverVolt</th>
                    <td>{{$rect->dcPowVAlarmTL}} V</td>
                  </tr>
                  <tr>
                    <th>DC lowVolt</th>
                    <td>{{$rect->dcPowVAlarmBL}} V</td>
                  </tr>
                  <tr>
                    <th>Batt Fuse Num</th>
                    <td>

                      @if($ibfn = $rect->productRectitems()->where('comment', 'Batt Fuse Num')->first())
                        {{$ibfn->array_value}} mA
                        @endif 
                    </td>
                  </tr>
                  <tr>
                    <th>Batt1TH</th>
                    <td>@if($ib1th = $rect->productRectitems()->where('comment', 'Batt1TH')->first())
                      {{$ib1th->array_value}} °C
                      @endif</td>
                  </tr>
                  <tr>
                    <th>Batt1TH+</th>
                    <td>
                      @if($ib1th = $rect->productRectitems()->where('comment', 'Batt1TH+')->first())
                      {{$ib1th->array_value}} °C
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Batt1TL</th>
                    <td>
                      @if($ib1th = $rect->productRectitems()->where('comment', 'Batt1TL')->first())
                      {{$ib1th->array_value}} °C
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Batt2TH</th>
                    <td>@if($ibfn = $rect->productRectitems()->where('comment', 'Batt2TH')->first())
                      {{$ibfn->array_value}} °C
                      @endif</td>
                  </tr>
                  <tr>
                    <th>Batt2TH+</th>
                    <td>
                      @if($ibfn = $rect->productRectitems()->where('comment', 'Batt2TH+')->first())
                      {{$ibfn->array_value}} °C
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Batt2TL</th>
                    <td>
                      @if($ibfn = $rect->productRectitems()->where('comment', 'Batt2TL')->first())
                      {{$ibfn->array_value}} °C
                      @endif
                    </td>
                  </tr>
                </tbody>
              </table>           



              </div>
            </div>
            
          </div>
          @endif
        </div>

<iframe class="w3-card w3-round" width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={{ $sd->productLocationData ? $sd->productLocationData->lat : '' }},{{ $sd->productLocationData ? $sd->productLocationData->lng : '' }}&amp;output=embed"></iframe><br />

<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>

  <script type="text/javascript">
    var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
   


             </div>
        </div>
        
      </div> 
     </div>



 
  
  </section>
@endsection


@push('js')

 
<script>
  $(document).ready(function(){



function chargebattery() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "&#xf244;";
  setTimeout(function () {
      a.innerHTML = "&#xf243;";
    }, 1000);
  setTimeout(function () {
      a.innerHTML = "&#xf242;";
    }, 2000);
  setTimeout(function () {
      a.innerHTML = "&#xf241;";
    }, 3000);
  setTimeout(function () {
      a.innerHTML = "&#xf240;";
    }, 4000);
}
chargebattery();
setInterval(chargebattery, 5000);

  });



@endpush

