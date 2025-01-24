<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users',[UserController::class, 'loadAllUser']);
Route::get('/add/user',[UserController::class, 'loadAllUserForm']);
Route::get('/edit/{id}',[UserController::class, 'loadEditForm']);
Route::get('/delete/{id}',[UserController::class, 'deleteUser']);

Route::post('/add/user',[UserController::class, 'AddUser'])->name('AddUser');
Route::post('/edit/user',[UserController::class, 'EditUser'])->name('EditUser');