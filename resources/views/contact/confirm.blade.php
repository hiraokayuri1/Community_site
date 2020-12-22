@extends('layouts.app')
@section('title', '質問フォーム')
@section('content')

<div class="card text-center">
        <div class="card-header">
          - 質問内容確認 -
          </div>
        <!-- <div class="form-group"> -->
        <div class="row justify-content-center">
        <div class="col-md-7">
        <form method="POST" action="{{ route('contact.send') }}">
        @csrf
        
        <br><h5> - お名前 - </br></h5></br>
        {{ $inputs['name'] }}
        <input type="hidden" name="name" value="{{ $inputs['name'] }}">
        <br><br><h5> - メールアドレス - </br></h5></br>
        {{ $inputs['email'] }}
        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
        <br><br><h5> - タイトル - </br></h5></br>
        {{ $inputs['title'] }}
        <input type="hidden" name="title" value="{{ $inputs['title'] }}">
       <br><br><h5> - 質問内容 - </br></h5></br>
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
</div>
</form>

    @endsection   
   
    
             
 
  
