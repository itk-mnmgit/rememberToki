@extends('layouts.app')

@section('title', 'mypage')

@section('custom_css')
<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
@endsection

@section('content')

<script>
window.Laravel = {};
window.Laravel.user_id = {{ Auth::user()->id }}

</script>


{{-- サイドバーを表示する --}}
{{-- <div class="container-fluid"> --}}
<div class="sidebar-container">
    <div class="sidebar-logo">
            <a class="btn btn-blac text-white" href="{{ route('home.index') }}" role="button">CPIC</a>
    </div>
    <ul class="sidebar-navigation">
        <!-- 1 ,ナビゲーション -->
            <li class="header">グループCHAT</li>
        <!-- 1列目 -->
        <li>
            <a class="btn btn-blac text-white" href="{{ route('chat.listGroup') }}" role="button">＋ グループを追加する</a>
        </li>

        <!-- 2列目 -->
        @foreach($attendGroups as $attendGroup)
        <li>
        <a class="nav-link active text-light" id="v-pills-home-tab" href="{{ route('get.chat.index', ['id' => $attendGroup->group->id]) }}"  aria-controls="v-pills-home" aria-selected="true">{{ $attendGroup->group->name }}</a>
        </li>
        @endforeach
        <!-- 2,ナビゲーション -->
        <li class="header">個人CHAT</li>
        <!-- 1個目 -->
        <li>
            <a class="btn btn-black text-white" href="#" role="button">＋ メンバーを招待する</a>
        </li>
        @for ($i = 0; $i < 3; $i++)
        <li>
            <a class="nav-link active text-light" id="v-pills-home-tab"  href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">○ メンバーの名前</a>
        </li>
        @endfor
        </li>
        <!-- 2個目 -->
        <li>
            <a href="{{ url('/setting/index') }}">
                <i class="fa fa-cog" aria-hidden="true"></i> Settings
            </a>
        </li>
        <!-- 3個目 -->
        <li>
            <a href="#">
                <i class="fa fa-info-circle" aria-hidden="true"></i> Information
            </a>
        </li>
        <!-- 3,ナビゲーション -->
        <li class="header">参加予定のイベント</li>
        <li>
            <a href="{{ route('event.index') }}">
                <i class="fa fa-tachometer" aria-hidden="true"></i>+ 他のイベントを見る
            </a>
        </li>
        @foreach($attendEvents as $attendEvent)
        <li>
            <a class="nav-link active text-light" id="v-pills-home-tab" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $attendEvent->event->name }}</a>
        </li>
        @endforeach
    </ul>
</div>

{{-- 中央・チャット --}}
@if(!empty($group))
    <div class="chat-container">
        <div class="line__container">
            <div class="line__title">
                <div id="title">{{ $group->name }}</div>
                <div id="member text-center">
                    {{ $userNum }}人
                    <i class="fas fa-users fa-lg"></i>
                </div>
            </div>
            <!-- ▼会話エリア scrollを外すと高さ固定解除 -->
            <div class="line__contents scroll">
                @foreach($posts as $post)
                    @if($post->user_id != Auth::user()->id)
                        <div class="line__left">
                            <figure>
                                <img  src="{{ $post->user->img }}" alt="userIcon">
                            </figure>
                            <div class="line__left-text">
                            <div class="name">{{$post->user->name }}</div>
                            <div class="text">{{ $post->text }}</div>
                            <span class="date">{{ date('h:m', strtotime($post->sent_time)) }}</span>
                            </div>
                        </div>
                    @else
                        <div class="line__right">
                            <div class="text">{{ $post->text }}</div>
                            <span class="date">{{ date('h:m', strtotime($post->sent_time)) }}</span>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="inputFiles text-right">
            <i class="fas fa-camera fa-2x"></i>
            <i class="fas fa-images fa-2x"></i>
        </div>
        <div id="bms_send">
            <textarea id="bms_send_message" placeholder="Shift+Enterで送信はまだできません" autofocus></textarea>
            <input type="hidden" id="group_id" value="{{ $group->id }}">
            <input type="submit" value="送信" id="bms_send_btn">
        </div>
    </div>

{{-- マイページが表示される場合 --}}
@else
    <div class="chat-container">
        <div class="container">
            <div class="row mx-5 mb-5 pt-4">
                <div class="sns d-block mx-auto">
                    <i class="mx-4 fab fa-facebook-square fa-3x"></i>
                    <i class="mx-4 fab fa-twitter-square fa-3x"></i>
                    <i class="mx-4 fab fa-instagram fa-3x"></i>
                    <i class="mx-4 fab fa-github-square fa-3x"></i>
                </div>
            </div>
            <div class="row">
                <div class="introduction col-md-6 mt-5">
                    <div class="maru-box4">
                        <img src="{{ asset('image/ishiharaharuka.jpg') }}" alt="maru" width="300" class="d-block mx-auto"/>
                    </div>
                    <h3 class="my-3 text-center">Haruka Ishihara</h3>
                    <p class="text-center mx-5">私の名前は石原春花です。はいつぁい！<br>沖縄生まれ沖縄育ち那覇市在住の元気っ子！<br>誰に何を言われようとも自分の意見は曲げません。<br>私は私の道を進むのだー！</p>
                </div>
                <div class="mine col-md-6 mt-5 pt-3">
                    <div class="favorite">
                        <h3>Your Favorite<i class="fas fa-heart"></i></h3>
                        <div class="accordion" id="accordion2" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="heading1">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" class="text-body stretched-link text-decoration-none" href="#collapse1" aria-expanded="true" aria-controls="collapse1"> 友だち </a>
                                    </h5>
                                </div>
                                <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="heading1" data-parent="#accordion2">
                                <div class="card-body">たかさん❤️</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="heading2">
                                    <h5 class="mb-0">
                                        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse2" aria-expanded="false" aria-controls="collapse2"> グループ </a>
                                    </h5>
                                </div>
                                <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="heading2" data-parent="#accordion2">
                                    <div class="card-body">Remember Toki❤️</div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="heading3">
                                    <h5 class="mb-0">
                                        <a class="collapsed text-body stretched-link text-decoration-none" data-toggle="collapse" href="#collapse3" aria-expanded="false" aria-controls="collapse3"> イベント </a>
                                    </h5>
                                </div>
                                <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="heading3" data-parent="#accordion2">
                                    <div class="card-body">サマソニ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="blog mt-5">
                        <h3>ブログ</h3>
                        <ul class="msr_newslist02">
                            <li>
                                <a href="#">
                                <div>
                                <time datetime="2019-12-20">2019.12.21</time>
                                <p class="cpic01">NexSeed</p>
                                </div>
                                <p>みんなとのお別れ。寂しさを超えて。</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <div>
                                <time datetime="2019-12-19">2019.12.19</time>
                                <p class="cpic02">Besty</p>
                                </div>
                                <p>チーム開発最終プレゼンまでの軌跡</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <div>
                                <time datetime="2019-12-13">2019.12.13</time>
                                <p class="cpic01">NexSeed</p>
                                </div>
                                <p>ダブルゆうき生誕祭！カジノで豪遊</p>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                <div>
                                <time datetime="2019-12-11">2019.12.01</time>
                                <p class="cpic02">Besty</p>
                                </div>
                                <p>Besty発足！私たちは爆速で成長します！</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif



@endsection
