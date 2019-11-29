@extends('layouts.app')

@section('title', 'mypage')


@section('content')


<h1>mypageやで〜</h1>
<a class="btn btn-primary btn-lg text-white" href="{{ route('getGroup') }}" role="button">グルー日追加画面に移動するボタン</a>


@endsection
