<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expence;
use Illuminate\Http\Request;
use Image;
class ExpenceController extends Controller
{

    public function index(){

        $data = Expence::get();
        return response()->json($data);
    }
    public function storeExpence(Request $request){

          if($request->image){
              $store = new Expence();
              $position = strpos($request->image,';');
              $sub = substr($request->image,0,$position);
              $exp = explode('/',$sub)[1];
              $fullname = time().'.'.$exp;
              Image::make($request->image)->resize(240,200)->save('backend/Expence/'.$fullname);
              $store->image = $fullname;
              $store->details = $request->details;
              $store->amount = $request->amount;
              $store->save();
          }else{
            $store = new Expence();
            $store->details = $request->details;
            $store->amount = $request->amount;
            $store->save();

          }
    }

    public function DeleteExpence($id){

        $delete = Expence::where('id',$id)->first();

        if($delete){
            @unlink('backend/Expence/'.$delete->image);
            Expence::where('id',$id)->delete();
        }
    }

    public function EditeExpence($id){

        $edite = Expence::where('id',$id)->first();
        return response()->json($edite);
    }

    public function UpdatedExpence(Request $request,$id){



        if($request->newImage){

        $update = Expence::where('id',$id)->first();

        $position = strpos($request->newImage,';');
        $sub = substr($request->newImage,0,$position);
        $exp = explode('/',$sub)[1];
        $fullname = time().'.'.$exp;
        @unlink('backend/Expence/'.$update->image);
        Image::make($request->newImage)->resize(240,200)->save('backend/Expence/'.$fullname);
        $update->image = $fullname;
        $update->details = $request->details;
        $update->amount = $request->amount;
        $update->save();

        }else{
            $update = Expence::where('id',$id)->first();
            $update->image = $request->image;
            $update->details = $request->details;
            $update->amount = $request->amount;
            $update->save();
        }

    }
}
