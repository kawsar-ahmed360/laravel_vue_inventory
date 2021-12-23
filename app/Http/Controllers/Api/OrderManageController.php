<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\ProductManage;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    public function OrderDone(Request $request){

        if($request->customer_id==''){

            return response()->json('customer_null');
        }

        if($request->pay==''){

            return response()->json('paynull');
        }


        if($request->payby==''){

            return response()->json('payby');
        }

        if($request->qty==0){

            return response()->json('allqty');
        }

        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->qty = $request->qty;
        $order->subtotal = $request->total;
        $order->total = $request->total;
        $order->pay = $request->pay;
        $order->due = $request->due;
        $order->payby = $request->payby;
        $order->order_date = date('d-m-Y');
        $order->order_month = date('m');
        $order->order_year = date('Y');
        $order->vat = 0;
        $order->save();

        $order_details = Cart::get();

        foreach(@$order_details as $key=>$details){

            $detail = new OrderDetails();
            $detail->order_id = $order->id;
            $detail->product_id = $details->pro_id;
            $detail->qty = $details->pro_qty;
            $detail->product_price = $details->pro_price;
            $detail->sub_total = $details->sub_total;
            $detail->save();

            ProductManage::where('id',$details->pro_id)->decrement('product_quantity',$details->pro_qty);


        }



        foreach(Cart::get() as $cart){
            $cart->delete();
        }

        return response()->json('ok');
    }

    public function OrderView(){

        $order = Order::select('orders.*','customers.name')
                 ->join('customers','orders.customer_id','customers.id')
                 ->get();

                 return response()->json($order);
    }

    public function OrderDelete($id){

        $order_details = OrderDetails::where('order_id',$id)->get();
        foreach(@$order_details as $de){
            $de->delete();
        }

        Order::where('id',$id)->delete();

        return response()->json('ok');
    }

    public function SingleOrderView($id){

        //  $all = Order::select('orders.*','customers.name','order_details.')
        //         ->join('customers','orders.customer_id','customers.id')
        //         ->join('order_details','orders.id','order_details.order_id')
        //         ->where('orders.id',$id)
        //         ->get();

        $all = Order::where('id',$id)->first();
        $customer = Customer::where('id',$all->customer_id)->first();
        $details = OrderDetails::select('order_details.*','product_manages.product_name','product_manages.product_code','product_manages.image as img','category_manages.category_name')
                        ->join('product_manages','order_details.product_id','product_manages.id')
                        ->join('category_manages','product_manages.category_id','category_manages.id')
                        ->where('order_details.order_id',$all->id)
                        ->get();

        return response()->json(['order'=>$all,'cus'=>$customer,'details'=>$details]);
    }

    public function DateSearch(Request $request){

        $all = Order::select('orders.*','customers.name')
              ->join('customers','orders.customer_id','customers.id')
              ->whereDate('orders.created_at',$request->date_search)
              ->get();

        return response()->json($all);
    }

    public function MonthSearch(Request $request){

        $all = Order::select('orders.*','customers.name')
        ->join('customers','orders.customer_id','customers.id')
        ->where('orders.order_month',$request->month_search)
        ->get();

        return response()->json($all);
    }

    public function TotayTotalReport(Request $request){

          $date = date('Y-m-d');
          $total = Order::whereDate('created_at',$date)->sum('total');
          $pay = Order::whereDate('created_at',$date)->sum('pay');
          $due = Order::whereDate('created_at',$date)->sum('due');
          $order_total = Order::whereDate('created_at',$date)->count('id');
          $today_order = Order::select('orders.*','customers.name')
             ->join('customers','orders.customer_id','customers.id')
             ->whereDate('orders.created_at',$date)
             ->get();

          return response()->json(['total'=>$total,'pay'=>$pay,'due'=>$due,'order_total'=>$order_total,'today_order'=>$today_order]);


    }
}
