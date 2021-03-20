<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductRectAcDcInfo extends Model
{
    public function productRectitems()
    {
        return $this->hasMany('App\Model\ProductRectAcDcInfoItem', 'product_rect_ac_dc_info_id');
    }
}
