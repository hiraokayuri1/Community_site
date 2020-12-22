@extends('layouts.app')
@section('title', '日記一覧')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h2> - 日記一覧ページ - </h2>
        
        <a href="{{ route('posts.create')}}" class="btn btn-light">新規投稿はこちら</a>    
        <div class="row">
    <div class="col-md-6">
      <div id="custom-search-input">
      <div class="input-group col-md-12">
        <form action="{{ route('posts.search') }}" method="POST">
          {{ csrf_field() }}
      <input type="text" class="form-control input-lg" placeholder="Search"/ name="search">
     
        <span class="input-group-btn" style="position: relative;top: -37px;right: -193px;">
       <button class="btn btn-info" type="submit">
        <!-- <i class="glyphicon glyphicon-search"></i> -->
        <i class="fas fa-search"></i>
        </button>
        </span>
       </form>
       </div>
       @isset($search_result)
      <h5 class="card-title">{{ $search_result }}</h5>
      @endisset
   </div>
  </div>
</div>
      <!-- @isset($search_result)
      <h5 class="card-title">{{ $search_result }}</h5>
      @endisset -->

        <!-- <a href="{{ route('posts.create')}}" class="btn btn-primary">新規投稿</a>  --> 
        <div class="card text-center">
        <div class="card-header">
          - 日記投稿 -
        </div>
        @foreach ($posts as $post)
        <div class="card-body">
        <h4 class="card-title"><br>【日記タイトル】</br><br>{{ $post->title }}</br></h4>
        <div class="row justify-content-center">
          @if ($post->users()->where('user_id', Auth::id())->exists())
          <div class="col-md-3">
          <form action="{{ route('unlikes', $post) }}" method="POST">
              @csrf
              <input type="submit" value="&#xf164;取り消す" class="fas btn btn-secondary">
             </form>
         </div>
         @else
             <div class="col-md-3">
            <form action="{{ route('likes', $post) }}" method="POST">
             @csrf
           <input type="submit" value="&#xf164;" class="fas btn btn-success">
        </form>
   </div>
   @endif
</div>
<div class="row justify-content-center">
    <p>Good数：{{ $post->users()->count() }}</p>
</div>
        <p class="card-text">{{ $post->body }}</p>
      
          <p class="card-text">投稿者：
          <a href="{{ route('users.show', $post->user_id)}}">{{ $post->user->name }}</a></p>
        <a href="{{ route('posts.show', $post->id )}}" class="btn btn-primary">詳細</a>
        </div>
      <div class="card-footer text-muted">
                投稿日：{{ $post->created_at }}
            </div>
            @endforeach      
        </div>
        <div class="paginate">
             {{ $posts->links() }}
             </div>
      </div>
   </div> 
  </div> 
@endsection