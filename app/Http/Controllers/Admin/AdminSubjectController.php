<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Page;
use App\Model\Media;
use App\Model\Course;
use App\Model\Subject;
use GuzzleHttp\Client; 
use App\Model\Company; 
use App\Model\PageItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;

class AdminSubjectController extends Controller
{
     
    public function addNewSubject()
    {
        menuSubmenu('subject','addNewSubject');

        return view('admin.subjects.addNewSubject');
    }


    public function addNewSubjectPost()
    {
        $request = request();
        $subject = new Subject;
        $subject->title = $request->title;
        $subject->addedby_id = Auth::id();
        $subject->save();
 

        return back()->with('success', 'New Subject Created Successfully!');
    }

    public function UpdateSubjectPost(Subject $subject)
    {
        $request = request();
        $subject->title = $request->title;
        $subject->addedby_id = Auth::id();
        $subject->save();
        return back()->with('success', 'New Subject Created Successfully!');
    }


    public function allSubjects()
    {
        menuSubmenu('subject', 'allSubjects');
        $subjects = Subject::orderBy('title')->paginate(50);
        return view('admin.subjects.allSubjects', [
        'subjects'=> $subjects
        ]);
    }

    public function editSubject(Subject $subject)
    {
        menuSubmenu('subject', 'allSubjects');
        return view('admin.subjects.editSubject',[
           'subject'=> $subject
        ]);
    }

    public function subjectDelete(Subject $subject)
    {
         
        foreach ($subject->courses as $course) 
        {
            if($course->image_name)
            {
                $f = 'course/'.$course->image_name;
                if(Storage::disk('upload')->exists($f))
                {
                    // Storage::disk('upload')->delete('course/'.$course->image_name);
                    Storage::disk('upload')->delete($f);
                }
            }

            if($course->course_brochure)
            {
                $ff = 'course/'.$course->course_brochure;
                if(Storage::disk('upload')->exists($ff))
                {

                    Storage::disk('upload')->delete($ff);
                }
            }
            foreach ($course->topics as $topic) {

                if($topic->file_name)
                {
                    $f = 'topic/'.$course->file_name;
                    if(Storage::disk('upload')->exists($f))
                    {
                        // Storage::disk('upload')->delete('course/'.$course->image_name);
                        Storage::disk('upload')->delete($f);
                    }
                }
            }
            $course->topics()->delete();
            $course->questions()->delete();
            $course->answers()->delete();
            $course->questionPapers()->delete();
            $course->questionPaperItems()->delete();
            $course->assignments()->delete();
            $course->assignmentAnswers()->delete();
            $course->takenCourses()->delete();
            $course->takenCourseExams()->delete();
            $course->takenCourseExamItems()->delete();

        }
        $subject->courses()->delete();

        $subject->delete();
        return back()->with('success', 'subject Deleted Successfully');
    }

}
