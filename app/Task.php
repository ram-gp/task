<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public function user(){
            return $this->belongsToMany(\App\User::class,'map_task_user');   
    }
    public function comment()
    {
        return $this->hasMany(\App\Comment::class);
    }

}
