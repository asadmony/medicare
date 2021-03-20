<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenCourseExamItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_course_exam_items', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('company_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('subrole_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('package_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('question_paper_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('taken_course_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('taken_course_exam_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_question_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_answer_id')
                  ->unsigned()
                  ->nullable();

            $table->boolean('correct')->default(0);

            $table->string('question_type')->nullable();
            //mcq, written

            $table->text('answer')->nullable();
            //if question_type is written, ans will be here...

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taken_course_exam_items');
    }
}
