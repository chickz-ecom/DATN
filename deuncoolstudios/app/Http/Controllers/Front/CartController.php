<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserCart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    //
    public function add($id){
        $product = Product::findOrFail($id);
        // dd($id);
        Cart::add([
            'id'=> $id,
            'name'=> $product->name,
            'qty'=> 1,
            'price'=> $product->discount ?? $product->price,
            'weight'=> $product->weight ?? 0,
            'options'=> [
                'images'=> $product->productImages
            ]
        ]);
        if(auth()->user()){
            $cart = UserCart::where(['user_id' => auth()->user()->id])->get();
            if(count($cart)==0){
                $product = Product::where('id',$id)->first();
                if($product->discount != null){
                    $price = $product->discount;
                }
                else{
                    $price = $product->price;
                }
                $data = [
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$id,
                    'qty'=>1,
                    'price'=>$price,
                    'total'=>$price,
                    'image'=>$product->productImages[0]->path
                ];
                UserCart::create($data);
            }
            else if($cart->where('product_id',$id)->first()){
                $cart = UserCart::where(['user_id' => auth()->user()->id,'product_id'=> $id])->firstOrFail();
                $cart->qty = $cart->qty+1;
                $cart->total = $cart->qty * $cart->price;
                $cart->save();
            }
            else{
                $product = Product::where('id',$id)->first();
                if($product->discount != null){
                    $price = $product->discount;
                }
                else{
                    $price = $product->price;
                }
                $data = [
                    'user_id'=>auth()->user()->id,
                    'product_id'=>$id,
                    'qty'=>1,
                    'price'=>$price,
                    'total'=>$price,
                    'image'=>$product->productImages[0]->path
                ];
                UserCart::create($data);
            }
        }
        return back();
    }
    public function index(){
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }
        }
        else{
            $carts = Cart::content();
            $total = Cart::total();
        }
        return view('front.shop.cart', compact('carts', 'total'));
    }
    public function delete($rowId){
        if(auth()->user()){
            $cart = UserCart::where(['user_id' => auth()->user()->id,'id'=> $rowId])->firstOrFail();
            $cart->delete();
        }
        else{
            Cart::remove($rowId);
        }
        return back();
    }
    public function destroy(){
        if(auth()->user()){
            UserCart::where('user_id',auth()->user()->id)->delete();
        }
        else{
            Cart::destroy();
        }
        return back();
    }
    public function update(Request $request){
        if($request->ajax()){
            if(auth()->user()){
                if($request->qty==0){
                    $cart = UserCart::where(['user_id' => auth()->user()->id,'id'=> $request->rowId])->firstOrFail();
                    $cart->delete();
                }
                else{
                    $cart = UserCart::where(['user_id' => auth()->user()->id,'id'=> $request->rowId])->firstOrFail();
                    $cart->qty = $request->qty;
                    $cart->total = $request->qty * $cart->price;
                    $cart->save();
                }
                
            }
            else{
                
                Cart::update($request->rowId, $request->qty);
            }
        }
    }
}
