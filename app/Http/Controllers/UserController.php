<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('loginuser.loginn');
    }
    public function register()
    {
        return view('loginuser.registerr');
    }

    public function register_store(Request $request)
    {
        // return $request;

        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'retypepassword' => 'required|same:password|min:3|max:16',
            'birthday' => 'required',
            'address' => 'required',
            'phonenumber' => 'required',
            'gender' => 'required'

        ]);

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'address' => $request->address,
            'phone_number' => $request->phonenumber,
            'gender' => $request->gender,
            'level' => 'user',
        ]);
        return redirect('/loginuser');
    }
    public function loginstore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:3|max:16',

        ], [
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi',
        ]);
        $users = [
            'email' => $request->email,
            'password' => $request->password
        ];
        Auth::attempt($users);

        if (Auth::check()) {
            return redirect('/home');
        } else {
            return redirect('/loginuser');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/loginuser');
    }
}
