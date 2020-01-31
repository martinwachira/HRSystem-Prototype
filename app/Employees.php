<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $fillable = [
        //        'name', 'email', 'password',
        'empNames', 'email', 'empNo', 'nssf', 'nhif', 'kra', 'department', 'position', 'grosspay', 'password', 'gender', 'birth_date', 
    ];

    public $primaryKey = 'id';

    protected $hidden = [
        'password', 'remember_token',
    ];
}
