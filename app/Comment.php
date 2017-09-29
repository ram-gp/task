<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function task()
    {
        return $this->belongsTo(\App\Task::Class,'task_id','id');
    }
    public function created_by(){
            return $this->belongsTo(\App\User::class,'created_by','id');   
    }
    public function updated_by(){
            return $this->belongsTo(\App\User::class,'updated_by','id');   
    } 
}
