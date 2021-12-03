<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Image;
class SupliarManageController extends Controller
{

    public function index(){

        $supliar = Supplier::get();
        return response()->json($supliar);
    }
    public function storeEmploye(Request $request){


        if($request->image){
            $position = strpos($request->image,';');
            $sub = substr($request->image,0,$position);
            $exp = explode('/',$sub)[1];
            $fullname = time().'.'.$exp;
            Image::make($request->image)->resize(240,200)->save('backend/suplier/'.$fullname);

            $store = new Supplier();
            $store->name = $request->name;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->shop_name = $request->shop_name;
            $store->image = $fullname;
            $store->save();
        }else{
            $store = new Supplier();
            $store->name = $request->name;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->address = $request->address;
            $store->shop_name = $request->shop_name;
            $store->image = 'defaul.png';
            $store->save();
        }



    }

    public function DeleteEmploye($id){

        $del = Supplier::where('id',$id)->first();
        if($del){
            @unlink('upload/suplier/'.$del->image);
        }
        Supplier::where('id',$id)->delete();
    }

    public function EditeEmploye($Editeid){

        $supliar = Supplier::where('id',$Editeid)->first();
        return response()->json($supliar);
    }

    public function UpdatedEmploye(Request $request,$EditeId){

         if($request->updateImage){

            $update = Supplier::where('id',$EditeId)->first();
            $position = strpos($request->updateImage,';');
            $substr = substr($request->updateImage,0,$position);
            $exp = explode('/',$substr)[1];
            $fullname = time().'.'.$exp;
            @unlink('backend/suplier/'.$update->image);
            Image::make($request->updateImage)->resize(240,200)->save('backend/suplier/'.$fullname);
            $update->image = $fullname;
            $update->name = $request->name;
            $update->email = $request->email;
            $update->phone = $request->phone;
            $update->address = $request->address;
            $update->shop_name = $request->shop_name;
            $update->save();


         }else{

            $update = Supplier::where('id',$EditeId)->first();
            $update->image = $request->image;
            $update->name = $request->name;
            $update->email = $request->email;
            $update->phone = $request->phone;
            $update->address = $request->address;
            $update->shop_name = $request->shop_name;
            $update->save();
         }

    }
}
