<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function login(){
        return view('front.account.login');
    }
    public function checkLogin(Request $request){
        $credentials = [
            'email'=> $request->email,
            'password'=>$request->password,
            'level'=>2
        ];
        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect('/');
        }
        else{
            return back()->with('notification', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function logout(){
        Auth::logout();
        return back();
    }
    public function register(){
        return view("front/account/register");
    }
    public function postRegister(RegisterRequest $request){
        $data = $request->all();
        $data['level'] = 2;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if($user){
            return redirect('account/login')->with('notification', 'Tạo thành công tài khoản');
        }
    }
}
