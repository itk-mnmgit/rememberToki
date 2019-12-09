@extends('layouts.app')

@section('title', 'help')

@section('content')

<body>
        <div class="container mt-2 mb-2">
        <h1>設定変更フォーム</h1>
        <form method="POST" action="check.php">
            
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">新メールアドレス</span>
                </div>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="input-group mb-3">
                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                    <div class="input-group-prepend">
                            <span class="input-group-text">新パスワード</span>
                    </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
            </div>
           
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">自己紹介</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" name="inquery"></textarea>
            </div>
            <br>

            <div>
                <input type="checkbox" required>
                <label>入力内容に間違いはありません</label>
            </div>
              <br>
            <input type="submit" value="変更">
        </form>
    </div>

@endsection