<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    protected $table = 'chatrooms';
    protected $fillable = [
        'name'
    ];

    public function members() {
        return $this->hasMany('App\Models\ChatroomMember', 'chatroom_id', 'id');
    }
}
