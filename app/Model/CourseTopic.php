<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseTopic extends Model
{
   public function questions()
   {
   	 return $this->hasMany('App\Model\CourseQuestion','course_topic_id');
   }
   public function answers()
   {
   	 return $this->hasMany('App\Model\CourseAnswer');
   }

   public function course()
   {
   	 return $this->belongsTo('App\Model\Course', 'course_id');
   }
   public function questionPaperItems()
   {
       return $this->hasMany('App\Model\QuestionPaperItem', 'course_topic_id');
   }

}
