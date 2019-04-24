<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsersController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'gender' => 'required',
            'birth_date' => ['required', 'date', 'max:255'],
//            'notes' => ['required', 'string', 'max:255'],
//            'gender' => 'in:male,female',
//            'featured' => ['required', 'string', 'max:255'],
//            'how_did_they_hear' => ['required', 'string', 'max:255'],
        ]);
    }

    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'birth_date' => $data['birth_date'],
//            'notes' => $data['notes'],
//            'male' => $data['male'],
//            'female' => $data['female'],
//            'featured' => $data['featured'],
//            'how_did_they_hear' => $data['how_did_they_hear'],
        ]);
    }

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
        //
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
        //
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

    public static function userCount(){
        $all_users = User::count();
        print($all_users);
    }
}
