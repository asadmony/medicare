<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionPaperItem extends Model
{
    protected $fillable = [
        'course_id',
        'course_topic_id',
        'question_paper_id',
        'course_question_id',
        'addedby_id',
        'editedby_id',
    ];
    public function questionPaper()
    {
        return $this->belongsTo('App\Model\CourseRandomQuestionPaper', 'question_paper_id');
    }
    public function question()
    {
        return $this->belongsTo('App\Model\CourseQuestion', 'course_question_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Model\Course', 'course_id');
    }
    public function topic()
    {
        return $this->belongsTo('App\Model\CourseTopic', 'course_topic_id');
    }
}
