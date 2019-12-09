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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="crop-card">
                <div class="card-header">グループ作成</div>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $message)
                            <li class="alert alert-danger">{{$message}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('chat.confirm') }}" enctype="multipart/form-data">
                        @csrf
{{-- グループ名 --}}
                        <div class="form-group row">
                            <label>グループ名を追加しましょう</label>
                            <div class="col-md-6  offset-md-4">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder='グループ名'>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
{{-- ジャンル --}}
                        <div class="form-group row">
                            <label>ジャンルを追加しましょう</label>
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    @foreach($genres as $genre)
                                        <input class="form-check-input" type="radio" name="genre_id" id="{{ $genre->id }}" {{ old('genre') ? 'checked' : '' }} value='{{ $genre->id }}'>
                                        <label class="form-check-label mr-5" for="{{ $genre->name }}">{{ $genre->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
{{-- アイコン --}}
                        <div class="form-group row">
                            <label>アイコンを追加しましょう</label>
                            <div class="col-md-6 offset-md-4">
                                <input id="picture" type="file" class="input-file form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required>
                                @if ($errors->has('picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('picture') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <img id="cropped-img" src="" alt="" style="width: 60%">
{{-- 画像加工用モーダル開始 --}}
                        <div class="modal fade" id="cropper-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
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
                        </div>
{{-- 紹介文 --}}
                        <div class="form-group row">
                            <label>グループ紹介文を追加しましょう</label>
                            <div class="form-group">
                                <textarea name="intro" rows="4" cols="120" class="col p-4 d-flex flex-column position-static text-center"></textarea>
                            </div>
                        </div>
{{-- 登録ボタン --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('登録') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection