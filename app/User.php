<?php

namespace App;

use App\Friend;
use App\Status;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'name', 'email', 'password'
    );

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = array(
        'password', 'remember_token',
    );

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = array(
        'email_verified_at' => 'datetime',
    );

    public function friends() {
        return $this->hasMany( \App\Friend::class );
    }
    public function status() {
        return $this->hasMany( \App\Status::class );
    }
    public function friendsStatus() {
        return $this->hasManyThrough(
            \App\Status::class,
            \App\Friend::class,
            'friend_id',
            'user_id',
            'id',
            'user_id'
        );
    }

}
