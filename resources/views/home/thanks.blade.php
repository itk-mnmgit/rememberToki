@extends('layouts.app')

@section('title', 'thanks')


@section('content')


<h1>登録完了！</h1>

<h1>さらに登録しますか？</h1>

<a class="btn btn-primary btn-lg text-white" href="{{ route('get.chat.index') }}" role="button">あとで</a>

<h1>画像選択だけ入れてます</h1>
<h1>introのところとUIお願いします</h1>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        {{-- enctype="multipart/form-data" : 画像送れるようにする --}}
                        <form method="POST" action="{{ route('post.chat.index') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="picture" class="col-md-4 col-form-label text-md-right">Profile Picture</label>

                                <div class="col-md-6">
                                    {{-- デバッグの時だるいから今だけrequired外してます --}}
                                    {{-- <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required> --}}
                                    <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="img" >

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
                                        登録！
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
