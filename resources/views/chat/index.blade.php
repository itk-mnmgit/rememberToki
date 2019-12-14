@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- サイドバーを表示する --}}
{{-- <div class="container-fluid"> --}}
<div class="sidebar-container">
    <div class="sidebar-logo">
        CPICメニュー
    </div>
    <ul class="sidebar-navigation">
        <!-- 1 ,ナビゲーション -->
            <li class="header">グループCHAT</li>
        <!-- 1列目 -->
        <li>
            <a class="btn btn-blac text-white" href="{{ route('chat.listGroup') }}" role="button">＋ グループを追加する</a>
            {{-- 消す予定一旦保留 --}}
            {{-- @foreach($attendGroups as $attendGroup)
            <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
            @endforeach --}}
        </li>

        <!-- 2列目 -->
        <li>
            <a href="#">
            <i class="fa fa-tachometer" aria-hidden="true"></i> ○ グループDashboard①
            </a>
        </li>
        {{-- foreachだから？ --}}
        <li>
            @foreach($attendGroups as $attendGroup)
                <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
            @endforeach
        </li>
        <!-- 2,ナビゲーション -->
        <li class="header">個人CHAT</li>
        <!-- 1個目 -->
        <li>
            <a class="btn btn-black text-white" href="" role="button">＋ メンバーを招待する</a>
            @for ($i = 0; $i < 3; $i++)
                <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">○ メンバーの名前</a>
            @endfor
        </li>
        <!-- 2個目 -->
        <li>
            <a href="{{ url('/setting/index') }}">
                <i class="fa fa-cog" aria-hidden="true"></i> Settings
            </a>
        </li>
        <!-- 3個目 -->
        <li>
            <a href="#">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Information
            </a>
        </li>
        <!-- 3,ナビゲーション -->
        <li class="header">参加予定のイベント</li>
        <li>
            <a href="{{ route('event.index') }}">
                <i class="fa fa-info-circle" aria-hidden="true"></i>+ 他のイベントを見る
            </a>
        </li>
        <li>
            @foreach ($attendEvents as $attendEvent)
            {{-- name='id' value ='{{ $attendEvent->event->id }}' でmodalにid渡したい --}}
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $attendEvent->event->id}}" name='id' value ='{{ $attendEvent->event->id }}'>詳細</button>
            {{-- modal --}}
                <div class="modal fade" id="myModal-{{ $attendEvent->event->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="title">{{ $attendEvent->event->name}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <img src="{{ asset($attendEvent->event->img) }}" alt="business city" class='img-fluid card-img-top'>
                            <div class="modal-body">
                                <p class="card-text">{{ $attendEvent->event->intro }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <form method='post' action='{{ route('event.leave') }}'>
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $attendEvent->event->id }}">
                                    <button type="submit" class="btn btn-danger">このイベントから退会</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <p class="card-text">
                        <small class="text-muted">
                            {{ $attendEvent->event->startTime }} - {{ $attendEvent->event->finishTime }}
                        </small>
                    </p>
                </div>
            @endforeach
        </li>
    </ul>
</div>

    {{-- 中央・チャット --}}
    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                {{-- <p>{{ $group->name }}</p> --}}
                <p><i class="fas fa-user-friends"></i> 23人</p>
                <div class="card-header">
                    <ul id="chat">
                        @foreach($posts as $post)
                        <li>{{ $post->text }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="form-group">
                    <div class="card-body">
                        <input type="text" id="text">
                        <input type="submit" value="送信" id="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>



        {{-- 以下まだ書いてない --}}
        {{-- イベントのバーを表示する --}}
        <div class="col-md-3 left-content">
            <div class="eventbar text-center">
                <div class="event">
                    {{-- <h3 class="text-light">参加予定のイベント</h3> --}}

                    @foreach ($attendEvents as $attendEvent)

                        {{-- name='id' value ='{{ $attendEvent->event->id }}' でmodalにid渡したい --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $attendEvent->event->id}}" name='id' value ='{{ $attendEvent->event->id }}'>詳細</button>
                    {{-- modal --}}
                        <div class="modal fade" id="myModal-{{ $attendEvent->event->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="title">{{ $attendEvent->event->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <img src="{{ asset($attendEvent->event->img) }}" alt="business city" class='img-fluid card-img-top'>
                                    <div class="modal-body">
                                        <p class="card-text">{{ $attendEvent->event->intro }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                        <form method='post' action='{{ route('event.leave') }}'>
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $attendEvent->event->id }}">
                                            <button type="submit" class="btn btn-danger">このイベントから退会</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ $attendEvent->event->startTime }} - {{ $attendEvent->event->finishTime }}
                                </small>
                            </p>
                        </div>
                    @endforeach
                </div>
                {{-- <a class="btn btn-info btn-lg text-white" href="{{ route('event.index') }}" role="button">+ 他のイベントを見る</a> --}}
                </div>
        </div>
    </div>


</div>

@endsection
