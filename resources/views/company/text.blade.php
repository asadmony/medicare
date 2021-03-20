@extends('company.layouts.companyMaster')

@push('css')
@endpush

@section('content')
  <section class="content">

    <br>

     <div class="row">      
      <div class="col-sm-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Filtered Data 
            </h3>
          </div>
        </div>        
      </div>     
        
       

      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            <input type="checkbox" name="all-checked" id="all-checked">
            All
            <div class="form-group clearfix">
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label for="checkboxPrimary2">
                  SiteId
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>
                  SiteName
                </label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryA</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_All</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>SOC</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>SOH</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>RemainingCapacity</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>FullCapacity</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DesignCapacity</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BXHC</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_1</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_2</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_3</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_4</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_5</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_6</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_7</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_8</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_9</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_10</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_11</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_12</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_13</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_14</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BetteryV_15</label>
              </div>

              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>TC_B_1</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>TC_B_2</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>TC_B_3</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>TC_B_4</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>MosTemperature</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentTemperature</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargeAH</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargKWH</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BMS_DateTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackOVProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackOVAlarm</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackOVReleaseProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackOVProtectDelayTime</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellOVAlarm</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellOVProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellOVReleaseProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellOVProtectDelayTime</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackUVAlarm</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackUVProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackUVReleaseProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackUVProtectDelayTime</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellUVAlarm</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellUVProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellUVReleaseProtect</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellUVProtectDelayTime</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOCAlarm</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOCProtect1</label>
              </div><div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOCProtect1DelayTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOCAlarm</label>
              </div>

              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOCProtect1</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOCProtect1DelayTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOCProtect2</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOCProtect2DelayTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOTReleaseProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOTProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingOTReleaseProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingUTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingUTProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingUTReleaseProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingUTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingUTProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>DisChargingUTReleaseProtect</label>
              </div>

              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>MosOTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>MosOTProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>MosOTReleaseProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentOTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentOTProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentOTReleaseProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentUTAlarm</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentUTProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>EnvironmentUTReleaseProtect</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BalanceStartCellVoltage</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BalanceStartDeltaVoltage</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackFullChargeVoltage</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>PackFullChargeCurrent</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellSleepVoltage</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>CellSleepDelayTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ShortCircuitProtectDelayTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>SocAlarmThreshold</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOCProtect2</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>ChargingOCProtect2DelayTime</label>
              </div>
              <div class="icheck-primary d-inline">
                <input type="checkbox" id="checkboxPrimary3">
                <label>BMS_DateTime</label>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-12">
        <div class="card">
          <div class="card-body">
            
          <form action="{{route('company.Search', $company)}}">
                  <div class="row">
                    <div class="col-md-3">
                      <label for=""> Date:</label>
                      <input type="date" name="from" id="" class="form-control datetimepicker-input" placeholder="From">
                    </div>
                    <div class="col-md-1">
                      <label for=""></label>
                      <p class="w3-center mt-3" style="font-weight: 900;">To</p>
                    </div>
                    <div class="col-md-3">
                      <label for=""> Date:</label>
                      <input type="date" name="to" id="" class="form-control datetimepicker-input" placeholder="To">
                    </div>
                    <div class="col-md-3 col-sm-3 ">
                      <div class="form-group">
                        <label>Select2</label>
                        <div class="select2-purple">
                        <select class="select2-another" multiple="multiple" name="macids[]" id="search" data-placeholder="Select Device" style="width: 100%;">
                            @foreach($company->products as $product)
                              <option>{{$product->macid}}</option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-2 mt-4">
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </div>
                    </div>
                  </div>
            </form>
              <!-- /.form -->
            </div>
            <!-- /.card-body -->
        </div>
      </div>



     <!-- The Modal -->
  <div class="modal fade" id="myModalLg">
    <div class="modal-dialog modal-lg w3-animate-zoom w3-round">
 
        <div id="modalLargeFeed">
        <div class="card card-widget">  
            <div class="card-body">
                <div  style="min-height: 300px;" class="">
                </div>
            </div>


       <div class="overlay modal-feed"><i class="fas fa-2x fa-sync-alt fa-spin w3-xxxlarge w3-text-blue"></i>
            </div>
          </div>

 
        
      </div>

    </div>
  </div>

  <div class="card">
    <div class="card-body">
      
      <div class="card-body">


        <div class="table-responsive">
     

     <table class="table table-hover table-sm table-bordered table-striped">

       <thead>
         <tr>
             
<th colspan="" rowspan="" headers="" scope="">SL</th>
<th colspan="" rowspan="" headers="" scope="">MacId</th>
<th colspan="" rowspan="" headers="" scope="">SiteId</th>
<th colspan="" rowspan="" headers="" scope="">SiteName</th>


{{-- states --}}
<th colspan="" rowspan="" headers="" scope="">BetteryA</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_All</th>
<th colspan="" rowspan="" headers="" scope="">SOC</th>
<th colspan="" rowspan="" headers="" scope="">SOH</th>
<th colspan="" rowspan="" headers="" scope="">RemainingCapacity</th>
<th colspan="" rowspan="" headers="" scope="">FullCapacity</th>
<th colspan="" rowspan="" headers="" scope="">DesignCapacity</th>
<th colspan="" rowspan="" headers="" scope="">BXHC</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_1</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_2</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_3</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_4</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_5</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_6</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_7</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_8</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_9</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_10</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_11</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_12</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_13</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_14</th>
<th colspan="" rowspan="" headers="" scope="">BetteryV_15</th>
<th colspan="" rowspan="" headers="" scope="">TC_B_1</th>
<th colspan="" rowspan="" headers="" scope="">TC_B_2</th>
<th colspan="" rowspan="" headers="" scope="">TC_B_3</th>
<th colspan="" rowspan="" headers="" scope="">TC_B_4</th>
<th colspan="" rowspan="" headers="" scope="">MosTemperature</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentTemperature</th>
<th colspan="" rowspan="" headers="" scope="">DisChargeAH</th>
<th colspan="" rowspan="" headers="" scope="">DisChargeKWH</th>
<th colspan="" rowspan="" headers="" scope="">BMS_DateTime</th>

{{-- setting --}}
{{-- <th colspan="" rowspan="" headers="" scope="">OriginalData</th> --}}
<th colspan="" rowspan="" headers="" scope="">PackOVAlarm</th>
<th colspan="" rowspan="" headers="" scope="">PackOVProtect</th>
<th colspan="" rowspan="" headers="" scope="">PackOVReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">PackOVProtectDelayTime</th>
<th colspan="" rowspan="" headers="" scope="">CellOVAlarm</th>
<th colspan="" rowspan="" headers="" scope="">CellOVProtect</th>
<th colspan="" rowspan="" headers="" scope="">CellOVReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">CellOVProtectDelayTime</th>
<th colspan="" rowspan="" headers="" scope="">PackUVAlarm</th>
<th colspan="" rowspan="" headers="" scope="">PackUVProtect</th>
<th colspan="" rowspan="" headers="" scope="">PackUVReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">PackUVProtectDelayTime</th>
<th colspan="" rowspan="" headers="" scope="">CellUVAlarm</th>
<th colspan="" rowspan="" headers="" scope="">CellUVProtect</th>
<th colspan="" rowspan="" headers="" scope="">CellUVReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">CellUVProtectDelayTime</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOCAlarm</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOCProtect1</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOCProtect1DelayTime</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOCAlarm</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOCProtect1</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOCProtect1DelayTime</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOCProtect2</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOCProtect2DelayTime</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOTProtect</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOTProtect</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingOTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">ChargingUTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">ChargingUTProtect</th>
<th colspan="" rowspan="" headers="" scope="">ChargingUTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingUTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingUTProtect</th>
<th colspan="" rowspan="" headers="" scope="">DisChargingUTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">MosOTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">MosOTProtect</th>
<th colspan="" rowspan="" headers="" scope="">MosOTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentOTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentOTProtect</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentOTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentUTAlarm</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentUTProtect</th>
<th colspan="" rowspan="" headers="" scope="">EnvironmentUTReleaseProtect</th>
<th colspan="" rowspan="" headers="" scope="">BalanceStartCellVoltage</th>
<th colspan="" rowspan="" headers="" scope="">BalanceStartDeltaVoltage</th>
<th colspan="" rowspan="" headers="" scope="">PackFullChargeVoltage</th>
<th colspan="" rowspan="" headers="" scope="">PackFullChargeCurrent</th>
<th colspan="" rowspan="" headers="" scope="">CellSleepVoltage</th>
<th colspan="" rowspan="" headers="" scope="">CellSleepDelayTime</th>
<th colspan="" rowspan="" headers="" scope="">ShortCircuitProtectDelayTime</th>
<th colspan="" rowspan="" headers="" scope="">SocAlarmThreshold</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOCProtect2</th>
<th colspan="" rowspan="" headers="" scope="">ChargingOCProtect2DelayTime</th>
<th colspan="" rowspan="" headers="" scope="">BMS_DateTime</th>

{{-- version --}}
{{-- <th colspan="" rowspan="" headers="" scope="">Version</th>
<th colspan="" rowspan="" headers="" scope="">BMS_SN</th>
<th colspan="" rowspan="" headers="" scope="">Pack_SN</th>
<th colspan="" rowspan="" headers="" scope="">BMS_DateTime</th> --}}

<th colspan="" rowspan="" headers="" scope="">Version</th>
<th colspan="" rowspan="" headers="" scope="">BMS_SN</th>
<th colspan="" rowspan="" headers="" scope="">Pack_SN</th>

           
           
         </tr>
       </thead>

       <tbody class="w3-small"> 
        <?php $i = (($items->currentPage() - 1) * $items->perPage() + 1); ?>
           
            @foreach ($items as $item)

           <tr class="nowrap">
             
           <td>{{$i}}</td>

            <td>{{$item->macid}}</td>


            <td></td>

            <td></td>
            <td>{{$item->BetteryA}}</td>
            <td>{{$item->BetteryV_All}}</td>
            <td>{{$item->SOC}}</td>
            <td>{{$item->SOH}}</td>
            <td>{{$item->RemainingCapacity}}</td>
            <td>{{$item->FullCapacity}}</td>
            <td>{{$item->DesignCapacity}}</td>
            <td></td>
            <td></td>
            <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>

             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>

             <td></td>
             <td></td>
             <td></td>
             

             

           </tr>
           <?php $i++; ?>
           @endforeach

         
       </tbody>

     </table>


   </div>
   <br>
       
     </div>

    </div>
  </div>

  
 
  
  </section>
@endsection


@push('js')
<!-- Select2 -->
<script src="{{asset('cp/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- moment -->
<script src="{{asset('cp/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('cp/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>

<!-- date-range-picker -->
<script src="{{asset('cp/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

<script>
  $( document ).ready(function() {
    $('#all-checked').click(function(event) {
      if(this.checked) {
          // Iterate each checkbox
          $(':checkbox').each(function() {
              this.checked = true;
          });
      }
      else {
        $(':checkbox').each(function() {
              this.checked = false;
          });
      }
    });
  });
    
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()  
    })

   

    $(function () {
      //Initialize Select2 Elements
      $('.select2-another').select2();  
    })

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()

    // $('#datepicker').datepicker({
    //         uiLibrary: 'bootstrap4'
    //     });

    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  //   if($('#all-checked').is(':checked')) {
  //     $('#checkboxPrimary3').prop('checked', true);
  //  }
    
  </script>

@endpush

