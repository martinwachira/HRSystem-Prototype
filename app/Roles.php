<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
//    protected $table = 'role';
//    public $primaryKey = 'role_id';
//    public $timestamps = true;

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
