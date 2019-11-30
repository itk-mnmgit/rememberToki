@extends('layouts.app')

@section('title', 'thanks')


@section('content')

{{-- 質問１これはつけた方がいいのかデザイン崩れるdiv class="container-fluid" --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row no gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" >
                    <div class="col p-4 d-flex flex-column position-static text-center">
                        <strong class="inline-block  text-primary">プロフィールをもっと追加しよう！
                        <a class="btn btn-lg text-primary" href="{{ route('getMine') }}" role="button">skip▶︎▶︎</a></strong>
                        <p class="card-text mb-auto">写真を追加して、あなたのことをもっと他のメンバーに知ってもらおう</p>
                        {{-- 質問２ skip右に移動さしたい --}}
                    {{-- アイコン入れる --}}
                        {{--イツキ質問 １,自己紹介データベースに保存？  --}}
                            <div class="form-group">
                                    <label for="exampleInputPassword1">自己紹介を追加しましょう
                                        <form method="post" action="sample.cgi">
                                            <textarea name="intro" rows="4" cols="120" class="col p-4 d-flex flex-column position-static text-center"></textarea><br>
                                                <input type="submit" value="登録">
                                        </form>
                                    </label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">近くの友達を見つけよう</label>
                                <form>
                                        <SELECT NAME="place">
                                        <OPTION SELECTED>お住まいの地域
                                        <OPTION VALUE="CEBU">CEBU
                                        <OPTION VALUE="Japan">Japan
                                        <OPTION VALUE="Korea">Korea
                                        <OPTION VALUE="China">China
                                        </SELECT>
                                </form>
                            </div>
                                <a class="btn btn-success btn-lg text-white" href="{{ route('getMine') }}" role="button">はじめる</a>
                    </div>
                </div>
            </div>
    </div>
</div>



<h1>introのところとUIお願いします</h1>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('プロフィールを登録') }}</div>

                    <div class="card-body">
                        {{-- enctype="multipart/form-data" : 画像送れるようにする --}}
                        <form method="POST" action="{{ route('postMine') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">写真</label>

                                <div class="col-md-6">
                                    {{-- デバッグの時だるいから今だけrequired外してます --}}
                                    {{-- <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required> --}}
                                    <input id="picture" type="file" class="form-control3{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="img" >
                            {{-- cssでform-control絡んでるから変更 --}}
                                    @if ($errors->has('picture'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('picture') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        登録
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
