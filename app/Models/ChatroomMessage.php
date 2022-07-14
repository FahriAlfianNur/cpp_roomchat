<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatroomMessage extends Model
{
    protected $table = 'chatroom_messages';
    protected $fillable = [
        'chatroom_id', 'user_id', 'message'
    ];

    public function memberDetail()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
