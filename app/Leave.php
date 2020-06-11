<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    //
    protected $fillable = [
        //        'name', 'email', 'password',
        'empNames', 'holiday', 'days', 'startDate', 'stopDate', 'reason',
    ];

    public $primaryKey = 'id';
    
}
