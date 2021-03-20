<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->hasMany('App\Model\UserRole', 'user_id');
    }

    public function isAdmin()
    {

        if($this->roles()->where('role_name', 'admin')->first())
        {
            return true;
        }
        else{
            return false;
        }
    }

    public function isCoordinator()
    {

        if($this->roles()->where('role_name', 'coordinator')->first())
        {
            return true;
        }
        else{
            return false;
        }
    }


    public function hasRole($role) //$role = admin, staff..
    {
        $rq = request();

        if($role == 'admin')
        {

            if($ad = $this->roles()->where('role_name', $role)->first())
            {
                $permissions = $ad->permission;

                if(!$permissions)
                {
                    return true;
                }

                if($permissions and ($permissions == 'all'))
                {
                    return true;
                }

                if($permissions)
                {
                    $sg2 = $rq->segment(2);
                    $sg3 = $rq->segment(3);

                    if($sg2 and $sg3)
                    {
                        if($rq->method() == 'GET')
                        {
                            $permission = $sg2 . '_' . $sg3;

                            if (preg_match("~\b". $permission ."\b~", $permissions ))
                            {
                              return true;
                            }
                            else
                            {
                              abort(401);
                            }

                        }
                        else
                        {
                            return true;
                        }

                    }
                    elseif($sg2)
                    {
                        return true;
                    }
                }
            }
            else{
                abort(401);
            }
        }
        
        elseif($role == 'coordinator')
        {

            if($ad = $this->roles()->where('role_name', $role)->first())
            {
                $permissions = $ad->permission;

                if(!$permissions)
                {
                    return true;
                }

                if($permissions and ($permissions == 'all'))
                {
                    return true;
                }

                if($permissions)
                {
                    $sg2 = $rq->segment(2);
                    $sg3 = $rq->segment(3);

                    if($sg2 and $sg3)
                    {
                        if($rq->method() == 'GET')
                        {
                            $permission = $sg2 . '_' . $sg3;

                            if (preg_match("~\b". $permission ."\b~", $permissions ))
                            {
                              return true;
                            }
                            else
                            {
                              abort(401);
                            }

                        }
                        else
                        {
                            return true;
                        }

                    }
                    elseif($sg2)
                    {
                        return true;
                    }
                }
            }
            else{
                abort(401);
            }
        }


        elseif($role == 'company')
        {
            return (bool) $this->companies()->count();
        }

        elseif($role == 'subrole')
        {
            return (bool) $this->subroles()->count();
        }
    }

    public function subroles()
    {
        return $this->hasMany('App\Model\CompanySubrole', 'user_id');
    }

    public function userroles()
    {
        return $this->hasMany('App\Model\User', 'id');
    }


    public function hasSubroleOf($subrole)
    {
         return (bool) $this->subroles()
        ->whereId($subrole->id)
        ->whereStatus('active')
        ->first();
    }

    public function hasUserroleOf($user)
    {
         return (bool) $this->userroles()
        ->whereId($user->id)
        ->whereStatus('active')
        ->first();
    }

    public function hasSubrole()
    {
        return (bool) $this->subroles()->count();
    }

    public function activeSubroles()
    {
        return $this->subroles()->where('status', 'active')->orderBy('title')->get();
    }

    public function adminRoleWithName()
    {
        if($r = $this->roles()->where('role_name', 'admin')->first())
        {
            return $r->role_value;
        }
        else{
            return false;
        }
    }
    public function coordinatorRoleWithName()
    {
        if($r = $this->roles()->where('role_name', 'coordinator')->first())
        {
            return $r->role_value;
        }
        else{
            return false;
        }
    }


    public function companies()
    {
        return $this->hasMany('App\Model\Company', 'user_id');
    }

    public function hasCompanyRole()
    {
        return (bool) $this->companies()->count();
    }

    public function activeCompanies()
    {
        return $this->companies()->where('status', 'active')->latest()->get();
    }

    public function hasCompanyOf($company)
    {
         return (bool) $this->companies()
        ->whereId($company->id)
        ->whereStatus('active')
        ->first();
    }

    public function mobileOrEmail()
    {
        return $this->mobile ?: $this->email;
    }

    public function emailOrMobile()
    {
        return $this->email ?: $this->mobile;
    }

    public function takePack()
    {
        return $this->belongsTo('App\Model\TakenPackageUser');
    }
    public function takenPackage()
    {
        return $this->hasMany('App\Model\TakenPackage', 'user_id');
    }
    public function takenCourses()
    {
        return $this->hasMany('App\Model\TakenCourse', 'user_id')->where('company_id', null);
    }
    public function takenCoursesAll()
    {
        return $this->hasMany('App\Model\TakenCourse', 'user_id');
    }
    public function takenCourseExams()
    {
        return $this->hasMany('App\Model\TakenCourseExam');
    }
    public function companyRole()
    {
        return $this->hasOne('App\Model\CompanySubrole', 'user_id');
    }

    public function canTakeCourse($course)
    {
        $myCredit = $this->credit; 
        $balance = $myCredit - $course->course_credit;
        
        if($balance < 0)
        {
            return false;
        }
        return true;
    }
    public function creditHistory()
    {
        return $this->hasMany('App\Model\CreditTransaction', 'user_id');
    }
    //message
    public function messageWithUser($userto)
    {
        $messages = Message::where([
                ['userto_id', '=', $userto->id],
                ['userfrom_id', '=',  $this->id]
            ])->orWhere([
                ['userto_id', '=', $this->id],
                ['userfrom_id', '=',  $userto->id]
            ])
        ->latest()
        ->simplePaginate(400);
        return $messages;
    }
    public function messageContacts()
    {
        $contacts = Message::where('last',1)
        ->where(function ($f){
            $f->where('userfrom_id', $this->id);
            $f->orWhere('userto_id', $this->id);
        })
        ->orderBy('id', 'desc')
        ->simplePaginate(50);
        return $contacts;
    }
    public function latestMsgUser()
    {
        $msg = Message::where('last',1)
        ->where(function ($f){
            $f->where('userfrom_id', $this->id);
            $f->orWhere('userto_id', $this->id);
        })
        ->orderBy('id', 'desc')
        ->first();
        if($msg)
        {
            if($msg->userfrom_id != $this->id)
            {
                $user = User::where('id', $msg->userfrom_id)->first();
            }else
            {
                $user = User::where('id', $msg->userto_id)->first();
            }
        }else
        {
            $user = null;
        }
        return $user;
    }
    public function readMsgOf($user)
    {
        Message::where([
                ['userto_id', '=', $this->id],
                ['userfrom_id', '=',  $user->id]
            ])->update(['read'=> 1]);
    }
    public function unreadMsgUsersCount()
    {
    return Message::where('userto_id', $this->id)
    ->where('read', 0)->where('last',1)->count();
    }
    //message
    public function profilePic()
    {
        if ($this->image_name) {
            // dd($this->image_name);
            return $this->image_name;
        }else{
            return 'user.png';
        }
    }
    public function totalIndividualAttempts()
    {
        return $this->takenCourseExams->where('company_id', null)->where('total_question', '<>', null);
    }

    public function assignmentAnswers()
    {
        return $this->hasMany('App\Model\CourseAssignmentAnswer', 'user_id');
    }
    
    public function assignmentAnswer($course_assignment_id)
    {
        return $this->assignmentAnswers()->where('course_assignment_id', $course_assignment_id)->first();
    }
    
    public function assignmentByCourse($course_id)
    {
        return $this->assignmentAnswers()->where('course_id', $course_id)->first();
    }
    
}
