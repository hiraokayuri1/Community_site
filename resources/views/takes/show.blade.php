@extends('layouts.app')
@section('title', '連絡詳細')
@section('content')
    <div class="container">
    <div class="row">
  <div class="col-md-8 col-md-offset-2">
      <h4>発信者：{{ $take->name }}</h4>
      <h4>【タイトル】{{ $take->title }}</h4>
      <p style="font-size: 17px;">{{ $take->body }}</p>
      <span>作成日：{{ $take->created_at }}</span>
      <span>更新日：{{ $take->updated_at }}</span>
      <a href="{{ route('takes.index') }}" style="padding-left: 10px;">戻る</a>
  </div>
 </div>
 </div>
 @if( $take->user_id === Auth::id() )
  <input type="submit" value="編集" class="btn btn-jobs" onclick="location.href='/takes/edit/{{ $take->id }}'" style="margin-left: 90px;margin-top: 20px;">
  <form action='{{ route('takes.destroy', $take->id) }}' method='post'>
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
    <input type='submit' value="削除" class="btn btn-work" onclick='return confirm("削除しますか？？");' style="margin-left: 160px;margin-top: -65px;">
  </form> 
 @endif


 <div class="container">
        <div class="col-md-5">
            <form action="{{ route('messages.store') }}" method="POST">
            {{csrf_field()}}
        <input type="hidden" name="take_id" value="{{ $take->id }}">
                <div class="form-group">
                    <h5 class="txt"> - Message - </h5>
                    <textarea class="form-control" 
                     placeholder="返信内容" rows="4" name="body"></textarea>
                </div>
                <button type="submit" class="btn btn-tec">返信する</button>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="col-md-5">
            @foreach ($take->messages as $message)
            <div class="card mt-5">
                <h5 class="card-header">返信者：{{ $message->user->name }}</h5>
                <div class="card-body">
                    <p class="card-title">{{ $message->body }}</p>
                    <h6 class="card-text">投稿日時：{{ $message->created_at }}</h6>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
  @endsection