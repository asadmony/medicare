<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_assignments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('company_id')->nullable()->unsigned();
            $table->bigInteger('course_id')->nullable()->unsigned();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('file_name')->nullable();
            $table->boolean('is_active')->nullable()->default(true);
            $table->bigInteger('addedby_id')->nullable()->unsigned();
            $table->bigInteger('editedby_id')->nullable()->unsigned();
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
        Schema::dropIfExists('course_assignments');
    }
}
