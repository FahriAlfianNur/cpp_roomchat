<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\ChatroomMemberController;
use App\Http\Controllers\ChatroomMessageController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Route::get('auth/google', [AuthController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('nickname', [AuthController::class,'addNickname'])->name('nickname');
    Route::post('nickname', [AuthController::class,'saveNickname'])->name('nickname.save');
    Route::get('chatroom/menu', [ChatroomController::class,'getMenuChatroom'])->name('chatroom.menu');
    Route::get('chatroom/active/list', [ChatroomController::class,'getListChatroom'])->name('chatroom-active.list');
    Route::get('chatroom/join/list', [ChatroomController::class,'getListJoinChatroom'])->name('chatroom-join.list');
    Route::get('chatroom/join/{id}', [ChatroomController::class,'joinChatroom'])->name('chatroom.join');
    Route::get('chatroom/leave/{id}', [ChatroomController::class,'leaveChatroom'])->name('chatroom.leave');
    Route::get('chatroom/add', [ChatroomController::class,'addChatroom'])->name('chatroom.add');
    Route::post('chatroom/save', [ChatroomController::class,'submitChatroom'])->name('chatroom.save');
    Route::get('chatroom/detail/{id}', [ChatroomController::class,'detailChatroom'])->name('chatroom.detail');
    Route::post('message/send/{id}', [ChatroomMessageController::class,'sendMessage'])->name('message.send');
});





