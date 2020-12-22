@extends('layout')
@section('title', 'タスク一覧')
@section('content')

<div class="container">
  <div class="row">
   <div class="column col-md-8">
   <div class="panel panel-default">  
    <div class="panel-heading">タスク管理</div>
     <div class="panel-body">
          
       <div class="text-right">
         <a href="{{ route('tasks.create') }}" class="btn btn-default btn-block">
          タスクを追加する </a>
         </div>
       </div>
      <table class="table">
     <thead>
       <tr>
        <th>ID</th>
        <th>名前</th>
        <th>タイトル</th>
        <th>状態</th>
        <th>期限</th> 
        </tr>
     </thead>
      <tbody>
     
      @foreach($tasks as $task)
       <tr>
         <th>{{ $task->id }}</th>
         <th>{{ $task->name }}</th>
         <th><a href="/tasks/{{ $task->id }}">
           {{ $task->title }}
          </a></th>
          <th>
          <span class="label {{ $task->status_class }}" style="padding: 5px;">{{ $task->status_label }}</span>
         </th>
         <th>{{ $task->formatted_due_date }}</th>
        </tr>    
         @endforeach
         </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center mb-5">
            {{ $tasks->links() }}
        </div>
  </div>
  </div>
</div> 
@endsection
