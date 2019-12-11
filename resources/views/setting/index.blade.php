@extends('layouts.app')

@section('title', 'setting')

@section('custom_js')
    <script src="{{ asset('js/croppie.js') }}" defer></script>
    <script src="{{ asset('js/event-cropper.js') }}" defer></script>
@endsection

@section('custom_css')
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
    <link href="{{ asset('css/event-cropper.css') }}" rel="stylesheet">
@endsection

@section('content')

<h1>プロフィール変更画面</h1>
<a class="btn btn-primary btn-lg text-white" href="{{ route('setting.help') }}" role="button">help画面に移動するボタン</a>

<div class="container">
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $message)
                    <li class="alert alert-danger">{{$message}}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('event.confirm') }}" enctype="multipart/form-data">
            @csrf
    {{-- 表示中央上部 --}}
    <div class="py-5 text-center">
            {{-- <img class="d-block mx-auto mb-4" src="" alt width="72" height="72"> --}}
                <h1 class="card-header text-white bg-primary">プロフィールを変更しよう!</h1><br>
        </div>

    {{-- 右上・上部 --}}
    {{-- イベント表紙の写真選択 --}}
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class>プロフィール写真変更</span>
                </h4>

    {{-- ファイル選択 --}}
                <input id="picture" type="file" class="input-file form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required>
                @if ($errors->has('picture'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('picture') }}</strong>
                    </span>
                @endif

                <img id="cropped-img" src="{{ old('base64') }}" alt="" style="width: 100%">
                <textarea id="base64" name="base64" style="display: none"></textarea>

    {{-- 画像加工用モーダル開始 --}}
                <div class="modal fade" id="cropper-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel"></h4>
                            </div>
                            <div class="modal-body">
                                <div id="upload-demo" class="js-croppie center-block">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
                                <button type="button" id="cropImageBtn" class="btn btn-primary crop">切り取る</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- 左側記入欄 --}}
            <div class="col-md-8 order-md-1">

                <div class="form-group">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">氏名</label>
                        <div class="col-sm-8">
                            <input type="text" autofocus class="form-control" id="name" value="{{ $user->name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">メールアドレス</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label">パスワード</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="password" placeholder="新しいパスワードを入力">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label">性別</label>
                        <input type="radio" name="gender" id="gender" {{ old('gender') ? 'checked' : '' }} value='1' class="ml-4">
                        <label class="mr-3" for="gender">
                            {{ __('男性') }}
                        </label>
                        <input type="radio" name="gender" id="gender-woman" {{ old('gender') ? 'checked' : '' }} value='2'>
                        <label for="gender-woman">
                            {{ __('女性') }}
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group row">
                        <label for="age" class="col-sm-4 col-form-label">年齢</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="password" value="{{ $user->email }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label">住所</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" value="{{ $user->address }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group row">
                        <label for="occupation" class="col-sm-4 col-form-label">職業</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="occupation" value="{{ $user->occupation }}">
                        </div>
                    </div>
                </div>

    {{-- 紹介文 --}}
                <div class="form-group">
                    <div class="form-group row">
                        <label for="intro" class="col-sm-4 col-form-label">紹介文</label>
                        <div class="col-sm-8">
                                <textarea name="intro" rows="4" cols="120" class="col p-2 d-flex flex-column position-static">{{ old('intro') }}</textarea>
                            </div>
                    </div>
                </div>


    {{-- 変更ボタン --}}
        <div class="row-2">
            <div class="col-md-12">
                <div class="form-group mb-5 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('変更') }}
                        </button>
                </div>
            </div>
        </div>
    </form>
</div>



@endsection