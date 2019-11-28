@extends('layouts.app')

@section('content')
<!-- ここからホームページのメイン画面 -->
<div class="main">
  <div class="bg-image" style="background-image: url({{ asset('image/homebackground.jpg') }})">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 d-flex flex-column justify-content-center">
        <h3 class="display-4-1 text-black">最高に『ワクワクする出会い』を</h3>
        <h1 class="display-4-2 text-black">Connect People In Cebu</h1>
      </div>

      <div class="col-md-4 d-flex flex-column justify-content-center">
        <p class="right">セブで『仲間』を見つけよう</p>
        <hr class="my-4">

        <p>同じ趣味、関心を持った仲間たちとチャットを始めよう</p>
        <p>仲良くなって一緒にイベントを開催しよう</p>
        <p>CPICをはじめよ</p>

        <div class="col-md-4 d-flex align-items-center">
          <a class="btn btn-primary btn-lg text-white" href="{{ route('register') }}" role="button">アカウント作成</a>
          <a class="btn btn-primary btn-lg text-white" href="{{ route('login') }}" role="button">ログイン</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-md-4 md-3">
      <div class="card"　class="card-img-top">
        <img src="assets/images/coffee2.jpeg" alt="">
        <div class="card-body">
          <h3 class="title">What we're all about</h3>
          <p class="card-text">At the end of the day, it all comes down to coffee. But to get there it takes a dedicated, knowledgeable team with a sustainable approach.</p>
          <a href="#" class="btn btn-primary">Go</a>
        </div>
      </div>
    </div>
    
    <div class="col-md-4 md-3">
      <div class="card card-img-top">
        <img src="assets/images/coffee3.jpeg" alt="">
          <div class="card-body">
            <h3 class="title">Removing only caffeine</h3>
              <p class="card-text"> Find out how we really achieve coffee that tastes so good you don't miss the caffeine.</p>
              <a href="#" class="btn btn-primary">Go</a>
          </div>
      </div>
    </div>

    
    <div class="col-md-4 md-3">
      <div class="card"　class="card-img-top">
        <img src="assets/images/coffee4.jpeg" alt="">
        <div class="card-body">
          <h3 class="title">Amazing decaf is near you</h3>
          <p class="card-text">Because you love coffee, but don't always want the caffeine, look for the Swiss Water® logo or ask how your coffee was decaffeinated.</p>
          <a href="#" class="btn btn-primary">Go</a>
        </div>
    </div>
    </div>
  </div>
</div>

<!-- content画面 -->
<div class="contents">
  <p>さっそくイベントに参加してみる</p>
  <p>仲間がもうすぐ開催する開催するイベントを見てみよう。</p>
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
<div class="footer">
    <p>CPIC</p>
</div>
@endsection