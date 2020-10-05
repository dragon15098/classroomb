<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //     CREATE TABLE users ( 
    //     id INT NOT NULL AUTO_INCREMENT, 
    //     username VARCHAR(255), 
    //     password VARCHAR(255), 
    //     name VARCHAR(255), 
    //     email VARCHAR(255), 
    //     phoneNumber VARCHAR(20), 
    //     type int, 
    //     PRIMARY KEY (id));
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('name');
            $table->string('phoneNumber');
            $table->integer('type');
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
        Schema::dropIfExists('users');
    }
}
