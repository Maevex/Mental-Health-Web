<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\LoginController;



Route::get('/', function () {
    return redirect()->route('login'); // ini ngarahin ke /login
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/register', [LoginController::class, 'showRegisterForm']);
Route::post('/register', [LoginController::class, 'register']);


Route::prefix('user')->group(function () {
    Route::get('/dash', [UserController::class, 'showDashboard'])->name('user.dash');
    Route::get('/subkategori', [UserController::class, 'showSubkategori'])->name('user.subkategori');
    Route::get('/keluhan', [UserController::class, 'showKeluhan'])->name('user.keluhan');
    Route::post('/keluhan', [UserController::class, 'submitKeluhan'])->name('user.keluhan.submit');
       Route::get('/chat', [UserController::class, 'chat']);
    Route::post('/chat/send', [UserController::class, 'sendChat'])->name('user.chat.send');
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

});
Route::post('/logout', function () {
    session()->forget('token');
    return redirect('/login')->with('success', 'Berhasil logout.');
});




