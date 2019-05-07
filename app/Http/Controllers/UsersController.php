<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Roles;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function users()
    {
        return view('users.show');
    }

    public function index()
    {
//        $user = User::find($id)
//        return view('users.show')->with('user', $user);
        $user = DB::table('users')
            ->join('roles_user','roles_user.user_id','=','users.id')
//            ->join('roles','roles.id','=','roles_user.roles_id')
            ->select('users.*','roles_user.roles_id')
            ->get();

        return view('users.show')->with('user', $user);

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $user = User::find($id);
//        return view('users.show')->with('user', $user);
//        $user = DB::table('users')
//            ->join('roles_user','roles_user.user_id','=','users.id')
//            ->join('roles','roles.id','=','roles_user.roles_id')
//            ->select('users.*','roles.role_name','roles_user.roles_id')
//            ->get();

//        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);

        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');

        $user->save();
        return redirect('/users/show')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('/users/show')->with('success', 'User Removed');
    }
}
