@extends('app')

@section('title', '記事一覧')

@section('content')

  @include('nav')

  <div class="container">
    @foreach($articles as $article)
      @include('posts.card')
    @endforeach
  </div>
@endsection
