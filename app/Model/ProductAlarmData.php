<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAlarmData extends Model
{
    public function company()
    {
    	return $this->belongsTo('App\Model\Company', 'company_id');
    }
}
