<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Take extends Model
{
    protected $table = 'takes';

    protected $fillable = ['name', 'item', 'title', 'body'];

   //返信は複数存在する
    public function messages() {

        return $this->hasMany('App\Message');

    }

    //返信の残すユーザーは各それぞれ
    public function user() {

        return $this->belongsTo('App\User');
    }
}