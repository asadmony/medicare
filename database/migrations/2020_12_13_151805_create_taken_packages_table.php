<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('company_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('package_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('order_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('order_item_id')
                  ->unsigned()
                  ->nullable();

            $table->string('course_level')->nullable();
            //for selected course to attach here

            $table->string('title')->nullable();
            $table->integer('no_of_courses')->unsigned()->nullable();
            $table->integer('no_of_persons')->unsigned()->nullable();
            $table->integer('no_of_attempts')->unsigned()->nullable();
            $table->decimal('no_of_credits',8,2)->unsigned()->nullable();
            $table->decimal('used_credit',8,2)->unsigned()->nullable();
            $table->decimal('price',10,2)->unsigned()->nullable();//in euro or in pound
            $table->integer('duration')->default(0); //in days //for informaiton only package_duration 1 yr


            $table->string('package_for')->nullable();
            //individual,company
            $table->string('package_type')->nullable();
            //no_of_courses,no_of_persons, no_of_attempts, no_of_credits, any

            $table->date('taken_date')->nullable();
            $table->date('expired_date')->nullable();
            //expired_date will be calculated on duration

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
        Schema::dropIfExists('taken_packages');
    }
}
