@extends('layouts.app')
@section('title', 'ホーム画面')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ログイン結果</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    ログイン完了しました!
                </div>
            </div>
            <a href="{{ route('tasks.index')}}" class="btn btn-exe">タスクはこちら</a>
            <a href="{{ route('takes.index')}}" class="btn btn-jobs">連絡一覧ページはこちら</a>
            <a href="{{ route('posts.index')}}" class="btn btn-blog">共有日記はこちら</a>
            <a href = "{{ route('contact.index') }}" class = "btn btn-conts">質問フォームはこちら</a>
        </div>
    </div>
</div>

@endsection
