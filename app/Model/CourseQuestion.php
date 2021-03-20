<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseQuestion extends Model
{
    public function answers()
    {
    	return $this->hasMany('App\Model\CourseAnswer');
    }

    public function topic()
    {
    	return $this->belongsTo('App\Model\CourseTopic', 'course_topic_id');
    }
    public function questionPapers()
    {
        return $this->hasMany('App\Model\CourseRandomQuestionPaper', 'course_question_id');
    }
    public function questionPaperItems()
    {
        return $this->hasMany('App\Model\QuestionPaperItem', 'course_question_id');
    }
}
