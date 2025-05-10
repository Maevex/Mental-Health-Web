<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\KeluhanController;

Route::get('/register', [UserController::class, 'showRegisterForm']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/chat', [ChatController::class, 'index'])->name('chat');
Route::get('/user/dash', function () {
    return view('user.dash');
});

Route::get('/admin/dash', function () {
    return view('admin.dash');
});
Route::get('/keluhan', [KeluhanController::class, 'showForm'])->name('keluhan.form');
Route::post('/keluhan', [KeluhanController::class, 'submit'])->name('keluhan.submit');
