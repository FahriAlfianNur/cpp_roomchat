<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatroomMember extends Model
{
    protected $table = 'chatroom_members';
    protected $fillable = [
        'chatroom_id', 'user_id'
    ];

    public function memberDetail()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function roomDetail()
    {
        return $this->belongsTo(Chatroom::class, 'chatroom_id', 'id');
    }
}
