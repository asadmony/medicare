@extends('subrole.layouts.subRoleMaster')

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
              Filtered Data of <span style="text-transform: capitalize;">{{$type}}</span>
            </h3>
          </div>
        </div>        
      </div> 
      <form action="{{route('subrole.searchData',['subrole' => $subrole, 'type'=>$type])}}">
      
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <input type="checkbox" name="all-checked" id="all-checked">
              All
              
              <div class="form-group clearfix">
                
                <div class="span badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="SiteName" name="filter[]"  class="checkboxPrimary3">
                        <label>
                        SiteName
                        </label>
                    </div>
                </div>

                <div class="span badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Region"  name="filter[]" class="checkboxPrimary3">
                        <label>Region</label>
                    </div>
                </div>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Zone" name="filter[]" class="checkboxPrimary3">
                        <label>Zone</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Cluster"   name="filter[]" class="checkboxPrimary3">
                        <label>Cluster</label>
                    </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="Lat"   name="filter[]" class="checkboxPrimary3">
                    <label>Lat</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="Lng"  name="filter[]" class="checkboxPrimary3">
                    <label>Lng</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="Location"  name="filter[]" class="checkboxPrimary3">
                    <label>Location</label>
                </div>
                </span>
                @if($type == 'battery')
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryA"   name="filter[]" class="checkboxPrimary3">
                    <label>BetteryA</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_All" name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_All</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="SOC"  name="filter[]" class="checkboxPrimary3">
                    <label>SOC</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="SOH"  name="filter[]" class="checkboxPrimary3">
                    <label>SOH</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="RemainingCapacity" name="filter[]" class="checkboxPrimary3">
                    <label>RemainingCapacity</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="FullCapacity"  name="filter[]"  class="checkboxPrimary3">
                    <label>FullCapacity</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DesignCapacity"  name="filter[]" class="checkboxPrimary3">
                    <label>DesignCapacity</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BXHC"  name="filter[]"   class="checkboxPrimary3">
                    <label>BXHC</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_1"   name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_1</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_2"  name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_2</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_3"  name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_3</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_4"  name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_4</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_5"   name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_5</label>
                </div>
                </span>
                <span class="badge">

                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_6" name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_6</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_7"  name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_7</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_8"   name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_8</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_9"   name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_9</label>
                </div> </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_10"  name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_10</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_11"   name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_11</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_12"   name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_12</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="BetteryV_13"   name="filter[]"  class="checkboxPrimary3">
                    <label>BetteryV_13</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_14"  name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_14</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BetteryV_15"  name="filter[]" class="checkboxPrimary3">
                    <label>BetteryV_15</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="TC_B_1"  name="filter[]"  class="checkboxPrimary3">
                    <label>TC_B_1</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="TC_B_2" name="filter[]"  class="checkboxPrimary3">
                    <label>TC_B_2</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="TC_B_3"  name="filter[]" class="checkboxPrimary3">
                    <label>TC_B_3</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="TC_B_4" name="filter[]"  class="checkboxPrimary3">
                    <label>TC_B_4</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="MosTemperature" name="filter[]"  class="checkboxPrimary3">
                    <label>MosTemperature</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentTemperature" name="filter[]"  class="checkboxPrimary3">
                    <label>EnvironmentTemperature</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargeAH"   name="filter[]" class="checkboxPrimary3">
                    <label>DisChargeAH</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargKWH"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargKWH</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="BMS_DateTime"  name="filter[]"  class="checkboxPrimary3">
                    <label>BMS_DateTime</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="PackOVProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>PackOVProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackOVAlarm"  name="filter[]"  class="checkboxPrimary3">
                    <label>PackOVAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackOVReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>PackOVReleaseProtect</label>
                </div>
                </span>
                <span class="badge">

                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackOVProtectDelayTime" name="filter[]"  class="checkboxPrimary3">
                    <label>PackOVProtectDelayTime</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellOVAlarm"  name="filter[]"  class="checkboxPrimary3">
                    <label>CellOVAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellOVProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>CellOVProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellOVReleaseProtect"   name="filter[]"  class="checkboxPrimary3">
                    <label>CellOVReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellOVProtectDelayTime"  name="filter[]"  class="checkboxPrimary3">
                    <label>CellOVProtectDelayTime</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackUVAlarm"   name="filter[]"  class="checkboxPrimary3">
                    <label>PackUVAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackUVProtect"   name="filter[]"  class="checkboxPrimary3">
                    <label>PackUVProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackUVReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>PackUVReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackUVProtectDelayTime" name="filter[]"  class="checkboxPrimary3">
                    <label>PackUVProtectDelayTime</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellUVAlarm"  name="filter[]"  class="checkboxPrimary3">
                    <label>CellUVAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellUVProtect"   name="filter[]"  class="checkboxPrimary3">
                    <label>CellUVProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellUVReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>CellUVReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellUVProtectDelayTime"   name="filter[]"  class="checkboxPrimary3">
                    <label>CellUVProtectDelayTime</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingOCAlarm"   name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingOCAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingOCProtect1"  name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingOCProtect1</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingOCProtect1DelayTime"  name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingOCProtect1DelayTime</label>
                </div>
                </span>
                <span class="badge">

                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingOCAlarm"   name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOCAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingOCProtect1"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOCProtect1</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingOCProtect1DelayTime"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOCProtect1DelayTime</label>
                </div>
                </span>
                <span class="badge">

                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="DisChargingOCProtect2"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOCProtect2</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingOCProtect2DelayTime"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOCProtect2DelayTime</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingOTAlarm"   name="filter[]" class="checkboxPrimary3">
                    <label>ChargingOTAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="ChargingOTReleaseProtect" name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingOTReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="DisChargingOTAlarm"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOTAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="DisChargingOTProtect" name="filter[]"   class="checkboxPrimary3">
                    <label>DisChargingOTProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="DisChargingOTReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingOTReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="ChargingUTAlarm" name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingUTAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="ChargingUTProtect" name="filter[]" class="checkboxPrimary3">
                    <label>ChargingUTProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingUTReleaseProtect"  name="filter[]" class="checkboxPrimary3">
                    <label>ChargingUTReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingUTAlarm"  name="filter[]" class="checkboxPrimary3">
                    <label>DisChargingUTAlarm</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingUTProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingUTProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="DisChargingUTReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>DisChargingUTReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="MosOTAlarm"   name="filter[]"  class="checkboxPrimary3">
                    <label>MosOTAlarm</label>
                </div>
                </span>
                <span class="badge">

                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="MosOTProtect" name="filter[]"  class="checkboxPrimary3">
                    <label>MosOTProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="MosOTReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>MosOTReleaseProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentOTAlarm"   name="filter[]"  class="checkboxPrimary3">
                    <label>EnvironmentOTAlarm</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentOTProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>EnvironmentOTProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentOTReleaseProtect"  name="filter[]"  class="checkboxPrimary3">
                    <label>EnvironmentOTReleaseProtect</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentUTAlarm"  name="filter[]" class="checkboxPrimary3">
                    <label>EnvironmentUTAlarm</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentUTProtect"   name="filter[]" class="checkboxPrimary3">
                    <label>EnvironmentUTProtect</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="EnvironmentUTReleaseProtect"    name="filter[]" class="checkboxPrimary3">
                    <label>EnvironmentUTReleaseProtect</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BalanceStartCellVoltage"    name="filter[]" class="checkboxPrimary3">
                    <label>BalanceStartCellVoltage</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BalanceStartDeltaVoltage"  name="filter[]"  class="checkboxPrimary3">
                    <label>BalanceStartDeltaVoltage</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackFullChargeVoltage"  name="filter[]"  class="checkboxPrimary3">
                    <label>PackFullChargeVoltage</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="PackFullChargeCurrent"  name="filter[]"  class="checkboxPrimary3">
                    <label>PackFullChargeCurrent</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox"  value="CellSleepVoltage"    name="filter[]" class="checkboxPrimary3">
                    <label>CellSleepVoltage</label>
                </div>
                </span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="CellSleepDelayTime"  name="filter[]"   class="checkboxPrimary3">
                    <label>CellSleepDelayTime</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ShortCircuitProtectDelayTime"   name="filter[]" class="checkboxPrimary3">
                    <label>ShortCircuitProtectDelayTime</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="SocAlarmThreshold"  name="filter[]"  class="checkboxPrimary3">
                    <label>SocAlarmThreshold</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingOCProtect2"  name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingOCProtect2</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="ChargingOCProtect2DelayTime" name="filter[]"  class="checkboxPrimary3">
                    <label>ChargingOCProtect2DelayTime</label>
                </div></span>
                <span class="badge">
                <div class="icheck-primary d-inline">
                    <input type="checkbox" value="BMS_DateTime"   name="filter[]"  class="checkboxPrimary3">
                    <label>BMS_DateTime</label>
                </div></span>
                @else
                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acPushCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>acPushCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acUpdateTime"   name="filter[]"  class="checkboxPrimary3">
                        <label>acUpdateTime</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acInForkCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>acInForkCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="	dcOutAA"   name="filter[]"  class="checkboxPrimary3">
                        <label>	dcOutAA</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="	dcOutBA"   name="filter[]"  class="checkboxPrimary3">
                        <label>	dcOutBA</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="	dcOutCA"   name="filter[]"  class="checkboxPrimary3">
                        <label>	dcOutCA</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcPushCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcPushCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcUpdateTime"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcUpdateTime</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcOutVolt"   name="filter[]"  class="checkboxPrimary3">
                        <label>	dcOutVolt</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcTotalLoad"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcTotalLoad</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcBetteryCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcBetteryCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcForkCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcForkCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcUDefCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcUDefCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="rectifierUpdateTime"   name="filter[]"  class="checkboxPrimary3">
                        <label>rectifierUpdateTime</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DeviceType"   name="filter[]"  class="checkboxPrimary3">
                        <label>DeviceType</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Version"   name="filter[]"  class="checkboxPrimary3">
                        <label>Version</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Data_source"   name="filter[]"  class="checkboxPrimary3">
                        <label>Data_source</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acSettingUpdateTime"   name="filter[]"  class="checkboxPrimary3">
                        <label>acSettingUpdateTime</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acInPowVTL"   name="filter[]"  class="checkboxPrimary3">
                        <label>acInPowVTL</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acInPowVBL"   name="filter[]"  class="checkboxPrimary3">
                        <label>acInPowVBL</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="acInPowVLL"   name="filter[]"  class="checkboxPrimary3">
                        <label>acInPowVLL</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcSettingUpdateTime"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcSettingUpdateTime</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcPowVAlarmTL"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcPowVAlarmTL</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcPowVAlarmBL"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcPowVAlarmBL</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dcASUDefCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>dcASUDefCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ac_AlarmSetsCount"   name="filter[]"  class="checkboxPrimary3">
                        <label>ac_AlarmSetsCount</label>
                    </div>
                </span>

                <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="dc_AlarmSetsCount" name="filter[]"  class="checkboxPrimary3">
                        <label>dc_AlarmSetsCount</label>
                    </div>
                </span>
                @endif

            </div>
            </div>
          </div>
        </div>


        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              
                    <div class="row">
                      <div class="col-md-2">
                        <label for=""> From Date:</label>
                        <input type="date" name="from" id="" class="form-control datetimepicker-input" placeholder="From">
                      </div>

                      <div class="col-md-2">
                        <label for=""> To Date:</label>
                        <input type="date" name="to" id="" class="form-control datetimepicker-input" placeholder="To">
                      </div>
                      <div class="col-md-3 col-sm-2 ">
                        <div class="form-group">
                          <label>Select MacId/SiteId</label>
                          <div class="select2-purple">
                          <select class="select2-another" multiple="multiple" name="macids[]" id="search" data-placeholder="Select Device" style="width: 100%;">
                              @foreach($macids as $macid)
                                <option>{{$macid->macid}}</option>
                                
                              @endforeach
                          </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-2 col-sm-2 ">
                        <div class="form-group">
                          <label>Per Page</label>
                          <input type="text" name="pages" value="20" class="form-control datetimepicker-input" placeholder="Data Per Page">
                        </div>
                      </div>
                      <div class="col-md-2 mt-4">
                        <div class="form-group">
                          <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                      </div>
                    </div>
              </div>
              <!-- /.card-body -->
          </div>
        </div>
      </form>

      <div class="col-sm-12">
        <div class="card">
          <div class="card-body w3-center">
            <h3>Search Data</h3>
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

