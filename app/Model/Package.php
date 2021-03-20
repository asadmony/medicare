<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function logo()
    {
    	return $this->file_name ? 'storage/package/'. $this->file_name : 'img/cl.png';
    }
    public function takenPackages()
    {
        return $this->hasMany('App\Model\TakenPackage', 'package_id');
    }
}
