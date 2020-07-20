<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'snippet', 'content', 'authors', 'blog_id'
    ];

    protected $casts = [
        'authors' => 'array'
    ];

    public function authors(){
        return $this->belongsToMany('App\User', 'authors');
    }

    public function blog(){
        return $this->belongsTo('App\Blog', 'id', 'blog_id', 'blogs');
    }
}
