@extends('company.layouts.companyMaster')

@push('css')

<style>
   tr.nowrap td {
        white-space:nowrap;
    }
    .tableFixHead{ overflow-y: auto; }
    .tableFixHead thead th { position: sticky; top: 0; }

/* Just common table stuff. Really. */
table  { border-collapse: collapse; width: 100%; }
th, td { padding: 8px 16px; }
th     { background:#eee; } 
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
              All @if(isset($type)) {{ucfirst($type)}}@endif Devices Data of {{ $company->title }}
            </h3>
            <?php $fn = isset($type) ? $type."AllData.csv" : "AllData.csv";?>
            <div class="card-tools">
              <button class="btn btn-sm btn-light" onclick="exportTableToCSV('{{$fn}}')">Export To CSV</button>
            </div>
          </div>
          <div class="card-body p-1">


             <div class="table-responsive tableFixHead">
          

          <table class="table table-hover table-sm table-bordered table-striped">

            <thead>
              <tr>
              <th colspan="" rowspan="" headers="" scope="">SL</th>
              <th width="200">Action</th>
              <th colspan="" rowspan="" headers="" scope="">LastUpdated</th>
              <th colspan="" rowspan="" headers="" scope="">SiteId</th>
              <th colspan="" rowspan="" headers="" scope="">SiteName</th>

              <th colspan="" rowspan="" headers="" scope="">Region</th>
              <th colspan="" rowspan="" headers="" scope="">Zone</th>
              <th colspan="" rowspan="" headers="" scope="">Cluster</th>
              <th colspan="" rowspan="" headers="" scope="">Lat</th>
              <th colspan="" rowspan="" headers="" scope="">Lng</th>
              <th colspan="" rowspan="" headers="" scope="">Location</th>

              <th colspan="" rowspan="" headers="" scope="">SiteNameLive</th>


              {{-- states --}}
              @if($type=="battery")
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
                

              {{-- Product rectifier Datas --}}
              @elseif($type == 'rectifier')
              <th colspan="" rowspan="" headers="" scope="">acPushCount</th>
              <th colspan="" rowspan="" headers="" scope="">acUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">acInForkCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutAA</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutBA</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutCA</th>
              <th colspan="" rowspan="" headers="" scope="">dcPushCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutVolt</th>
              <th colspan="" rowspan="" headers="" scope="">dcTotalLoad</th>

              <th colspan="" rowspan="" headers="" scope="">dcBetteryCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcForkCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcUDefCount</th>
              <th colspan="" rowspan="" headers="" scope="">rectifierUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">DeviceType</th>
              <th colspan="" rowspan="" headers="" scope="">Version</th>
              <th colspan="" rowspan="" headers="" scope="">Data_source</th>
              <th colspan="" rowspan="" headers="" scope="">acSettingUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">acInPowVTL</th>
              <th colspan="" rowspan="" headers="" scope="">acInPowVBL</th>

              <th colspan="" rowspan="" headers="" scope="">acInPowVLL</th>
              <th colspan="" rowspan="" headers="" scope="">dcSettingUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">dcPowVAlarmTL</th>
              <th colspan="" rowspan="" headers="" scope="">dcPowVAlarmBL</th>
              <th colspan="" rowspan="" headers="" scope="">dcASUDefCount</th>
              <th colspan="" rowspan="" headers="" scope="">ac_AlarmSetsCount</th>
              <th colspan="" rowspan="" headers="" scope="">dc_AlarmSetsCount</th>
              @else
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
              <th colspan="" rowspan="" headers="" scope="">acPushCount</th>
              <th colspan="" rowspan="" headers="" scope="">acUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">acInForkCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutAA</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutBA</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutCA</th>
              <th colspan="" rowspan="" headers="" scope="">dcPushCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">dcOutVolt</th>
              <th colspan="" rowspan="" headers="" scope="">dcTotalLoad</th>

              <th colspan="" rowspan="" headers="" scope="">dcBetteryCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcForkCount</th>
              <th colspan="" rowspan="" headers="" scope="">dcUDefCount</th>
              <th colspan="" rowspan="" headers="" scope="">rectifierUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">DeviceType</th>
              <th colspan="" rowspan="" headers="" scope="">Version</th>
              <th colspan="" rowspan="" headers="" scope="">Data_source</th>
              <th colspan="" rowspan="" headers="" scope="">acSettingUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">acInPowVTL</th>
              <th colspan="" rowspan="" headers="" scope="">acInPowVBL</th>

              <th colspan="" rowspan="" headers="" scope="">acInPowVLL</th>
              <th colspan="" rowspan="" headers="" scope="">dcSettingUpdateTime</th>
              <th colspan="" rowspan="" headers="" scope="">dcPowVAlarmTL</th>
              <th colspan="" rowspan="" headers="" scope="">dcPowVAlarmBL</th>
              <th colspan="" rowspan="" headers="" scope="">dcASUDefCount</th>
              <th colspan="" rowspan="" headers="" scope="">ac_AlarmSetsCount</th>
              <th colspan="" rowspan="" headers="" scope="">dc_AlarmSetsCount</th>              
              @endif
                
                
              </tr>
            </thead>

            <tbody class="w3-small">

              <?php $i = (($settingDatas->currentPage() - 1) * $settingDatas->perPage() + 1); ?>

              @foreach ($settingDatas as $sd)
                <tr class="nowrap">
                  
                  <td>
                    {{ $i }}
                  </td>
                  
                  @if($sd->product->type == 'battery')
                    <td>
                      <a target="_blank" class="btn btn-xs btn-primary w3-tiny  py-0" href="{{ route('company.singleDeviceSingleDataDetails', ['company'=>$company, 'data'=>$sd]) }}">Battery Details</a>
                    </td>
                  @else
                  <td>
                    <a target="_blank" class="btn btn-xs btn-primary w3-tiny  py-0" href="{{ route('company.singleDeviceSingleDataDetails', ['company'=>$company, 'data'=>$sd]) }}">Rectifire Details</a>
                  </td>
                  @endif

                  <td>
                    {{ $sd->updated_at }}
                  </td>
                  <td>{{ $sd->macid }}</td>
                  <td>{{ $sd->productData->title }}</td>


                  <td>{{ $sd->productLocationData ? $sd->productLocationData->region : '' }}</td>

                  <td>{{ $sd->productLocationData ? $sd->productLocationData->zone : '' }}</td>

                  <td>{{ $sd->productLocationData ? $sd->productLocationData->cluster : '' }}</td>
                  <td>{{ $sd->productLocationData ? $sd->productLocationData->lat : ''}}</td>
                  <td>{{ $sd->productLocationData ? $sd->productLocationData->lng : '' }}</td>
                  <td>{{ $sd->productLocationData ? $sd->productLocationData->location : '' }}</td>


                  <td>{{ $sd->productData->title_live }}</td>
                  @if($type=='battery')
                  <td>{{ $sd->productData->BetteryA }}</td>
                  <td>{{ $sd->productData->BetteryV_All }}</td>
                  <td>{{ $sd->productData->SOC }}</td>
                  <td>{{ $sd->productData->SOH }}</td>
                  <td>{{ $sd->productData->RemainingCapacity }}</td>
                  <td>{{ $sd->productData->FullCapacity }}</td>
                  <td>{{ $sd->productData->DesignCapacity }}</td>
                  <td>{{ $sd->productData->BXHC }}</td>
                  <td>{{ $sd->productData->BetteryV_1 }}</td>
                  <td>{{ $sd->productData->BetteryV_2 }}</td>
                  <td>{{ $sd->productData->BetteryV_3 }}</td>
                  <td>{{ $sd->productData->BetteryV_4 }}</td>
                  <td>{{ $sd->productData->BetteryV_5 }}</td>
                  <td>{{ $sd->productData->BetteryV_6 }}</td>
                  <td>{{ $sd->productData->BetteryV_7 }}</td>
                  <td>{{ $sd->productData->BetteryV_8 }}</td>
                  <td>{{ $sd->productData->BetteryV_9 }}</td>
                  <td>{{ $sd->productData->BetteryV_10 }}</td>
                  <td>{{ $sd->productData->BetteryV_11 }}</td>
                  <td>{{ $sd->productData->BetteryV_12 }}</td>
                  <td>{{ $sd->productData->BetteryV_13 }}</td>
                  <td>{{ $sd->productData->BetteryV_14 }}</td>
                  <td>{{ $sd->productData->BetteryV_15 }}</td>
                  <td>{{ $sd->productData->TC_B_1 }}</td>
                  <td>{{ $sd->productData->TC_B_2 }}</td>
                  <td>{{ $sd->productData->TC_B_3 }}</td>
                  <td>{{ $sd->productData->TC_B_4 }}</td>
                  <td>{{ $sd->productData->MosTemperature }}</td>
                  <td>{{ $sd->productData->EnvironmentTemperature }}</td>
                  <td>{{ $sd->productData->DisChargeAH }}</td>
                  <td>{{ $sd->productData->DisChargeKWH }}</td>
                  <td>{{ $sd->productData->BMS_DateTime }}</td>
                  {{-- <td>{{ $sd->OriginalData }}</td> --}}
                  <td>{{ $sd->PackOVAlarm }}</td>
                  <td>{{ $sd->PackOVProtect }}</td>
                  <td>{{ $sd->PackOVReleaseProtect }}</td>
                  <td>{{ $sd->PackOVProtectDelayTime }}</td>
                  <td>{{ $sd->CellOVAlarm }}</td>
                  <td>{{ $sd->CellOVProtect }}</td>
                  <td>{{ $sd->CellOVReleaseProtect }}</td>
                  <td>{{ $sd->CellOVProtectDelayTime }}</td>
                  <td>{{ $sd->PackUVAlarm }}</td>
                  <td>{{ $sd->PackUVProtect }}</td>
                  <td>{{ $sd->PackUVReleaseProtect }}</td>
                  <td>{{ $sd->PackUVProtectDelayTime }}</td>
                  <td>{{ $sd->CellUVAlarm }}</td>
                  <td>{{ $sd->CellUVProtect }}</td>
                  <td>{{ $sd->CellUVReleaseProtect }}</td>
                  <td>{{ $sd->CellUVProtectDelayTime }}</td>
                  <td>{{ $sd->ChargingOCAlarm }}</td>
                  <td>{{ $sd->ChargingOCProtect1 }}</td>
                  <td>{{ $sd->ChargingOCProtect1DelayTime }}</td>

                  <td>{{ $sd->DisChargingOCAlarm }}</td>
                  <td>{{ $sd->DisChargingOCProtect1 }}</td>
                  <td>{{ $sd->DisChargingOCProtect1DelayTime }}</td>
                  <td>{{ $sd->DisChargingOCProtect2 }}</td>
                  <td>{{ $sd->DisChargingOCProtect2DelayTime }}</td>
                  <td>{{ $sd->ChargingOTAlarm }}</td>
                  <td>{{ $sd->ChargingOTProtect }}</td>
                  <td>{{ $sd->ChargingOTReleaseProtect }}</td>
                  <td>{{ $sd->DisChargingOTAlarm }}</td>
                  <td>{{ $sd->DisChargingOTProtect }}</td>
                  <td>{{ $sd->DisChargingOTReleaseProtect }}</td>
                  <td>{{ $sd->ChargingUTAlarm }}</td>
                  <td>{{ $sd->ChargingUTProtect }}</td>
                  <td>{{ $sd->ChargingUTReleaseProtect }}</td>
                  <td>{{ $sd->DisChargingUTAlarm }}</td>
                  <td>{{ $sd->DisChargingUTProtect }}</td>
                  <td>{{ $sd->DisChargingUTReleaseProtect }}</td>
                  <td>{{ $sd->MosOTAlarm }}</td>
                  <td>{{ $sd->MosOTProtect }}</td>
                  <td>{{ $sd->MosOTReleaseProtect }}</td>
                  <td>{{ $sd->EnvironmentOTAlarm }}</td>
                  <td>{{ $sd->EnvironmentOTProtect }}</td>
                  <td>{{ $sd->EnvironmentOTReleaseProtect }}</td>
                  <td>{{ $sd->EnvironmentUTAlarm }}</td>
                  <td>{{ $sd->EnvironmentUTProtect }}</td>
                  <td>{{ $sd->EnvironmentUTReleaseProtect }}</td>
                  <td>{{ $sd->BalanceStartCellVoltage }}</td>
                  <td>{{ $sd->BalanceStartDeltaVoltage }}</td>
                  <td>{{ $sd->PackFullChargeVoltage }}</td>
                  <td>{{ $sd->PackFullChargeCurrent }}</td>
                  <td>{{ $sd->CellSleepVoltage }}</td>
                  <td>{{ $sd->CellSleepDelayTime }}</td>
                  <td>{{ $sd->ShortCircuitProtectDelayTime }}</td>
                  <td>{{ $sd->SocAlarmThreshold }}</td>
                  <td>{{ $sd->ChargingOCProtect2 }}</td>
                  <td>{{ $sd->ChargingOCProtect2DelayTime }}</td>
                  <td>{{ $sd->BMS_DateTime }}</td>

                  <td>{{ $sd->productData->Version }}</td>
                  <td>{{ $sd->productData->BMS_SN }}</td>
                  <td>{{ $sd->productData->Pack_SN }}</td>
                  @elseif($type == 'rectifier')
                  {{-- rectifier Data --}}
                  
                  <td>{{$sd->productRectData ? $sd->productRectData->acPushCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInForkCount : ''}}</td>

                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutAA : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutBA : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutCA : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcPushCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutVolt : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcTotalLoad : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcBetteryCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcForkCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcUDefCount : ''}}</td>

                  <td>{{$sd->productRectData ? $sd->productRectData->rectifierUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->DeviceType : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->Version : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->Megmeet : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acSettingUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInPowVTL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInPowVBL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInPowVLL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcSettingUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcPowVAlarmTL : ''}}</td>

                  <td>{{$sd->productRectData ? $sd->productRectData->dcPowVAlarmBL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcASUDefCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->ac_AlarmSetsCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dc_AlarmSetsCount : ''}}</td>                  
                  @else 

                  <td>{{ $sd->productData->BetteryA }}</td>
                  <td>{{ $sd->productData->BetteryV_All }}</td>
                  <td>{{ $sd->productData->SOC }}</td>
                  <td>{{ $sd->productData->SOH }}</td>
                  <td>{{ $sd->productData->RemainingCapacity }}</td>
                  <td>{{ $sd->productData->FullCapacity }}</td>
                  <td>{{ $sd->productData->DesignCapacity }}</td>
                  <td>{{ $sd->productData->BXHC }}</td>
                  <td>{{ $sd->productData->BetteryV_1 }}</td>
                  <td>{{ $sd->productData->BetteryV_2 }}</td>
                  <td>{{ $sd->productData->BetteryV_3 }}</td>
                  <td>{{ $sd->productData->BetteryV_4 }}</td>
                  <td>{{ $sd->productData->BetteryV_5 }}</td>
                  <td>{{ $sd->productData->BetteryV_6 }}</td>
                  <td>{{ $sd->productData->BetteryV_7 }}</td>
                  <td>{{ $sd->productData->BetteryV_8 }}</td>
                  <td>{{ $sd->productData->BetteryV_9 }}</td>
                  <td>{{ $sd->productData->BetteryV_10 }}</td>
                  <td>{{ $sd->productData->BetteryV_11 }}</td>
                  <td>{{ $sd->productData->BetteryV_12 }}</td>
                  <td>{{ $sd->productData->BetteryV_13 }}</td>
                  <td>{{ $sd->productData->BetteryV_14 }}</td>
                  <td>{{ $sd->productData->BetteryV_15 }}</td>
                  <td>{{ $sd->productData->TC_B_1 }}</td>
                  <td>{{ $sd->productData->TC_B_2 }}</td>
                  <td>{{ $sd->productData->TC_B_3 }}</td>
                  <td>{{ $sd->productData->TC_B_4 }}</td>
                  <td>{{ $sd->productData->MosTemperature }}</td>
                  <td>{{ $sd->productData->EnvironmentTemperature }}</td>
                  <td>{{ $sd->productData->DisChargeAH }}</td>
                  <td>{{ $sd->productData->DisChargeKWH }}</td>
                  <td>{{ $sd->productData->BMS_DateTime }}</td>
                  {{-- <td>{{ $sd->OriginalData }}</td> --}}
                  <td>{{ $sd->PackOVAlarm }}</td>
                  <td>{{ $sd->PackOVProtect }}</td>
                  <td>{{ $sd->PackOVReleaseProtect }}</td>
                  <td>{{ $sd->PackOVProtectDelayTime }}</td>
                  <td>{{ $sd->CellOVAlarm }}</td>
                  <td>{{ $sd->CellOVProtect }}</td>
                  <td>{{ $sd->CellOVReleaseProtect }}</td>
                  <td>{{ $sd->CellOVProtectDelayTime }}</td>
                  <td>{{ $sd->PackUVAlarm }}</td>
                  <td>{{ $sd->PackUVProtect }}</td>
                  <td>{{ $sd->PackUVReleaseProtect }}</td>
                  <td>{{ $sd->PackUVProtectDelayTime }}</td>
                  <td>{{ $sd->CellUVAlarm }}</td>
                  <td>{{ $sd->CellUVProtect }}</td>
                  <td>{{ $sd->CellUVReleaseProtect }}</td>
                  <td>{{ $sd->CellUVProtectDelayTime }}</td>
                  <td>{{ $sd->ChargingOCAlarm }}</td>
                  <td>{{ $sd->ChargingOCProtect1 }}</td>
                  <td>{{ $sd->ChargingOCProtect1DelayTime }}</td>

                  <td>{{ $sd->DisChargingOCAlarm }}</td>
                  <td>{{ $sd->DisChargingOCProtect1 }}</td>
                  <td>{{ $sd->DisChargingOCProtect1DelayTime }}</td>
                  <td>{{ $sd->DisChargingOCProtect2 }}</td>
                  <td>{{ $sd->DisChargingOCProtect2DelayTime }}</td>
                  <td>{{ $sd->ChargingOTAlarm }}</td>
                  <td>{{ $sd->ChargingOTProtect }}</td>
                  <td>{{ $sd->ChargingOTReleaseProtect }}</td>
                  <td>{{ $sd->DisChargingOTAlarm }}</td>
                  <td>{{ $sd->DisChargingOTProtect }}</td>
                  <td>{{ $sd->DisChargingOTReleaseProtect }}</td>
                  <td>{{ $sd->ChargingUTAlarm }}</td>
                  <td>{{ $sd->ChargingUTProtect }}</td>
                  <td>{{ $sd->ChargingUTReleaseProtect }}</td>
                  <td>{{ $sd->DisChargingUTAlarm }}</td>
                  <td>{{ $sd->DisChargingUTProtect }}</td>
                  <td>{{ $sd->DisChargingUTReleaseProtect }}</td>
                  <td>{{ $sd->MosOTAlarm }}</td>
                  <td>{{ $sd->MosOTProtect }}</td>
                  <td>{{ $sd->MosOTReleaseProtect }}</td>
                  <td>{{ $sd->EnvironmentOTAlarm }}</td>
                  <td>{{ $sd->EnvironmentOTProtect }}</td>
                  <td>{{ $sd->EnvironmentOTReleaseProtect }}</td>
                  <td>{{ $sd->EnvironmentUTAlarm }}</td>
                  <td>{{ $sd->EnvironmentUTProtect }}</td>
                  <td>{{ $sd->EnvironmentUTReleaseProtect }}</td>
                  <td>{{ $sd->BalanceStartCellVoltage }}</td>
                  <td>{{ $sd->BalanceStartDeltaVoltage }}</td>
                  <td>{{ $sd->PackFullChargeVoltage }}</td>
                  <td>{{ $sd->PackFullChargeCurrent }}</td>
                  <td>{{ $sd->CellSleepVoltage }}</td>
                  <td>{{ $sd->CellSleepDelayTime }}</td>
                  <td>{{ $sd->ShortCircuitProtectDelayTime }}</td>
                  <td>{{ $sd->SocAlarmThreshold }}</td>
                  <td>{{ $sd->ChargingOCProtect2 }}</td>
                  <td>{{ $sd->ChargingOCProtect2DelayTime }}</td>
                  <td>{{ $sd->BMS_DateTime }}</td>

                  <td>{{ $sd->productData->Version }}</td>
                  <td>{{ $sd->productData->BMS_SN }}</td>
                  <td>{{ $sd->productData->Pack_SN }}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acPushCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInForkCount : ''}}</td>

                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutAA : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutBA : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutCA : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcPushCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcOutVolt : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcTotalLoad : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcBetteryCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcForkCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcUDefCount : ''}}</td>

                  <td>{{$sd->productRectData ? $sd->productRectData->rectifierUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->DeviceType : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->Version : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->Megmeet : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acSettingUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInPowVTL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInPowVBL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->acInPowVLL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcSettingUpdateTime : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcPowVAlarmTL : ''}}</td>

                  <td>{{$sd->productRectData ? $sd->productRectData->dcPowVAlarmBL : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dcASUDefCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->ac_AlarmSetsCount : ''}}</td>
                  <td>{{$sd->productRectData ? $sd->productRectData->dc_AlarmSetsCount : ''}}</td> 
                  @endif
                </tr>

                <?php $i++; ?>
              @endforeach

              
            </tbody>

          </table>


        </div>
        <br>
          {{ $settingDatas->appends(['type' => isset($type) ? $type : null])->render() }}
            
          </div>
        </div>
        
      </div> 
     </div>



 
  
  </section>
@endsection


@push('js')
<script>
  function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}
function exportTableToCSV(filename) {
    var csv = [];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
        row.push("\""+cols[j].innerText+"\"");
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>
@endpush

