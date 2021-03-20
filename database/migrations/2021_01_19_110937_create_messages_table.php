<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userto_id')
                  ->unsigned();
            $table->bigInteger('userfrom_id')
                  ->unsigned();
            $table->bigInteger('company_id')
                  ->unsigned()->nullable();
            $table->text('message')->nullable();
            $table->boolean('read')->default(0);
            //read by userto_id
            
            $table->boolean('last')->default(1);
            //last of messageable
            
            $table->string('role_from')->nullable();
            //communication from admin, assessor, member, user
            
            $table->bigInteger('messageable_id')->unsigned()->nullable();
            $table->string('messageable_type')->nullable();
            //messageable: answer, course, 

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
        Schema::dropIfExists('messages');
    }
}
