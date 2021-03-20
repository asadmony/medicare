<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenCourseExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_course_exams', function (Blueprint $table) {
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
            $table->bigInteger('taken_package_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('taken_course_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('question_paper_id')
                  ->unsigned()
                  ->nullable();

            $table->integer('total_question')
                  ->unsigned()
                  ->nullable();

            $table->integer('correct_answer')
                  ->unsigned()
                  ->nullable();

            $table->string('certificate_file')->nullable();

            $table->decimal('used_credit', 4, 2)->unsigned()->default(0.00);

            $table->string('course_from')->nullable();
            //user_credit, user_package, company_package

            $table->timestamp('attempt_started_at')->nullable();
            $table->integer('no_of_attempts')->default(0);

            $table->integer('attempt_renewed')->default(0);
            //count of renew this attempt
            //renew will be by attempt_duration

            $table->timestamp('last_attempt_started_at')->nullable();
            $table->date('attempt_expired_date')->nullable();

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
        Schema::dropIfExists('taken_course_exams');
    }
}
