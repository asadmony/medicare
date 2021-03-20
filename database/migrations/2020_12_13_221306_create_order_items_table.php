<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned()->nullable(); 
            $table->bigInteger('user_id')->unsigned()->nullable();
            //customer user_id 

            $table->bigInteger('company_id')->unsigned()->nullable();

 
            $table->string('order_status')->default('pending');
            
            //pending
            //confirmed
            //processing
            //ready_to_ship
            //shipped
            //delivered
            //cancelled
            //returned
            //undelivered

            $table->bigInteger('package_id')->unsigned()->nullable(); //for package

            $table->bigInteger('taken_package_id')->unsigned()->nullable(); //for package

             

            $table->decimal('total_price',10,2)->default(0); 
            //package_price or credit

            $table->char('order_for',10)->default('package');
            //package, credit
             
            $table->bigInteger('addedby_id')->unsigned()->nullable(); 
            $table->bigInteger('editedby_id')->unsigned()->nullable(); 

            $table->timestamp('pending_at')->nullable(); 
            $table->timestamp('confirmed_at')->nullable(); 
            // $table->timestamp('processing_at')->nullable(); 
            // $table->timestamp('ready_to_ship_at')->nullable(); 
            // $table->timestamp('shipped_at')->nullable(); 
            $table->timestamp('delivered_at')->nullable(); 
            // $table->timestamp('cancelled_at')->nullable(); 
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
        Schema::dropIfExists('order_items');
    }
}
