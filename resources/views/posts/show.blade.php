@extends('layouts.app')
@section('title', '日記詳細')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2>日記詳細ページ</h2>
        <!-- <a href="{{ route('posts.create')}}" class="btn btn-primary">新規投稿</a>  -->
        <div class="card text-center">
        <div class="card-header">
          - 日記投稿 -
        </div>
        <div class="card-body">
        <h5 class="card-title">【日記名】{{ $post->title }}</h5>
        <p class="card-text">{{ $post->body }}</p>
        <img src="{{ $post->image_path }}" alt="画像" width="350" height="220" style="text-align : center;margin-left: 10px;">

        @if( $post->user_id === Auth::id() )
        <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary">編集する</a>
        <form action='{{ route('posts.destroy', $post->id) }}' method='post' style="position: relative;top: -80px;left: 182px;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type='submit' value='削除する' class="btn btn-danger" onclick='return confirm("削除しますか？？");'>
    </form>
    @endif
       </div>
      <div class="card-footer text-muted">
                投稿日：{{ $post->created_at }}
            </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
       <form action="{{ route('comments.store') }}" method="POST">
            {{csrf_field()}}
        <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
               <label class="teb">コメント</label>
                 <textarea class="form-control" 
                     placeholder="内容" rows="5" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-tec">コメントする</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($post->comments as $comment)
            <div class="card mt-3">
                <h5 class="card-header">投稿者：{{ $comment->user->name }}</h5>
                <div class="card-body">  
                    <p class="card-text">{{ $comment->body }}</p>
                    <h6 class="card-title">投稿日時：{{ $comment->created_at }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection