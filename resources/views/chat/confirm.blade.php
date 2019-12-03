@extends('layouts.app')

@section('title', 'confirm')

@section('content')

<h1>chat/confirm</h1>

<h1>作成画面で入力したやつ表示させてます。</h1>
<label>間違いないですか的な</label>
<p>name : {{$group->name}}</p>
<p>genre_id : {{$group->genre_id}}</p>
<p>user_id : {{$group->user_id}}</p>
<p>img : {{$group->img}}</p>
<p>intro : {{$group->intro}}</p>
<p>date</p>

<a class="btn btn-primary btn-lg text-white" method='post' href="{{ route('chat.make') }}" role="button">OK</a>
<a class="btn btn-primary btn-lg text-white" method='get' href="{{ route('chat.makeGroup') }}" role="button">戻る</a>


@endsection