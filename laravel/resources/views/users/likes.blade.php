@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')
<nav class="navbar  navbar-dark ">
    <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>soccer</a>

    <ul class="navbar-nav ml-auto">
        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
            <button class="dropdown-item" type="button"
            onclick="location.href='{{route('users.show',['name' => Auth::user()->name])}}'">
            マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button">
            <a href="{{route('article.create')}}">投稿する</a>
        </button>
    </div>
</li>
<!-- Dropdown -->
</ul>
<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>
<div id="menu" class="collapse navbar-collapse">
<ul class="navbar-nav">
    <li class="nav-item1">
        カテゴリー別検索
        <form action="{{route('article.index')}}" method="get">
    <div class="form-group selength">
    <select class="form-control" id="exampleFormControlSelect1" name="players">
      <option>プレミアリーグ</option>
      <option>ラ・リーガ</option>
      <option>日本代表</option>
      <option>セリエA</option>
      <option>その他</option>
    </select>
     <span><button type="submit" name="button">検索</button></span>
  </div>

        </form>


    </li>
    <li class="nav-item"><a href="" class="nav-link"><span class="oi oi-thumb-up"></span>このアプリについて</a></li>
    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span class="iconify mr-2" data-icon="oi-account-logout" data-inline="false" ></span>ログアウト</a></li>
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>
</nav>
  <div class="container">
    @include('users.user')
    <ul class="nav nav-tabs nav-justified mt-3">
      <li class="nav-item">
        <a class="nav-link text-muted"
           href="{{ route('users.show', ['name' => $user->name]) }}">
          記事
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted active"
           href="{{ route('users.likes', ['name' => $user->name]) }}">
          いいね
        </a>
      </li>
    </ul>
    @foreach($articles as $article)
      @include('posts.card')
    @endforeach
  </div>
@endsection
