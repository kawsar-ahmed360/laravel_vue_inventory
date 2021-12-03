<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryManage;
use Illuminate\Http\Request;
use Image;

class CategoryManageController extends Controller
{

    public function index(){

        $allCat = CategoryManage::get();

        return response()->json($allCat);
    }

    public function storeCategory(Request $request){

        $store = new CategoryManage();
        $store->category_name = $request->category_name;

        if($request->image){
             $position  = strpos($request->image,';');
             $sub = substr($request->image,0,$position);
             $exp = explode('/',$sub)[1];
             $fullname = time().'.'.$exp;
             Image::make($request->image)->resize(240,200)->save('backend/category/'.$fullname);


             $store->image = $fullname;
             $store->save();


        }else{

              $store = new CategoryManage();
             $store->category_name = $request->category_name;
             $store->save();

        }
    }

    public function DeleteCategory($id){

        $del = CategoryManage::where('id',$id)->first();

        if($del){
            @unlink('backend/category/'.$del->image);
            CategoryManage::where('id',$id)->delete();
        }


    }

    public function EditeCategory($id){

        $editeCate = CategoryManage::where('id',$id)->first();
        return response()->json($editeCate);
    }

    public function UpdatedCategory(Request $request,$id){

         if($request->newImage){

            $position = strpos($request->newImage,';');
            $sub = substr($request->newImage,0,$position);
            $exp = explode('/',$sub)[1];
            $fullname = time().'.'.$exp;
            Image::make($request->newImage)->resize(240,200)->save('backend/category/'.$fullname);

            $update = CategoryManage::where('id',$id)->first();
            $update->category_name = $request->category_name;
            $update->image = $fullname;
            $update->save();

         }else{
            $update = CategoryManage::where('id',$id)->first();
            $update->category_name = $request->category_name;
            $update->image = $request->image;
            $update->save();
         }
    }
}
