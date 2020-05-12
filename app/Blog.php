<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function subscribers(){
        return $this->belongsToMany('App\User', 'subscribers');
    }
}
