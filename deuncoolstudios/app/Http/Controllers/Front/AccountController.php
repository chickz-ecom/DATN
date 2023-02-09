<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\RegisterRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

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
            'level'=>2,
            'status'=>1
        ];
        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect()->intended();
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
        $token = Str::random(10);
        
        $data['level'] = 2;
        $data['password'] = Hash::make($request->password);
        $data['token'] = $token;
        $user = User::create($data);
        $this->sendMail($user);
        // event(new Registered($user));
        if($user){
            return redirect('account/login')->with('notification', 'Vui lòng kiểm tra email để kích hoạt tài khoản');
        }
    }
    public function myOrderIndex(){
        $orders = Order::where('user_id', Auth::id())->get();
        return view('front.account.my-order.index', compact('orders'));
    }
    public function myOrderShow($id){
        $order = Order::where('id', $id)->firstOrFail();
        // dd($order);
        return view('front.account.my-order.show', compact('order'));
    }
    public function manageAccount(){
        $user = User::where('id', auth()->user()->id)->firstOrFail();
        return view('front.account.manage', compact('user'));
    }
    private function sendMail($user){
        $email_to = $user->email;

        Mail::send('front/account/mail/active_account_email', compact('user'), function($message) use($email_to){
            $message->from('89thenext@gmail.com', 'Deuncoolstudios');
            $message->to($email_to, $email_to);
            $message->subject('Active Account');

        });
    }
    public function activeAccount($user, $token){
        $user = User::where('id',$user)->where('token',$token)->firstOrFail();
        $user->fill([
            'status'=>1
        ]);
        $user->save();
        return redirect('account/login')->with('success','Bạn đã kích hoạt tài khoản thành công, mời bạn đăng nhập');
    }
}
