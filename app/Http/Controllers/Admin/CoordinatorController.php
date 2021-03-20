<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Company;
use App\Model\Course;
use App\Model\CourseAnswer;
use App\Model\CourseAssignment;
use App\Model\CourseQuestion;
use App\Model\CourseRandomQuestionPaper;
use App\Model\CourseTopic;
use App\Model\Package;
use App\Model\QuestionPaperItem;
use App\Model\User;
use App\Model\Subject;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;


class CoordinatorController extends Controller
{
    public function dashboard()
    {
        menuSubmenu('dashboard','dashboard');

        $userCount = User::count();
        $companyCount = Company::where('status', '<>', 'temp')->count();
        $packageCount = Package::where('status', '<>', 'temp')->count();
        $subjectCount = Subject::count();
        $courseCount = Course::where('status', '<>', 'temp')->where('course_mode', 'course')->count();
        $qualificationCount = Course::where('status', '<>', 'temp')->where('course_mode', 'qualification')->count();
    	return  view('coordinator.dashboard',[
            'userCount' =>$userCount, 
            'companyCount' => $companyCount,
            'packageCount' => $packageCount,
            'subjectCount' => $subjectCount,
            'courseCount' => $courseCount,
            'qualificationCount' => $qualificationCount,
            ]);
    }


    // course

    public function addNewSubject()
    {
        menuSubmenu('subject','addNewSubject');

        return view('coordinator.subjects.addNewSubject');
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
        return view('coordinator.subjects.allSubjects', [
        'subjects'=> $subjects
        ]);
    }

    public function editSubject(Subject $subject)
    {
        menuSubmenu('subject', 'allSubjects');
        return view('coordinator.subjects.editSubject',[
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
    // end course


    // end subject

    
//course
public function addNewCourse()
{
    menuSubmenu('course','addNewCourse');

    $course = Course::whereStatus('temp')->latest()->first();
    if(!$course)
    {
        $course = new Course;
        $course->addedby_id = Auth::id();
        $course->save();
    }

    return view('coordinator.courses.addNewCourse',['course'=>$course,'subjects'=>Subject::orderBy('title')->get()]);
}

public function updateCoursePost(Course $course, Request $request)
{
    // dd($request->all());
    
    $validation = Validator::make($request->all(),
    [
        'title' => 'required|max:250|string',
        'subject' => 'required',
        'course_level' => 'required',
    ]);
    if($validation->fails())
    {
        return back()->withErrors($validation)
        ->withInput()
        ->with('error', 'Something went wrong.');
    }

    $subject = Subject::find($request->subject);


$course->subject_id = $subject->id;
$course->status = 'published';
$course->course_type = $request->course_type ?: null;
$course->course_achievement = $request->course_achievement ?: null;
$course->face_to_face = $request->face_to_face ? true : false;
$course->title = $request->title ?: null;
$course->description = $request->description ?: null;
$course->excerpt = $request->excerpt ?: null;
$course->course_level = $request->course_level?: true;
$course->course_code = $request->course_code ?: null;
$course->course_credit = $request->course_credit ?: null;
$course->attempt_duration = $request->attempt_duration ?: null;
$course->course_mode = $request->course_mode ?: null;
$course->mandatory_unit = $request->mandatory_unit ?: null;
$course->entry_requirement = $request->entry_requirement ?: null;
$course->assesments = $request->assesments ?: null;
$course->accreditation = $request->accreditation ?: null;
$course->how_to_apply = $request->how_to_apply ?: null;
$course->optional_unit = $request->optional_unit ?: null;
$course->overview = $request->overview ?: null;
$course->structure = $request->structure ?: null;
$course->how_you_study = $request->how_you_study ?: null;
$course->fees_funding = $request->fees_funding ?: null;
$course->carrer = $request->carrer ?: null;
// dd($request->face_to_face);
if($request->packageable == null)
{
$course->packageable = 0;
}
else{
$course->packageable = 1;

}

if($request->featured == null)
{
$course->featured = 0;
}
else{
$course->featured = 1;

}


if($request->hasFile('feature_image'))
    {

        $ffile = $request->feature_image;
        $fimgExt = strtolower($ffile->getClientOriginalExtension());
        $fimageNewName = 'fi_'.Str::random(8).time().'.'.$fimgExt;
        // $originalName = $ffile->getClientOriginalName();

        Storage::disk('upload')->put('course/'.$fimageNewName, File::get($ffile));

            if($course->image_name)
            {
                $f = 'course/'.$course->image_name;
                if(Storage::disk('upload')->exists($f))
                {

                    Storage::disk('upload')->delete($f);
                }
            }

        $course->image_name = $fimageNewName;
    }



if($request->hasFile('course_brochure'))
{

$ffile = $request->course_brochure;
$fimgExt = strtolower($ffile->getClientOriginalExtension());
$fimageNewName = 'br_'.Str::random(8).time().'.'.$fimgExt;
// $originalName = $ffile->getClientOriginalName();

Storage::disk('upload')->put('course/'.$fimageNewName, File::get($ffile));

    if($course->course_brochure)
    {
        $f = 'course/'.$course->course_brochure;
        if(Storage::disk('upload')->exists($f))
        {

            Storage::disk('upload')->delete($f);
        }
    }

$course->course_brochure = $fimageNewName;
$course->brochure_ext = $fimgExt;
}

// syllabus_file

if($request->hasFile('syllabus_file'))
{

$ffile = $request->syllabus_file;
$fimgExt = strtolower($ffile->getClientOriginalExtension());
$fimageNewName = 'br_'.Str::random(8).time().'.'.$fimgExt;
// $originalName = $ffile->getClientOriginalName();

Storage::disk('upload')->put('course/'.$fimageNewName, File::get($ffile));

    if($course->syllabus_file)
    {
        $f = 'course/'.$course->syllabus_file;
        if(Storage::disk('upload')->exists($f))
        {

            Storage::disk('upload')->delete($f);
        }
    }

$course->syllabus_file = $fimageNewName;
$course->brochure_ext = $fimgExt;
}

$course->payment_one = $request->payment_one ?: null;
$course->duration_one = $request->duration_one ?: null;
$course->payment_one_details = $request->payment_one_details ?: null;
$course->payment_two = $request->payment_two ?: null;
$course->duration_two = $request->duration_two ?: null;
$course->payment_two_details = $request->payment_two_details ?: null;
$course->payment_three = $request->payment_three ?: null;
$course->duration_three = $request->duration_three ?: null;
$course->payment_three_details = $request->payment_three_details ?: null;
$course->editedby_id = $request->editedby_id;

$course->save();

return back()->with('success', 'Course successfully submitted.');
}

public function allCourses()
{
    menuSubmenu('course','allCourses');

    $courses = Course::where('status', '<>', 'temp')->paginate(50);
    // join('subjects', 'subjects.id','=','courses.subject_id')->select('subjects.title as subject_title','courses.*')->orderBy('subject_title', 'asc')->where('status', '<>', 'temp')

    return view('coordinator.courses.allCourse', ['courses'=>$courses]);
}

public function assignments(Course $course)
{
    menuSubmenu('course','allCourses');

    // $courses = Course::where('status', '<>', 'temp')->paginate(50);
    // join('subjects', 'subjects.id','=','courses.subject_id')->select('subjects.title as subject_title','courses.*')->orderBy('subject_title', 'asc')->where('status', '<>', 'temp')
    $assignments = CourseAssignment::where('company_id', null)->paginate();
    return view('coordinator.courses.courseDetails', [
        'course'=>$course,
        'assignments'=>$assignments,
        ]);
}

public function updateCourse(Course $course)
{
    return view('coordinator.courses.addNewCourse',['course'=>$course,'subjects'=>Subject::orderBy('title')->get()]);
}

public function deleteCourse(Course $course)
{
    if($course->image_name)
    {
        $f = 'course/'.$course->image_name;
            if(Storage::disk('upload')->exists($f))
            {
                Storage::disk('upload')->delete($f);
            }
    }

    if($course->course_brochure)
    {
        $f = 'course/'.$course->course_brochure;
            if(Storage::disk('upload')->exists($f))
            {
                Storage::disk('upload')->delete($f);
            }
    }
    if($course->syllabus_file)
    {
        $f = 'course/'.$course->syllabus_file;
            if(Storage::disk('upload')->exists($f))
            {
                Storage::disk('upload')->delete($f);
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

    $course->delete();

    return back()->with('success', 'Course successfully deleted.');
}
//course

// topic
public function addCourseTopic(Course $course)
{
    menuSubmenu('course','allCourses');
    $courseTopics = CourseTopic::where('course_id',$course->id)->paginate(10);
    $questionPapers = CourseRandomQuestionPaper::where('course_id',$course->id)->get();
    return view('coordinator.courses.topic.allTopics',[
        'course' => $course,
        'courseTopics' => $courseTopics,
        'questionPapers' => $questionPapers,
    ]);
    // dd($course);
}

public function addNewTopicPost(Course $course)
{
    $request = request();

    $validation = Validator::make($request->all(),
    [
        'title' => 'required|max:250|string',
        'description' => 'nullable',
    ]);

    if($validation->fails())
    {
        return back()->withErrors($validation)
        ->withInput()
        ->with('error', 'Title  can not be null');
    }

    $courseTopic = new CourseTopic;

    $courseTopic->course_id = $course->id;
    $courseTopic->title = $request->title;
    $courseTopic->description = $request->description;
    if($request->active == 'on')
    {
        $courseTopic->active = '1';
    }
    else
    {
        $courseTopic->active = '0';
    }

    // dd($request->hasFile('file_name'));

    if($request->hasFile('file_name'))
    {
        $ffile = $request->file_name;
        $fimgExt = strtolower($ffile->getClientOriginalExtension());
        $fimageNewName = 'br_'.Str::random(8).time().'.'.$fimgExt;
        // $originalName = $ffile->getClientOriginalName();

        Storage::disk('upload')->put('topic/'.$fimageNewName, File::get($ffile));

            if($courseTopic->file_name)
            {
                $f = 'topic/'.$courseTopic->file_name;
                if(Storage::disk('upload')->exists($f))
                {

                    Storage::disk('upload')->delete($f);
                }
            }

        $courseTopic->file_name = $fimageNewName;
    }

    $courseTopic->save();

    return back()->withInput()->with('success','Topic Successfully added to this course.');

}

public function addNewTopicQuestion(CourseTopic $topic)
{
    $request = request();


    $validation = Validator::make($request->all(),
    [
        'question' => 'required|max:255|string',
        'description' => 'nullable',
    ]);
    if($validation->fails())
    {
        if($request->ajax())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validation->errors()->toArray()
            ));
        }

        return back()->withErrors($validation)
        ->withInput()
        ->with('error', 'Question can not be null');
    }

    $cq = new CourseQuestion;

     $cq->course_id = $topic->course_id;
    $cq->course_topic_id = $topic->id;
    $cq->question = $request->question;
    $cq->question_type = 'mcq';
    if($request->active == 'on')
    {
        $cq->active = '1';
    }
    else
    {
        $cq->active = '0';
    }

    $cq->question_level = $request->question_level;
    $cq->addedby_id = Auth::id();

    $cq->save();

    if($request->ajax())
    {
      return Response()->json([
        'success' => true,
        'item_count' => $topic->questions()->count(),
        'page'=>View('coordinator.courses.questions.ajax.courseQuestionsAll', [
        'topic' => $topic,
        'question' => $cq
        ])->render(),
      ]);


    }

    return back()->withInput()->with('success','Question successfully added to this topic: '. $topic->title);

}

public function addNewQuestionAnswer(CourseQuestion $question)
{
    $request = request();


    $validation = Validator::make($request->all(),
    [
        'answer' => 'required|max:255|string',
        // 'description' => 'nullable',
    ]);
    if($validation->fails())
    {
        if($request->ajax())
        {
            return Response()->json(array(
                'success' => false,
                'errors' => $validation->errors()->toArray()
            ));
        }

        return back()->withErrors($validation)
        ->withInput()
        ->with('error', 'Answer can not be null');
    }

    $ca = new CourseAnswer;





    $ca->course_id = $question->course_id;
    $ca->course_topic_id = $question->course_topic_id;
    $ca->course_question_id = $question->id;
    $ca->answer = $request->answer;
    if($request->live == 'on')
    {
        $ca->active = 1;
    }
    else
    {
        $ca->active = 0;
    }

    $ca->correct = $request->correct == 'on' ? 1 : 0;
    $ca->addedby_id = Auth::id();

    $ca->save();

    if($request->ajax())
    {
      return Response()->json([
        'success' => true,
        'item_count' => $question->answers()->count(),
        'page'=>View('coordinator.courses.questions.ajax.courseAnswersAll', [
        'question' => $question,
        ])->render(),
      ]);


    }

    return back()->withInput()->with('success','Question successfully added to this topic: '. $topic->title);

}

public function deleteTopicCourseQuestionAnswer()
{
    $request = request();
    $type = $request->type;
    $id = $request->id;

    if($type == 'answer')
    {
        $answer = CourseAnswer::find($id);
        if($answer)
        {
            $question = $answer->question;
            $answer->delete();

            if($request->ajax())
            {
              return Response()->json([
                'success' => true,
                'type' => $type,
                'item_count' => $question->answers()->count(),
                'page'=>View('coordinator.courses.questions.ajax.courseAnswersAll', [
                'question' => $question,
                ])->render(),
              ]);
            }
        }
    }

    if($type == 'question')
    {

        $question = CourseQuestion::find($id);
        if($question)
        {
            $topic = $question->topic;

            $question->questionPaperItems()->delete();

            $question->delete();

            if($request->ajax())
            {
              return Response()->json([
                'success' => true,
                'type' => $type,
                'item_count' => $topic->questions()->count(),
                'page'=>View('coordinator.courses.questions.ajax.courseQuestionsAll', [
                'topic' => $topic,
                ])->render(),
              ]);
            }
        }

    }

    if($type == 'topic')
    {
        $topic = CourseTopic::find($id);
        if($topic)
        {
            $course = $topic->course;
            $topic->questionPaperItems()->delete();
            $topic->questions()->delete();
            $topic->answers()->delete();
            $topic->delete();

            return back()->with('success', 'Topic Successfully Deleted');
        }
    }
    // if($type == 'course')
    // {

    // }

    // if($type == 'subject')
    // {

    // }

    if($request->ajax())
    {
      return Response()->json([
        'success' => false,
      ]);
    }

    return back();
}
// topic end

// question paper
public function addNewQuestionPapers($course, Request $request, CourseQuestion $courseQuestion)
{
    $request->validate([
        'questionPaperNumber' => ['required','numeric'],
        'questionPerPaper' => ['required','numeric']
    ]);
    $allquestions = $courseQuestion->where('course_id', $course)->get();
    if ($allquestions->count() < $request->questionPerPaper) {
        return redirect()->back()->with('error', 'Total number of question is less that question per page! Please add more questions.')->withInput();
    }elseif ($allquestions->count() > $request->questionPerPaper) {
        $alltopics = CourseTopic::where('course_id', $course)->get();
        if ($alltopics->count() > $request->questionPerPaper || $alltopics->count() == $request->questionPerPaper) {
            for ($i=0; $i < $request->questionPaperNumber; $i++) {
                $questionPaper = CourseRandomQuestionPaper::create([
                    'course_id' => $course,
                ]);
                $topics = $alltopics->random($request->questionPerPaper);
                foreach ($topics as $topic) {

                    $question = $topic->questions->random(1)->first();
                    QuestionPaperItem::create([
                        'course_id' => $course,
                        'course_topic_id' => $question->course_topic_id,
                        'question_paper_id' => $questionPaper->id,
                        'course_question_id' => $question->id,
                        'addedby_id' => auth()->user()->id,
                    ]);
                }
            }
            return redirect()->back()->with('success', $request->questionPaperNumber.' sets of question paper are generated successfully')->withInput();
        }else {
            for ($i=0; $i < $request->questionPaperNumber; $i++) {
                $row = 0;
                $questionPaper = CourseRandomQuestionPaper::create([
                    'course_id' => $course,
                ]);
                $addedQuestions=array();
                foreach ($alltopics as $topic) {
                    $question = $topic->questions->random(1)->first();
                    QuestionPaperItem::create([
                        'course_id' => $course,
                        'course_topic_id' => $question->course_topic_id,
                        'question_paper_id' => $questionPaper->id,
                        'course_question_id' => $question->id,
                        'addedby_id' => auth()->user()->id,
                    ]);
                    array_push($addedQuestions, $question->id);
                    $row++;
                }
                if ($row < $request->questionPerPaper) {
                    $rowleft = $request->questionPerPaper - $row;
                    $otherquestions = $courseQuestion->where('course_id', $course)->whereNotIn('id', $addedQuestions)->get();
                    $morequestions = $otherquestions->random($rowleft);
                    foreach ($morequestions as $ques) {
                        QuestionPaperItem::create([
                            'course_id' => $course,
                            'course_topic_id' => $ques->course_topic_id,
                            'question_paper_id' => $questionPaper->id,
                            'course_question_id' => $ques->id,
                            'addedby_id' => auth()->user()->id,
                        ]);
                    }
                }
            }
            return redirect()->back()->with('success', $request->questionPaperNumber.' sets of question paper are generated successfully');
        }
    }else {
        for ($i=0; $i < $request->questionPaperNumber; $i++) {
            $questionPaper = CourseRandomQuestionPaper::create([
                'course_id' => $course,
            ]);
            foreach ($allquestions as $question) {
                QuestionPaperItem::create([
                    'course_id' => $course,
                    'course_topic_id' => $question->course_topic_id,
                    'question_paper_id' => $questionPaper->id,
                    'course_question_id' => $question->id,
                    'addedby_id' => auth()->user()->id,
                ]);
            }
        }
        return redirect()->back()->with('success', $request->questionPaperNumber.' sets of question paper are generated successfully');
    }
}
public function deleteQuestionPaper(CourseRandomQuestionPaper $questionPaper)
{
    $deleteQuestions = $questionPaper->items()->delete();
    if ($deleteQuestions) {
        $questionPaper->delete();
    }
    return redirect()->back()->with('success', 'Question set is deleted successfully');
}
// question paper

//package
public function addNewPackage()
{
    menuSubmenu('package','addNewPackage');

    $package = Package::whereStatus('temp')->latest()->first();
    if(!$package)
    {
        $package = new Package;
        $package->addedby_id = Auth::id();
        $package->status = 'temp';
        $package->save();
    }


    return view('coordinator.packages.addNewPackage',[
        'package'=>$package,
        'courses'=>Course::orderBy('title')->get()
    ]);
}

public function updatePackagePost(Package $package, Request $request)
{
    $msg = $package->status == 'temp' ? 'created' : 'updated';
    $package->title = $request->title;
    $package->description = $request->description;
    // $package->file_name = $request ;
    $package->no_of_courses = $request->no_of_courses;
    $package->no_of_persons = $request->no_of_persons;
    $package->no_of_attempts = $request->no_of_attempts;
    $package->course_level = implode(",",$request->course_levels);
    $package->duration = $request->duration;
    $package->no_of_credits = $request->no_of_credits;
    $package->price = $request->price;
    $package->package_for = $request->package_for;
    $package->package_type = $request->package_type;
    $package->active = $request->status ? 1 : 0;
    $package->status = $request->status ? 'active' : 'inactive';
    $package->addedby_id = Auth::id();
    $package->editedby_id = Auth::id();

    if($request->hasFile('logo'))
    {
        $cp = $request->file('logo');
        $extension = strtolower($cp->getClientOriginalExtension());
        $randomFileName = $package->id.'_fi_'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

        #delete old rows of profilepic
        Storage::disk('upload')->put('package/'.$randomFileName, File::get($cp));   
        
        if($package->file_name)
        {
            $f = 'package/'.$package->file_name;
            if(Storage::disk('upload')->exists($f))
            {
                Storage::disk('upload')->delete($f);
            }
        }          

        $package->file_name = $randomFileName;
    }



    $package->save();

    
    return redirect()->route('coordinator.allPackages')->with('success', "Package successfully {$msg}");
    // return back()->with('success', "Package successfully {$msg}");

}

public function allPackages(Request $request)
{
    menuSubmenu('package','allPackages');

$packages = Package::where('status', '<>', 'temp')->orderBy('title')->paginate(50);

    return view('coordinator.packages.allPackages', ['packages'=>$packages]);
}

public function updatePackage(Package $package)
{
    return view('coordinator.packages.addNewPackage',['package'=>$package]);
}

public function deletePackage(Package $package)
{
    if($package->file_name)
    {
        $f = 'package/'.$package->file_name;
            if(Storage::disk('upload')->exists($f))
            {
                Storage::disk('upload')->delete($f);
            }
    }
    foreach ($package->takenPackages as $takenPackage) {
        $takenPackage->takenCourses()->delete();
        $takenPackage->attempts()->delete();
        $takenPackage->attemptItems()->delete();
    }
    $package->takenPackages()->delete();
    $package->delete();

    return back()->with('success', 'Package successfully deleted.');
}
//package

// public function messages()
// {
//     menuSubmenu('Messages','Messages');
//     $messageFrom = auth()->user();
//     $conversations = auth()->user()->messageContacts();
//     return view('admin.messages', compact('messageFrom', 'conversations'));
// }
// public function message(User $messageTo)
// {
//     menuSubmenu('Messages','Messages');
//     $messageFrom = auth()->user();
//     if($messageFrom->id == $messageTo->id)
//     {
//         abort(401);
//     }

//     $conversation = auth()->user()->messageWithUser($messageTo);
//     $conversations = auth()->user()->messageContacts();


//     return view('admin.messages', compact('messageFrom', 'messageTo', 'conversation', 'conversations'));
// }


public function saveCourseAssignment(Course $course, CourseAssignment $assignment, Request $request)
{
    menuSubmenu('assessor','takenCourses');

    $validated = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
    ]);

    $assignment->course_id = $course->id;
    $assignment->title = $request->title;
    $assignment->description = $request->description;
    $assignment->addedby_id = auth()->user()->id;

    if($request->hasFile('file_name'))
    {
    
        $ffile = $request->file_name;
        $fimgExt = strtolower($ffile->getClientOriginalExtension());
        $fimageNewName = 'br_'.Str::random(8).time().'.'.$fimgExt;
        // $originalName = $ffile->getClientOriginalName();
    
        Storage::disk('upload')->put('course/assignment/'.$fimageNewName, File::get($ffile));
    
            if($assignment->course_brochure)
            {
                $f = 'course/assignment/'.$assignment->file_name;
                if(Storage::disk('upload')->exists($f))
                {
    
                    Storage::disk('upload')->delete($f);
                }
            }
    
        $assignment->file_name = $fimageNewName;
        // $assignment->brochure_ext = $fimgExt;
    }

    $assignment->save();

    return redirect()->back()->with('success', 'Assignment saved successfully!');
}

public function editCourseAssignment(Course $course, CourseAssignment $assignment)
{
    $assignmentFields = $assignment;
    $assignments = $course->assignmentByCompany(null)->get();
    return view('coordinator.courses.courseDetails', compact(
        'course',
        'assignments',
        'assignmentFields'
    ));
}
}
