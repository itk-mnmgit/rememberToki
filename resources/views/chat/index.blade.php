@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')
{{-- サイドバーを表示する --}}
<div class="sidebar bg-primary">
    <h5>グループ</h5>
        @foreach($attendGroups as $attendGroup)
{{-- グループ一覧 --}}
            <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
        @endforeach
        <a class="btn btn-primary btn-lg text-white" href="{{ route('chat.listGroup') }}" role="button">＋ グループを追加する</a>
    <h5>ダイレクトメッセージ</h5>
{{-- DM一覧 --}}
    @for ($i = 0; $i < 3; $i++)
        <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">メンバーの名前</a>
    @endfor
    <a class="btn btn-primary btn-lg text-white" href="" role="button">＋ メンバーを招待する</a>
</div>
{{-- イベントのバーを表示する --}}
<div class="eventbar bg-primary">
    <h3>参加予定のイベント</h3>
    @foreach ($attendEvents as $attendEvent)
{{-- イベントカード --}}
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ asset($attendEvent->event->img) }}" class="card-img event-img" alt="football">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $attendEvent->event->name }}</h5>
                        <p class="card-text">{{ $attendEvent->event->intro }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{ $attendEvent->event->id}}">詳細</button>
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
                                        <form method='post' action='{{ route('event.attend') }}'>
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $attendEvent->event->id }}">
                                            <button type="submit" class="btn btn-success">このイベントに参加</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- modal 終わり --}}
                        <p class="card-text">
                            <small class="text-muted">{{ $attendEvent->event->startTime->format('M, d/Y') }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <a class="btn btn-primary btn-lg text-white" href="{{ route('event.index') }}" role="button">+ 他のイベントを見る</a>
</div>
{{-- チャットの大きな部分を表示する --}}
<div class="chat">
    <p>ここにチャットが表示されるよー</p>
    <div class="form-group">
        <textarea id="body" class="form-control" name="body">{{old('body')}}</textarea>
    </div>
</div>
@endsection
