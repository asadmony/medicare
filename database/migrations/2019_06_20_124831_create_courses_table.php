<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subject_id')->nullable();
            $table->string('status')->default('temp');
            //temp, published,draft
            $table->string('course_type')->nullable();
            //undergraduate, postgraduate
            $table->string('course_level')->nullable();
            // 1,2,3 begginer,intermediate, pro
            $table->string('course_achievement')->nullable();//degree,topup degree,award,certificate,diploma
            $table->boolean('face_to_face')->nullable()->default(false);
            $table->string('title')->nullable();
            $table->decimal('course_credit', 4, 2)->nullable()->default(1.00);
            // credit value for this course
            
            $table->integer('attempt_duration')->default(7);
            //for inforamtion only 7 days
            
            $table->text('description')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('course_code')->nullable();
            $table->string('course_mode')->nullable();
            $table->text('mandatory_unit')->nullable();
            $table->text('entry_requirement')->nullable();
            $table->string('assesments')->nullable();
            $table->text('accreditation')->nullable();
            $table->text('how_to_apply')->nullable();
            $table->text('optional_unit')->nullable();

            $table->string('overview')->nullable();
            $table->string('structure')->nullable();
            $table->string('how_you_study')->nullable();
            $table->string('fees_funding')->nullable();
            $table->string('carrer')->nullable();

            $table->string('course_brochure')->nullable();
            $table->string('brochure_ext')->nullable();
            $table->string('image_name')->nullable();
            // feature image

            $table->string('syllabus_file')->nullable();
            $table->boolean('packageable')->default(1);
            $table->boolean('featured')->default(1);

            $table->decimal('payment_one',10,2)->nullable();
            $table->integer('duration_one')->nullable();
            $table->text('payment_one_details')->nullable();

            $table->decimal('payment_two',10,2)->nullable();
            $table->integer('duration_two')->nullable();
            $table->text('payment_two_details')->nullable();

            $table->decimal('payment_three',10,2)->nullable();
            $table->integer('duration_three')->nullable();
            $table->text('payment_three_details')->nullable();

            $table->integer('addedby_id')
                  ->unsigned();
            $table->integer('editedby_id')
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
        Schema::dropIfExists('courses');
    }
}
