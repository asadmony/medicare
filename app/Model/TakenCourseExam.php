<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TakenCourseExam extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'subrole_id',
        'package_id',
        'taken_package_id',
        'course_id',
        'taken_course_id',
        'question_paper_id',
        'total_question',
        'correct_answer',
        'certificate_file',
        'used_credit',
        'course_from',
        'attempt_started_at',
        'no_of_attempts',
        'attempt_renewed',
        'last_attempt_started_at',
        'attempt_expired_date',
    ];
    public function questionPaper()
    {
        return $this->belongsTo('App\Model\CourseRandomQuestionPaper', 'question_paper_id');
    }
    public function takenCourse()
    {
        return $this->belongsTo('App\Model\TakenCourse', 'taken_course_id');
    }
    public function takenCourseExamItems()
    {
        return $this->hasMany('App\Model\TakenCourseExamItem', 'taken_course_exam_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Model\Course', 'course_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }
    public function takenPackage()
    {
        return $this->belongsTo('App\Model\TakenPackage', 'taken_package_id');
    }
}
