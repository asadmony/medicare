<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseAnswer extends Model
{
    public function question()
    {
    	return $this->belongsTo('App\Model\CourseQuestion', 'course_question_id');
    }
}
