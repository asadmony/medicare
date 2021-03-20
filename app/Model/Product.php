<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'company_id',
        'objectid',
        'macid',
        'platenumber',
        'sim',
        'iccid',
        'model',
        'title',
        'description',
        'type',
        'logo_name',
        'status',
        'offline',
        'use_status',
        'update_time',
        'gps_time',
        'server_time',
        'region',
        'zone',
        'cluster',
        'editedby_id',
    ];

    public function productSettingDatas()
    {
    	return $this->hasMany('App\Model\ProductSettingData', 'product_id');
    }

    public function productAlarmDatas()
    {
        return $this->hasMany('App\Model\ProductAlarmData');
    }

    public function productLocationDatas()
    {
        return $this->hasMany('App\Model\ProductLocationData');
    }

    public function company()
    {
    	return $this->belongsTo('App\Model\Company', 'company_id');
    }
}
