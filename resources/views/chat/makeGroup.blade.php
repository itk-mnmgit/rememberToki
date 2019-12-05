@extends('layouts.app')

@section('title', 'makeGroup')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
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
            <div class="form-group">
              <label for="exampleInputPassword1">アイコンを追加しましょう</label>
              <div class="col-md-6 offset-md-4">
                {{-- デバッグの時だるいから今だけrequired外してます --}}
                {{-- <input id="picture" type="file" class="form-control{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="picture" required> --}}
                  {{-- <input id="picture" type="file" class="item-img file center-block form-control3{{ $errors->has('picture') ? ' is-invalid' : '' }}" name="img" > --}}

                  <label class="cabinet center-block">
                    <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                    <figcaption><i class="fa fa-camera"></i></figcaption>
                    <input type="file" class="item-img file center-block" name="file_photo"/>
            </label>

                  {{-- 画像切り抜き --}}
                  <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel"> </h4>
                        </div>
                        <div class="modal-body">
                          <div id="upload-demo" class="center-block"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                          <button type="button" id="cropImageBtn" class="btn btn-primary">Cortar</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  {{-- cssでform-control絡んでるから変更 --}}
                  @if ($errors->has('picture'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('picture') }}</strong>
                  </span>
                  @endif
                </div>
              </div>

              {{-- 紹介文 --}}
              <div class="form-group">
                <label for="exampleInputPassword1">グループ紹介文を追加しましょう</label>
                <textarea name="intro" rows="4" cols="120" class="col p-4 d-flex flex-column position-static text-center"></textarea>
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