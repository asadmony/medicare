<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function items()
    {
    	return $this->hasMany('App\Model\PageItem', 'page_id');
    }
}
