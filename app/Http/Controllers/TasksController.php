<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use DB;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priorities = DB::table('tasks')->distinct()->pluck('priority');
        $tasks = Tasks::orderBy('created_at','desc')->paginate(10);
        
        return view('tasks.index', compact('priorities', 'tasks'));
        // $tasks = Tasks::all()->paginate(10);
        // return view('tasks.index')->with('tasks', $tasks);
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
    public function store(Request $request, Tasks $task)
    {
        $data = $request->all();
        $task->fill($data)->save();
        return redirect('/tasks')->with('New task created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        return view('tasks.edit')->with('Tasks', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
        $data = $request->all();
        $task->fill($data)->save();

        return redirect('/tasks')->with('success', 'Task Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function task_count(){
        $counts = tasks::count();
        print($counts);
    }

    public function summary(Request $request)
    {
        $priorities = DB::table('tasks')->distinct()->orderBy('priority', 'asc')->pluck('priority');
    }

}
