@extends('layouts.app')

@section('title', 'thanks')

@section('custom_js')
<script src="{{ asset('js/croppie.js') }}" defer></script>
<script src="{{ asset('js/event-cropper.js') }}" defer></script>
@endsection

@section('custom_css')
<link href="{{ asset('css/croppie.css') }}" rel="stylesheet">
<link href="{{ asset('css/event-cropper.css') }}" rel="stylesheet">
@endsection


@section('content')

{{-- 質問１これはつけた方がいいのかデザイン崩れるdiv class="container-fluid" --}}
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row no gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static text-center">
                    <strong class="inline-block">プロフィールをもっと追加しよう！</strong>
                    <a class="btn btn-lg text-primary" href="{{ route('get.chat.index') }}" role="button">skip▶︎▶︎</a>
                    <p class="card-text mb-auto">写真を追加して、あなたのことをもっと他のメンバーに知ってもらおう</p>
                    <div class="card-body">
                        <form method="POST" action="{{ route('post.chat.index') }}" enctype="multipart/form-data">
                            @csrf
                                   {{-- ファイル選択 --}}
                    <input id="picture" type="file" class="input-file form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture">
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
                            <div class="form-group">
                                <label>自己紹介を追加しましょう</label>
                                <textarea name="intro" rows="4" cols="120" class="col p-4 d-flex flex-column position-static text-center"></textarea>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('登録') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
