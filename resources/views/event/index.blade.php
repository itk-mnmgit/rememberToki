<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title', '一覧')

@section('content')

<!-- feature -->
<div class="container mt-5">
    <h2>FEATURE</h2>
    <div class="row">

      @foreach($events as $event)
        <div class="col-md-4 mb-3">
          <div class="card" id="highreliability">
              <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
              <title>Placeholder</title>
            <div class="card-body">
              <h5 class="card-title">{{$event->name}}</h5>
              <p class="card-text">Since our founding in 2015, we have worked with over 1,000 clients and all of them have been satisfied. These actual results are regarded as highly reliable. </p>
              <a href="#" class="btn btn-primary">See more</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
<!-- featureここまで -->

@endsection