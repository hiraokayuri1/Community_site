<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Post;

use Auth;
use App\Comment;
use JD\Cloudder\Facades\Cloudder;



class PostController extends Controller
{
    //ブログ一覧画面
    public function index() {

    
    //5つ表示されたら次の投稿は2ページ目に移す
    //最新の投稿に並び替える
    $posts = Post::orderBy('created_at', 'desc')->paginate(5);
    //  $posts = Post::paginate(5);
      return view('posts.index', compact('posts'));
    }

    //ブログ新規登録画面
    public function create() {
        return view('posts.create');
    }

    //ブログ詳細画面
    //どの詳細なのか
    public function show($id) {

     $post = Post::find($id);
     

     $comments = comment::where('post_id', $id)->get();

      return view('posts.show', compact('post', 'comments'));
    }



    //ブログ登録画面
    public function store(PostRequest $request) {
       
       
      $post = new Post; //新しく投稿を作る

      $post-> title = $request-> title; //タイトルを入力する
      $post-> body = $request-> body;   //内容を入力する
      $post-> user_id = Auth::user()->id; 
     

      //画像表示
      //公式参照
     
       if ($image = $request->file('image')) {
    
        //ファイルへのパスを返す
        $image_path = $image->getRealPath();
        Cloudder::upload($image_path, null);
        //直前にアップロードされた画像のpublicIdを取得する。
        $publicId = Cloudder::getPublicId();
        //URLを作る
        $logoUrl = Cloudder::secureShow($publicId, [
            'width'     => 200,
            'height'    => 200
        ]);
        $post->image_path = $logoUrl;
        $post->public_id  = $publicId;
        
    }

       $post -> save(); //保存する

        return redirect()->route('posts.index'); //登録が完了したらブログ一覧ページに戻す    
    }

    //ブログ編集画面
    public function edit($id) {

        $post = Post::find($id); //編集したいブログを表示する

        //一致したユーザしか編集できないようにする
        if(Auth::id() !== $post->user_id) {
            return abort(404);
        }

        return view('posts.edit', compact('post'));
    }

    //ブログ更新画面

    public function update(PostRequest $request, $id) {
       
        $post = Post::find($id); //編集したブログを表示する

        //一致したユーザしか更新できないようにする
        if(Auth::id() !== $post->user_id) {
            return abort(404);
        }
  
        $post-> title = $request-> title;
        $post-> body = $request-> body;
        
  
        $post -> save(); //保存する
  
        return redirect()->route('posts.index'); //更新が完了したらブログ一覧ページに戻す    
      }

      //ブログ削除画面

      public function destroy($id) {

        $post = Post::find($id); //削除したいブログを表示する

        //一致したユーザしか削除できないようにする
        if(Auth::id() !== $post->user_id) {
            return abort(404);
        }

        $post->delete(); //削除する

        return redirect()->route('posts.index'); //削除したらブログ一覧ページに戻す

      }

      //ブログ検索機能

      public function search(Request $request) {

        
        //タイトルか内容で検索して探す処理
        //一部の文字のみ検索しても該当するタイトルや内容が出てくるようにする
        $posts = Post::where('title', 'like', "%{$request->search}%")
                 ->orwhere('body', 'like', "%{$request->search}%")
                 ->paginate(5);

        //検索結果が何件あるかを表示する
        $search_result = $request->search.'の検索結果は'.count($posts).'件です';
        
        //検索が終了したらブログ一覧ページに戻す
         return view('posts.index', [
        //  compact('posts'),
        'posts' => $posts,
        'search_result' => $search_result
        
         ]);
         
    }     

}
