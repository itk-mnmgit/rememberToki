<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title', '一覧')

@section('content')

<!-- イベント一覧画面 -->
<div class="container mt-3 text-center">

      <h1>参加したいイベントを見つけよう</h1>
        <div class="input-group">
            <div class="row col-md-4"></div>
            <input type="message" class="form-control col-md-4" placeholder="テキスト入力欄">
            <span class="input-group-btn">
            <button type="button" class="btn btn-primary btn-lg text-white text-align-center">ボタン</button>
            </span>
            <div class="row col-md-2"></div>
            <a class="btn btn-success btn-lg text-white col-md-2" href="{{ route('register') }}" role="button">イベント作成画面</a>
        </div>

      <p>イベント作成画面btn は仮でregisterに設定。</p>



    <div class="row">
        @foreach($events as $event)
          <div class="col-md-3 mb-3">
            <div class="card" id="highreliability">
                <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
                <title>Placeholder</title>
              <div class="card-body">
                  <h5 class="card-title">{{ $event->name }}</h5>
                  <p class="card-text">内容１ </p>
                  <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>
<!-- featureここまで -->

@endsection