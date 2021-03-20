<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->nullable(); 
            $table->bigInteger('company_id')->unsigned()->nullable(); 

            $table->bigInteger('invoice_number')->nullable();
            //12112056
 

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('country')->nullable();


 
 
            $table->char('order_for',10)->default('package');
            //package, credit

            $table->string('order_status')->default('pending');
            
            //pending
            //confirmed             
            //delivered
            //cancelled
 


            $table->string('payment_status')->default('unpaid');
            //unpaid, partial, paid

 
              
            $table->decimal('grand_total',10,2)->default(0);

 
            $table->decimal('total_paid',10,2)->default(0);
            $table->decimal('total_due',10,2)->default(0);

            $table->bigInteger('addedby_id')->unsigned()->nullable(); 
            $table->bigInteger('editedby_id')->unsigned()->nullable();

            $table->timestamp('pending_at')->nullable(); 
            $table->timestamp('confirmed_at')->nullable(); 
            // $table->timestamp('processing_at')->nullable(); 
            // $table->timestamp('ready_to_ship_at')->nullable(); 
            // $table->timestamp('shipped_at')->nullable(); 
            $table->timestamp('delivered_at')->nullable(); 
            $table->timestamp('cancelled_at')->nullable(); 
            // $table->timestamp('returned_at')->nullable(); 
            // $table->timestamp('undelivered_at')->nullable();


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
        Schema::dropIfExists('orders');
    }
}
