<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
//     CREATE TABLE user_message ( 
//     id INT NOT NULL AUTO_INCREMENT, 
//     fromUserId INT,
//     toUserId INT,
//     content VARCHAR(2000),
//     PRIMARY KEY (id),
//     CONSTRAINT fk_from_user FOREIGN KEY (fromUserId) REFERENCES users(id),
//     CONSTRAINT fk_to_user FOREIGN KEY (toUserId) REFERENCES users(id));

        Schema::create('user_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fromUserId')->reference('users')->on('id');
            $table->integer('toUserId')->reference('users')->on('id');
            $table->string('content');
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
        Schema::dropIfExists('user_message');
    }
}
