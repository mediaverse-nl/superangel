<?php

namespace App\Http\Controllers;
use App\UserDetail;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('User.profile')
            ->with('title', 'Mijn Gegevens')
            ->with('myAccount', \App\User::find(Auth::user()->id));

    }

    public function updateAccount(Request $request)
    {
        if(!$request->only('old_password')['old_password']){
            $data = $request->except('password', '_token');
            User::where('id', Auth::user()->id)->update($data);
            return back();
        }else{
            $data = $request->except('_token');
            if(Hash::check($data['old_password'], Auth::user()->password)){
                $validator = Validator::make($data,
                    [
                        'old_password' => 'required',
                        'password' => 'required|min:6|confirmed'
                    ]
                );

                if($validator->fails()){
                    return back()->withInput()->withErrors($validator->messages());
                }else{
                    $input = $request->except('_token', 'old_password', 'password_confirmation');
                    User::where('id', Auth::user()->id)->update($input);
                    return back();
                }
            }else{
                return back()->withInput()->withErrors(array('old_password' => array('The given password doesn\'t mach with our database')));
            }

        }

    }

    public function updateAddress(Request $request)
    {
        $data = $request->except('_token');
        UserDetail::where('user_id', Auth::user()->id)->update($data);
        return back();
    }
}
