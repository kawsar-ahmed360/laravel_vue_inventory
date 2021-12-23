<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductManage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockManageController extends Controller
{
    public function AllProductShow(){

        $product =  DB::table('product_manages')
        ->select('product_manages.*','category_manages.category_name','suppliers.name')
        ->join('category_manages','product_manages.category_id','category_manages.id')
        ->join('suppliers','product_manages.supllier_id','suppliers.id')
        ->get();

        return response()->json($product);
    }

    public function SingleProductQty($id){
        $sho = ProductManage::where('id',$id)->first();

        return response()->json($sho);
    }

    public function SingleProductQtyUpdate(Request $request,$id){
        $sho = ProductManage::where('id',$id)->first();
        $sho->product_quantity = $request->product_quantity;
        $sho->save();

    }
}
