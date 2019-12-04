<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title', '一覧')

@section('content')

<!-- イベント一覧画面 -->
<div class="container mt-3 text-center">

      <h1 class="mb-5">参加したいイベントを見つけよう</h1>
        <div class="input-group mb-3">
          <div class="row col-md-5"></div>
            <form method="post" action="example">
                <select name="genre">
                      <option value="サンプル1">選択肢のジャンル1</option>
                      <option value="サンプル2">選択肢のジャンル2</option>
                      <option value="サンプル3">選択肢のジャンル3</option>
                      <option value="サンプル4">選択肢のジャンル4</option>
                      <option value="サンプル5">選択肢のジャンル5</option>
                </select>
                <input type="submit" value="変更" class="btn btn-primary btn-lg text-white">
            </form>
            <div class="row col-md-2">
            </div>
            <a class="btn btn-success btn-lg text-white col-md-2" href="{{ route('event.makeEvent') }}" role="button">イベント作成画面</a>
        </div><br>



    <div class="row">
        {{-- @foreach($events as $event) --}}
          <div class="col-md-3 mb-3">
            <div class="card" id="highreliability">
                <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                  <h5 class="title">イベント１</h5>
                  <p class="card-text">内容1</p>
                  <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        {{-- @endforeach --}}

        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 md-3">
            <div class="card">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                <h5 class="title">イベント2</h5>
                <p class="card-text">内容2</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        {{-- @endforeach --}}
        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 md-3">
            <div class="card">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                <h5 class="title">イベント3</h5>
                <p class="card-text">内容3</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        {{-- @endforeach --}}
        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 md-3">
            <div class="card">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                <h5 class="title">イベント4</h5>
                <p class="card-text">内容4</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        {{-- @endforeach --}}
        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 md-3">
            <div class="card">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                <h5 class="title">イベント5</h5>
                <p class="card-text">内容5</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        {{-- @endforeach --}}
        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 md-3">
            <div class="card">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                <h5 class="title">イベント6</h5>
                <p class="card-text">内容6</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        {{-- @endforeach --}}
        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 md-3">
            <div class="card">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                <h5 class="title">イベント7</h5>
                <p class="card-text">内容7</p>
                <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
        </div>
        {{-- @endforeach --}}

        {{-- @foreach($events as $event) --}}
        <div class="col-md-3 mb-3">
            <div class="card" id="highreliability">
                <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                  <h5 class="title">イベント8</h5>
                  <p class="card-text">内容8</p>
                  <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        {{-- @endforeach --}}
    </div>
</div>
<!-- featureここまで -->

@endsection