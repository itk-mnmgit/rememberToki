<!-- layout.blade.phpを読み込む -->
@extends('layouts.app')

@section('title', '一覧')

@section('content')

<!-- feature -->
<div class="container mt-5">
    <h2>FEATURE</h2>
    <div class="row">

      <div class="col-md-4 mb-3">
        <div class="card" id="highreliability">
            <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
            <title>Placeholder</title>
          <div class="card-body">
            <h5 class="card-title">HIGH RELIABILITY</h5>
            <p class="card-text">Since our founding in 2015, we have worked with over 1,000 clients and all of them have been satisfied. These actual results are regarded as highly reliable. </p>
            <a href="#" class="btn btn-primary">See more</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4 mb-3">
        <div class="card" id="punctuality">
          <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid card-img-top'>
          <title>Placeholder</title>
          <div class="card-body">
            <h5 class="card-title">PUNCTUALITY</h5>
            <p class="card-text">In general, what is said to be the most important thing in business is punctuality. We have worked with a lot of clients so far but have never missed deadlines.</p>
            <a href="#" class="btn btn-primary">See more</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
      <div class="col-md-4">
        <div class="card" id="strategies">
          <img src="{{ asset('image/homefootball.jpg') }}" alt="business city" class='img-fluid rrcard-img-top'>
          <title>Placeholder</title>
          <div class="card-body">
            <h5 class="card-title">STRATEGIES</h5>
            <p class="card-text">We don't do unliateral work. We listen to clients' offers and provide the highest quality. Excellent consultants will listen to your requests and make the best strategy.</p>
            <a href="#" class="btn btn-primary">See more</a>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
    </div>
  </div>
<!-- featureここまで -->

@endsection