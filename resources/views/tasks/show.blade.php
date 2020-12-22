@extends('layouts.app')
@section('title', 'タスク詳細')
@section('content')
    <div class="container">
    <div class="row">
  <div class="col-md-8 col-md-offset-2">
  <h5>名前：{{ $task->name }}</h5>
  <h5>【タイトル】{{ $task->title }}</h5>
  <h6>【状態】{{ $task->status_label }}</h6>
  <h6>【期限日】{{ $task->formatted_due_date }}</h6>
  <a href="{{ route('tasks.index') }}" style="padding-left: 10px;font-size: 18px;">戻る</a>
  </div>
 </div>
 </div>
  @if( $task->user_id === Auth::id() )
         <a href="{{ route('tasks.edit', ['task_id' => $task->id]) }}" class="btn btn-tec" style="margin-top: 20px;margin-left: 90px;">編集</a>
          <form action='{{ route('tasks.destroy', ['task_id' => $task->id]) }}' method='post'>
           {{ csrf_field() }}
           {{ method_field('DELETE') }}
           <input type='submit' value='削除' class="btn btn-work" onclick='return confirm("削除しますか？？");' style="margin-top: -65px;margin-left: 160px;">
          </form> 
          @endif 
  
  @endsection