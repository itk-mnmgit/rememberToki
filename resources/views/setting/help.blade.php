@extends('layouts.app')

@section('title', 'help')

@section('content')

<body>
        <div class="container mt-2 mb-2">
        <h1>設定変更フォーム</h1>
        <form method="POST" action="check.php">
            {{-- <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">お名前</span>
                </div>
                <input type="text" class="form-control" placeholder="姓" name="familyname" required>
                <input type="text" class="form-control" placeholder="名" name="lastname" required>
            </div> --}}
            {{-- <br> --}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">E-mail adress</span>
                </div>
                <input type="email" class="form-control" name="email" required>
            </div>

            <div class="input-group mb-3">
                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('') }}</label> --}}

                    <div class="input-group-prepend">
                            <span class="input-group-text">パスワード</span>
                    </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autofocus>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
            </div>
            
            {{-- <input type="checkbox" name="checkmail" value=true>
            <label>予約日前日にも確認メッセージを希望します</label>
            <br> --}}
            {{-- <div> --}}
                {{-- <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="checkcontent[]" value="カット" checked>
                        </div>
                    </div>
                    <div type="text" class="form-control">カット</div>

                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="checkcontent[]" value="カラー">
                        </div>
                    </div>
                    <div type="text" class="form-control" >カラー</div>

                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="checkcontent[]" value="パーマ">
                        </div>
                    </div>
                    <div type="text" class="form-control">パーマ</div>

                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="checkcontent[]" value="縮毛矯正">
                        </div>
                    </div>
                    <div type="text" class="form-control">縮毛矯正</div>

                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="checkcontent[]" value="白髪染め">
                        </div>
                    </div>
                    <div type="text" class="form-control">白髪染め</div>

                </div>
                <br>
            </div>
    
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01 inputGroupSelect02">日にち</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01" name="reservemonth" required>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                </select>
                <select class="custom-select" id="inputGroupSelect02" name="reservedate" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
    
            <div class="mb-3">
                <button type="button" class="btn btn-outline-secondary" disabled>予約可能時間を確認</button>
            </div>
    
        <div class="input-group mb-3">
                <div class="input-group-prepend">
                        <label class="input-group-text">時間</label>
                    </div>
                <input type="time" class="form-control" name="reservetime" min="09:00" max="19:00" step="1800" required>
        </div> --}}
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