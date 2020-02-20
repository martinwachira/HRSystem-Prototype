<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    protected $fillable = [
        //        'name', 'email', 'password',
        'employee_id','gross', 'bonus', 'allowance', 'total_benefits', 'nhif', 'nssf', 'kra', 'total_deductions', 'net', 
    ];

    public function employees(){
        return $this->belongsTo('App\Employees', 'employee_id');
    }
}
