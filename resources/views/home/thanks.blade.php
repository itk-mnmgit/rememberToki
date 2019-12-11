@extends('layouts.app')

@section('title', 'thanks')


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
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <input id="img" type="file" class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" required>
                                    @if ($errors->has('img'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('img') }}</strong>
                                        </span>
                                    @endif
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
