<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseRandomQuestionPaper extends Model
{
    protected $fillable = [
        'course_id',
        'total_attempts',
        'active',
        'started_date',
        'expired_date',
        'addedby_id',
        'editedby_id',
    ];
    public function items()
    {
        return $this->hasMany('App\Model\QuestionPaperItem', 'question_paper_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Model\Course', 'course_id');
    }

    public function takenExams()
    {
        return $this->hasMany('App\Model\TakenCourseExam', 'question_paper_id');
    }

}
