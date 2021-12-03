<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryManage;
use App\Models\Supplier;
use Illuminate\Http\Request;

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
}
