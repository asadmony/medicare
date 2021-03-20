<?php

namespace App\Model;

use App\Model\Subject;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function subject()
    {
    	return $this->belongsTo('App\Model\Subject', 'subject_id');
    }

    public function syllIsImage()
    {
    $ext = pathinfo($this->syllabus_file, PATHINFO_EXTENSION);

    if($ext == 'jpg' or
        $ext == 'jpeg' or
        $ext == 'png' or
        $ext == 'bmp' or
        $ext == 'gif')
      {
        return true;
      }
      return false;
    
  }

  public function syllIsPdf()
  {
    $ext = pathinfo($this->syllabus_file, PATHINFO_EXTENSION);
    if( $ext == 'pdf')
      {
        return true;
      }
      return false;
  }

  public function syllIsWord()
  {
      $ext = pathinfo($this->syllabus_file, PATHINFO_EXTENSION);
      if( ($ext == 'doc') or ($ext == 'docx'))
      {
        return true;
      }
      return false;
  }

    public function fileIsImage()
  {
      if($this->brochure_ext == 'jpg' or
        $this->brochure_ext == 'jpeg' or
        $this->brochure_ext == 'png' or
        $this->brochure_ext == 'bmp' or
        $this->brochure_ext == 'gif')
      {
        return true;
      }
      return false;
  }

  public function fileIsPdf()
  {
      if( $this->brochure_ext == 'pdf')
      {
        return true;
      }
      return false;
  }

  public function fileIsWord()
  {
      if($this->brochure_ext == 'doc' or $this->brochure_ext == 'docx')
      {
        return true;
      }
      return false;
  }

  public function brochureLink()
  {
    return 'storage/course/' . $this->course_brochure;
  }

  public function syllabusLink()
  {
    return 'storage/course/' . $this->syllabus_file;
  }

  public function fi()
  {
    if($this->image_name){
      return 'storage/course/'.$this->image_name;
    }else{
      return 'img/dfi.jpg';
    }
  }

  public function usliveFi()
    {
        if($this->image_name)
        {
            return $this->image_name;
        }
        else
        {
            return 'pfi.png';
        }
    }




  public function achivementItems()
  {
    return Course::with('subject')->where('course_achievement', $this->course_achievement)->orderBy('title')->get();

    // return Subject::with('courses')->whereHas('courses', function($r) {
    //   $r->where('course_achievement', $this->course_achievement);
    // })->orderBy('title')->get();
  }

  public function achivementSubjectItems()
  {
    // return Course::with('subject')->where('course_achievement', $this->course_achievement)->orderBy('title')->get();

    return Subject::with('courses')->whereHas('courses', function($r) {
      $r->where('course_achievement', $this->course_achievement);
    })->orderBy('title')->get();
  }


  public function topics()
  {
    return $this->hasMany('App\Model\CourseTopic');
  }

  public function questions()
  {
    return $this->hasMany('App\Model\CourseQuestion');
  }
  public function takenCourses()
  {
      return $this->hasMany('App\Model\TakenCourse', 'course_id');
  }
  public function takenCourseExams()
  {
      return $this->hasMany('App\Model\TakenCourseExam', 'course_id');
  }
  public function takenCourseExamItems()
  {
      return $this->hasMany('App\Model\TakenCourseExamItem', 'course_id');
  }
  public function answers()
  {
    return $this->hasMany('App\Model\CourseAnswer');
  }
  public function questionPapers()
  {
      return $this->hasMany('App\Model\CourseRandomQuestionPaper', 'course_id');
  }
  public function questionPaperItems()
  {
      return $this->hasMany('App\Model\QuestionPaperItem', 'course_id');
  }
  public function assignments()
  {
      return $this->hasMany('App\Model\CourseAssignment', 'course_id');
  }
  public function individualCourseAssignments()
  {
      return $this->assignments()->where('company_id', null);
  }
  public function assignmentByCompany($company)
  {
    return $this->assignments()->where('company_id', $company)->latest();
  }
  public function assignmentsByCompany($company)
  {
    return $this->assignments()->where('company_id', $company)->get();
  }
  public function assignmentAnswers()
  {
      return $this->hasMany('App\Model\CourseAssignmentAnswer', 'course_id');
  }
  public function search($qry)
  {
    return  $this->where('status', 'published')
                ->where(function ($query) use ($qry){
                  $query->where('title', 'like', "%{$qry}%")
                      ->orWhere('course_type', 'like', "%{$qry}%")
                      ->orWhere('title', 'like', "%{$qry}%")
                      ->orWhere('description', 'like', "%{$qry}%")
                      ->orWhere('excerpt', 'like', "%{$qry}%")
                      ->orWhere('course_code', 'like', "%{$qry}%")
                      ->orWhere('course_mode', 'like', "%{$qry}%");
                })
                ->latest()->paginate(30)->appends(['q'=>$qry]);
  }
  public function deleteAll()
  {
    $this->topics()->delete();
    $this->questions()->delete();
    $this->answers()->delete();
    $this->questionPapers()->delete();
    $this->questionPaperItems()->delete();
    $this->assignments()->delete();
    $this->assignmentAnswers()->delete();
    $this->takenCourses()->delete();
    $this->takenCourseExams()->delete();
    $this->takenCourseExamItems()->delete();
    // $this->delete();
  }
}
