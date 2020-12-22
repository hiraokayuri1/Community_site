@extends('layouts.app')
@section('title', '質問フォーム')
@section('content')


<form action="{{ route('contact.confirm') }}" method="POST" class="form-horizontal">
  @csrf 
    <div class="form-group">
    
      <h2 style="text-align: center;">質問フォーム</h2>

    <form action="{{ route('contact.confirm') }}" method="POST" class="form-horizontal">
  @csrf

  <div class="form-group">
      <label class="col-sm-3 control-label" for="name1">お名前</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
      @if ($errors->has('name'))
        <p class="error-message">{{ $errors->first('name') }}</p>
    @endif
    </div>
</div>


      <div class="form-group">
      <label class="col-sm-3 control-label" for="name1">メールアドレス</label>
    <div class="col-sm-6">
      <input type="text" class="form-control" name="email" value="{{ old('email') }}">
      @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif
    </div>
</div>


    <div class="form-group">
      <label class="col-sm-3 control-label" for="name">タイトル</label>
    <div class="col-sm-6">
       <input type="text" class="form-control" name="title" value="{{ old('title') }}">
       @if ($errors->has('title'))
        <p class="error-message">{{ $errors->first('title') }}</p>
    @endif
    </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" for="ask1">お問い合わせ内容</label>
    <div class="col-sm-6">
    <textarea rows="7" name="body" class="form-control">{{ old('body') }}</textarea>
    @if ($errors->has('body'))
        <p class="error-message">{{ $errors->first('body') }}</p>
    @endif
    </div>
    </div>

    
   <a href = "/home" class = "btn btn-back">戻る</a>

    
    <button type="submit" class='btn btn-less'>
        入力内容確認画面へ
    </button>
    
</form> 

@endsection
    