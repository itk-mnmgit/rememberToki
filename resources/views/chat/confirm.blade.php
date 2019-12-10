@extends('layouts.app')

@section('title', 'confirm')

@section('content')


{{-- public function confirmGroup(Request $request)
{
    $group = new Group();

    $imgPath = $this->saveProfileImage($request->img);

    $group->name = $request->name;
    $group->genre_id = $request->genre_id;
    $group->user_id = Auth::user()->id;
    $group->img = $imgPath;
    $group->intro = $request->intro;

    $genre = Genre::find($group->genre_id);
    $user = User::find($group->user_id);

    $request->session()->put('group', $group);

    return view('chat.confirm', ['group' => $group, 'genre' => $genre, 'user' => $user]);
} --}}




<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="crop-card">
                <div class="card-header">
                    グループ作成
                </div>
                <form action="{{ route('chat.confirm') }}" method="post" class="form-horizontal">
                    <div class="row">
                        <label class="col-sm-2 control-label" for="username">名前：</label>
                        <div class="col-sm-10">{{ $group->name }}</div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 control-label" for="mail">ジャンル：</label>
                        <div class="col-sm-10">{{  $genre }}</div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 control-label" for="age">作成者：</label>
                        <div class="col-sm-2">{{ $user }}</div>
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
</div>ß

{{-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa --}}

<h1>chat/confirm</h1>

<h1>作成画面で入力したやつ表示させてます。</h1>
<label>間違いないですか的な</label>
<p>name : {{$group->name}}</p>
<p>genre : {{$genre->name}}</p>
<p>作成者 : {{$user->name}}</p>
<p>img : <img  src="{{ asset($group->img) }}" width="128" height="128" alt="groupIcon"></p>
<p>intro : {{$group->intro}}</p>

<form  method='post' action="{{ route('chat.make') }}">
    @csrf
    

@endsection