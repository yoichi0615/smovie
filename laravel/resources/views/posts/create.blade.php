@extends('app')

@section('title', '記事投稿')

@section('content')
<div class="row">
    <div class="mx-auto">
        <div class="card text-center">
            <div class="">
                @include('error_card_list')
                <form class="mt-3" method="POST" action="{{ route('article.store') }}">
                    @csrf
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
                    <button type="submit" class="btn btn-primary text-center">投稿</button>
                </form>
            </div>

        </div>
    </div>

</div>


@endsection
