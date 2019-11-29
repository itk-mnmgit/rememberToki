@extends('layouts.app')

@section('title', 'thanks')


@section('content')


<div class="row mb-2">
    <div class="col-md-6">
        <div class="row no gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">ありがとうございました。</strong>
                <h3 class="mb-0">登録完了しました！</h3>
                <p class="card-text mb-auto">次は、プロフィール写真を追加しましょう。</p>
            </div>
        </div>
</div>

</div>
{{-- <div class="thanks-main">
        <div class="bg-image" style="background-image: url({{ asset('image/thanksimg.jpeg') }})">
          <div class="row">
              <div class="col-md-4"></div>
                    <div class="col-md-4 d-flex flex-column justify-content-center">
                    <p class="display-4-1 text-black">登録完了しました！</p>
                    <p class="display-4-1 text-black">さらに登録しますか？</p>
                    </div> --}}

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
                                <a class="btn btn-primary btn-lg text-white" href="{{ route('getMine') }}" role="button">あとで</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
