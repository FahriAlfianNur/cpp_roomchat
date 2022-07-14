<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $register = User::count();
        $active = User::where('isActive', 1)->count();
        $roomchat = Chatroom::count();
        return view('dashboard', compact('user', 'register', 'active', 'roomchat'));
    }
}
