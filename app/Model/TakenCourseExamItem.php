<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TakenCourseExamItem extends Model
{
    protected $fillable =[
        'user_id',
        'company_id',
        'subrole_id',
        'package_id',
        'course_id',
        'question_paper_id',
        'taken_course_id',
        'taken_course_exam_id',
        'course_question_id',
        'course_answer_id',
        'correct',
        'question_type',
        'answer',
    ];
    public function takenCourseExam()
    {
        return $this->belongsTo('App\Model\TakenCourseExam', 'taken_course_exam_id');
    }
    public function question()
    {
        return $this->belongsTo('App\Model\CourseQuestion', 'course_question_id');
    }
    public function answer()
    {
        return $this->belongsTo('App\Model\CourseAnswer', 'course_answer_id');
    }
    public function comments()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
    public function showComments()
    {
        return $this->comments()->latest()->get();
    }
}
