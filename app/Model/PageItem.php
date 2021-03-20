<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PageItem extends Model
{
    public function page()
    {
    	return $this->belongsTo('App\Model\Page', 'page_id');
    }
}
