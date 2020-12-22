<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body']; //タイトルと内容を保存する

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    
}