<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class UsersController extends Controller
{
    public function show(User $user) {

        $user = User::find($user->id);
        $posts = Post::where('user_id', $user->id) //ユーザーによる投稿を取得する
               ->orderBy('created_at', 'desc') //投稿作成日が新しい順に並べる（投稿が増えるたび投稿idの数も大きくなるのでdescを定義）
               ->paginate(5); //5ページ表示したら次のページへ移動
        
        return view('users.show', [

            'user_name' => $user->name, //ユーザ-名を渡す
            'posts' => $posts, //ユーザーの書いた投稿を渡す

        ]);

    }
}
