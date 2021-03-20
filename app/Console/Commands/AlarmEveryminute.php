<?php

namespace App\Console\Commands;

use Auth;
use Hash;
use DB;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Company;
use GuzzleHttp\Client;
use App\Model\Product;
use App\Model\ProductData;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use App\Model\ProductAlarmData;
use App\Model\ProductSettingData;
use App\Model\ProductRectAcDcInfo;
use App\Model\ProductLocationData;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Model\ProductRectAcDcInfoItem;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;

class AlarmEveryminute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alarm:everyminute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Every minute retrives alarm from ufo server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $companies = Company::where('status', 'active')->latest()->get();

        foreach ($companies as $company) 
        {


            ##################################
            ////////////services all live start and login-check

            $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=getDeviceList&mds={$company->mds}";

            $client = new Client();

            try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();
                $arr = json_decode($result, true);
                $object = (object)$arr;
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }

            //loggedin company
            if($object->success == 'true')
            {
                foreach($object->rows as $device)
                {
                    $item = $company->products()->where('macid', $device['macid'])->first();
                    if(!$item)
                    {
                        $item = new Product;
                        $item->objectid = $device['objectid'];
                        $item->macid = $device['macid'];
                        $item->platenumber = $device['platenumber'];
                        $item->status = 'active';
                        $item->title = $device['fullName'];
                        $item->title_live = $device['fullName'];
                        $item->update_time = $device['updtime'];
                        $item->gps_time = $device['gpstime'];
                        $item->server_time = $device['server_time'];
                        $item->company_id = $company->id;
                        $item->save();
                    }
                    else
                    {
                        $item->status = 'active';
                        $item->update_time = $device['updtime'];
                        $item->gps_time = $device['gpstime'];
                        $item->server_time = $device['server_time'];
                        $item->title_live = $device['fullName'];
                        $item->updated_at = Carbon::now();
                        $item->save();
                    }

                    $company->products()
                    ->where('status','<>', 'inactive')
                    ->where('updated_at', '<', Carbon::now()->subMinutes(59))
                    ->update(['status'=>'inactive']);
                }
            }else
            {
                //login confirm
                $url = "http://fdapp.18gps.net//GetDataService.aspx?method=loginSystem&LoginName={$company->login_code}&LoginPassword={$company->login_password}&LoginType={$company->login_type}&language=en&ISMD5=0&timeZone=+06&apply=APP&loginUrl=";
                $client = new Client();
                try {
                    $r = $client->request('GET', $url);
                    $result = $r->getBody()->getContents();
                    $arr = json_decode($result, true);
                    if($arr['success'] == 'true')
                    {
                        $company->school_id = $arr['id'];
                        $company->mds = $arr['mds'];
                        $company->grade = $arr['grade'];
                        $company->loggedin_at = Carbon::now();
                        $company->save();
                    }
                } catch (\GuzzleHttp\Exception\ConnectException $e) {
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                }

                $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=getDeviceList&mds={$company->mds}";

                // dd($url);
                $client = new Client();
                try {
                    $r = $client->request('GET', $url);
                    $result = $r->getBody()->getContents();
                    $arr = json_decode($result, true);
                    $object = (object)$arr;
                } catch (\GuzzleHttp\Exception\ConnectException $e) {
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                }

                if($object->success == 'true')
                {
                    foreach($object->rows as $device)
                    {

                        $item = $company->products()->where('macid', $device['macid'])->first();
                        if(!$item)
                        {
                            $item = new Product;
                            $item->objectid = $device['objectid'];
                            $item->macid = $device['macid'];
                            $item->platenumber = $device['platenumber'];
                            $item->status = 'active';
                            $item->title = $device['fullName'];
                            $item->title_live = $device['fullName'];
                            $item->update_time = $device['updtime'];
                            $item->gps_time = $device['gpstime'];
                            $item->server_time = $device['server_time'];
                            $item->company_id = $company->id;
                            $item->save();
                        }
                        else
                        {
                            $item->status = 'active';
                            $item->title_live = $device['fullName'];
                            $item->update_time = $device['updtime'];
                            $item->gps_time = $device['gpstime'];
                            $item->server_time = $device['server_time'];
                            $item->updated_at = Carbon::now();
                            $item->save();
                        }

                        $company->products()->where('status','<>', 'inactive')->where('updated_at', '<', Carbon::now()->subMinutes(59))->update(['status'=>'inactive']);
                    }
                }
            }


            /////////// services all live end
            ###################################


                    ######################################################
                    ///////////////////////////// alarm api data get
            $alarm_url = "http://fdweb.18gps.net//GetDataService.aspx?method=queryLocalAlarmInfoUtc&mds={$company->mds}&school_id={$company->school_id}&type=product&max_time=".time();
            $alarmrows = [];
            $alarm_client = new Client();
            try {
                $rr = $client->request('GET', $alarm_url);
                $rresult = $rr->getBody()->getContents();
                if($rresult)
                {
                    $rarr = json_decode($rresult, true);

                    // dd($rarr);
                    if($rarr['success'] == 'true')
                    {

                        $alarmrows = $rarr['rows'];
                    }

                }
            }
            catch (\GuzzleHttp\Exception\ConnectException $e) {
            } 
                    ////////////////////////////// alarm api data geting end
                    ########################################################


                    ////////////////////////////
            $products = $company->products()->where('status', 'active')->get();
            foreach ($products as $product)
            {             




                       /////////////////////////// data saving start
               $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=BMSrealTimeState&mds={$company->mds}&macid={$product->macid}&_r={time()}";

               $client = new Client();

               try {

                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();

                $arr = json_decode($result, true);

                if($arr['success'] == 'true')
                {
                    $data = $arr['data'][0];
                    $state = json_decode($data['State'], true);

                    $setting = json_decode($data['Seting'], true);

                    $data = new ProductData;

                    $data->company_id = $product['company_id'];
                    $data->product_id = $product['id'];
                    $data->objectid = $product['objectid'];
                    $data->macid = $product['macid'];
                    $data->platenumber = $product['platenumber'];
                    $data->sim = $product['sim'];
                    $data->iccid = $product['iccid'];
                    $data->model = $product['model'];
                    $data->title = $product['title'];
                    $data->title_live = $product['title_live'];
                    $data->description = $product['description'];
                    $data->offline = $product['offline'];
                    $data->use_status = $product['use_status'];
                    $data->update_time = $product['update_time'];
                    $data->gps_time = $product['gps_time'];
                    $data->server_time = $product['server_time'];


                    $data->BetteryA = $state['BetteryA'];
                    $data->BetteryV_All = $state['BetteryV_All'];
                    $data->SOC = $state['SOC'];
                    $data->SOH = $state['SOH'];
                    $data->RemainingCapacity = $state['RemainingCapacity'];
                    $data->FullCapacity = $state['FullCapacity'];
                    $data->DesignCapacity = $state['DesignCapacity'];
                    $data->BXHC = $state['BXHC'];
                    $data->BetteryV_1 = $state['BetteryV_1'];
                    $data->BetteryV_2 = $state['BetteryV_2'];
                    $data->BetteryV_3 = $state['BetteryV_3'];
                    $data->BetteryV_4 = $state['BetteryV_4'];
                    $data->BetteryV_5 = $state['BetteryV_5'];
                    $data->BetteryV_6 = $state['BetteryV_6'];
                    $data->BetteryV_7 = $state['BetteryV_7'];
                    $data->BetteryV_8 = $state['BetteryV_8'];
                    $data->BetteryV_9 = $state['BetteryV_9'];
                    $data->BetteryV_10 = $state['BetteryV_10'];
                    $data->BetteryV_11 = $state['BetteryV_11'];
                    $data->BetteryV_12 = $state['BetteryV_12'];
                    $data->BetteryV_13 = $state['BetteryV_13'];
                    $data->BetteryV_14 = $state['BetteryV_14'];
                    $data->BetteryV_15 = $state['BetteryV_15'];
                    $data->TC_B_1 = $state['TC_B_1'];
                    $data->TC_B_2 = $state['TC_B_2'];
                    $data->TC_B_3 = $state['TC_B_3'];
                    $data->TC_B_4 = $state['TC_B_4'];
                    $data->MosTemperature = $state['MosTemperature'];
                    $data->EnvironmentTemperature = $state['EnvironmentTemperature'];
                    $data->DisChargeAH = $state['DisChargeAH'];
                    $data->DisChargeKWH = $state['DisChargeKWH'];
                    $data->BMS_DateTime = $state['BMS_DateTime'];

                    $data->save();

                    $set = new ProductSettingData;
                    $set->company_id = $product['company_id'];
                    $set->product_id = $product['id'];
                    $set->product_data_id = $data->id;
                    $set->objectid = $product['objectid'];
                    $set->macid = $product['macid'];

                    $set->OriginalData = $setting['OriginalData'];
                    $set->PackOVAlarm = $setting['PackOVAlarm'];
                    $set->PackOVProtect = $setting['PackOVProtect'];
                    $set->PackOVReleaseProtect = $setting['PackOVReleaseProtect'];
                    $set->PackOVProtectDelayTime = $setting['PackOVProtectDelayTime'];
                    $set->CellOVAlarm = $setting['CellOVAlarm'];
                    $set->CellOVProtect = $setting['CellOVProtect'];
                    $set->CellOVReleaseProtect = $setting['CellOVReleaseProtect'];
                    $set->CellOVProtectDelayTime = $setting['CellOVProtectDelayTime'];
                    $set->PackUVAlarm = $setting['PackUVAlarm'];
                    $set->PackUVProtect = $setting['PackUVProtect'];
                    $set->PackUVReleaseProtect = $setting['PackUVReleaseProtect'];
                    $set->PackUVProtectDelayTime = $setting['PackUVProtectDelayTime'];
                    $set->CellUVAlarm = $setting['CellUVAlarm'];
                    $set->CellUVProtect = $setting['CellUVProtect'];
                    $set->CellUVReleaseProtect = $setting['CellUVReleaseProtect'];
                    $set->CellUVProtectDelayTime = $setting['CellUVProtectDelayTime'];
                    $set->ChargingOCAlarm = $setting['ChargingOCAlarm'];
                    $set->ChargingOCProtect1 = $setting['ChargingOCProtect1'];
                    $set->ChargingOCProtect1DelayTime = $setting['ChargingOCProtect1DelayTime'];
                    $set->DisChargingOCAlarm = $setting['DisChargingOCAlarm'];
                    $set->DisChargingOCProtect1 = $setting['DisChargingOCProtect1'];
                    $set->DisChargingOCProtect1DelayTime = $setting['DisChargingOCProtect1DelayTime'];
                    $set->DisChargingOCProtect2 = $setting['DisChargingOCProtect2'];
                    $set->DisChargingOCProtect2DelayTime = $setting['DisChargingOCProtect2DelayTime'];
                    $set->ChargingOTAlarm = $setting['ChargingOTAlarm'];
                    $set->ChargingOTProtect = $setting['ChargingOTProtect'];
                    $set->ChargingOTReleaseProtect = $setting['ChargingOTReleaseProtect'];
                    $set->DisChargingOTAlarm = $setting['DisChargingOTAlarm'];
                    $set->DisChargingOTProtect = $setting['DisChargingOTProtect'];
                    $set->DisChargingOTReleaseProtect = $setting['DisChargingOTReleaseProtect'];
                    $set->ChargingUTAlarm = $setting['ChargingUTAlarm'];
                    $set->ChargingUTProtect = $setting['ChargingUTProtect'];
                    $set->ChargingUTReleaseProtect = $setting['ChargingUTReleaseProtect'];
                    $set->DisChargingUTAlarm = $setting['DisChargingUTAlarm'];
                    $set->DisChargingUTProtect = $setting['DisChargingUTProtect'];
                    $set->DisChargingUTReleaseProtect = $setting['DisChargingUTReleaseProtect'];
                    $set->MosOTAlarm = $setting['MosOTAlarm'];
                    $set->MosOTProtect = $setting['MosOTProtect'];
                    $set->MosOTReleaseProtect = $setting['MosOTReleaseProtect'];
                    $set->EnvironmentOTAlarm = $setting['EnvironmentOTAlarm'];
                    $set->EnvironmentOTProtect = $setting['EnvironmentOTProtect'];
                    $set->EnvironmentOTReleaseProtect = $setting['EnvironmentOTReleaseProtect'];
                    $set->EnvironmentUTAlarm = $setting['EnvironmentUTAlarm'];
                    $set->EnvironmentUTProtect = $setting['EnvironmentUTProtect'];
                    $set->EnvironmentUTReleaseProtect = $setting['EnvironmentUTReleaseProtect'];
                    $set->BalanceStartCellVoltage = $setting['BalanceStartCellVoltage'];
                    $set->BalanceStartDeltaVoltage = $setting['BalanceStartDeltaVoltage'];
                    $set->PackFullChargeVoltage = $setting['PackFullChargeVoltage'];
                    $set->PackFullChargeCurrent = $setting['PackFullChargeCurrent'];
                    $set->CellSleepVoltage = $setting['CellSleepVoltage'];
                    $set->CellSleepDelayTime = $setting['CellSleepDelayTime'];
                    $set->ShortCircuitProtectDelayTime = $setting['ShortCircuitProtectDelayTime'];
                    $set->SocAlarmThreshold = $setting['SocAlarmThreshold'];
                    $set->ChargingOCProtect2 = $setting['ChargingOCProtect2'];
                    $set->ChargingOCProtect2DelayTime = $setting['ChargingOCProtect2DelayTime'];
                    $set->BMS_DateTime = $setting['BMS_DateTime'];
                    $set->save();

                    $loc = new ProductLocationData;

                    $rec = new ProductRectAcDcInfo;

                            /////////////////
                    $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetBmsSNInfo&mds={$company->mds}&Macid={$product->macid}&Key=BMS_Version&_r={time()}";
                    $client = new Client();

                    try {
                        $r = $client->request('GET', $url);
                        $result = $r->getBody()->getContents();

                        $arr = json_decode($result, true);
                // dd($arr);


                        if($arr['success'] == 'true')
                        {
                            $bdata = json_decode($arr['data'][0], true);

                            $data->Version = $bdata['Version'];
                            $data->BMS_SN = $bdata['BMS_SN'];
                            $data->Pack_SN = $bdata['Pack_SN'];
                            $data->Version_BMS_DateTime = $bdata['BMS_DateTime'];
                            $data->save();

                  //                   "Version" => "P15S100A-9A57-1.00  "
                  // "BMS_SN" => "9A57100020090J      "
                  // "Pack_SN" => "2909200310142       "
                  // "BMS_DateTime" => "1598527188919"

                    // dd(array_keys($data));
                    // Version
                    // BMS_SN
                    // Pack_SN
                    // Version_BMS_DateTime


                        }
                    }
                    catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
                    }




/////////////////rectifire data start/////////////

$url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid={$product->macid}&key=MAC2600_InfoDict";

        $client = new Client();

        try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();
                $arr = json_decode($result, true);
                // $object = (object)$arr;

                if($arr['success'] == 'true')
                {
                    $d = $arr['data'][0];

                    $e  = json_decode($d['Data'], true);

                    if($e)
                    {
                        $rec->company_id = $data->company_id;
                        $rec->product_id = $data->product_id;
                        $rec->product_data_id = $data->id;
                        $rec->objectid = $data->objectid;
                        $rec->macid = $data->macid;
                        
                        $rec->acPushCount = $e['acPushCount'];
                        $rec->acUpdateTime = $e['ac_InfoList'][0]['updateTime'];
                        $rec->acInForkCount = $e['ac_InfoList'][0]['acInForkCount'];
                        $rec->dcOutAA = $e['ac_InfoList'][0]['dcOutAA'];
                        $rec->dcOutBA = $e['ac_InfoList'][0]['dcOutBA'];
                        $rec->dcOutCA = $e['ac_InfoList'][0]['dcOutCA'];

                        $rec->dcPushCount = $e['dcPushCount'];
                        $rec->dcUpdateTime = $e['dc_InfoList'][0]['updateTime'];
                        $rec->dcOutVolt = $e['dc_InfoList'][0]['dcOutVolt'];
                        $rec->dcTotalLoad = $e['dc_InfoList'][0]['dcTotalLoad'];
                        $rec->dcBetteryCount = $e['dc_InfoList'][0]['dcBetteryCount'];
                        $rec->dcForkCount = $e['dc_InfoList'][0]['dcForkCount'];
                        $rec->dcUDefCount = $e['dc_InfoList'][0]['dcUDefCount'];
                        $rec->save();

                        foreach($e['ac_InfoList'][0]['ac_InLineList'] as $key => $line)
                        {
                            $i = new ProductRectAcDcInfoItem;
                            $i->company_id = $data->company_id;
                            $i->product_id = $data->product_id;
                            $i->product_data_id = $data->id;
                            $i->product_rect_ac_dc_info_id = $rec->id;
                            $i->title = 'ac_InLineList';
                            $i->array_key = $key;
                            $i->array_value = null;
                            $i->comment = null;
                            $i->acInLineAV = $line['acInLineAV'];
                            $i->acInLineBV = $line['acInLineBV'];
                            $i->acInLineCV = $line['acInLineCV'];
                            $i->acInLinePW = $line['acInLinePW'];
                            $i->acUDefCount = $line['acUDefCount'];

                            $i->save();

                        }


                        foreach($e['dc_InfoList'][0]['dcBetteryAList'] as $key => $line)
                        {
                            $i = new ProductRectAcDcInfoItem;
                            $i->company_id = $data->company_id;
                            $i->product_id = $data->product_id;
                            $i->product_data_id = $data->id;
                            $i->product_rect_ac_dc_info_id = $rec->id;
                            $i->title = 'dcBetteryAList';
                            $i->array_key = $key;
                            $i->array_value = $line;

                            if($key == 0)
                            {
                                $i->comment = "Batt1Curr";
                            }
                         
                            $i->save();

                        }

                        foreach($e['dc_InfoList'][0]['dcUDefValList'] as $key => $line)
                        {
                            $i = new ProductRectAcDcInfoItem;
                            $i->company_id = $data->company_id;
                            $i->product_id = $data->product_id;
                            $i->product_data_id = $data->id;
                            $i->product_rect_ac_dc_info_id = $rec->id;
                            $i->title = 'dcUDefValList';
                            $i->array_key = $key;
                            $i->array_value = $line;

                            if($key == 2)
                            {
                                $i->comment = 'Batt1Cap';

                            }

                            if($key == 4)
                            {
                                $i->comment = 'Temp1';
                            }

                            if($key == 5)
                            {
                                $i->comment = 'Temp4';
                            }

                            if($key == 6)
                            {
                                $i->comment = 'Temp3';
                            }

                            if($key == 7)
                            {
                                $i->comment = 'Temp2';
                            }
                         
                            $i->save();

                        }
                    }
                }


            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }



            $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid={$product->macid}&key=MC2600_RectificationDict";

        $client = new Client();

        try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();
                $arr = json_decode($result, true);

                if($arr['success'] == 'true')
                {
                    $d = $arr['data'][0];
                    $e  = json_decode($d['Data'], true);

                    if($e)
                    {
                        $rec->rectifierUpdateTime = $e['rectifierInfo']['updateTime'];
                        $rec->DeviceType = $e['rectifierInfo']['DeviceType'];
                        $rec->Version = $e['rectifierInfo']['Version'];
                        // $rec->Megmeet = $e['rectifierInfo']['Megmeet'];
                        $rec->Megmeet = 'SARBS';

                        $rec->save();
                    }
                }
                

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }


                 $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid={$product->macid}&key=MAC2600_SettingDict";

        $client = new Client();

        try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();
                $arr = json_decode($result, true);

                if($arr['success'] == 'true')
                {
                    $d = $arr['data'][0];
                    $e  = json_decode($d['Data'], true);

                    if($e)
                    {
                        $rec->acSettingUpdateTime = $e['ac_Setting']['updateTime'];
                        $rec->acInPowVTL = $e['ac_Setting']['acInPowVTL'];
                        $rec->acInPowVBL = $e['ac_Setting']['acInPowVBL'];
                        $rec->acInPowVLL = $e['ac_Setting']['acInPowVLL'];

                        $rec->dcSettingUpdateTime = $e['dc_Setting']['updateTime'];
                        $rec->dcPowVAlarmTL = $e['dc_Setting']['dcPowVAlarmTL'];
                        $rec->dcPowVAlarmBL = $e['dc_Setting']['dcPowVAlarmBL'];
                        $rec->dcASUDefCount = $e['dc_Setting']['dcASUDefCount'];
                        $rec->ac_AlarmSetsCount = $e['ac_AlarmSetsCount'];
                        $rec->dc_AlarmSetsCount = $e['dc_AlarmSetsCount'];                        

                        $rec->save();


                        foreach($e['dc_Setting']['dcASUDefValList'] as $key => $line)
                        {
                            $i = new ProductRectAcDcInfoItem;
                            $i->company_id = $data->company_id;
                            $i->product_id = $data->product_id;
                            $i->product_data_id = $data->id;
                            $i->product_rect_ac_dc_info_id = $rec->id;
                            $i->title = 'dcASUDefValList';
                            $i->array_key = $key;
                            $i->array_value = $line;
                            if($key == 7)
                            {
                                $i->comment = 'Batt1TH+';

                            }

                            if($key == 8)
                            {
                                $i->comment = 'Batt1TL';

                            }

                            if($key == 9)
                            {
                                $i->comment = 'Batt1TH';

                            }

                            if($key == 10)
                            {
                                $i->comment = 'Batt2TL';

                            }

                            if($key == 16)
                            {
                                $i->comment = 'Batt Fuse Num';

                            }

                            if($key == 23)
                            {
                                $i->comment = 'Batt2TH';

                            }

                            if($key == 24)
                            {
                                $i->comment = 'Batt2TH+';

                            }
                         
                            $i->save();

                        }

                    }
                }

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }

    if($rec->id)
    {
        $set->product_rect_ac_dc_info_id = $rec->id;
        $set->save();

        if($product->type != 'rectifier')
        {
            $product->type = "rectifier";
            $product->save();
        }

    }
    else
        {
        if($product->type != 'battery')
        {
            $product->type = "battery";
            $product->save();
        }

    }

/////////////////rectifire data end/////////////







///////////////////////////////

// $url = url('http://poi.18gps.net/poi?lat=23.78539508&lon=90.4131965&timestamp='.time());


                    $url = url('http://fdweb.18gps.net/TrackService.aspx?method=getOnlineGpsInfoByIDUtc&school_id='.$company->school_id.'&custid='.$company->school_id.'&mapType=GOOGLE&option=en&t='.time().'&mds='.$company->mds.'&userIDs='.$product['objectid'].'&custname='.$product['platenumber'].'&timestamp='.time());

                    $client = new Client();

                    try {
                        $r = $client->request('GET', $url);
                        $result = $r->getBody()->getContents();

                        $arr = json_decode($result, true);
                // dd($arr);
                        $records = $arr['records'];
                // dd($records[0][2]);




                        if($records)
                        {

                            ProductLocationData::where('live', 1)->where('product_id', $data->product_id)->update(['live'=>0]);

                            $loc->company_id = $data->company_id;
                            $loc->product_id = $data->product_id;
                            $loc->product_data_id = $data->id;
                            $loc->objectid = $data->objectid;
                            $loc->macid = $data->macid;
                            $loc->region = $product->region;
                            $loc->zone = $product->zone;
                            $loc->cluster = $product->cluster;
                            $loc->lat = $records[0][2];
                            $loc->lng = $records[0][1];
                            $loc->live = 1;
                            $loc->sys_time = $records[0][0];
                            $loc->save();

                            $set->product_location_data_id = $loc->id;
                            $set->save();


                            if($product->location_offline)
                            {
                                $product->location_online_at = Carbon::now();
                            }
                            $product->location_offline = 0;
                            $product->save();
                        }
                        else
                        {
                            if(!$product->location_offline)
                            {
                                $product->location_offline_at = Carbon::now();
                            }

                            $product->location_offline = 1;
                            $product->save();
                        }
                    }
                    catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
                    }
///////////////////////////////

                    if($loc->lat and $loc->lng)
                    {



                        $url = url('http://poi.18gps.net/poi?lat='.$loc->lat.'&lon='.$loc->lng.'&timestamp='.time());
                        $client = new Client();

                        try {
                            $r = $client->request('GET', $url);
                            $result = $r->getBody()->getContents();




                            if($result)
                            {
                                $loc->location = $result;
                                $loc->save();


                            }
                        }
                        catch (\GuzzleHttp\Exception\ConnectException $e) {
                    // This is will catch all connection timeouts
                    // Handle accordinly
                        }
                    }



///////////////////////////////



                            }//end of success true
                            


                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {}


                       //////////////////////////// data saving end




                        #################################################
                            /////////////////////////////// alarm save start
                        if($alarmrows)
                        {
                            foreach($alarmrows as $row)
                            {
                                $ad = $company->productAlarmDatas()
                                ->where('objectid', $row['id'])
                                ->where('product_id', $product->id)
                                ->where('user_id', $row['user_id'])
                                ->where('macid', $row['macid'])
                                ->first();
                                if(!$ad)
                                {
                                    if(($row['macid'] == $product->macid) and ($row['user_id'] == $product->objectid))
                                    {
                                        $ad = new ProductAlarmData;
                                        $ad->company_id = $company->id;
                                        $ad->product_id = $product->id;
                                        $ad->objectid = $row['id'];
                                        $ad->macid = $product->macid;
                                        $ad->course = $row['course'];
                                        $ad->gps_status = $row['gps_status'] ?: null;
                                        $ad->gps_time = $row['gps_time'];
                                        $ad->lat = $row['weidu'];
                                        $ad->lng = $row['jingdu'];
                                        $ad->send_time = $row['send_time'];
                                        $ad->speed = $row['speed'];
                                        $ad->status = $row['status'];
                                        $ad->type_id = $row['type_id'];
                                        $ad->classifyDescribe = $row['classifyDescribe'];
                                        $ad->user_id = $row['user_id'];
                                        $ad->user_name = $row['user_name'];
                                        $ad->macname = $row['macname'] ?: null;

                                        $ad->save();
                                    }

                                }
                            }
                        }
                        /////////////////////////////   alarm save end
                        ##################################################

                        

                    } //end foreach of products

                }


                Product::doesntHave('company')->delete();
                ProductAlarmData::doesntHave('company')->delete();
                ProductData::where('created_at', '<', Carbon::now()->subDays(180))->delete();
                ProductLocationData::where('created_at', '<', Carbon::now()->subDays(180))->delete();
                ProductRectAcDcInfo::where('created_at', '<', Carbon::now()->subDays(180))->delete();
                ProductRectAcDcInfoItem::where('created_at', '<', Carbon::now()->subDays(180))->delete();
                ProductSettingData::where('created_at', '<', Carbon::now()->subDays(180))->delete();
                ProductAlarmData::where('created_at', '<', Carbon::now()->subDays(180))->delete();







               
            }
        }
