<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            
            $table->id();
            $table->date('trans_date')
                  ->nullable();
            $table->bigInteger('user_id')
                  ->unsigned() //custome id
                  ->nullable();
            $table->bigInteger('package_id')
                  ->unsigned()
                  ->nullable();
            //for package

            $table->bigInteger('company_id')
                  ->unsigned()
                  ->nullable();
            //for package

            // $table->integer('credit_balance')->nullable();
            // //for credit

            $table->text('cookie')->nullable();
            
                        
            $table->bigInteger('addedby_id')
                  ->unsigned()
                  ->nullable();
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
        Schema::dropIfExists('carts');
    }
}
