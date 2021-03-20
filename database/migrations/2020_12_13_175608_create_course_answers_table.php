<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_answers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('course_topic_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_question_id')
                  ->unsigned()
                  ->nullable();

            $table->text('answer')->nullable();

            $table->boolean('correct')->default(0);

            $table->boolean('active')->default(1);
            
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
        Schema::dropIfExists('course_answers');
    }
}
