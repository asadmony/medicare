<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TakenPackageUser extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company','company_id');
    }

    public function takenPackage()
    {
        return $this->belongsTo('App\Model\TakenPackage');

    }

    public function takenCourses()
    {
        return $this->hasMany('App\Model\TakenCourse');
    }

}
