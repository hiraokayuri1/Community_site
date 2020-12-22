@extends('layouts.app')
@section('title', '質問フォーム')
@section('content')

<div class="card text-center">
        <div class="card-header">
          - 質問内容確認 -
        </div>
        <div class="form-group">
        <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        <br><label> - お名前 - </br></label></br>
        {{ $inputs['name'] }}
        <input type="hidden" name="name" value="{{ $inputs['name'] }}">
        <br><br><label> - メールアドレス - </br></label></br>
        {{ $inputs['email'] }}
        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        <br><br><label> - タイトル - </br></label></br>
        {{ $inputs['title'] }}
        <input type="hidden" name="title" value="{{ $inputs['title'] }}">
       <br><br><label> - 質問内容 - </br></label></br>
        {!! nl2br(e($inputs['body'])) !!}
        <input type="hidden" name="body" value="{{ $inputs['body'] }}">

    <br><br><br><p class="sent">お間違い無ければ ”送信する” を押してください</br></p>
    <button type="submit" name="action" value="back" class="btn btn-act">
        入力内容修正
    </button>
    <button type="submit" name="action" value="submit" class="btn btn-sub">
        送信する
    </button>
    </div>
</div>
</form>
    @endsection   
   
    
             
 
  
<!-- <form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <label>メールアドレス</label>
    {{ $inputs['email'] }}
    <input
        name="email"
        value="{{ $inputs['email'] }}"
        type="hidden">

    <label>タイトル</label>
    {{ $inputs['title'] }}
    <input
        name="title"
        value="{{ $inputs['title'] }}"
        type="hidden">


    <label>お問い合わせ内容</label>
    {!! nl2br(e($inputs['body'])) !!}
    <input
        name="body"
        value="{{ $inputs['body'] }}"
        type="hidden">

    <button type="submit" name="action" value="back">
        入力内容修正
    </button>
    <button type="submit" name="action" value="submit">
        送信する
    </button>
</form> -->
