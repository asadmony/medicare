<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
    {
    	return $this->belongsTo('App\Model\Order');
    } 

    public function package()
    {
        return $this->belongsTo('App\Model\Package','package_id');
    }

    public function takenPackage()
    {
        return $this->hasOne('App\Model\TakenPackage');
    }
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
}
