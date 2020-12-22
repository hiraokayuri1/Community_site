@extends('layouts.app')
@section('title', '質問ありがとうございます。')
@section('content')
<div class="card text-center">
 <div class="card-header">
<h4 style="margin-left: 50px;">{{ __('送信完了しました') }}</h4>

<a href = "/home" style="margin-left: 30px;">ホーム画面へ戻る</a>
</div>

</div>

@endsection