<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserJobFile extends Model
{
    protected $id;
    protected $userId;
    protected $jobId;
    protected $filePath;
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\Models\User', 'userId');
    }
}
