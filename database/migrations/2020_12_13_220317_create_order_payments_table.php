<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->id();

            $table->date('trans_date')
                  ->nullable();

            $table->bigInteger('order_id')->unsigned()->nullable();
            
            $table->bigInteger('user_id')->unsigned()->nullable(); 
            //customer user_id

            $table->bigInteger('company_id')->unsigned()->nullable(); 
             
            $table->string('payment_by')->nullable();
            //balance, bkash, nagad, stripe, card, sslcommerze 

            $table->string('payment_type')->nullable();
            //cash, bank, mobile bank, check, online

            $table->string('payment_status')->default('pending');
            //pending, completed

            $table->string('bank_name')->nullable();
            //bkash

            $table->string('account_number')->nullable();
            //01918515567

            $table->string('cheque_number')->nullable();
            //2315465231654

            $table->text('note')->nullable();

            $table->decimal('paid_amount', 10, 2)
                  ->nullable();

            $table->bigInteger('receivedby_id')
                  ->unsigned()->nullable();


            $table->bigInteger('addedby_id')
                  ->unsigned()
                  ->nullable();

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
        Schema::dropIfExists('order_payments');
    }
}
