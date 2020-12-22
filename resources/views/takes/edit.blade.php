@extends('layout')
@section('title', '編集画面')
@section('content')
<div class="row">
    <div class="col-md-7 col-md-offset-2">
        <!-- <h3>連絡事項を編集</h3> -->
        <form method="POST" action="{{ route('takes.update') }}" onSubmit="return checkSubmit()">
        @csrf
        <input type="hidden" name="id" value="{{ $take->id }}">
        <div class="form-group">
                <label for="name">
                    名前
                </label>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{ $take->name }}"
                    type="text"
                >
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="item">
                    項目
                </label>
                <input
                    id="item"
                    name="item"
                    class="form-control"
                    value="{{ $take->item }}"
                    type="text"
                >
                @if ($errors->has('item'))
                    <div class="text-danger">
                        {{ $errors->first('item') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="title">
                    タイトル
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $take->title }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="body">
                    本文
                </label>
                <textarea
                    id="body"
                    name="body"
                    class="form-control"
                    rows="8"
                >{{ $take->body }}</textarea>
                @if ($errors->has('body'))
                    <div class="text-danger">
                        {{ $errors->first('body') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('takes.index') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
