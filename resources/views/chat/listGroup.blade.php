@extends('layouts.app')

@section('title', 'グループ一覧')

@section('content')

<div class="container mt-3 text-center">

    <h1>参加したいグループを見つけよう</h1>
    <div class="input-group mb-3">
        <form method='get' action='{{ route('group.search') }}'>
            <select class="custom-select" name='selected_genre'>
                    <option value='0'>all</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ isset($_GET['selected_genre']) && $_GET['selected_genre'] == $genre->id ? 'selected' : ''  }}>{{ $genre->name }}
                    </option>
                @endforeach
            </select>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-lg text-white text-align-center">検索</button>
        </span>
        </form>
        <a class="btn btn-success btn-lg text-white col-md-2" href="{{ route('chat.makeGroup') }}" role="button">グループ作成画面</a>
    </div>

    <div class="row">
        @foreach($groups as $group)
            <div class="col-md-3 mb-3">
                <div class="card" id="highreliability">
                    <img src="{{ asset($group->img) }}" alt="business city" class='img-fluid card-img-top'>
                    <div class="card-body">
                    <h5 class="title">{{ $group->name }}</h5>
                    <p class="card-text">{{ str_limit($group->intro, $limit = 50, $end = '…') }}</p>
                <!-- 切り替えボタンの設定 -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$group->id}}">詳細</button>
                <!-- モーダルの設定 -->
                    <div class="modal fade" id="myModal-{{$group->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="title">{{ $group->name}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <img src="{{ asset($group->img) }}" alt="" class='img-fluid card-img-top'>
                                <div class="modal-body">
                                    <p class="card-text">{{ $group->intro }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <form method='post' action='{{ route('group.attend') }}'>
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $group->id }}">
                                        <button type="submit" class="btn btn-success">このイベントに参加</button>
                                    </form>
                                </div><!-- /.modal-footer -->
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->

                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection