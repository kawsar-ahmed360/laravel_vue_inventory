<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeManage;
use Illuminate\Http\Request;
use Image;
class EmployeManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emplo = EmployeManage::get();
        return response()->json($emplo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmploye(Request $request)
    {
        if($request->image){

        $pos = strpos($request->image,';');
        $sub = substr($request->image,0,$pos);
        $exp = explode('/',$sub)[1];
        $name = time().'.'.$exp;
        $img = Image::make($request->image)->resize(240,200);
        $upload = 'backend/employe/';
        $image_url = $upload.$name;
        $img->save($image_url);

        }

        $insert = new EmployeManage();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->phone = $request->phone;
        $insert->salary = $request->salary;
        $insert->address = $request->address;
        $insert->join_date = $request->join_date;
        $insert->nid = $request->nid;
        $insert->image = $image_url;
        $insert->save();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function EditeEmploye($Editeid)
    {
        $edite_emp = EmployeManage::where('id',$Editeid)->first();
        return response()->json($edite_emp);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdatedEmploye(Request $request, $id)
    {


        if($request->Newimage){

        $insert = EmployeManage::where('id',$id)->first();
        @unlink($insert->image);

        $position = strpos($request->Newimage,';');
        $sub = substr($request->Newimage,0,$position);
        $exp = explode('/',$sub)[1];
        $name = time().'.'.$exp;
        $image = Image::make($request->Newimage)->resize(240,200);
        $upload = 'backend/employe/';
        $image_url = $upload.$name;
        $image->save($image_url);
        $insert = EmployeManage::where('id',$id)->first();
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->phone = $request->phone;
        $insert->salary = $request->salary;
        $insert->address = $request->address;
        $insert->join_date = $request->join_date;
        $insert->nid = $request->nid;
        $insert->image = $image_url;
        $insert->save();
        }else{
            $insert = EmployeManage::where('id',$id)->first();
            $insert->name = $request->name;
            $insert->email = $request->email;
            $insert->phone = $request->phone;
            $insert->salary = $request->salary;
            $insert->address = $request->address;
            $insert->join_date = $request->join_date;
            $insert->nid = $request->nid;
            $oldpho = $request->image;
            $insert->image = $oldpho;
            $insert->save();
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteEmploye($id)
    {

        $info = EmployeManage::where('id',$id)->first();
        if($info){
            @unlink($info->image);
        }
        EmployeManage::where('id',$id)->delete();
    }
}
