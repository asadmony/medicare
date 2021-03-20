<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->bigInteger('company_subrole_id')->unsigned()->nullable();
            $table->bigInteger('package_id')->unsigned()->nullable();
            $table->bigInteger('taken_package_id')->unsigned()->nullable();
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->bigInteger('taken_course_id')->unsigned()->nullable();
            $table->bigInteger('taken_course_exam_id')->unsigned()->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->decimal('previous_credit', 10, 2)->default(0);
            $table->decimal('transferred_credit', 10, 2)->default(0);
            $table->decimal('current_credit', 10, 2)->default(0);
            $table->string('transaction_type', 100)->nullable();
            $table->string('credit_from')->nullable();
            //user_credit, user_package, company_package, order
            $table->string('credit_for')->nullable();
            //taken_package, taken_course, taken_exam (after attempt_duration), renew_package, renew_course (1 yr later), user_credit
            $table->bigInteger('addedby_id')->unsigned()->nullable();
            $table->dateTime('transaction_date')->nullable();
            
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
        Schema::dropIfExists('credit_transactions');
    }
}
