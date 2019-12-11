@extends('layouts.app')

@section('content')
<!-- ここからホームページのメイン画面 -->
<div class="main">
  <div class="bg-image" style="background-image: url({{ asset('image/homebackground6.jpg') }})">
    <div class="row">
      <div class="col-md-6 d-flex flex-column justify-content-center pl-4 connect">
        {{-- <h3 class="display-4-1 text-light">最高に『ワクワクする出会い』を</h3>
        <h1 class="display-4-2 text-light">Connect People In Cebu</h1> --}}
      </div>

      <div class="col-md-6 d-flex flex-column pl-4 text-light comment-con text-center">
        <div class="title">
            <h3 class="display-4-1 text-light"><strong>最高に『ワクワクする出会い』を</strong></h3>
            <h1 class="display-4-2 text-light"><strong>Connect People In Cebu</strong></h1>
        </div>
        <div class="comment1">
          <p class="right">セブで『仲間』を見つけよう</p>
          <p>同じ趣味、関心を持った仲間たちとチャットを始めよう</p>
          <p>仲良くなって一緒にイベントを開催しよう</p>
          <p>CPICをはじめよう</p>
        </div>
        <div class="col-md-8 mypage">
            

      {{-- ログインしてないときは アカウント作成/ログインボタン を表示 --}}
            @guest
            <a class="btn btn-primary btn-lg text-white mr-1" href="{{ route('register') }}" role="button">アカウント作成</a>
            <a class="btn btn-primary btn-lg text-white" href="{{ route('login') }}" role="button">ログイン</a>
            @endguest
      {{-- ログイン時は mypageへ ボタン --}}
            @if(Auth::check())
            <a class="btn btn-primary btn-lg text-white" href="{{ route('get.chat.index') }}" role="button">My Page へ</a>
            @endif
        </div>
    </div>
</div>

<!-- content画面 -->
<div class="contents text-center">
    <p>さっそくイベントに参加してみる</p>
    <p>仲間がもうすぐ開催する開催するイベントを見てみよう。</p>
</div>

{{-- イベント一覧表示 --}}
<div class="container mt-3 text-center">
    <div class="row">
        @for ($i = 1; $i < 7; $i++)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('image/homeprogramming.jpg') }}">
                    <div class="card-body">
                        <h3 class="title">イベント{{ $i }}</h3>
                        <p class="card-text">{{ $i }}こ目のイベント内容だよ</p>
                        <a href="#" class="btn btn-primary">詳細</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>

{{-- サブビューでfooterを読み込んでいます(views/components/footer) --}}
@include('components.footer', ['a' => 'なんか持ってきたい値あれば', 'b' => 'こんな感じで'])






@endsection