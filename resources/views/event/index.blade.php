@extends('layouts.app')

@section('title', 'イベント一覧')

@section('content')


<main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">参加したいイベントを見つけよう</h1>
            <div class="row justify-content-end">
                <div class="col-5">
                    <form method='get' class="form-inline col-ml-3" action='{{ route('event.search') }}'>
                        <select class="custom-select" name="selected_genre">
                            <option value='0'>all</option>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ isset($_GET['selected_genre']) && $_GET['selected_genre'] == $genre->id ? 'selected' : ''  }}>{{ $genre->name }}
                            </option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary btn-lg text-white text-align-center col-ml-3">検索</button>
                        </span>
                    </form>
                </div>
                <a class="btn btn-success btn-lg text-white col-md-2" href="{{ route('event.makeEvent') }}" role="button">イベント作成画面</a>
            </div>
        </div>
    </section>

{{-- 現在進行中のイベント表示 --}}
<div class="row">
    @foreach($events as $event)
        <div class="col-md-3 mb-3">
            <div class="card" id="highreliability">
                <img src="{{ asset($event->img) }}" alt="business city" class='img-fluid card-img-top'>
                <div class="card-body">
                    <h5 class="title">{{ $event->name }}</h5>
                    <p class="card-text">{{ str_limit($event->intro, $limit = 20, $end = '…') }}</p>
                    <!-- 切り替えボタンの設定 -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$event->id}}">詳細</button>
                    <!-- モーダルの設定 -->
                    <div class="modal fade" id="myModal-{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="title">{{ $event->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <img src="{{ asset($event->img) }}" alt="business city" class='img-fluid card-img-top'>
                                <div class="modal-body">
                                    <p class="card-text">{{ $event->intro }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    @if( in_array($event->id, $attendEventsId))
                                    <form method='post' action='{{ route('event.leave') }}'>
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $event->id }}">
                                            <button type="submit" class="btn btn-danger">このイベントから退会</button>
                                    </form>
                                    @else
                                    <form method='post' action='{{ route('event.attend') }}'>
                                    @csrf
                                        <input type="hidden" name="id" value="{{ $event->id }}">
                                        <button type="submit" class="btn btn-success">このイベントに参加</button>
                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection



