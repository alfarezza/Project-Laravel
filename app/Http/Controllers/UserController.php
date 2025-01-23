<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //create all crud logic
    public function loadAllUser() {
        $all_users = User::all();
        return view('users');
    }

    public function loadAllUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request) {
        //perform form validation
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|integer',
            'password' => 'required|confirmed|min:4|max:12',
        ]);
    }
}
