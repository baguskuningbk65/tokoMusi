<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        // return $request;

        $request->validate([
            'fullname' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|alpha_num',
            'retype_password' => 'required|same:password|min:3|max:16',
            'birthday' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'gender' => 'required'

        ], [
            'fullname.required' => 'Fullname must be required',
            'email.required' => 'Email harus diisi ya',
            'email.unique' => 'Email nya udah ada ni',
            'password.required' => 'password must be required',
            'password.min' => 'min 3 character',
            'password.max' => 'max 16 character',
            'password.alpha_num' => 'Password must be there is a number',
            'retypepassword.required' => 'retype password must be required',
            'retypepassword.same' => 'password must be same with first password',
            'birthday.required' => 'Date of birthday must be required',
            'address.required' => 'Address must be required',
            'phonenumber.required' => 'Phone number must be required',
        ]);

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthday' => $request->birthday,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'level' => 'admin',
        ]);
        return redirect('/login');
    }
    public function loginstore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alpha_num|min:8|max:10',

        ], [
            'email.required' => 'email harus diisi',
            'password.required' => 'password harus diisi',
            'password.min' => 'min 8 character',
            'password.max' => 'max 10 character',
            'password.alpha_num' => 'Password must be there is a number',
        ]);
        // syntax login
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if (Auth::check()) {
            return redirect('/category');
        } else {
            return redirect('/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
