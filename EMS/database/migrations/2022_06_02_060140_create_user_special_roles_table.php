<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('user_special_roles', function (Blueprint $table) {
                $table->uuid('user_id');
                $table->unsignedBigInteger('role_id');
    
                //FOREIGN KEY CONSTRAINTS
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    
                //SETTING THE PRIMARY KEYS
                $table->primary(['user_special_roles','role_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_roles');
    }
}