<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //
    public function index(){
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }
    public function addOrder(Request $request){
        // Them don hang
        $order = Order::create($request->all());
        // Them chi tiet don hang
        $carts = Cart::content();
        if($request->payment_type == 'pay_later'){ 
    
            foreach ($carts as $cart) {
                # code...
                $data = [
                    'order_id'=>$order->id,
                    'product_id'=>$cart->id,
                    'qty'=>$cart->qty,
                    'amount'=>$cart->price,
                    'total'=>$cart->price * $cart->qty,
                ];  
    
                OrderDetail::create($data);
            }
            // gửi mail
            $total = Cart::total();
            $subtotal = Cart::subtotal();
            $this->sendMail($order,$total, $subtotal);

            // Xoa gio hang
            Cart::destroy();
            // Tra ve ket qua
            return redirect('checkout/result')->with('notification', 'Đặt hàng thành công, vui lòng kiểm tra email để xem thông tin chi tiết đơn hàng');
         }
         if($request->payment_type == 'online_payment'){ 
            // lay url thanh toan
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef'=>$order->id, // id don hang
                'vnp_OrderInfo'=>'Mô tả về đơn hàng ở đây',
                'vnp_Amount'=>Cart::total()
            ]);
            //chuyen huong toi url
            return redirect()->to($data_url);
         }
         return 'Xin lỗi chúng tôi chưa phát triển hình thức thanh toán online!!';
    }
    private function sendMail($order,$total, $subtotal){
        $email_to = $order->email;

        Mail::send('front/checkout/email', compact('order', 'total', 'subtotal'), function($message) use($email_to){
            $message->from('89thenext@gmail.com', 'Deuncoolstudios');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');

        });
    }
    public function vnPayCheck(Request $request){
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if($vnp_ResponseCode != null){
            if($vnp_ResponseCode == 00){
                //send mail

                $order = Order::find($vnp_TxnRef);
                $total = Order::total();
                $subtotal = Order::subtotal();
                $this->sendMail($order, $total, $subtotal);

                //xoa gio hang

                Cart::destroy();

                // thong bao thanh cong

                return redirect('checkout/result')->with('notification', 'Đặt hàng thành công, vui lòng kiểm tra email để xem thông tin chi tiết đơn hàng');
            }
            else{
                //xoa don hang

                Order::find($vnp_TxnRef)->delete();

                return redirect('checkout/result')->with('notification', 'Đặt hàng không thành công, vui lòng liên hệ với cửa hàng để biết thông tin chi tiết');
            }
        }
    }
    public function result(){
        $notification = session('notification');
        return view('front.checkout.result', compact('notification'));
    }
}
