<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    function friends(){
        return $this->belongsToMany(\App\User::class,'user_id');
    }

}
