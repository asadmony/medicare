<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSettingData extends Model
{
    public function productData()
    {
    	return $this->belongsTo('App\Model\ProductData','product_data_id');
    }

    public function productLocationData()
    {
    	return $this->belongsTo('App\Model\ProductLocationData','product_location_data_id');
    }

    public function product()
    {
    	return $this->belongsTo('App\Model\Product', 'product_id');
    }

    public function company()
    {
    	return $this->belongsTo('App\Model\Company', 'company_id');
    }

    public function productRectData()
    {
        return $this->belongsTo('App\Model\ProductRectAcDcInfo', 'product_rect_ac_dc_info_id');
    }
}
