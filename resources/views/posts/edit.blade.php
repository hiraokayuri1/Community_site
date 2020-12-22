@extends('layouts.app')
@section('title', '日記編集')
@section('content')
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-8">
    @if ($errors->any()) 
      <div class="alert alert-danger">
       <ul>
        @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
        @endforeach
      </ul>
     </div>
     @endif
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
     {{csrf_field()}}
     {{method_field('PATCH')}}
     <div class="form-group">
      <label>ブログ名</label>
     <input type="text" class="form-control" placeholder="タイトルを入力して下さい" name="title" value="{{ $post->title }}">
     </div>
     <div class="form-group">
      <label>内容</label>
       <textarea class="form-control" placeholder="内容" rows="8" name="body">{{ $post->body }}</textarea>
</div>

     <img src="{{ $post->image_path }}" alt="画像" width="350" height="220" style="text-align : center;margin-left: 10px;">
     <!-- <div class="form-group">
        <label for="image">画像</label>
         <input type="file" class="form-control-file" id="image" name="image">       
        </div> -->

       <a href="{{ route('posts.index')}}" class="btn btn-edit">キャンセル</a>
     <button type="submit" class="btn btn-pot">更新する</button>
      </form>
      </div>
    </div>
</div>
@endsection