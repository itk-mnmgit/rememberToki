@extends('layouts.app')

@section('custom_js')
<script src="https://code.jquery.com/jquery-2.2.4.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" defer></script>
<script src="{{ asset('js/slider.js') }}" defer></script>
@endsection

@section('custom_css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endsection

@section('content')
<!-- ここからホームページのメイン画面 -->
<div class="main">
    <div class="bg-image" style="background-image: url({{ asset('image/homebackground6.jpg') }})">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center pl-4 connect">
            </div>
            <div class="col-md-6 d-flex flex-column pl-4 text-light comment-con text-center">
                <div class="title">
                    <h3 class="display-4-1 text-light"><strong>最高に『ワクワクする出会い』を</strong></h3>
                    <h1 class="display-4-2 text-light"><strong>Connect People In Cebu</strong></h1>
                </div>
            </div>
            <div class="col-md-6 d-flex text-light comment-on text-center">
                <div class="comment1">
                    <p class="right">セブで『仲間』を見つけよう</p>
                    <p>同じ趣味、関心を持った仲間たちとチャットを始めよう</p>
                    <p>仲良くなって一緒にイベントを開催しよう</p>
                    <p>CPICをはじめよう</p>
                </div>
                <div class="col-md-6 mypage">
                {{-- ログインしてないときは アカウント作成/ログインボタン を表示 --}}
                    @guest
                        <a class="btn btn-primary btn-lg text-white mr-1" href="{{ route('register') }}" role="button">アカウント作成</a>
                        <a class="btn btn-primary btn-lg text-white" href="{{ route('login') }}" role="button">ログイン</a>
                    @endguest
                    @if(Auth::check())
                        <a class="btn btn-primary btn-lg text-white" href="{{ route('get.chat.index') }}" role="button">My Page へ</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="event">
        <div class="contents text-center">
            <h2>もうすぐ開催のイベント</h2>
            <p>セブでもうすぐ開催のイベントを見てみよう。</p>
        </div>
        {{-- イベント一覧表示 --}}
        <div class="container mt-3 text-left mb-3">
            <div class="row slider">
                @for ($i = 0; $i < 8; $i++)
                    <div class="card" style="width: 20rem; margin-right: 30px;">
                        <div class="card-body">
                            <p class="card-text"><small class="text-primary">12月20日(金), 18:00</small></p>
                            <h5 class="card-title">IT PARK WordPress勉強会</h5>
                            <h6 class="card-subtitle mb-2 text-muted">かみーゆ</h6>
                            <p class="card-text">IT PARK にあるコワーキングスペースで WordPress の勉強会を開催します。</p>
                            <p class="card-text"><small class="text-muted">参加者 25人</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    {{-- グループ一覧表示 --}}
    <div class="group">
        <div class="contents text-left">
            <h2>人気のグループ</h2>
            <p>セブで人気のグループを見てみよう。</p>
        </div>
        <div class="row slider">
            @for ($i = 0; $i < 8; $i++)
                <div class="card" style="width: 12rem; margin-right: 30px;">
                    <img src="{{ asset('image/homefootball.jpg') }}" class="img-fluid card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Cebu FC</h5>
                        <h6 class="card-subtitle mb-2 text-muted">イツキ</h6>
                        <p class="card-text">毎月2週目と4週目の土曜日の朝10時から Metro Sports Center でフットサルしてます。みんなで汗を流しましょう。</p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <div class="description text-light">
        <h2>CPICの仕組み</h2>
        <div class="group">
            <h3>グループ</h3>
            <p>あなたが楽しめるいろいろなイベントを主催しているグループを見つけよう。</p>
        </div>
        <div class="chat">
            <h3>チャット</h3>
            <p>グループで仲良くなった人とチャットを通してもっと仲良くなろう。</p>
        </div>
        <div class="event">
            <h3>イベント</h3>
            <p>仲の良いメンバーとイベントを開催しよう。</p>
        </div>
    </div>
    {{-- news一覧表示 --}}
    <div class="news">
        <h2>最新情報</h2>
        <ul class="msr_newslist02">
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-20">2019.12.20</time>
                <p class="cpic01">CPIC</p>
                </div>
                <p>56期生卒業</p>
                </a>
            </li>
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-19">2019.12.19</time>
                <p class="cpic02">Nexseed</p>
                </div>
                <p>チーム開発最終プレゼンまでの軌跡</p>
                </a>
            </li>
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-13">2019.12.13</time>
                <p class="cpic01">CPIC</p>
                </div>
                <p>ダブルゆうき生誕祭！カジノで豪遊</p>
                </a>
            </li>
            <li>
                <a href="#">
                <div>
                <time datetime="2019-12-11">2019.12.11</time>
                <p class="cpic02">Neseed</p>
                </div>
                <p>シゲさんが語るセブの良いところ</p>
                </a>
            </li>
            </ul>
    </div>
</div>

{{-- サブビューでfooterを読み込んでいます(views/components/footer) --}}
@include('components.footer', ['a' => 'なんか持ってきたい値あれば', 'b' => 'こんな感じで'])






@endsection