<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function coursgites()
    {
        return $this->belongsToMany('App\Course');
    }
}
