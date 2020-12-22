<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //投稿数は複数存在する
    public function posts() {

        return $this->hasMany('App\Post');
    }

    //コメントは複数存在する
    public function comments() {

        return $this->hasMany('App\Comment');
    }

    //パスワード再設定メールを送信する
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this)->send(new ResetPassword($token));
    }

    //いいね機能を作成
    //多対他リレーションの中間テーブルにはbelongsToManyメゾットを使う
    //公式参照
    public function likes() {

        return $this->belongsToMany('App\Post')->withTimestamps();
    }

    //投稿数は複数存在する
    public function takes() {

        return $this->hasMany('App\Take');
    }

    //返信数は複数存在する
    public function messages() {

        return $this->hasMany('App\Message');
    }

}
