<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserRegisterController extends Controller
{
    public function __construct(){

    }

    public function getRegister(){
        return view('shop.register');
    }


    public function postRegister(Request $request){
        $password=$request->txtPassword;
        $passwordConfirm=$request->txtConfirmPassword;
        if($password!=$passwordConfirm){
            return redirect()->back()->with('status', 'Password hoặc Password Confirm không chính xác');
        }
        else{
            $register=[
                'username'=>$request->txtUsename,
                'email'=>$request->txtEmail,
                'password'=>Hash::Make($request->txtPassword),
                'rule'=>0,
                'status'=>1
            ];
            if(User::create($register)){
                return redirect()->route('userGetLogin')->with('registerSuccess','Tạo tài khoản thành công!!');
            }
            else{
                return redirect()->back()->with('registerError', 'Đăng kí thất bại');
            }
        }
    }
}
