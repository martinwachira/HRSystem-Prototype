<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
Use DB;

class EmployeesController extends Controller
{

    public function employees()
    {
        // return view('employees.show');
    }

    public function index()
    {
        // $employees = Employees::orderBy('created_at','desc')->paginate(10);
        // return view('employees.show')->with('employees', $employees);
        $employees = DB::table('employees')->get();
        return view('employees.index')->with('employees', $employees);
    }

    public function getAll()
    {
        $employees = Employees::orderBy('created_at','desc')->paginate(10);
        // $employees = DB::table('employees')->get();
        return view('employees.show')->with('employees', $employees);
    }

    public function store(Request $req, Employees $employee)
    {
        $data = $req->all();
        $employee->fill($data)->save();

        // $this->validate($req, [
        //     'empNames' => 'required',
        //     'email' => 'required',
        //     'empNo' => 'required',
        //     'nssf' => 'required',
        //     'nhif' => 'required',
        //     'kra' => 'required',
        //     'department' => 'required',
        //     'position' => 'required',
        //     'password' => 'required',
        //     'gender' => 'required',
        //     'birth_date' => 'required',
        // ]);

        // $employee = new Employees();
        // $employee->empNames = $req->input('empNames');
        // $employee->email = $req->input('email');
        // $employee->empNo = $req->input('empNo');
        // $employee->nssf = $req->input('nssf');
        // $employee->nhif = $req->input('nhif');
        // $employee->kra = $req->input('kra');
        // $employee->department = $req->input('department');
        // $employee->position = $req->input('position');
        // $employee->grosspay = $req->input('grosspay');
        // $employee->password = $req->input('password');
        // $employee->gender = $req->input('gender');
        // $employee->birth_date = $req->input('birth_date');
        // $employee->save();
        
        return redirect('/employees/show')->with('success', 'Employee Account Created');
    }

    public function create(Request $req)
    {
       
    }

    public function edit($id)
    {
        $employee = Employees::find($id);
        return view('employees.edit')->with('employee', $employee);
    }

    public function update(Request $req, Employees $employee)
    {
        // $this->validate($req, [
        //     'empNames' => 'required',
        //     'email' => 'required',
        //     'empNo' => 'required',
        //     'nssf' => 'required',
        //     'nhif' => 'required',
        //     'kra' => 'required',
        //     'department' => 'required',
        //     'position' => 'required',
        //     'password' => 'required',
        //     // 'gender' => 'required',
        //     'birth_date' => 'required',
        // ]);

        // $employee = new Employees();
        // $employee->empNames = $req->input('empNames');
        // $employee->email = $req->input('email');
        // $employee->empNo = $req->input('empNo');
        // $employee->nssf = $req->input('nssf');
        // $employee->nhif = $req->input('nhif');
        // $employee->kra = $req->input('kra');
        // $employee->department = $req->input('department');
        // $employee->position = $req->input('position');
        // // $employee->grosspay = $req->input('grosspay');
        // $employee->password = $req->input('password');
        // $employee->gender = $req->input('gender');
        // $employee->birth_date = $req->input('birth_date');
        // $employee->save();

        $data = $req->all();
        $employee->fill($data)->save();

        return redirect('/employees/show')->with('success', 'Employee Account Update Successfully');
    }

    public function show($id)
    {
        $employee = Employees::find($id);
        return view('employees')->with('employee', $employee);
    }
 
    public static function employeesCount(){
        $counts = employees::count();
        print($counts);
    }

    public function destroy($id)
    {
        $employee = Employees::find($id);

        $employee->delete();
        return redirect('/employees/show')->with('success', 'Employee Account Deleted');
    }
}
