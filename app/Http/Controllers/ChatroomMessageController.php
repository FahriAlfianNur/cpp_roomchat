<?php

namespace App\Http\Controllers;

use App\Models\ChatroomMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatroomMessageController extends Controller
{
    public function sendMessage(Request $request, $id)
    {
        ChatroomMessage::create([
            'chatroom_id' => $id,
            'user_id' => Auth::user()->id,
            'message' => $request->message
        ]);
        return redirect()->back();
    }
}
