<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function (){
    return view('admin_template');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/users', function () {
    return view('users/index');
});

Route::get('/roles/assign', function () {
    return view('roles/assign');
});

Route::get('/employees/show', function () {
    return view('employees/index');
});

Route::get('/leaves/show', function () {
    return view('leaves/index');
});

Route::get('/leaves', function () {
    return view('leaves/index');
});

Route::get('/users/show', function (){
    $users = DB::table('users')
        ->join('roles_user','roles_user.user_id','=','users.id')
        ->where('roles_user.roles_id','<>','990')
        ->join('roles','roles.id','=','roles_user.roles_id')
        ->select('users.*','roles.role_name')
        ->get();
    return view('users/show', compact('users'));
});


Route::resource('skills', 'SkillsController');
Route::resource('roles', 'RolesController');
Route::resource('users','UsersController');
Route::resource('employees','EmployeesController');
Route::resource('leaves','LeavesController');

Route::get('/skills', 'SkillsController@index');
Route::get('/roles','RolesController@index');
Route::get('/roles/assign','RolesController@assign');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@administrator')->name('administrator');
Route::get('/skills', 'SkillsController@skills')->name('skills');
Route::get('/roles', 'RolesController@roles')->name('roles');
Route::get('/employees', 'EmployeesController@index')->name('employees');
Route::get('/skills', 'SkillsController@index');
Route::get('/roles','RolesController@index');
Route::get('/employees/index','EmployeesController@index');
Route::get('/employees/show','EmployeesController@getAll');
Route::get('/leaves/index','LeavesController@index');
Route::get('/leaves/show','LeavesController@getAll');




