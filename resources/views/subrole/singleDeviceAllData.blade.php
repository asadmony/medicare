@extends('subrole.layouts.subRoleMaster')

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
              All Data of {{ $product->title }}
            </h3>
          </div>
          <div class="card-body">


             <div class="table-responsive">
          

          <table class="table table-hover table-sm table-bordered table-striped">

            <thead>
              <tr>
<th colspan="" rowspan="" headers="" scope="">SL</th>
<th width="200">Action</th>
<th colspan="" rowspan="" headers="" scope="">LastUpdated</th>

<th colspan="" rowspan="" headers="" scope="">Region</th>
<th colspan="" rowspan="" headers="" scope="">Zone</th>
<th colspan="" rowspan="" headers="" scope="">Cluster</th>
<th colspan="" rowspan="" headers="" scope="">Lat</th>
<th colspan="" rowspan="" headers="" scope="">Lng</th>
<th colspan="" rowspan="" headers="" scope="">Location</th>
<th colspan="" rowspan="" headers="" scope="">SiteId</th>
<th colspan="" rowspan="" headers="" scope="">SiteName</th>
<th colspan="" rowspan="" headers="" scope="">SiteName Live</th>


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
<th colspan="" rowspan="" headers="" scope="">Version</th>
<th colspan="" rowspan="" headers="" scope="">BMS_SN</th>
<th colspan="" rowspan="" headers="" scope="">Pack_SN</th>
{{-- <th colspan="" rowspan="" headers="" scope="">Version BMS_DateTime</th> --}}

                
                
              </tr>
            </thead>

            <tbody class="w3-small"> 

              <?php $i = (($settingDatas->currentPage() - 1) * $settingDatas->perPage() + 1); ?>

              @foreach ($settingDatas as $sd)
                <tr class="nowrap">
                  
                  <td>
                    {{ $i }}
                  </td>

                  <td>
                    <a target="_blank" class="btn btn-xs btn-primary w3-tiny py-0" href="{{ route('subrole.singleDeviceSingleDataDetails', ['subrole'=>$subrole, 'data'=>$sd]) }}">Details</a>
                  </td>


                  <td>
                    {{ $sd->updated_at }}
                  </td>

                  <td>{{ $sd->productLocationData ? $sd->productLocationData->region : '' }}</td>

                  <td>{{ $sd->productLocationData ? $sd->productLocationData->zone : '' }}</td>

                  <td>{{ $sd->productLocationData ? $sd->productLocationData->cluster : '' }}</td>
                  <td>{{ $sd->productLocationData ? $sd->productLocationData->lat : ''}}</td>
                  <td>{{ $sd->productLocationData ? $sd->productLocationData->lng : '' }}</td>
                  <td>{{ $sd->productLocationData ? $sd->productLocationData->location : '' }}</td>

                  <td>{{ $sd->macid }}</td>


                  <td>{{ $sd->productData->title }}</td>
                  <td>{{ $sd->productData->title_live }}</td>
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
                                    

                </tr>

                <?php $i++; ?>
              @endforeach

              
            </tbody>

          </table>


        </div>
        <br>
          {{ $settingDatas->render() }}
            
          </div>
        </div>
        
      </div> 
     </div>



 
  
  </section>
@endsection


@push('js')

@endpush

