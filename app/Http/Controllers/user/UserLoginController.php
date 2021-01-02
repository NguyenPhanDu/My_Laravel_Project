<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
class UserLoginController extends Controller
{
    public function __construct(){

    }

    public function getLogin(){
        return view('shop.login');
    }

    public function postLogin(Request $request){


            $login=[
                'email'=>$request->txtEmail,
                'password'=>$request->txtPassword
            ];
            if(Auth::attempt($login)){
                $request->session()->put('userLogin',Auth::User());
                return redirect()->route('index-shop');
            }
            else {
            return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
            }
    }

    public function getLogout(Request $request)
    {
        $request->Session()->forget('userLogin');
        Auth::logout();
        return redirect()->back();
    }
}
