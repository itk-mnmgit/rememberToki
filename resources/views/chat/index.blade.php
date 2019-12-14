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
            <h5 class="title">&ensp;&ensp;&ensp;&ensp;&ensp;{{ $attendEvent->event->name}}</h5>
        </li>
        @endforeach
    </ul>
</div>

    {{-- 中央・チャット --}}
    <div class="content-container">
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>ここにチャットが表示されるよー</h1>
                <p>You can see CHAT. Since it is currently being adjusted, please wait a little ...</p>
                <p>See you later.....</p>
                <div class="form-group">
                     <textarea id="body" class="form-control" name="body">{{old('body')}}</textarea>
                </div>
            </div>
        </div>
    </div>


@endsection
