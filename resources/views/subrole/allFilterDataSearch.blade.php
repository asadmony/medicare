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
              Filtered Data 
            </h3>
          </div>
        </div>        
      </div>     
        
    <form action="{{route('subrole.searchData',['subrole'=>$subrole,'type'=>$type])}}">

        <div class="col-sm-12">
            <div class="card">
            <div class="card-body">
                <input type="checkbox" name="all-checked" id="all-checked">
                All
                <div class="form-group clearfix">
                
                    <div class="span badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" {{in_array('SiteName',$filter) ? 'checked' : ''}} value="SiteName" name="filter[]"  class="checkboxPrimary3">
                            <label>
                            SiteName
                            </label>
                        </div>
                    </div>

                    <div class="span badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="Region"  {{in_array('Region',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                            <label>Region</label>
                        </div>
                    </div>

                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="Zone"  {{in_array('Zone',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                            <label>Zone</label>
                        </div>
                    </span>

                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="Cluster"  {{in_array('Cluster',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                            <label>Cluster</label>
                        </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Lat"  {{in_array('Lat',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>Lat</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Lng"  {{in_array('Lng',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>Lng</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="Location"  {{in_array('Location',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>Location</label>
                    </div>
                    </span>
                    @if($type=='battery')
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryA"  {{in_array('BetteryA',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryA</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_All" {{in_array('BetteryV_All',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_All</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="SOC" {{in_array('SOC',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>SOC</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="SOH" {{in_array('SOH',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>SOH</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="RemainingCapacity" {{in_array('RemainingCapacity',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>RemainingCapacity</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="FullCapacity" {{in_array('FullCapacity',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>FullCapacity</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DesignCapacity" {{in_array('DesignCapacity',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>DesignCapacity</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BXHC" {{in_array('BXHC',$filter) ? 'checked' : ''}} name="filter[]"   class="checkboxPrimary3">
                        <label>BXHC</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_1" {{in_array('BetteryV_1',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_1</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_2" {{in_array('BetteryV_2',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_2</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_3" {{in_array('BetteryV_3',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_3</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_4" {{in_array('BetteryV_4',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_4</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_5" {{in_array('BetteryV_5',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_5</label>
                    </div>
                    </span>
                    <span class="badge">

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_6" {{in_array('BetteryV_6',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_6</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_7" {{in_array('BetteryV_7',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_7</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_8" {{in_array('BetteryV_8',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_8</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_9" {{in_array('BetteryV_9',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_9</label>
                    </div> </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_10" {{in_array('BetteryV_10',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_10</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_11" {{in_array('BetteryV_11',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_11</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_12" {{in_array('BetteryV_12',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_12</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="BetteryV_13" {{in_array('BetteryV_13',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                        <label>BetteryV_13</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_14" {{in_array('BetteryV_14',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_14</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BetteryV_15" {{in_array('BetteryV_15',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>BetteryV_15</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="TC_B_1" {{in_array('TC_B_1',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>TC_B_1</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="TC_B_2"  {{in_array('TC_B_2',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>TC_B_2</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="TC_B_3"  {{in_array('TC_B_3',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>TC_B_3</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="TC_B_4"  {{in_array('TC_B_4',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>TC_B_4</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="MosTemperature" {{in_array('MosTemperature',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>MosTemperature</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentTemperature"  {{in_array('EnvironmentTemperature',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>EnvironmentTemperature</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargeAH"  {{in_array('DisChargeAH',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>DisChargeAH</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargKWH"  {{in_array('DisChargKWH',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargKWH</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="BMS_DateTime" {{in_array('BMS_DateTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>BMS_DateTime</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="PackOVProtect" {{in_array('PackOVProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackOVProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackOVAlarm"  {{in_array('PackOVAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackOVAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackOVReleaseProtect"  {{in_array('PackOVReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackOVReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackOVProtectDelayTime"  {{in_array('PackOVProtectDelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackOVProtectDelayTime</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellOVAlarm"  {{in_array('CellOVAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellOVAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellOVProtect"  {{in_array('CellOVProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellOVProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellOVReleaseProtect"  {{in_array('CellOVReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellOVReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellOVProtectDelayTime" {{in_array('CellOVProtectDelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellOVProtectDelayTime</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackUVAlarm"  {{in_array('PackUVAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackUVAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackUVProtect"  {{in_array('PackUVProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackUVProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackUVReleaseProtect"  {{in_array('PackUVReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackUVReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackUVProtectDelayTime" {{in_array('PackUVProtectDelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackUVProtectDelayTime</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellUVAlarm"  {{in_array('CellUVAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellUVAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellUVProtect"  {{in_array('CellUVProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellUVProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellUVReleaseProtect"  {{in_array('CellUVReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellUVReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellUVProtectDelayTime"  {{in_array('CellUVProtectDelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>CellUVProtectDelayTime</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingOCAlarm"  {{in_array('ChargingOCAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingOCAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingOCProtect1"  {{in_array('ChargingOCProtect1',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingOCProtect1</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingOCProtect1DelayTime"  {{in_array('ChargingOCProtect1DelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingOCProtect1DelayTime</label>
                    </div>
                    </span>
                    <span class="badge">

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingOCAlarm"  {{in_array('DisChargingOCAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOCAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingOCProtect1"  {{in_array('DisChargingOCProtect1',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOCProtect1</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingOCProtect1DelayTime"  {{in_array('DisChargingOCProtect1DelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOCProtect1DelayTime</label>
                    </div>
                    </span>
                    <span class="badge">

                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="DisChargingOCProtect2"  {{in_array('DisChargingOCProtect2',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOCProtect2</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingOCProtect2DelayTime"  {{in_array('DisChargingOCProtect2DelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOCProtect2DelayTime</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingOTAlarm"  {{in_array('ChargingOTAlarm',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>ChargingOTAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="ChargingOTReleaseProtect" {{in_array('ChargingOTReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingOTReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="DisChargingOTAlarm" {{in_array('DisChargingOTAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOTAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="DisChargingOTProtect" {{in_array('DisChargingOTProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOTProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="DisChargingOTReleaseProtect" {{in_array('DisChargingOTReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingOTReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="ChargingUTAlarm" {{in_array('ChargingUTAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingUTAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="ChargingUTProtect" {{in_array('ChargingUTProtect',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>ChargingUTProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingUTReleaseProtect"  {{in_array('ChargingUTReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>ChargingUTReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingUTAlarm"  {{in_array('DisChargingUTAlarm',$filter) ? 'checked' : ''}} name="filter[]" class="checkboxPrimary3">
                        <label>DisChargingUTAlarm</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingUTProtect"  {{in_array('DisChargingUTProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingUTProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="DisChargingUTReleaseProtect"  {{in_array('DisChargingUTReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>DisChargingUTReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="MosOTAlarm"  {{in_array('MosOTAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>MosOTAlarm</label>
                    </div>
                    </span>
                    <span class="badge">

                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="MosOTProtect"  {{in_array('MosOTProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>MosOTProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="MosOTReleaseProtect"  {{in_array('MosOTReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>MosOTReleaseProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentOTAlarm"  {{in_array('EnvironmentOTAlarm',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>EnvironmentOTAlarm</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentOTProtect"  {{in_array('EnvironmentOTProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>EnvironmentOTProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentOTReleaseProtect"  {{in_array('EnvironmentOTReleaseProtect',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>EnvironmentOTReleaseProtect</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentUTAlarm"  {{in_array('EnvironmentUTAlarm',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>EnvironmentUTAlarm</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentUTProtect"  {{in_array('EnvironmentUTProtect',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>EnvironmentUTProtect</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="EnvironmentUTReleaseProtect"  {{in_array('EnvironmentUTReleaseProtect',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>EnvironmentUTReleaseProtect</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BalanceStartCellVoltage"  {{in_array('BalanceStartCellVoltage',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>BalanceStartCellVoltage</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BalanceStartDeltaVoltage"  {{in_array('BalanceStartDeltaVoltage',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>BalanceStartDeltaVoltage</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackFullChargeVoltage"  {{in_array('PackFullChargeVoltage',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackFullChargeVoltage</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="PackFullChargeCurrent"  {{in_array('PackFullChargeCurrent',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>PackFullChargeCurrent</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox"  value="CellSleepVoltage"  {{in_array('CellSleepVoltage',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                        <label>CellSleepVoltage</label>
                    </div>
                    </span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="CellSleepDelayTime"  {{in_array('CellSleepDelayTime',$filter) ? 'checked' : ''}} name="filter[]"   class="checkboxPrimary3">
                        <label>CellSleepDelayTime</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ShortCircuitProtectDelayTime"  {{in_array('ShortCircuitProtectDelayTime',$filter) ? 'checked' : ''}}   name="filter[]" class="checkboxPrimary3">
                        <label>ShortCircuitProtectDelayTime</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="SocAlarmThreshold"  {{in_array('SocAlarmThreshold',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>SocAlarmThreshold</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingOCProtect2" {{in_array('ChargingOCProtect2',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingOCProtect2</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="ChargingOCProtect2DelayTime"  {{in_array('ChargingOCProtect2DelayTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>ChargingOCProtect2DelayTime</label>
                    </div></span>
                    <span class="badge">
                    <div class="icheck-primary d-inline">
                        <input type="checkbox" value="BMS_DateTime"  {{in_array('BMS_DateTime',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                        <label>BMS_DateTime</label>
                    </div></span>
                    @else
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acPushCount" {{in_array('acPushCount',$filter) ? 'checked' : ''}}  name="filter[]" class="checkboxPrimary3">
                            <label>acPushCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acUpdateTime" {{in_array('acUpdateTime',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>acUpdateTime</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acInForkCount" {{in_array('acInForkCount',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>acInForkCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcOutAA" {{in_array('dcOutAA',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>	dcOutAA</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcOutBA" {{in_array('dcOutBA',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>	dcOutBA</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcOutCA" {{in_array('dcOutCA',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>	dcOutCA</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcPushCount" {{in_array('dcPushCount',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcPushCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcUpdateTime" {{in_array('dcUpdateTime',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcUpdateTime</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcOutVolt" {{in_array('dcOutVolt',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>	dcOutVolt</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcTotalLoad"  {{in_array('dcTotalLoad',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>dcTotalLoad</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcBetteryCount"  {{in_array('dcBetteryCount',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>dcBetteryCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcForkCount" {{in_array('dcForkCount',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcForkCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcUDefCount" {{in_array('dcUDefCount',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcUDefCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="rectifierUpdateTime" {{in_array('rectifierUpdateTime',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>rectifierUpdateTime</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="DeviceType"  {{in_array('DeviceType',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>DeviceType</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="Version" {{in_array('Version',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>Version</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="Data_source"  {{in_array('Data_source',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>Data_source</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acSettingUpdateTime" {{in_array('acSettingUpdateTime',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>acSettingUpdateTime</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acInPowVTL"  {{in_array('acInPowVTL',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>acInPowVTL</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acInPowVBL" {{in_array('acInPowVBL',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>acInPowVBL</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="acInPowVLL"  {{in_array('acInPowVLL',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>acInPowVLL</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcSettingUpdateTime" {{in_array('dcSettingUpdateTime',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcSettingUpdateTime</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcPowVAlarmTL" {{in_array('dcPowVAlarmTL',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcPowVAlarmTL</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcPowVAlarmBL" {{in_array('dcPowVAlarmBL',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>dcPowVAlarmBL</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dcASUDefCount"  {{in_array('dcASUDefCount',$filter) ? 'checked' : ''}} name="filter[]"  class="checkboxPrimary3">
                            <label>dcASUDefCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="ac_AlarmSetsCount" {{in_array('ac_AlarmSetsCount',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
                            <label>ac_AlarmSetsCount</label>
                        </div>
                    </span>
    
                    <span class="badge">
                        <div class="icheck-primary d-inline">
                            <input type="checkbox" value="dc_AlarmSetsCount" {{in_array('dc_AlarmSetsCount',$filter) ? 'checked' : ''}}  name="filter[]"  class="checkboxPrimary3">
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
                        <label for="">From Date:</label>
                        <input type="date" name="from" value="{{$from}}" id="" class="form-control datetimepicker-input" placeholder="From">
                        </div>
                        
                        <div class="col-md-2">
                        <label for="">To Date:</label>
                        <input type="date" name="to" value="{{$to}}" id="" class="form-control datetimepicker-input" placeholder="To">
                        </div>
                        <div class="col-md-2 col-sm-3 ">
                        <div class="form-group">
                            <label>Select MacId / SiteId</label>
                            <div class="select2-purple">
                            <select class="select2-another" multiple="multiple" name="macids[]" id="search" data-placeholder="Select Device" style="width: 100%;">
                                @foreach($device as $mac)                            
                                <option {{in_array($mac->macid,$macids) ? 'selected' : ''}}>{{$mac->macid}}</option>
                                @endforeach                    
                            </select>
                            </div>
                        </div>                        
                        </div>
                        <div class="col-md-2 col-sm-2 ">
                            <div class="form-group">
                              <label>Per Page</label>
                            <input type="text" name="pages" value="{{$pages}}" class="form-control datetimepicker-input" placeholder="Data Per Page">
                            </div>
                          </div>
                        
                        <div class="col-md-2 mt-4">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" >Search</button>
                        </div>
                        </div>
                        <?php $fn = isset($type) ? $type."AllFilterData.csv" : "AllData.csv";?>
                        <div class="col-md-2 mt-4">
                            <button class="btn btn-sm btn-primary" onclick="exportTableToCSV('{{$fn}}')">Export To CSV</button>
                        </div>
                    </div>
                
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </form>
    <!-- /.form -->
      
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                      
                      <div class="card-body">
                
                
                        <div class="table-responsive">
                     
                
                            <table class="table table-hover table-sm table-bordered table-striped">
                
                                <thead>
                                    <tr >
                                        
                                        <th colspan="" rowspan="" headers="" scope="">SL</th>
                                        <th>Action</th>
                                        <th colspan="" rowspan="" headers="" scope="">Last Update</th>
        
                                        <th colspan="" rowspan="" headers="" scope="">MacId</th>                                
                
                                        @foreach($filter as $f)
                                                <th colspan="" rowspan="" headers="" scope="">{{$f}}</th>
                                        @endforeach
                                    
                                    </tr>
                                </thead>
                
                                <tbody class="w3-small"> 
                                    <?php $i = (($items->currentPage() - 1) * $items->perPage() + 1); ?>
                                
                                        @foreach ($items as $item)
                
                                            <tr class="nowrap">
                                    
                                                <td>{{$i}}</td>
                                                <td>
                                                    <a target="_blank" class="btn btn-xs btn-primary w3-tiny  py-0" href="#">Details</a>
                                                </td>
                                                <td>{{$item->macid}}</td>
                                                <td>{{$item->updated_at}}</td> 
                
                                                @foreach($filter as $f)
                                        
                                                    @if($f == 'SiteName')
                                                        <td>{{$item->productData->title}}</td>
        
                                                        @elseif($f == 'Region')
        
                                                        <td>{{$item->productLocationData ? $item->productLocationData->region : ''}}</td>
                                                        @elseif($f == 'Zone')
                                                        <td>{{$item->productLocationData ? $item->productLocationData->zone : ''}}</td>
                                                        @elseif($f == 'Cluster')
                                                        <td>{{$item->productLocationData ? $item->productLocationData->cluster : ''}}</td>
                                                        @elseif($f == 'Lat')
                                                        <td>{{$item->productLocationData ? $item->productLocationData->lat : ''}}</td>
                                                        @elseif($f == 'Lng')
                                                        <td>{{$item->productLocationData ? $item->productLocationData->lng : ''}}</td>
                                                        @elseif($f == 'Location')
                                                        <td>{{$item->productLocationData ? $item->productLocationData->location : ''}}</td>
                                                    @elseif($f == 'BetteryA')
                                                        <td>{{$item->productData->BetteryA}}</td>
                                                        
                                                    @elseif($f == 'BetteryV_All')
                                                        <td>{{$item->productData->BetteryV_All}}</td>
                                                    @elseif($f == 'SOC')
                                                        <td>{{$item->productData->SOC}}</td>
                                                    @elseif($f == 'SOH')
                                                        <td>{{$item->productData->SOH}}</td>
                                                    @elseif($f == 'RemainingCapacity')
                                                        <td>{{$item->productData->RemainingCapacity}}</td>
                                                        @elseif($f == 'FullCapacity')
                                                        <td>{{$item->productData->FullCapacity}}</td>
                                                        @elseif($f == 'DesignCapacity')
                                                        <td>{{$item->productData->DesignCapacity}}</td>
                                                        @elseif($f == 'BXHC')
                                                        <td>{{$item->productData->BXHC}}</td>
        
                                                        @elseif($f == 'BetteryV_1')
                                                        <td>{{$item->productData->BetteryV_1}}</td>
                                                        @elseif($f == 'BetteryV_2')
                                                        <td>{{$item->productData->BetteryV_2}}</td>
                                                        @elseif($f == 'BetteryV_3')
                                                        <td>{{$item->productData->BetteryV_3}}</td>
                                                        @elseif($f == 'BetteryV_4')
                                                        <td>{{$item->productData->BetteryV_4}}</td>
                                                        @elseif($f == 'BetteryV_5')
                                                        <td>{{$item->productData->BetteryV_5}}</td>
                                                        @elseif($f == 'BetteryV_6')
                                                        <td>{{$item->productData->BetteryV_6}}</td>
                                                        @elseif($f == 'BetteryV_7')
                                                        <td>{{$item->productData->BetteryV_7}}</td>
                                                        @elseif($f == 'BetteryV_8')
                                                        <td>{{$item->productData->BetteryV_8}}</td>
                                                        @elseif($f == 'BetteryV_9')
                                                        <td>{{$item->productData->BetteryV_9}}</td>
                                                        @elseif($f == 'BetteryV_10')
                                                        <td>{{$item->productData->BetteryV_10}}</td>
                                                        @elseif($f == 'BetteryV_11')
                                                        <td>{{$item->productData->BetteryV_11}}</td>
                                                        @elseif($f == 'BetteryV_12')
                                                        <td>{{$item->productData->BetteryV_12}}</td>
                                                        @elseif($f == 'BetteryV_13')
                                                        <td>{{$item->productData->BetteryV_13}}</td>
                                                        @elseif($f == 'BetteryV_14')
                                                        <td>{{$item->productData->BetteryV_14}}</td>
                                                        @elseif($f == 'BetteryV_15')
                                                        <td>{{$item->productData->BetteryV_15}}</td>
        
                                                        @elseif($f == 'TC_B_1')
                                                        <td>{{$item->productData->TC_B_1}}</td>
                                                        @elseif($f == 'TC_B_2')
                                                        <td>{{$item->productData->TC_B_2}}</td>
                                                        @elseif($f == 'TC_B_3')
                                                        <td>{{$item->productData->TC_B_3}}</td>
                                                        @elseif($f == 'TC_B_4')
                                                        <td>{{$item->productData->TC_B_4}}</td>
                                                        @elseif($f == 'MosTemperature')
                                                        <td>{{$item->productData->MosTemperature}}</td>
                                                        
                                                        @elseif($f == 'DisChargeAH')
                                                        <td>{{$item->productData->DisChargeAH}}</td>
                                                        @elseif($f == 'DisChargKWH')
                                                        <td>{{$item->productData->DisChargKWH}}</td>
                                                        @elseif($f == 'acPushCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->acPushCount : ''}}</td>
                                                        @elseif($f == 'acUpdateTime')
                                                        <td>{{$item->productRectData ? $item->productRectData->acUpdateTime : ''}}</td>
                                                        @elseif($f == 'dcASUDefCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcASUDefCount : ''}}</td>


                                                        @elseif($f == 'acInForkCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->acInForkCount : ''}}</td>
                                                        @elseif($f == 'dcOutAA')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcOutAA : ''}}</td>
                                                        @elseif($f == 'dcOutBA')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcOutBA : ''}}</td>
                                                        @elseif($f == 'dcOutCA')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcOutCA : ''}}</td>

                                                        @elseif($f == 'dcPushCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcPushCount : ''}}</td>
                                                        @elseif($f == 'dcUpdateTime')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcUpdateTime : ''}}</td>
                                                        @elseif($f == 'dcOutVolt')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcOutVolt : ''}}</td>
                                                        @elseif($f == 'dcTotalLoad')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcTotalLoad : ''}}</td>
                                                        @elseif($f == 'dcBetteryCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcBetteryCount : ''}}</td>
                                                        @elseif($f == 'dcForkCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcForkCount : ''}}</td>
                                                        @elseif($f == 'dcUDefCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcUDefCount : ''}}</td>
                                                        @elseif($f == 'rectifierUpdateTime')
                                                        <td>{{$item->productRectData ? $item->productRectData->rectifierUpdateTime : ''}}</td>
                                                        @elseif($f == 'DeviceType')
                                                        <td>{{$item->productRectData ? $item->productRectData->DeviceType : ''}}</td>
                                                        @elseif($f == 'Version')
                                                        <td>{{$item->productRectData ? $item->productRectData->Version : ''}}</td>
                                                        @elseif($f == 'Data_source')
                                                        <td>{{$item->productRectData ? $item->productRectData->Megmeet : ''}}</td>
                                                        @elseif($f == 'acSettingUpdateTime')
                                                        <td>{{$item->productRectData ? $item->productRectData->acSettingUpdateTime : ''}}</td>
                                                        @elseif($f == 'acInPowVTL')
                                                        <td>{{$item->productRectData ? $item->productRectData->acInPowVTL : ''}}</td>
                                                        @elseif($f == 'acInPowVBL')
                                                        <td>{{$item->productRectData ? $item->productRectData->acInPowVBL : ''}}</td>
                                                        @elseif($f == 'acInPowVLL')
                                                        <td>{{$item->productRectData ? $item->productRectData->acInPowVLL : ''}}</td>
                                                        @elseif($f == 'dcSettingUpdateTime')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcSettingUpdateTime : ''}}</td>
                                                        @elseif($f == 'dcPowVAlarmTL')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcPowVAlarmTL : ''}}</td>
                                                        @elseif($f == 'dcPowVAlarmBL')
                                                        <td>{{$item->productRectData ? $item->productRectData->dcPowVAlarmBL : ''}}</td>
                                                        @elseif($f == 'ac_AlarmSetsCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->ac_AlarmSetsCount : ''}}</td>
                                                        @elseif($f == 'dc_AlarmSetsCount')
                                                        <td>{{$item->productRectData ? $item->productRectData->dc_AlarmSetsCount : ''}}</td>
                                                    @else
                                                        <td>{{$item[$f]}}</td>
                                                    @endif
                                                @endforeach                          
                
                                            </tr>
                                        <?php $i++; ?>
                                        
                                    @endforeach        
                                
                                </tbody>
                
                            </table>
                
                        </div>
                  
                
                    </div>
                </div>        
                </div>
                    {{$items->appends([ 'pages'=> $pages,'macids' => $macids, 'filter'=>$filter, 'from'=>$from,'to'=>$to])->render()}}
        
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
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     // document.body.innerHTML = originalContents;
   };

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

