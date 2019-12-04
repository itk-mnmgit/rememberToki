@extends('layouts.app')

@section('title', 'confirm')

@section('content')
<h1>作成画面で入力したやつ表示させてます。</h1>
<label>間違いないですか的な</label>
<p>name : {{$event->name}}</p>
<p>genre_id : {{ $genre->name }}</p>
<p>user_id : {{ $user->name }}</p>
<p>img : <img  src="{{ asset($event->img) }}" width="128" height="128" alt="eventIcon"></p>
<p>intro : {{ $event->intro}}</p>
<p>date : {{ $event->startTime->format('M, d/Y') }}</p>

<form  method='post' action="{{ route('event.make') }}">
    @csrf
    <input class="btn btn-primary btn-lg text-white" type='submit' value='OK'>

</form>
<a class="btn btn-primary btn-lg text-white" method='get' href="javascript:history.back()" role="button">戻る</a>


{{-- <p>{{$event->startTime}}</p> --}}




@endsection