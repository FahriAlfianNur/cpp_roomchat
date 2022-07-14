<?php

namespace App\Http\Controllers;

use App\Models\ChatroomMember;
use App\Models\ChatroomMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;



class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $user_google = Socialite::driver('google')->user();
            $user = User::where('email', $user_google->getEmail())->first();

            if($user){
                $user->isActive = 1;
                $user->save();
                Auth::login($user);
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::create([
                    'name' => $user_google->getName(),
                    'email' => $user_google->getEmail(),
                    'google_id'=> $user_google->getId(),
                    'avatar'=> $user_google->getAvatar(),
                    'isActive' => 1,
                    'role' => 'user',
                    'password' => encrypt('test123')
                ]);

                Auth::login($newUser);
                return redirect()->intended('nickname');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function addNickname(){
        return view('auth.nickname');
    }

    public function saveNickname(Request $request){
        $user = Auth::user();

        $update = User::where('email', $user->email)->first();
        $update->nickname = $request->nickname;
        if($update->save()){
            return redirect()->intended('dashboard');
        }else{
            return redirect()->intended('login');
        }
    }

    public function logout()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->isActive = 0;
        $user->save();
        $chatroomMember = ChatroomMember::where('user_id', Auth::user()->id)->get();
        foreach($chatroomMember as $data){
            ChatroomMessage::create([
                'chatroom_id' => $data->chatroom_id,
                'user_id' => 0,
                'message' => $user->nickname." Meninggalkan Percakapan"
            ]);
        }
        ChatroomMember::where('user_id', Auth::user()->id)->delete();
        Auth::logout();
        return redirect('/');
    }
}
