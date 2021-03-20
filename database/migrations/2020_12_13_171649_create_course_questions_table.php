<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_questions', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('course_topic_id')
                  ->unsigned()
                  ->nullable();

            $table->text('question')->nullable();
            $table->string('image_name')->nullable();
            //for image use in question

            $table->string('question_type')->nullable();
            //mcq, written

            $table->boolean('active')->default(1);

            $table->string('question_level')->nullable();

            //1,2,3,4,5

            $table->bigInteger('addedby_id')
                  ->unsigned();
            $table->bigInteger('editedby_id')
                  ->unsigned()
                  ->nullable();

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
        Schema::dropIfExists('course_questions');
    }
}
