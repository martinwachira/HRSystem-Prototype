<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\User;
use DB;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function roles()
    {
        return view('roles.show');
    }

    public function index()
    {
        $roles = Roles::orderBy('created_at','desc')->paginate(10);
//        $roles = Roles::all();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('roles.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'role_name' => 'required'
        ]);
        $role = new Roles;
        $role->role_name = $request->input('role_name');
        $role->save();
        return redirect('/roles')->with('success','Role Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Roles::find($id);
        return view('roles')->with('role', $role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::find($id);
        return view('roles.edit')->with('role', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'role_name' => 'required'
        ]);

        $role = Roles::find($id);
        $role->role_name = $request->input('role_name');

        $role->save();
        return redirect('/roles')->with('success', 'Role Updated');
    }

    public function assign(){

        $users = User::orderBy('created_at','desc')->paginate(10);
        $roles = Roles::orderBy('created_at','desc')->paginate(10);
        // $roles = Roles::all();
        return view('/roles.assign')->with( 'roles', $roles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Roles::find($id);
        $role->delete();
        return redirect('/roles')->with('success', 'Role Removed');
    }
}
