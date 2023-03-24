<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $orders = Order::orderby('id')->paginate(20);
        $search = $request->search ?? '';
        if($search!=null){
            $orders = Order::where('first_name', 'like', "%" . $search . "%")->orderby('id')->paginate(20);
        }
        return view('admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::where('id', $id)->firstOrFail();
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $order = Order::find($id);
        if($order->status==0){
            $order->status = 1;
        }
        else if($order->status==1){
            $order->status = 2;
        }
        else if($order->status==2){
            $order->status = 0;
        }
        $order->save();
        return redirect('admin/order');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $order = Order::where('id', $id);
        $order->delete();
        OrderDetail::where('order_id', $id)->delete();
        return redirect('admin/order');
    }
    public function print($id) {
        $order = Order::find($id);
        $total = $order->orderDetails->sum('total');
        $subtotal = $total;
        return view('admin/popup', compact('order', 'total', 'subtotal'));
    }
    public function status($status) {
        $status = (int)$status;
        $orders = Order::where('status', $status)->orderby('id')->paginate(10);
        return view('admin.order.index',compact('orders'));
    }
}
