<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Job extends Model
{
    protected $id;
    protected $jobName;
    protected $filePath;

    /**
     * Get the comments for the blog post.
     */
    public function userJobFiles()
    {
        return $this->hasMany('App\Models\UserJobFile', "jobId");
    }

}
