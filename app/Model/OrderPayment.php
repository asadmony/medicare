<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    public function user()
	{
	    return $this->belongsTo('App\Model\User', 'user_id');
	}

	public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }
}
