<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function getSignup(){
        return view('auth.signup');
    }

    public function postSignup(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:users|email|max:255',
            'username' => 'required|unique:users|alpha_dash|max:20',
            'password' => 'required|min:3 ',
        ]);

        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'gender' => $request->input('gender'),
        ]);

        

        return redirect()->route('home')->with('info', 'Вы успешно зарегистрировались!');
    }

    public function getSignin(){
        return view('auth.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request,[
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if(!Auth::attempt($request->only(['email','password']), $request->has('remember') )){
            return redirect()->back()->with('info', 'Неправильный логин или пароль');
        }


        return redirect()->route('home')->with('info', 'Вы успешно авторизованы.');
    }

    public function getSignout(){
        Auth::logout();

        return redirect()->route('home');
    }
}
