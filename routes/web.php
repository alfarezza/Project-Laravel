<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',[UserController::class, 'loadAllUser']);
Route::get('/add/user',[UserController::class, 'loadAllUserForm']);
Route::post('/add/user',[UserController::class, 'AddUser'])->name('AddUser');