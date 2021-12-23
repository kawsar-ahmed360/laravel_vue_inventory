<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryManage;
use App\Models\ProductManage;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductManageController extends Controller
{

    public function CategoryView(){

         $category = CategoryManage::get();

         return response()->json($category);
    }

    public function SupliarView(){

         $supliar = Supplier::get();

         return response()->json($supliar);
    }

    public function storeProduct(Request $request){

        if($request->image){
            $store = new ProductManage();
            $store->category_id = $request->category_id;
            $store->product_name = $request->product_name;
            $store->product_code = $request->product_code;
            $store->root = $request->root;
            $store->buying_price = $request->buying_price;
            $store->selling_price = $request->selling_price;
            $store->supllier_id = $request->supllier_id;
            $store->buying_date = $request->buying_date;
            $store->product_quantity = $request->product_quantity;

            $position = strpos($request->image,';');
            $substr = substr($request->image,0,$position);
            $exp = explode('/',$substr)[1];
            $fullname = time().'.'.$exp;
            Image::make($request->image)->resize(240,200)->save('backend/Product/'.$fullname);
            $store->image = $fullname;
            $store->save();

        }else{

            $store = new ProductManage();
            $store->category_id = $request->category_id;
            $store->product_name = $request->product_name;
            $store->product_code = $request->product_code;
            $store->root = $request->root;
            $store->buying_price = $request->buying_price;
            $store->selling_price = $request->selling_price;
            $store->supllier_id = $request->supllier_id;
            $store->buying_date = $request->buying_date;
            $store->product_quantity = $request->product_quantity;
            $store->save();

        }

    }

    public function index(){

        // $allProduct = ProductManage::with('Category')->get();

        $allProduct = DB::table('product_manages')
                    ->select('product_manages.*','category_manages.category_name','suppliers.name')
                    ->join('category_manages','product_manages.category_id','category_manages.id')
                    ->join('suppliers','product_manages.supllier_id','suppliers.id')
                    ->get();

        return response()->json($allProduct);
    }

  public function DeleteProduct($DeleteId){

    $delete = ProductManage::where('id',$DeleteId)->first();
    if($delete){
        @unlink('backend/Product/'.$delete->image);
        ProductManage::where('id',$DeleteId)->delete();
    }

  }

  public function EditeProduct($editeId){

    $edite = ProductManage::where('id',$editeId)->first();
    return response()->json($edite);
  }

  public function UpdatedProduct(Request $request,$EditeId){


      if($request->newImage){
        $update = ProductManage::where('id',$EditeId)->first();
        $position = strpos($request->newImage,';');
        $sub = substr($request->newImage,0,$position);
        $exp = explode('/',$sub)[1];
        $fullname = time().'.'.$exp;
        @unlink('backend/Product/'.$update->image);
        Image::make($request->newImage)->resize(240,200)->save('backend/Product/'.$fullname);
        $update->category_id = $request->category_id;
        $update->product_name = $request->product_name;
        $update->product_code = $request->product_code;
        $update->root = $request->root;
        $update->buying_price = $request->buying_price;
        $update->selling_price = $request->selling_price;
        $update->supllier_id = $request->supllier_id;
        $update->buying_date = $request->buying_date;
        $update->product_quantity = $request->product_quantity;
        $update->image = $fullname;
        $update->save();
      }else{
        $update = ProductManage::where('id',$EditeId)->first();
        $update->category_id = $request->category_id;
        $update->product_name = $request->product_name;
        $update->product_code = $request->product_code;
        $update->root = $request->root;
        $update->buying_price = $request->buying_price;
        $update->selling_price = $request->selling_price;
        $update->supllier_id = $request->supllier_id;
        $update->buying_date = $request->buying_date;
        $update->product_quantity = $request->product_quantity;
        $update->image = $request->image;
        $update->save();
      }
  }


}
