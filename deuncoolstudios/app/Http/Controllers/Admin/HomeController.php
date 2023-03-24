<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            return redirect('admin');
        }
        else{
            return back()->with('notification', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
    public function index(){
        $orders = Order::where('status', 2)->get();
        $total = 0;
        foreach($orders as $order){
            $total += OrderDetail::where('order_id', $order->id)->sum('total');
        }
        $sum = Order::where('status', 2)->count('id');
        $count_user = User::where('level', 2)->where('status', 1)->count('id');
        return view('admin/dashboard', compact('total', 'sum', 'count_user'));
    }
    public function filter(Request $request) {
        if($request->ajax()){
            $start = $request->start;
            $end = $request->end;
            $orders = Order::whereBetween('created_at', [$start, $end])->where('status',2)->get();
            
            $total = 0;
            $count = 0;
            foreach($orders as $order) {
                $count++;
                $total += OrderDetail::where('order_id', $order->id)
                            ->sum('total');
            }
            $response = (object)[
                'count'=>$count,
                'total'=>$total
            ];
            return $response;
        }
    }
}
