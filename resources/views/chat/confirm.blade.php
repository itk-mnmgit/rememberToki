@extends('layouts.app')

@section('title', 'confirm')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="crop-card">
                <div class="card-header">
                    以下の入力内容でよろしいですか？
                </div>
                <form action="{{ route('chat.make') }}" method="post" class="form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 control-label">名前：</label>
                        <div class="col-sm-10">{{ $group->name }}</div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 control-label">ジャンル：</label>
                        <div class="col-sm-10">{{  $genre }}</div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 control-label">作成者：</label>
                        <div class="col-sm-2">{{ $user }}</div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 control-label">イメージ画像：</label>
                        <div class="col-sm-2">
                            <img  src="{{ asset($group->img) }}" width="128" height="128" alt="groupIcon">
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 control-label">紹介文：</label>
                        <div class="col-sm-2">{{ $group->intro }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input class="btn btn-primary btn-lg text-white" type='submit' value='OK'>
                            <a class="btn btn-primary btn-lg text-white" method='get' href="javascript:history.back()" role="button">戻る</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection