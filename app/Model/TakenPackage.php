<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TakenPackage extends Model
{
    public function pack()
    {
    	return $this->belongsTo('App\Model\Package','package_id','id');
    }

    public function packageUsers()
    {
        return $this->hasMany('App\Model\TakenPackageUser');
    }

    public function takenCourses()
    {
    	return $this->hasMany('App\Model\TakenCourse','taken_package_id');
    }
    public function attempts()
    {
        return $this->hasMany('App\Model\TakenCourseExam', 'taken_package_id');
    }
    public function attemptItems()
    {
        return $this->hasMany('App\Model\TakenCourseExamItem', 'taken_package_id');
    }
    public function courses()
    {
        $levels = (explode(",",$this->course_level));
        return Course::whereIn('course_level', $levels)->where('status', 'published');
    }

    public function deleteAll()
    {
        // $this->takenCourses->delete();
        // $this->attempts->delete();
        // $this->attemptItems->delete();
        // $this->delete();
    }
    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }
}
