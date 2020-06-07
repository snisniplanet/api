<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    public function authors(){
        return $this->belongsToMany('App\User', 'authors');
    }

    public function blog(){
        return $this->belongsTo('App\Blog', 'id', 'blog_id', 'blogs');
    }
}
