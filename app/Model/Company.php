<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function logo()
    {
    	return $this->logo_name ? 'storage/company/logo/'. $this->logo_name : 'img/cl.png';
    }

    public function products()
    {
    	return $this->hasMany('App\Model\Product', 'company_id');
    }

    public function activeProducts()
    {
    	return $this->products()->where('status', 'active')->orderBy('title')->paginate(100);
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function productDatas()
    {
        return $this->hasMany('App\Model\ProductData', 'company_id');
    }

    public function productSettingDatas()
    {
        return $this->hasMany('App\Model\ProductSettingData', 'company_id');
    }

    public function productAlarmDatas()
    {
        return $this->hasMany('App\Model\ProductAlarmData', 'company_id');
    }

    public function productLocationDatas()
    {
        return $this->hasmany('App\Model\ProductLocationData', 'company_id')->orderBY('id', 'desc');
    }

    public function productRectDatas()
    {
        return $this->hasMany('App\Model\ProductRectAcDcInfo', 'company_id');
    }

    public function subroles()
    {
        return $this->hasMany('App\Model\CompanySubrole', 'company_id');
    }
    public function allSubroleCount()
    {
        return $this->subroles()->where('status', 'active')->count();
    }
    public function allmembers()
    {
        return $this->subroles()->where('status', 'active')->where('title', 'member')->get();
    }
    public function searchMembers($q)
    {
        return $this->subroles()->where('status', 'active')->where('title', 'member')->whereHas('user', function ($qry) use ($q) {
                $qry->where('users.name', 'like', "%{$q}%")
                ->orWhere('users.email', 'like', "%{$q}%")
                ->orWhere('users.mobile', 'like', "%{$q}%");
        })->paginate(200);
    }
    public function memberCount()
    {
        return $this->subroles()->where('title', 'member')->where('status', 'active')->count();
    }
    public function assessorCount()
    {
        return $this->subroles()->where('title', 'assessor')->where('status', 'active')->count();
    }
    public function administratorCount()
    {
        return $this->subroles()->where('title', 'administrator')->where('status', 'active')->count();
    }
    public function takenPackageCount()
    {
        return $this->takenpackages()->count();
    }
    public function takenCourseCount()
    {
        return $this->takenCourses()->count();
    }
    public function takenExamCount()
    {
        return $this->courseExams()->where('total_question', '<>', null)->count();
    }
    public function subroleitems()
    {
        return $this->hasMany('App\Model\SubroleItem', 'company_id');
    }
    public function productRectDataItems()
    {
        return $this->hasMany('App\Model\ProductRectAcDcInfoItem', 'company_id');
    }

    public function takenpackages()
    {
        return $this->hasMany('App\Model\TakenPackage');
    }
    public function takenpackagesBySubrole()
    {
        return $this->hasMany('App\Model\TakenPackage');
    }

    public function takenCourses()
    {
        return $this->hasMany('App\Model\TakenCourse', 'company_id');
    }
    public function courseExams()
    {
        return $this->hasMany('App\Model\TakenCourseExam', 'company_id');
    }
    public function takenCourseExams()
    {
        return $this->hasMany('App\Model\TakenCourseExam', 'company_id');
    }
    public function takenCourseExamItems()
    {
        return $this->hasMany('App\Model\TakenCourseExamItem', 'company_id');
    }
    public function takenPackageSubroles()
    {
        return $this->hasMany('App\Model\TakenPackageUser', 'company_id');
    }
    public function takenCourseList()
    {
        return TakenCourse::where('company_id', $this->id)->groupBy('course_id');
    }


    public function messages()
    {
        $contacts = Message::where('last',1)
        ->where(function ($f){
            $f->where('company_id', $this->id);
        })
        ->orderBy('id', 'desc')
        ->simplePaginate(50);
        return $contacts;
    }

    public function allMessages()
    {
        return $this->hasMany('App\Model\Message', 'company_id');
    }
    public function creditTransactions()
    {
        return $this->hasMany('App\Model\CreditTransaction', 'company_id');
    }
    public function orders()
    {
        return $this->hasMany('App\Model\Order', 'company_id');
    }
    public function orderItems()
    {
        return $this->hasMany('App\Model\OrderItem', 'company_id');
    }
    public function orderPayments()
    {
        return $this->hasMany('App\Model\OrderPayment', 'company_id');
    }
    public function courseAssignments()
    {
        return $this->hasMany('App\Model\CourseAssignment', 'company_id');
    }
    public function courseAssignmentAnswers()
    {
        return $this->hasMany('App\Model\CourseAssignmentAnswer', 'company_id');
    }
    public function packageCourseLevels()
    {
        $alllevels = $this->takenpackages()->pluck('course_level')->toArray();
        $packageCourseLevels = array_unique(explode (',',(implode(",",$alllevels))));
        return $packageCourseLevels;
    }
    public function packageCourseLevelsByAssessor($subrole)
    {
        $subroleLevels = (explode(",",$subrole->level));
        $alllevels = $this->takenpackages()->pluck('course_level')->toArray();
        $packageCourseLevels = array_unique(explode (',',(implode(",",$alllevels))));
        return array_intersect($subroleLevels, $packageCourseLevels);
    }
    
}
