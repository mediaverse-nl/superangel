<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home'
        );
        return view('index', $data);
    }

    public function login()
    {
        $data = array(
            'title' => 'Inloggen'
        );
        return view('login', $data);
    }

    public function handleLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember_me)) {
            return redirect('/');
        } elseif (Auth::attempt(['email' => $request->username, 'password' => $request->password], $request->remember_me)) {
            return redirect('/');
        } else {
            return back()->withErrors('Username or password do not match')->withInput(Input::except('password'));
        }
    }

    public function logout()
    {
        Auth::logout;
        return back()->withErrors(array('msg' => "You have successfully logged out"));
    }

    public function register()
    {
        $data = array(
            'title' => 'Registreren'
        );
        return view('register', $data);
    }

    public function handleRegister(Request $request)
    {
        $data = Input::only('username', 'email', 'password', 'password_confirmation', 'avg');
        $validator = Validator::make($data,
            [
                'username' => 'required|max:255|min:3|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'avg' => 'required'
            ]
        );

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->messages());
        } else {
            $data['reg_ip'] = $request->getClientIp(true);
            $data['password'] = Hash::make($data['password']);
            \App\User::create($data);
            return redirect('/');
        }
    }
}
