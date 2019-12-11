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

<div class="container">
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $message)
                <li class="alert alert-danger">{{$message}}</li>
            @endforeach
        </ul>
    @endif
    <div class="py-5 text-center">
        <h1 class="card-header text-white bg-primary">プロフィールを変更する</h1><br>
    </div>

    <div class="row">

        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between mb-3">
                プロフィール写真
            </h4>
            <input id="picture" type="file" class="input-file form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture">
            @if ($errors->has('picture'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('picture') }}</strong>
                </span>
            @endif
            <img id="cropped-img" src="{{ old('base64') }}" alt="" style="width: 100%">

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

        <div class="col-md-8 order-md-1">
            <form action="{{ route('setting.confirmProfile') }}" method="POST" class="form-horizontal">
                @csrf
                <textarea id="base64" name="base64" style="display: none"></textarea>

                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">氏名</span>
                    </div>
                    <input type="text" name="name" autofocus class="form-control  col-9" id="name" value="{{ $user->name }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">メールアドレス</span>
                    </div>
                    <input type="text" name="email" class="form-control  col-9" id="email" value="{{ $user->email }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">パスワード</span>
                    </div>
                    <input type="text" name="password" class="form-control  col-9" id="password" placeholder="新しいパスワードを入力" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">性別</span>
                    </div>
                    <div class="input-group col-9 px-0">
                        <div class="input-group-prepend">
                            <div class="input-group-text col-12">
                                <input type="radio" name="gender" id="man" {{ $user->gender ? 'checked' : '' }} value='1'>
                            </div>
                        </div>
                        <label class="form-control" for="man">男性</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text col-12">
                                <input type="radio" name="gender" id="woman" {{ $user->gender ? 'checked' : '' }} value='2'>
                            </div>
                        </div>
                        <label class="form-control" for="woman">女性</label>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">年齢</span>
                    </div>
                    <input type="number" name="age" class="form-control col-9" id="age" value="{{ $user->age }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">住所</span>
                    </div>
                    <input type="text" name="address" class="form-control col-9" id="address" value="{{ $user->address }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">職業</span>
                    </div>
                    <input type="text" name="occupation" class="form-control col-9" id="occupation" value="{{ $user->occupation }}">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend col-3 px-0">
                        <span class="input-group-text col-12">紹介文</span>
                    </div>
                    <textarea name="intro" rows="4" cols="120" class="col-9 p-2 d-flex flex-column position-static">{{ $user->intro }}</textarea>
                </div>
                <div class="input-group mb-3 d-flex justify-content-center">
                    <a class="btn btn-primary btn-lg text-white mr-5" href="javascript:history.back()">戻る</a>
                    <input class="btn btn-primary btn-lg text-white" type='submit' value='OK'>
                </div>
            </form>
        </div>
    </div>
</div>

<a class="btn btn-primary btn-lg text-white" href="{{ route('setting.help') }}" role="button">help画面に移動するボタン</a>

@endsection