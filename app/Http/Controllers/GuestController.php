<?php

namespace App\Http\Controllers;

use App\CarouselImage;
use App\ItemCategory;
use App\Item;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{

    public function __construct()
    {
    }


    public function index($category = false, $subcategory = false)
    {
        $data['carousel'] = CarouselImage::where('public', 1)->get();
        $data['categories'] = ItemCategory::where('group', '')->get();
        foreach ($data['categories'] as $object) {
            if ($object->name == $category) {
                $object->active = true;
            } else {
                $object->active = false;
            }
            $object->subcategories = ItemCategory::where('group', $object->name)->get();
        }
        return view('index', $data)->with('title', 'Home');
    }

    public function shop($category = false, $subcategory = false)
    {
        $title = $category ? $category . " - " . $subcategory : "Shop";
        if($subcategory){
            $id = ItemCategory::where(['group' => $category, 'name'=> $subcategory])->first()->id;

            $data['products'] = Item::where('category_id', $id)->get();
        }
        $data['categories'] = ItemCategory::where('group', '')->get();
        foreach ($data['categories'] as $object) {
            if ($object->name == $category) {
                $object->active = true;
            } else {
                $object->active = false;
            }
            $object->subcategories = ItemCategory::where('group', $object->name)->get();
        }
        return view('shop', $data)->with('title', $title);
    }

    public function login()
    {
        return view('login')->with('title', 'Inloggen');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function register()
    {
        return view('register')->with('title', 'Registreren');
    }

    public function handleLogin(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password], $request->remember_me)) {
            return redirect()->intended('/');
        } elseif (Auth::attempt(['email' => $request->username, 'password' => $request->password], $request->remember_me)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors('Username or password do not match')->withInput(Input::except('password'));
        }
    }

    public function handleRegister(Request $request)
    {
        $data = $request->only('username', 'email', 'password', 'password_confirmation', 'avg');
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
            $data['customer_id'] = Uuid::numerify("%%%%%%%%%");
            $user = \App\User::create($data);
            $user->details()->create(array());
            return redirect('/inloggen');
        }
    }
}
