@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- サイドバーを表示する --}}
<div class="sidebar bg-primary">

  @for ($i = 0; $i < 3; $i++)
  {{-- グループ一覧 --}}

  @endfor
  <a class="btn btn-primary btn-lg text-white" href="{{ route('chat.listGroup') }}" role="button">グループを追加する
  </a>
  <button type="button" class="btn light rounded-circle p-0" style="width:2rem;height:2rem;">＋</button>
</div>

{{-- イベントのバーを表示する --}}
<div class="eventbar bg-primary">
  <h3>参加予定のイベント</h3>

  @for ($i = 0; $i < 3; $i++)

  {{-- イベントカード --}}
  <div class="card mb-3" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{ asset('image/homefootball.jpg') }}" class="card-img event-img" alt="football">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">フットサル大会</h5>
            <p class="card-text">メトロスポーツセンターでフットサル大会を開催します！みんなで汗を流しましょう！</p>
            <p class="card-text"><small class="text-muted">12月14日 16:00 - 20:00</small></p>
          </div>
        </div>
      </div>
    </div>

  @endfor

  <a class="btn btn-primary btn-lg text-white" href="{{ route('event.index') }}" role="button">他のイベントを見る
  </a>
  </div>

{{-- チャットの大きな部分を表示する --}}
<div class="chat">
  {{-- <p>ここにチャットが表示されるよー</p> --}}

</div>

<h1>mypageやで〜</h1>
<a class="btn btn-primary btn-lg text-white" href="{{ route('chat.listGroup') }}" role="button">グループ一覧画面に移動するボタン</a>
<a class="btn btn-primary btn-lg text-white" href="{{ route('event.index') }}" role="button">イベント一覧画面に移動するボタン</a>


@endsection
