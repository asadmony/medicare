<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function item()
    {
    	return $this->belongsTo('App\Model\OrderItem','id','order_id');
    }
    public function items()
    {
        return $this->hasMany('App\Model\OrderItem');

    }
    public function payments()
    {
        return $this->hasMany('App\Model\OrderPayment');
    }
    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }
    public function pendingOrdersCount()
    {
        return $this->where('payment_status', 'pending')->get()->count();
    }
}
