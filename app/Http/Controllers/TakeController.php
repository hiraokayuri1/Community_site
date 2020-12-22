<?php

namespace App\Http\Controllers;

use App\Take;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\TakeRequest;

class TakeController extends Controller
{
    
   //連絡一覧を表示する
    public function index() {

    //連絡欄が10個を超えたら次のページに移る
     $takes = Take::paginate(10);

    // //連絡の一覧を全て表示する
    //  $jobs = Job::all();
     return view('takes.index', [
        'takes' => $takes
     ]);
    }

    //連絡詳細画面を表示する
     public function show($id) {

     $take = Take::find($id);

      if (is_null($take)) {
        \Session::flash('err_msg', 'データがありません。');
        return redirect(route('commons.index'));
      }
        return view('takes.show', [
         'take' => $take
       ]);

   }

     //新規作成画面を表示する
      public function create() {

        return  view('takes.create');
     }

      //作成したものを登録する
       public function store(TakeRequest $request) {

        $take = new Take; //新しくインスタンスを作成する
  
        $take-> name = $request->name; //入力した名前の情報を渡す
        $take-> item = $request->item; //入力した項目の情報を渡す
        $take-> title = $request-> title; //入力したタイトルの情報を渡す
        $take-> body = $request-> body;   //入力した内容の情報を渡す
        $take-> user_id = Auth::user()->id; 
  
        
        $take -> save(); //入力が完了したら保存する

        \Session::flash('err_msg', '登録しました。');
          return redirect(route('takes.index'));
        }
  
       //編集画面を表示する
        public function edit($id) {
         
            $take = Take::find($id); //編集したい連絡網を表示する
    
            //一致したユーザしか編集できないようにする
            if(Auth::id() !== $take->user_id) {
                return abort(404);
            }

            if (is_null($take)) {
                \Session::flash('err_msg', '登録しました。');
                return redirect(route('takes.index'));
            }

            return view('takes.edit', [
                'take' => $take
            ]);
    
          }


        //編集した画面を更新する
         public function update(TakeRequest $request) {

            $inputs = $request->all(); //一旦全て表示させる
            $take = Take::find($inputs['id']); //編集したブログを表示する
    
            //一致したユーザしか更新できないようにする
            if(Auth::id() !== $take->user_id) {
                return abort(404);
            }
      
            $take-> name = $request-> name; //変更した名前の情報を渡す
            $take-> item = $request-> item; //変更した項目の情報を渡す
            $take-> title = $request-> title; //変更したタイトルの情報を渡す
            $take-> body = $request-> body; //変更した内容の情報を渡す
            
            $take -> save(); //入力が完了したら保存する
      
            \Session::flash('err_msg', '更新しました。');
            return redirect(route('takes.index')); //更新が完了したら一覧ページに戻す  
          }


        //削除する
       public function destroy($id) {


        $take = Take::find($id); //削除したい投稿を表示する

        //一致したユーザしか更新できないようにする
        if(Auth::id() !== $take->user_id) {
          return abort(404);
      }
        
        $take->delete(); //削除する

        return redirect(route('takes.index')); //削除が完了したらタスク一覧ページに戻る
      }

     
      //検索機能

      public function search(Request $request) {

        //名前かタイトルか内容で検索して探す処理
        //一部の文字のみ検索しても該当する名前、タイトル、内容が出てくるようにする
        $takes = Take::where('title', 'like', "%{$request->search}%")
                 ->orwhere('item', 'like', "%{$request->search}%")
                 ->orwhere('name', 'like', "%{$request->search}%")
                 ->orwhere('body', 'like', "%{$request->search}%")
                 ->paginate(5);

        //検索結果が何件あるかを表示する
        $search_result = $request->search.'の検索結果は'.count($takes).'件です';
        
        //検索が終了したら一覧ページに戻す
         return view('takes.index', [
        
        'takes' => $takes,
        'search_result' => $search_result
        
         ]);
         
    }     


}

