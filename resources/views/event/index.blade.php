@extends('layouts.app')

@section('title', 'イベント一覧')

@section('content')

<div class="container mt-3 text-center">

      <h1>参加したいイベントを見つけよう</h1>
        <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect04">
                <option selected>ジャンル選択</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
            <span class="input-group-btn">
                <button type="button" class="btn btn-primary btn-lg text-white text-align-center">ボタン</button>
            </span>
            <a class="btn btn-success btn-lg text-white col-md-2" href="{{ route('event.makeEvent') }}" role="button">イベント作成画面</a>
        </div>

    <div class="row">
        @foreach($events as $event)
          <div class="col-md-3 mb-3">
            <div class="card" id="highreliability">
                <img src="{{ asset($event->img/) }}" alt="business city" class='img-fluid card-img-top'>
              <div class="card-body">
                  <h5 class="title">{{ $event->name }}</h5>
                  <p class="card-text">{{ str_limit($event->intro, $limit = 50, $end = '…') }}</p>
                  <a href="#" class="btn btn-primary">詳細</a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</div>

@endsection