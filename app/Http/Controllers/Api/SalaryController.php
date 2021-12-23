<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EmployeManage;
use App\Models\Salaries;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function AllEmployeShow(){

        $allemp = EmployeManage::get();

        return response()->json($allemp);
    }

    public function SingleEmploye($id){

        $emp = EmployeManage::where('id',$id)->first();

        return response()->json($emp);
    }

    public function SalaryUpdate(Request $request,$id){

         $request->validate([
             'salary'=>'required',
             'salary_month'=>'required'
         ]);

         $exist = Salaries::where('employe_id',$id)->where('salary_month',$request->salary_month)->first();

         if($exist){
             return response()->json(['already'=>'Already Salary Exists']);
         }

            $update =new Salaries();
            $update->employe_id=$id;
            $update->amount=$request->salary;
            $update->salary_date=date('d');
            $update->salary_month=$request->salary_month;
            $update->salary_year=date('Y');
            $update->save();



    }

    public function AllSalary(){

        $list = Salaries::groupBy('salary_month')->get();
        return response()->json($list);
    }

    public function MonthlySalaryDetails($month){

        $detai = Salaries::
                   select('employe_manages.email','employe_manages.name','employe_manages.address','employe_manages.phone','salaries.*')
                  ->join('employe_manages','salaries.employe_id','employe_manages.id')
                 ->where('salaries.salary_month',$month)
                 ->get();

                 return response()->json($detai);
    }

    public function SingleSalaryEdite($id){

        $sa = Salaries::select('employe_manages.email','employe_manages.name','employe_manages.address','employe_manages.phone','employe_manages.salary','salaries.*')
              ->join('employe_manages','salaries.employe_id','employe_manages.id')
             ->where('salaries.id',$id)->first();
        return response()->json($sa);
    }

    public function SingleSalaryUpdate(Request $request,$id){

        $salary = Salaries::where('id',$id)->first();
        $salary->amount=$request->salary;
        $salary->salary_month=$request->salary_month;
        $salary->save();


    }
}
