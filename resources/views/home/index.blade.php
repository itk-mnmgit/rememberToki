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
        <div class="col-md-4 mypage">

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
  </div>
</div>

<!-- content画面 -->
<div class="contents text-center">
    <p>さっそくイベントに参加してみる</p>
    <p>仲間がもうすぐ開催する開催するイベントを見てみよう。</p>
  </div>

{{-- イベント一覧表示 --}}
<div class="container mt-5">
  <div class="row">

    <div class="col-md-4 md-3">
      <div class="card">
        <img src="{{ asset('image/homeprogramming.jpg') }}">
        <div class="card-body">
          <h3 class="title">イベント１</h3>
          <p class="card-text">イベント内容</p>
          <a href="#" class="btn btn-primary">詳細</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 md-3">
      <div class="card card-img-top">
        <img src="{{ asset('image/homeprogramming.jpg') }}">
          <div class="card-body">
            <h3 class="title">イベント２</h3>
              <p class="card-text"> イベント内容</p>
              <a href="#" class="btn btn-primary">詳細</a>
          </div>
      </div>
    </div>

    <div class="col-md-4 md-3">
        <div class="card card-img-top">
          <img src="{{ asset('image/homeprogramming.jpg') }}">
            <div class="card-body">
              <h3 class="title">イベント３</h3>
                <p class="card-text"> イベント内容</p>
                <a href="#" class="btn btn-primary">詳細</a>
            </div>
        </div>
      </div>
  </div>
 </div>

<div class="container mt-5">
  <div class="row">
      <div class="col-md-4 md-3">
        <div class="card">
          <img src="{{ asset('image/homeprogramming.jpg') }}">
          <div class="card-body">
            <h3 class="title">イベント4</h3>
            <p class="card-text">イベント内容</p>
            <a href="#" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>

      <div class="col-md-4 md-3">
        <div class="card card-img-top">
          <img src="{{ asset('image/homeprogramming.jpg') }}">
            <div class="card-body">
              <h3 class="title">イベント5</h3>
                <p class="card-text"> イベント内容</p>
                <a href="#" class="btn btn-primary">詳細</a>
            </div>
        </div>
      </div>

      <div class="col-md-4 md-3">
          <div class="card card-img-top">
            <img src="{{ asset('image/homeprogramming.jpg') }}">
              <div class="card-body">
                <h3 class="title">イベント6</h3>
                  <p class="card-text"> イベント内容</p>
                  <a href="#" class="btn btn-primary">詳細</a>
              </div>
          </div>
        </div>
    </div>
</div>









<!-- CEBU CAPCEBU CAP開催
金晩だ！華金だ！セブのお酒好き集まれ！美味しい日本食居酒屋で飲みましょう！！あれ？イツキさんやれてなくね？
ILAND HOPPING
Laravel勉強会
ストバス＠MangoStreet
セブのカメラ好き集合
カジノ行きたくね？
セブ留学生でBBQ -->


<!-- footer -->
  <div class="footer bg-primary">
    <div class="footer-logo">CPIC</div>
    <div class="footer-list">
      <ul>
        <li>会社概要</li>
        <li>採用</li>
        <li>お問い合わせ</li>
      </ul>
    </div>
  </div>

</div>
@endsection