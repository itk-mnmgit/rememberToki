<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title', '一覧')

@section('content')

<!-- イベント一覧画面 -->
<div class="container mt-3 text-center">
    <h1>参加したいイベントを見つけよう</h1>
    <P>検索form</P>
    <p>イベント作成画面btn は仮でregisterに設定。</p>
    <a class="btn btn-success btn-lg text-white" href="{{ route('register') }}" role="button">イベント作成画面</a>
    <div class="row">
      <!-- イベント１ -->
      <div class="col-md-3 mb-3">
        <div class="card" id="highreliability">
            <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
            <title>イベント１</title>
          <div class="card-body">
            <h5 class="card-title">表題１</h5>
            <p class="card-text">内容１ </p>
            <a href="#" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
      <!-- イベント２ -->
      <div class="col-md-3 mb-3">
        <div class="card" id="punctuality">
          <img src="{{ asset('image/thanksimg.jpeg') }}" alt="business city" class='img-fluid card-img-top'>
          <title>イベント２</title>
          <div class="card-body">
            <h5 class="card-title">表題２</h5>
            <p class="card-text">内容２</p>
            <a href="#" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
      <!--イベント３ -->
      <div class="col-md-3 mb-3">
        <div class="card" id="strategies">
          <img src="{{ asset('image/iland.jpeg') }}" alt="business city" class='img-fluid rrcard-img-top'>
          <title>イベント３</title>
          <div class="card-body">
            <h5 class="card-title">表題３</h5>
            <p class="card-text">内容３</p>
            <a href="#" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
      <!--イベント４ -->
      <div class="col-md-3 mb-3">
          <div class="card" id="punctuality">
            <img src="{{ asset('image/thanksimg.jpeg') }}" alt="business city" class='img-fluid card-img-top'>
            <title>イベント４</title>
            <div class="card-body">
              <h5 class="card-title">表題４</h5>
              <p class="card-text">内容４</p>
              <a href="#" class="btn btn-primary">詳細</a>
            </div>
          </div>
        </div>
        <!--イベント５ -->
        <div class="col-md-3 mb-3">
            <div class="card" id="punctuality">
              <img src="{{ asset('image/iland.jpeg') }}" alt="business city" class='img-fluid card-img-top'>
              <title>イベント５</title>
              <div class="card-body">
                <h5 class="card-title">表題５</h5>
                <p class="card-text">内容５</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        <!--イベント６ -->
        <div class="col-md-3 mb-3">
            <div class="card" id="punctuality">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <title>イベント６</title>
              <div class="card-body">
                <h5 class="card-title">表題６</h5>
                <p class="card-text">内容６</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        <!--イベント７ -->
        <div class="col-md-3 mb-3">
            <div class="card" id="punctuality">
              <img src="{{ asset('image/thanksimg.jpeg') }}" alt="business city" class='img-fluid card-img-top'>
              <title>イベント７</title>
              <div class="card-body">
                <h5 class="card-title">表題７</h5>
                <p class="card-text">内容７</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        <!--イベント８ -->
        <div class="col-md-3 mb-3">
            <div class="card" id="punctuality">
              <img src="{{ asset('image/iland.jpeg') }}" alt="business city" class='img-fluid card-img-top'>
              <title>イベント８</title>
              <div class="card-body">
                <h5 class="card-title">表題８</h5>
                <p class="card-text">内容８</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>


    </div>
  </div>
<!-- featureここまで -->

@endsection