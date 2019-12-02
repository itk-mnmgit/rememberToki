@extends('layouts.app')

@section('title', 'mypage')


@section('content')


<h1>mypageやで〜</h1>
<a class="btn btn-primary btn-lg text-white" href="{{ route('home.listGroup') }}" role="button">グループ追加画面に移動するボタン</a>
<a class="btn btn-primary btn-lg text-white" href="{{ route('event.index') }}" role="button">イベント一覧画面に移動するボタン</a>


@endsection
