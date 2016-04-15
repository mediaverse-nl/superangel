<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

    public function handleLogin(Request $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            echo "success with username!";
        }

        elseif (Auth::attempt(['email'=> $request->username, 'password' => $request->password])) {

            echo "success with email!";
        }  else{
            return back()->withErrors('Username or password do not match')->withInput(Input::except('password'));
        }
    }

    public function logout(){
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

    public function handleRegister(){

    }
}
