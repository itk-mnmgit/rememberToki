@extends('layouts.app')

@section('title', 'makeGroup')

@section('content')

<div class="container">
    @if($errors->any())
         <ul>
             @foreach($errors->all() as $message)
            <li class="alert alert-danger">{{$message}}</li>
            @endforeach
         </ul>
    @endif


    {{-- 表示中央上部 --}}
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="" alt width="72" height="72">
        <h1 class="card-header text-primary">イベントを作成しよう</h1>
        <p class="lead">イベント作成画面の詳細を書くならここに書く</p>
    </div>

{{-- <div class="card-body"> --}}
    <form method="POST" action="{{ route('event.confirm') }}" enctype="multipart/form-data">
        @csrf

    {{-- 右上・上部 --}}
    {{-- イベント表紙の写真選択 --}}
        <div class="row justify-content-end">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between justify-content-endmb-3">イベント写真登録</h4>
                    {{-- ファイル選択 --}}
                <div class="col-md-6 offset-md-4">
                    <input id="img" type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" required>
                {{-- cssでform-control絡んでるから変更 --}}
                    @if ($errors->has('img'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('img') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

    {{-- 左側記入欄 --}}
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class ="mb-3">イベント名</h4>
                    {{-- <form class="needs-validation" novalidate> --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder='イベント名'>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ジャンル --}}
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class ="mb-3 mt-3">ジャンル選択</h4>
            {{-- <form class="needs-validation" novalidate> --}}
            {{-- <div class="row">
                    <div class="col-md-6 mb-3"> --}}
                <div class="form-check">
                    @foreach($genres as $genre)
                        <input class="form-check-input" type="radio" name="genre_id" id="{{ $genre->name }}" {{ old('genre') ? 'checked' : '' }} value='{{ $genre->id }}'>
                        <label class="form-check-label mr-5" for="{{ $genre->name }}">{{ $genre->name }}</label>
                    @endforeach
                </div>
                    {{-- </div> --}}
            {{-- </div> --}}
            </div>
        </div>

        {{-- 紹介文 --}}
        <div class="row">
            <div class="col-md-8 order-md-1">
                <h4 class ="mb-1 mt-5">イベント紹介文を追加しましょう</h4>
                <div class="form-group">
                    <label for="exampleInputPassword1"></label>
                    <textarea name="intro" rows="4" cols="120" class="col p-2 d-flex flex-column position-static text-center"></textarea>
                </div>
            </div>
        </div>

        {{-- 開始時間 --}}
        <div class="form-group row">
            <h4 class="mr-3 mb-3">開始時間</h4>
            {{-- <div class="col-md-6 offset-md-4"> --}}
            <input id="date" type="date" name="date" class="text-center" required>
            <input id="time" type="time" name="time" class="text-center" required>
            {{-- </div> --}}
        </div>

        {{-- 登録ボタン --}}
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('登録') }}
                </button>
            </div>
        </div>
    </form>
</div>

@endsection