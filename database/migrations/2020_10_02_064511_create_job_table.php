<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    //     CREATE TABLE job ( 
    //     id INT NOT NULL AUTO_INCREMENT, 
    //     jobName VARCHAR(255),
    //     filePath VARCHAR(200),
    //     PRIMARY KEY (id));
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jobName');
            $table->string('filePath');
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
        Schema::dropIfExists('job');
    }
}
