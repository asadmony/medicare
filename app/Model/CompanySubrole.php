<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CompanySubrole extends Model
{
	protected $table = 'company_sub_roles';


    public function user()
    {
    	return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function items()
    {
    	return $this->hasMany('App\Model\SubroleItem', 'subrole_id');
    }

    public function company()
    {
    	return $this->belongsTo('App\Model\Company');
    }

    public function packageUsers()
    {
    	return $this->hasMany('App\Model\TakenPackageUser');
    }

    public function takenPackagesCount()
    {
        return $this->packageUsers()->count();
    }

    public function takenCourses()
    {
        return $this->hasMany('App\Model\TakenCourse', 'subrole_id');
    }
    public function takenCoursesCount()
    {
        return $this->takenCourses()->count();
    }
    public function takenCourseAttempts()
    {
        return $this->hasMany('App\Model\TakenCourseExam', 'subrole_id');
    }
    public function takenCourseAttemptsCount()
    {
        return $this->takenCourseAttempts()->where('total_question', '<>', null)->count();
    }

    // public function takePackUser()
    // {
    //     return $this->hasOne('App\Model\TakenPackageUser');
    // }
    public function latestAttempt($course_id)
    {
        return $this->takenCourseAttempts()->where('course_id',$course_id)
                                            ->where('total_question', '<>',null)
                                            ->latest()->first();
    }
    public function assignmentAnswers()
    {
        return $this->hasMany('App\Model\CourseAssignmentAnswer', 'subrole_id');
    }
    
    public function assignmentAnswer($course_assignment_id)
    {
        return $this->assignmentAnswers()->where('course_assignment_id', $course_assignment_id)->first();
    }
    
    public function assignmentByCourse($course_id)
    {
        return $this->assignmentAnswers()->where('course_id', $course_id)->first();
    }

    public function memberTakenCourseIfAnyByAssessor(CompanySubrole $subrole) 
    {   //returns true or false
        $levels = $subrole->company->packageCourseLevelsByAssessor($subrole);

        $result = $this->takenCourses()->whereHas('course',function($qry) use ($levels){
            $qry->whereIn('course_level', $levels);
        })
        ->get();
        if ($result->count() > 0) {
            return true;
        }else{
            return false;
        }
    }
    public function memberTakenCourseWarningIfAnyByAssessor(CompanySubrole $subrole) 
    {   //returns true or false
        $levels = $subrole->company->packageCourseLevelsByAssessor($subrole);

        $result = $this->takenCourses()->whereHas('course',function($qry) use ($levels){
            $qry->whereIn('course_level', $levels);
        })
        ->whereDate('expired_date', '>' , now()->subdays(10)->toDateString())
        ->whereDate('expired_date', '>=' , now()->toDateString())
        ->get();
        if ($result->count() > 0) {
            return true;
        }else{
            return false;
        }
    }
    public function memberTakenCourseExpiredIfAnyByAssessor(CompanySubrole $subrole) 
    {   //returns true or false
        $levels = $subrole->company->packageCourseLevelsByAssessor($subrole);
        $result = $this->takenCourses()->whereHas('course',function($qry) use ($levels){
            $qry->whereIn('course_level', $levels);
        })
        ->where('expired_date', '<' ,now())
        ->get();
        if ($result->count() > 0) {
            return true;
        }else{
            return false;
        }
    }
}
