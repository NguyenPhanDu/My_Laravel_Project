<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function __construct(){

    }

    public function getLogin(){
        return view('authentication/login');
    }

    public function postLogin(Request $request){


            $login=[
                'email'=>$request->txtEmail,
                'password'=>$request->txtPassword
            ];
            if(Auth::attempt($login)){
                $request->session()->flash('login','Login success!');
                $request->session()->put('userAdmin',Auth::User());
                return redirect()->route('admin_index');
            }
            else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
            }

    }

    public function getLogout(Request $request)
    {
        $request->Session()->forget('userAdmin');
        Auth::logout();
        return view('authentication.login');
    }
}
