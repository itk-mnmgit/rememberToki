@extends('layouts.app')

@section('title', 'confirm')

@section('content')
<h1>作成画面で入力したやつ表示させてます。</h1>
<label>間違いないですか的な</label>
<p>name : {{$event->name}}</p>
<p>genre_id : {{$event->genre_id}}</p>
<p>user_id : {{$event->user_id}}</p>
<p>img : {{$event->img}}</p>
<p>intro : {{$event->intro}}</p>
<p>date</p>

<a class="btn btn-primary btn-lg text-white" method='post' href="{{ route('event.make') }}" role="button">OK</a>
<a class="btn btn-primary btn-lg text-white" method='get' href="{{ route('event.makeEvent') }}" role="button">戻る</a>


{{-- <p>{{$event->startTime}}</p> --}}
<div class="">
    <p>問題点</p>
    <ul>
        <li>genre_id から genre_name 出したい</li>
        <li>user_id から user_name(作成者) 出したい</li>
        <li>img がpath表示されちゃう</li>
        <li>startTime の date/time 表示させようと思ったらDBにdate/timeあった方が楽？</li>
        <li>confirm 画面からどーやってDBに登録する？</li>
        <li>戻る ボタンで戻れるけど入力されてたのが消える</li>
        <li>画像サイズ大きいとエラー吐く</li>

</div>




@endsection