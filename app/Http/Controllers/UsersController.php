<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;


class UsersController extends Controller
{
    public $restful = true;

    public function newUser()
    {
        $title = 'Make It Snappy Q&A -Register';
        return view('users.register2', compact('title'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users|alpha_dash|min:4',
            'password' => 'required|alpha_num|confirmed|min:4',
            'password_confirmation' => 'required|alpha_num'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->password =bcrypt( $request->password);
        $user->save();
        auth()->login($user);

        return redirect('/')->with('message', 'Thanks for Register');
    }

    public function login()
    {
        $title = 'Make It Snappy Q&A -Login';
        return view('users.login', compact('title'));
    }

    public function loginIn(Request $request)
    {
        if(!  auth()->attempt(\request(['username','password']))){
            return back()->withErrors([
                'message'=>'Username or password not correct'
            ]);
        };
        return redirect('/');
    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
