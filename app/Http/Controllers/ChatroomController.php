<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\ChatroomMember;
use App\Models\ChatroomMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends Controller
{
    public function message(string $name = null, string $message = null)
    {
        return session()->flash($name,$message);
    }

    public function getMenuChatroom()
    {
        $user = Auth::user();
        $roomCount = ChatroomMember::where('user_id',$user->id)->count();
        return view('chatroom.menu', compact('user', 'roomCount'));
    }

    public function getListChatroom()
    {
        $user = Auth::user();
        $chatrooms = Chatroom::with('members')->get();
        return view('chatroom.list', compact('user', 'chatrooms'));
    }

    public function getListJoinChatroom()
    {
        $user = Auth::user();
        $chatrooms = Chatroom::with('members')->get();
        return view('chatroom.join', compact('user', 'chatrooms'));
    }

    public function joinChatroom($idRoom)
    {
        $user = Auth::user();
        ChatroomMember::create([
           'chatroom_id' => $idRoom,
            'user_id' => $user->id,
        ]);
        ChatroomMessage::create([
            'chatroom_id' => $idRoom,
            'user_id' => 0,
            'message' => $user->nickname." Bergabung Dengan Percakapan"
        ]);
        return redirect()->route('chatroom.detail', $idRoom);
    }

    public function leaveChatroom($idRoom)
    {
        $user = Auth::user();
        ChatroomMember::where('chatroom_id', $idRoom)->where('user_id', $user->id)->delete();
        ChatroomMessage::create([
            'chatroom_id' => $idRoom,
            'user_id' => 0,
            'message' => $user->nickname." Meninggalkan Percakapan"
        ]);
        return redirect()->route('chatroom.menu', $idRoom);
    }

    public function addChatroom()
    {
        $user = Auth::user();
        return view('chatroom.add', compact('user'));
    }
    public function submitChatroom(Request $request)
    {
        Chatroom::create([
            'name' => $request->topik,
        ]);
        $this->message('message','Chatroom berhasil dibuat!');
        return redirect()->back();
    }

    public function detailChatroom($id)
    {
        $user = Auth::user();
        $chatroom = Chatroom::where('id', $id)->first();
        $members = ChatroomMember::with('memberDetail')->where('chatroom_id', $chatroom->id)->get();
        $messages = ChatroomMessage::with('memberDetail')->where('chatroom_id', $chatroom->id)->get();
        return view('chatroom.detail', compact('user', 'chatroom', 'members', 'messages'));
    }
}
