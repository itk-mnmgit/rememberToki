@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- サイドバーを表示する --}}
<div class="sidebar bg-primary text-center">

    <div class="group">
        <h5 class="text-light">グループ</h5>
            @foreach($attendGroups as $attendGroup)

    {{-- グループ一覧 --}}
                <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
            @endforeach
            <a class="btn btn-info text-white" href="{{ route('chat.listGroup') }}" role="button">＋ グループを追加する</a>
    </div>
    <div class="dm">
        <h5 class="text-light">ダイレクトメッセージ</h5>

    {{-- DM一覧 --}}
        @for ($i = 0; $i < 3; $i++)
            <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">メンバーの名前</a>
        @endfor
        <a class="btn btn-info text-white" href="" role="button">＋ メンバーを招待する</a>
    </div>

</div>

{{-- イベントのバーを表示する --}}
<div class="eventbar bg-primary text-center">
    <div class="event">
        <h3 class="text-light">参加予定のイベント</h3>
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
                        {{-- modal 終わり --}}
                            <p class="card-text">
                                <small class="text-muted">{{ $attendEvent->event->startTime->format('M, d/Y') }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <a class="btn btn-info btn-lg text-white" href="{{ route('event.index') }}" role="button">+ 他のイベントを見る</a>
    </div>
</div>

{{-- チャットの大きな部分を表示する --}}
<div class="chat">
    <p>ここにチャットが表示されるよー</p>
    <div class="form-group">
        <textarea id="body" class="form-control" name="body">{{old('body')}}</textarea>
    </div>
</div>

@endsection
