<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //変更できるもの
    //コメントの場合は内容は変えられる
    //タイトルは変えられない
    protected $fillable =
    [
      'body'
    ];

    //ログインしているユーザーがコメント
    //hasManyの反対がbelongsTo
    public function post() {

      return $this->belongsTo('App\Post');
    }

    //そのユーザーIDでコメントできるのはログインしているユーザーのみのため単数
    public function user() {

      return $this->belongsTo('App\User');
    }
}
