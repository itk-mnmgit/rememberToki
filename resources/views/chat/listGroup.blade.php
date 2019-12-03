@extends('layouts.app')

@section('title', 'listGroup')

@section('content')

{{-- グループ一覧画面 --}}
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h3>興味・関心のある分野を選択してください</h3>
    </div>
  </div>
</div>

<div class="container form-group row justify-content-md-center">
  <div class="col-md-5">
    <select class="form-control" id="exampleFormControlSelect1">
      <option>スポーツ</option>
      <option>飲食</option>
      <option>学習</option>
      <option>アウトドア</option>
      <option>その他</option>
    </select>
  </div>
  
  <div class="col-md-4">
    <a class="btn btn-success btn-lg text-white" href="{{ route('chat.makeGroup') }}" role="button">新規グループ作成</a>
  </div>

</div>


{{-- グループカード表示 --}}
<div class="container mt-5">
  <div class="row">
    @for ($i = 0; $i < 12; $i++)

    <div class="card mb-3 col-md-4" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="{{ asset('image/homefootball.jpg') }}" class="card-img group-img rounded-circle" alt="football">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Cebu FC</h5>
            <p class="card-text">このグループは2週間に一度フットサルをします！セブでフットサルに興味のある方は一緒に汗を流しましょう！</p>
            <a href="#" class="btn btn-primary">詳細</a>
          </div>
        </div>
      </div>
    </div>

    @endfor

  </div>
</div>



@endsection