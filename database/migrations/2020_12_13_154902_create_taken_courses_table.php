<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_courses', function (Blueprint $table) {
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

            $table->bigInteger('taken_package_user_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();

            $table->string('course_from')->nullable();
            //user_credit, user_package, company_package


            $table->string('course_title')->nullable();
            //for taken course title (not updated)

            $table->decimal('course_credit', 6, 2)->unsigned()->default(0.00);

            $table->integer('attempt_duration')->default(7);
            //for inforamtion only 7 days

            $table->date('taken_date')->nullable();
            $table->date('expired_date')->nullable(); //1 year duration
            $table->timestamp('attempt_started_at')->nullable();

            $table->integer('no_of_attempts')->default(0);

            $table->timestamp('last_attemt_started_at')->nullable();

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
        Schema::dropIfExists('taken_courses');
    }
}
