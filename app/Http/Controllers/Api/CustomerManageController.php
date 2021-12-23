<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Image;

class CustomerManageController extends Controller
{

    public function index(){

        $all = Customer::get();
        return response()->json($all);
    }
    public function storeCustomer(Request $request){

        if($request->image){


            $position = strpos($request->image,';');
            $sub =substr($request->image,0,$position);
            $exp = explode('/',$sub)[1];
            $fullname = time().'.'.$exp;
            Image::make($request->image)->resize(240,200)->save('backend/Customer/'.$fullname);

            $store = new Customer();
            $store->name  = $request->name;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->image = $fullname;
            $store->save();

        }else{
            $store = new Customer();
            $store->name  = $request->name;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->image = 'default';
            $store->save();

        }

    }

    public function DeleteCustomer($id){

         $dele = Customer::where('id',$id)->first();
         if($dele){

            @unlink('backend/Customer/'.$dele->image);
            Customer::where('id',$id)->delete();
         }
    }

    public function EditeCustomer($id){

        $edit = Customer::where('id',$id)->first();

        return response()->json($edit);
    }

    public function UpdatedCustomer(Request $request,$id){

       if($request->newImage){
           $position = strpos($request->newImage,';');
           $sub = substr($request->newImage,0,$position);
           $exp = explode('/',$sub)[1];
           $fullname = time().'.'.$exp;
           Image::make($request->newImage)->resize(240,200)->save('backend/Customer/'.$fullname);
           $update = Customer::where('id',$id)->first();
           $update->name  = $request->name;
           $update->email = $request->email;
           $update->phone = $request->phone;
           $update->address = $request->address;
           $update->image = $fullname;
           $update->save();

       }else{
        $update = Customer::where('id',$id)->first();
        $update->name  = $request->name;
        $update->email = $request->email;
        $update->phone = $request->phone;
        $update->address = $request->address;
        $update->image = $request->image;
        $update->save();
       }
    }
}
