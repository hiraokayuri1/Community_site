@extends('layouts.app')
@section('title', 'ユーザーの投稿一覧')
@section('content')

        <div class="container">
      
      <div class="mb-4">
       <h3>{{ $user_name }}の投稿一覧</h3>
        @foreach ($posts as $post)
        <div class="card-body">
        <h5 class="card-title">タイトル：{{ $post->title }}</h5>

        <p class="card-text">{{ $post->body }}</p>
       
       <img src="{{ $post->image_path }}" alt="画像" width="300" height="180" style="text-align : center;margin-left: 10px;">
       </div>
      
    
      <div class="card-footer text-muted">
          投稿日：{{ $post->created_at }}
      </div>
          @if ($post->comments->count())
       <span class="badge badge-primary">
          コメント {{ $post->comments->count() }}件
         </span>
         @endif

         @if ($post->users->count())
        <span class="badge badge-light">
          Good数 {{ $post->users->count() }}
        </span>
         @endif
       
     
     @endforeach

     <div class="d-flex justify-content-center mb-5">
            {{ $posts->links() }}
        </div>
    </div> 
  </div>
</div>
    
    
@endsection