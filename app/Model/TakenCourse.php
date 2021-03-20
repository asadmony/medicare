<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class TakenCourse extends Model
{
    public function course()
    {
        return $this->belongsTo('App\Model\Course');
    }
    public function takenCourseExams()
    {
        return $this->hasMany('App\Model\TakenCourseExam', 'taken_course_id');
    }
    public function takenUser()
    {
        return $this->belongsTo('App\Model\TakenPackageUser', 'taken_package_user_id');
    }
    public function takenPackage()
    {
        return $this->belongsTo('App\Model\TakenPackage', 'taken_package_id');
    }
    public function company()
    {
        return $this->belongsTo('App\Model\Company', 'company_id');
    }
    public function takenCompanyUsers()
    {
        return $this->where('company_id', $this->company_id)->where('course_id', $this->course_id)->latest()->get();
    }
    public function takenExamsCount()
    {
        return TakenCourseExam::where('company_id', $this->company_id)->where('course_id', $this->course_id)->where('total_question', '<>', null)->count();
    }
    public function messages()
    {
        return $this->morphMany(Message::class, 'messageable');
    }
    public function showMessages($user)
    {
        return $this->messages()->where('userto_id', $user)->latest()->get();
    }
}
