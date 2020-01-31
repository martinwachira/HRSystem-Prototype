<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = [
        //        'name', 'email', 'password',
        'empNames'
    ];

    public $primaryKey = 'id';
    
}
