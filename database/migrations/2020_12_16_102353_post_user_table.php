<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//PostとUserの中間テーブルを作成

class PostUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('post_user', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('user_id'); //外部キー
        $table->unsignedBigInteger('post_id'); //外部キー
        $table->timestamps();

        //ユーザがいいねを消せるように
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //投稿が消えた時いいねも消せるように
        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        //組み合わせが1つしか存在しないように定義する
        //連続で押すとエラーが出る
        $table->unique(['user_id', 'post_id']);

      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_user');
    }
}
