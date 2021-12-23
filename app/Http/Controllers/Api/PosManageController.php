<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CategoryManage;
use App\Models\Customer;
use App\Models\ProductManage;
use Illuminate\Http\Request;

class PosManageController extends Controller
{
    public function index(){

        $all = ProductManage::get();

        return response()->json($all);
    }

    public function AllCategory(){

        $cat = CategoryManage::get();
        return response()->json($cat);
    }

    public function CatWiseProduct($Id){

        $cat = ProductManage::where('category_id',$Id)->get();
        return response()->json($cat);
    }

    public function AllCustomer(){

        $all = Customer::get();
        return response()->json($all);
    }


}
