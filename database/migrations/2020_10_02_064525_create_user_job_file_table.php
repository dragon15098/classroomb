<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJobFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //     CREATE TABLE user_job_file ( 
        //     id INT NOT NULL AUTO_INCREMENT,
        //     userId INT,
        //     jobId INT,
        //     filePath VARCHAR(200),
        //     PRIMARY KEY (id),
        //     CONSTRAINT fk_job_user_id FOREIGN KEY (jobId) REFERENCES job(id),
        //     CONSTRAINT fk_user_id FOREIGN KEY (userId) REFERENCES users(id));
        Schema::create('user_job_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->referencce('id')->on('users');
            $table->integer('jobId')->referencce('id')->on('job');
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
        Schema::dropIfExists('user_job_file');
    }
}
