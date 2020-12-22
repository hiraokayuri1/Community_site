@extends('layouts.app')
@section('title', '連絡事項一覧')
@section('content')
    <div class="container">
    <div class="row">
  <div class="col-md-9 col-md-offset-2">
      <h3> - 連絡事項一覧 - </h3>
      @if (session('err_msg'))
       <p class="text-danger">
       {{ session('err_msg') }}
       </p>
       @endif
      <a class="tent-colm" href="{{ route('takes.create') }}">新規投稿</a>

      <div class="col-md-5">
      <div class="input-group col-md-10">
        <form action="{{ route('takes.search') }}" method="POST">
          {{ csrf_field() }}
      <input type="text" class="form-control input-lg" placeholder="Search"/ name="search" style="margin-top: 20px;">
        <span class="input-group" style="position: relative;top: -37px;right: -193px;">
       <button class="btn btn-info" type="submit">
        <i class="fas fa-search"></i>
        </button>
        </span>
       </form>
       </div>
       @isset($search_result)
      <h5 class="card-title">{{ $search_result }}</h5>
      @endisset
</div>

      <table class="table table-striped">
          <tr>
              <th>番号</th>
              <th>名前</th>
              <th>項目</th>
              <th>タイトル</th>
              <th>日付</th>    
          </tr>
          @foreach($takes as $take)
          <tr>
              <td>{{ $take->id }}</td>
              <td>{{ $take->name }}</td>
              <td>{{ $take->item }}</td>
              <td><a href="/takes/{{ $take->id }}">{{ $take->title }}</td>
              <td>{{ $take->updated_at }}</td>
              </tr>
          @endforeach
      </table>
      <div class="paginate">
	           {{ $takes->links() }}
             </div>
  </div>
</div>
    </div> 
   
    @endsection  
    