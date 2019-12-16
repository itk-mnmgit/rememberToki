@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')

<script>
window.Laravel = {};
window.Laravel.user_id = {{ Auth::user()->id }}

</script>


{{-- サイドバーを表示する --}}
{{-- <div class="container-fluid"> --}}
<div class="sidebar-container">
    <div class="sidebar-logo">
            <a class="btn btn-blac text-white" href="{{ route('home.index') }}" role="button">CPIC</a>
    </div>
    <ul class="sidebar-navigation">
        <!-- 1 ,ナビゲーション -->
            <li class="header">グループCHAT</li>
        <!-- 1列目 -->
        <li>
            <a class="btn btn-blac text-white" href="{{ route('chat.listGroup') }}" role="button">＋ グループを追加する</a>
        </li>

        <!-- 2列目 -->
        @foreach($attendGroups as $attendGroup)
        <li>
            <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
        </li>
        @endforeach
        <!-- 2,ナビゲーション -->
        <li class="header">個人CHAT</li>
        <!-- 1個目 -->
        <li>
            <a class="btn btn-black text-white" href="#" role="button">＋ メンバーを招待する</a>
        </li>
        @for ($i = 0; $i < 3; $i++)
        <li>
            <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">○ メンバーの名前</a>
        </li>
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
                <i class="fa fa-tachometer" aria-hidden="true"></i>+ 他のイベントを見る
            </a>
        </li>
        @foreach($attendEvents as $attendEvent)
        <li>
            <a class="nav-link active text-light" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendEvent->event->name }}</a>
        </li>
        @endforeach
    </ul>
</div>

{{-- 中央・チャット --}}
<div class="chat-container">
    <div class="line__container">
        <div class="line__title">
            <div id="title">XD 勉強会</div>
            <div id="member text-center">
                20人
                <i class="fas fa-users fa-lg"></i>
            </div>
        </div>
        <!-- ▼会話エリア scrollを外すと高さ固定解除 -->
        <div class="line__contents scroll">
            @foreach($posts as $post)
                @if($post->user_id != Auth::user()->id)
                    <div class="line__left">
                        <figure>
                            <img  src="{{ $post->user->img }}" alt="userIcon">
                        </figure>
                        <div class="line__left-text">
                        <div class="name">{{$post->user->name }}</div>
                        <div class="text">{{ $post->text }}</div>
                        <span class="date">{{ date('h:m', strtotime($post->sent_time)) }}</span>
                        </div>
                    </div>
                @else
                    <div class="line__right">
                        <div class="text">{{ $post->text }}</div>
                        <span class="date">{{ date('h:m', strtotime($post->sent_time)) }}</span>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="inputFiles text-right">
        <i class="fas fa-camera fa-2x"></i>
        <i class="fas fa-images fa-2x"></i>
    </div>
    <div id="bms_send">
        <textarea id="bms_send_message" placeholder="Shift+Enterで送信はまだできません" autofocus></textarea>
        <input type="submit" value="送信" id="bms_send_btn">
    </div>
</div>



@endsection
