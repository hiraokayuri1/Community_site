<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    //お問い合わせ入力ページ表示
    public function index() {

     return view('contact.index');

    }

   //お問い合わせ確認ページ表示
    public function confirm(Request $request) {
     
     //バリデーションの実行
     $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'title' => 'required',
        'body' => 'required'
     ]);

     //フォームから受け取った値を全て取得する
        $inputs = $request->all();

        return view('contact.confirm', [
          'inputs' => $inputs,
        ]);

    }

   //送信完了ページ表示
    public function send(Request $request) {

   //バリデーションの実行
    $request->validate([
       'name' => 'required',
       'email' => 'required|email',
       'title' => 'required',
       'body' => 'required'
    ]);

   //フォームから受け取ったactionの値を取得
    $action = $request->input('action');

   //フォームから受け取ったactionを除いたinputの値を取得
    $inputs = $request->except('action');

    if($action !== 'submit'){
     return redirect()
     ->route('contact.index')
     ->withlnput($inputs);

    } else {
     //メールを送信
     \Mail::to($inputs['email'])->send(new ContactSendmail($inputs));

     //再送信を防ぐ
     $request->session()->regenerateToken();

     //送信完了ページのviewを表示
     return view('contact.thanks');

    }
    //送信したらブログ一覧画面に戻る
    return redirect()->route('posts.index');


    }
    
}
