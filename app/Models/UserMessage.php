<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserMessage extends Model
{
    protected $id;
    protected $fromUserId;
    protected $toUserId;
    protected $content;
}
