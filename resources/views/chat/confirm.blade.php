@extends('layouts.app')

@section('title', 'confirm')

@section('content')

<h1>chat/confirm</h1>

<h1>作成画面で入力したやつ表示させてます。</h1>
<label>間違いないですか的な</label>
<p>name : {{$group->name}}</p>
<p>genre : {{$genre->name}}</p>
<p>作成者 : {{$user->name}}</p>
<p>img : <img  src="{{ asset($group->img) }}" width="128" height="128" alt="groupIcon"></p>
<p>intro : {{$group->intro}}</p>

<form  method='post' action="{{ route('chat.make') }}">
    @csrf
    <input class="btn btn-primary btn-lg text-white" type='submit' value='OK'>

    <a class="btn btn-primary btn-lg text-white" method='get' href="javascript:history.back()" role="button">戻る</a>


@endsection