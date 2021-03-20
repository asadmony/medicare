<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionPaperItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_paper_items', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('course_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('course_topic_id')
                  ->unsigned()
                  ->nullable();

            $table->bigInteger('question_paper_id')
                  ->unsigned()
                  ->nullable();
            
            $table->bigInteger('course_question_id')
                  ->unsigned()
                  ->nullable();

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
        Schema::dropIfExists('question_paper_items');
    }
}
