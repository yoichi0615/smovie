@extends('app')

@section('title', '記事更新')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">

            <div class="card-text">
              <form method="POST" action="{{ route('article.update', ['article' => $article]) }}">
                @method('PATCH')
                <div class="form-group">
                    <label for="exampleFormControlSelect1">カテゴリー</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="players">
                        <option>プレミアリーグ</option>
                        <option>ラ・リーガ</option>
                        <option>セリエA</option>
                        <option>日本代表</option>
                        <option>その他</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">チーム名</label>
                    <input type="" name="title" class="form-control" id="exampleFormControlInput1" placeholder="チーム名">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">戦術、起用のポイント</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn blue-gradient btn-block">更新する</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
