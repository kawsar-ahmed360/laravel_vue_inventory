<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductManage;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart($id){

        $prod = ProductManage::where('id',$id)->first();

        $exit = Cart::where('pro_id',$id)->exists();

        if($exit){
            $exitcart = Cart::where('pro_id',$id)->first();
            $exitcart->pro_qty = $exitcart->pro_qty+1;
            $exitcart->sub_total = $prod->selling_price*$exitcart->pro_qty;
            $exitcart->save();
        }else{

            $cart = new Cart();
            $cart->pro_id =$id;
            $cart->pro_name = $prod->product_name;
            $cart->pro_price = $prod->selling_price;
            $cart->pro_qty = 1;
            $cart->pro_price = $prod->selling_price;
            $cart->sub_total = $prod->selling_price;
            $cart->save();
        }


        return response()->json('done');
    }

    public function ViewCart(){

        $view = Cart::get();

        return response()->json($view);
    }

    public function RemoveCart($id){

       Cart::where('id',$id)->delete();

    }

    public function DecrementCart($id){

        $count = Cart::where('id',$id)->first();

        if($count->pro_qty<=1){

            return response()->json('Minimun quentity limite cross');
        }else{
           $dec = Cart::where('id',$id)->first();
           $dec->pro_qty = $dec->pro_qty-1;
           $dec->sub_total = $dec->pro_price*$dec->pro_qty;
           $dec->save();
        }
    }

    public function IncrementCart($id){

        $inc = Cart::where('id',$id)->first();
        $inc->pro_qty = $inc->pro_qty+1;
        $inc->sub_total = $inc->pro_price*$inc->pro_qty;
        $inc->save();

    }
}
