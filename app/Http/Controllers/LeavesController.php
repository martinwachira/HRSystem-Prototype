<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employees;
use App\Leave;
Use DB;

class LeavesController extends Controller
{
    //
    public function index()
    {
        // $employees = Employees::orderBy('created_at','desc');
        $employees = DB::table('employees')->get();
        return view('leaves.index')->with('employees', $employees);
    }

    public function getAll()
    {
        $leaves = Leave::orderBy('created_at','desc')->paginate(10);
        return view('leaves.show')->with('leaves', $leaves);
    }

    public function store(Request $req)
    {
        $this->validate($req, [
            'empNames' => 'required',
            'holiday' => 'required',
            'days' => 'required',
        ]);

        $leave = new Leave();
        $leave->empNames = $req->input('empNames');
        $leave->startDate = $req->input('startDate');
        $leave->stopDate = $req->input('stopDate');
        $leave->holiday = $req->input('holiday');
        $leave->reason = $req->input('reason');
        $leave->days = $req->input('days');
        $leave->save();
        return redirect('/leaves/show')->with('success', 'Leave Requested');
    }

    public function show($id)
    {
        $leave = Leave::find($id);
        return view('leaves.index')->with('leave', $leave);
    }

    public static function leave_count()
    {
        $l_count = Leave::count();
        print($l_count);
    }
}
