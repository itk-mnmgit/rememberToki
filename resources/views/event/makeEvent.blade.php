@extends('layouts.app')

@section('title', 'makeGroup')


@section('custom_js')
  <script src="{{ asset('js/croppie.js') }}" defer></script>
  <script src="{{ asset('js/event-cropper.js') }}" defer></script>
@endsection

@section('custom_css')
  <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
  <link href="{{ asset('css/event-cropper.css') }}" rel="stylesheet">
@endsection

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

{{-- 右上・上部 --}}
{{-- イベント表紙の写真選択 --}}
    <div class="row">
        <form method="POST" action="{{ route('event.confirm') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">イベント写真登録</span>
                </h4>
            {{-- ファイル選択 --}}
                <input id="picture" type="file" class="input-file form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required>
                @if ($errors->has('picture'))
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('picture') }}</strong>
                    </span>
                @endif

                <img id="cropped-img" src="" alt="" style="width: 100%">

                {{-- 画像加工用モーダル開始 --}}
                <div class="modal fade" id="cropper-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"> </h4>
                    </div>
                    <div class="modal-body">
                        <div id="upload-demo" class="js-croppie center-block"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" id="cropImageBtn" class="btn btn-primary crop">Cortar</button>
                    </div>
                </div>
            </div>

    {{-- 左側記入欄 --}}
            <div class="row">
                <div class="col-md-8 order-md-1">
                    <div class="form-group">
                        <h4 class ="mb-3">イベント名</h4>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder='イベント名'>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                {{-- ジャンル --}}
                    <div class="form-group">
                        <h4 class ="mb-3 mt-3">ジャンル選択</h4>
                        <div class="form-check">
                            @foreach($genres as $genre)
                                <input class="form-check-input" type="radio" name="genre_id" id="{{ $genre->name }}" {{ old('genre') ? 'checked' : '' }} value='{{ $genre->id }}'>
                                <label class="form-check-label mr-5" for="{{ $genre->name }}">{{ $genre->name }}</label>
                            @endforeach
                        </div>
                    </div>


                {{-- 紹介文 --}}

                    <div class="form-group">
                        <h4 class ="mb-1 mt-5">イベント紹介文を追加しましょう</h4>
                        <div class="form-group">
                            <label for="exampleInputPassword1"></label>
                            <textarea name="intro" rows="4" cols="120" class="col p-2 d-flex flex-column position-static text-center"></textarea>
                        </div>
                    </div>


                {{-- 時間 --}}
                    <div class="form-group">
                            <h4 class="mr-3 mb-3">開始時間</label>
                            <input id="dateStart" type="date" name="dateStart" class="text-center" required>
                            <input id="timeStart" type="time" name="timeStart" class="text-center" required>
                    </div>
                    <div class="form-group">
                        <h4 class="mr-3 mb-3">終了時間</label>
                        <input id="dateFinish" type="date" name="dateFinish" class="text-center" required>
                        <input id="timeFinish" type="time" name="timeFinish" class="text-center" required>
                    </div>
                </div>
            </div>
        {{-- 登録ボタン --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-5">
                        <div class="col-md-4 offset-md-4 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('登録') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection