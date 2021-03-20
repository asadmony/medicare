<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseAssignment extends Model
{
    
    public function answers()
    {
        return $this->hasMany('App\Model\CourseAssignmentAnswer', 'course_assignment_id');
    }
}
