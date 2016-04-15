<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Home'
        );
        return view('index', $data);
    }

    public function register()
    {
        $data = array(
            'title' => 'Registreren'
        );
        return view('register', $data);
    }
}
