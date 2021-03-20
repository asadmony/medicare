<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTakenPackageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taken_package_users', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('user_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('company_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('company_subrole_id')
                  ->unsigned()
                  ->nullable();
            $table->bigInteger('package_id')
                  ->unsigned()
                  ->nullable();
                  
            $table->bigInteger('taken_package_id')
            ->unsigned()
            ->nullable();

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
        Schema::dropIfExists('taken_package_users');
    }
}
