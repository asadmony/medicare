<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file_name')->nullable();//logo name
            $table->integer('no_of_courses')->unsigned()->nullable();
            $table->integer('no_of_persons')->unsigned()->nullable();
            $table->integer('no_of_attempts')->unsigned()->nullable();


            $table->string('course_level')->nullable();
            //for selected course to attach here

            $table->integer('duration')->default(0); //in days

            $table->decimal('no_of_credits',8,2)->unsigned()->nullable();
            $table->decimal('price',10,2)->unsigned()->nullable();//in euro or in pound
            $table->string('package_for')->nullable();
            //individual,company,any
            $table->string('package_type')->nullable();
            //no_of_courses,no_of_persons, no_of_attempts, no_of_credits, any

            $table->boolean('active')->default(1);
            $table->string('status')->default('temp');
            //temp, active, inactive

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
        Schema::dropIfExists('packages');
    }
}
