<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','token'
    ];

    /**
     * Get all the tasks corresponds to the users
     **/
    /* public function Task()
     {
        return $this->belongsToMany(\App\Task::class,'map_task_user');
    
     }*/
    /**
     * Get all the tasks corresponds to the users
     **/
     public function tasks()
     {
        return $this->hasMany(\App\Task::class);
    
     }     
}
