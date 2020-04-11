<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table='status';
    protected $dates = ['created_at'];
    
    function user(){
        return $this->belongsTo(\App\User::class);
    }
}
