<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function taskmanagement()
    {
        return $this->belongsTo(\App\Taskmangement::Class);
    }

}
