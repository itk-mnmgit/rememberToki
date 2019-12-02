@extends('layouts.app')

@section('title', 'listGroup')

@section('content')

<h1>chat/listGroup</h1>
<a class="btn btn-primary btn-lg text-white" href="{{ route('chat.makeGroup') }}" role="button">グループ追加画面に移動するボタン</a>

@endsection