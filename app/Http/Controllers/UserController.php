<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //create all crud logic
    public function loadAllUser() {
        $all_users = User::all();
        return view('users', compact('all_users'));
    }

    public function loadAllUserForm(){
        return view('add-user');
    }

    public function AddUser(Request $request) {
        //perform form validation
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'string',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:4|max:12',
        ]);
        
        try {
            //register new User
            $new_user = new User;
            $new_user->first_name = $request->first_name;
            $new_user->last_name = $request->last_name;
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect('/users')->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            return response('/add/user')->with('fail', $e->getMessage());
        }
    }

    public function loadEditForm($id){
        $user = User::find($id);

        return view('edit-user', compact('user'));
    }

    public function EditUser(Request $request) {
        //perform form validation
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'string',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            // 'password' => 'required|confirmed|min:4|max:12',
        ]);
        
        try {
            //modify User
            $update_user = User::where('id',$request->user_id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'name' => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
            ]);

            return redirect('/users')->with('success', 'Updates Successfully');
        } catch (\Exception $e) {
            return response('/edit/user')->with('fail', $e->getMessage());
        }
    }

    public function deleteUser($id){
        try {
            User::where('id',$id)->delete();
            return redirect('/users')->with('success', 'User Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect('/users')->with('fail',$e->getMessage());
        }
    }
}
