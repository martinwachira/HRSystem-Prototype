<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Salaries;
Use DB;

class SalariesController extends Controller
{
    public function index()
    {
        $employees = DB::table('employees')->pluck("empNames","id")->all();
        $salary = Salaries::all();
        return view('salaries.index', compact('employees', 'salary'));
        // return view('salaries.index', compact('employees'));
        // return view('salaries.index')->with('employees', $employees);
    }
 
    public function create()
    {
        // 
    }

    public function store(Request $request, Salaries $salary)
    {
        $data = $request->all();
        $salary->fill($data)->save();

        return redirect('/salaries')->with('success', 'Salary Added');
    }

    //GET EMPLOYEES' SALARY ON ID SELECTED    
    // public function getSalary($id){
    //     {
    //         $salaries = DB::table("salaries")
    //             ->where("employee_id",$id)
    //             ->pluck("gross", "id");
    //         return json_encode($salaries);
    //     }
    // }
  
    public function show($id)
    {
        {
            $salaries = DB::table("salaries")
                ->where("employee_id",$id)
                ->pluck("id","gross","net");
            return json_encode($salaries);
        }
    }
  
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public static function calc_total_net(){
        $total_net = Salaries::sum("net");
        print($total_net);
    }
}
