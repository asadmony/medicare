<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseRandomQuestionPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_random_question_papers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();
            
            $table->integer('total_attempts')->default(0);
            $table->boolean('active')->default(0);
            $table->date('started_date')->nullable();
            $table->date('expired_date')->nullable();

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
        Schema::dropIfExists('course_random_question_papers');
    }
}
