@extends('layouts.app')

@section('title', 'イベント一覧')

@section('content')

<div class="container mt-3 text-center">

      <h1>参加したいイベントを見つけよう</h1>
        <div class="input-group mb-3">
            <form method='get' action='{{ route('event.search') }}'>
                <select class="custom-select" name="selected_genre">
                    <option value='0'>all</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ isset($_GET['selected_genre']) && $_GET['selected_genre'] == $genre->id ? 'selected' : ''  }}>{{ $genre->name }}
                    </option>
                    @endforeach
                </select>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-lg text-white text-align-center">検索</button>
                </span>
            </form>
            <a class="btn btn-success btn-lg text-white col-md-2" href="{{ route('event.makeEvent') }}" role="button">イベント作成画面</a>
        </div>

    <div class="row">
        @foreach($events as $event)
          <div class="col-md-3 mb-3">
            <div class="card" id="highreliability">
                <img src="{{ asset($event->img) }}" alt="business city" class='img-fluid card-img-top'>
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