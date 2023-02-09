<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $credentials = [
            'email'=> $request->email,
            'password'=>$request->password,
            'level'=>1
        ];
        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended('admin');
        }
        else{
            return back()->with('notification', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
