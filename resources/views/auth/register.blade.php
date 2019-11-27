@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- 新規アカウント作成画面 --}}
            <div class="card">
                <div class="card-header">{{ __('アカウント作成') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        {{-- ユーザー名 --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- メールアドレス --}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- パスワード --}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- 性別 --}}
                        <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="sex" id="gender" {{ old('gender') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="gender">
                                            {{ __('男性') }}
                                        </label>

                                        <input class="form-check-input" type="checkbox" name="sex" id="gender-woman" {{ old('gender') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="gender-woman">
                                            {{ __('女性') }}
                                        </label>
                                    </div>
                                </div>
                        </div>
                        
                        {{-- 年齢 --}}
                        <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('年齢') }}</label>
    
                                <div class="col-md-6">
                                    <input id="age" type="age" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required>
    
                                    @if ($errors->has('age'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('age') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- 職業 --}}
                        <div class="form-group row">
                                <label for="worker" class="col-md-4 col-form-label text-md-right">{{ __('職業') }}</label>
                                <div class="col-md-6">
                                    <input id="worker" type="worker" class="form-control{{ $errors->has('worker') ? ' is-invalid' : '' }}" name="worker" value="{{ old('worker') }}"required>

                                    @if ($errors->has('worker'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('worker') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        {{-- 興味関心 --}}
                        <div class="form-group row">
                            <label for="habit" class="col-md-4 col-form-label text-md-right">{{ __('あなたの興味・関心') }}</label>

                            <div class="col-md-6">
                                <input id="habit" type="habit" class="form-control{{ $errors->has('habit') ? ' is-invalid' : '' }}" name="habit" value="{{ old('habit') }}"required>

                                @if ($errors->has('habit'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('habit') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>

                           {{-- 住所--}}
                           <div class="form-group row">
                                <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>
                                <div class="col-md-6">
                                    <input id="adress" type="adress" class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" name="adress" value="{{ old('adress') }}"required>

                                    @if ($errors->has('adress'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('adress') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>




                        {{-- 登録ボタン --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
@endsection
