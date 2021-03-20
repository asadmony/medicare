<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')
                  ->unsigned()
                  ->nullable();
            $table->decimal('previous_balance', 10,2)->default(0);
            $table->decimal('moved_balance', 10,2)->default(0);
            //positive for add, negative for minus //credit

            $table->decimal('new_balance', 10,2)->default(0);
            //also balance in users_table is same //credit

            $table->string('type')->nullable();
            //recharge_by_gateway, cashback, discount, recharge_by_admin
            $table->bigInteger('type_id')->unsigned()->nullable();

            $table->text('details')->nullable();

            $table->integer('addedby_id')
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
        Schema::dropIfExists('balance_transactions');
    }
}
