<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function courses()
    {
    	return $this->hasMany('App\Model\Course', 'subject_id');
    }


    public function coursesAll()
    {
    	return $this->courses()->whereStatus('published')->orderBy('title')->paginate(100);
    }
}
