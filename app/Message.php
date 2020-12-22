<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['body'];

    //返信を残す投稿は各それぞれ
    public function take() {

        return $this->belongsTo('App\Take');
    }

    //返信を残すユーザは各それぞれ
    public function user() {

        return $this->belongsTo('App\User');
    }
}