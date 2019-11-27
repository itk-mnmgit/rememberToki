<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- cssフォルダー (app,style,bootstrap)-->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>CPIC</title>
</head>
<body>
        <!-- header -->
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 border-bottom shadow-sm bg-primary">
                <h5 class="my-0 mr-md-auto font-weight-normal  text-white" > CPIC</h5>
                <a class="btn btn-outline-primary mx-3 text-white" href="">ログイン</a>
                <!-- href=""ララベルでいける -->
                <a class="btn btn-outline-primary text-white" href="">登録</a>
              </div>
        <!-- headerここまで OK-->

     <!-- ここからホームページのメイン画面 -->
     <div class="main">
         <div class="bg-image" style="background-image: url({{ asset('image/homebackground.jpg') }})">
              <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 d-flex flex-column justify-content-center">
                        <h3 class="display-4-1 text-black">最高に『ワクワクする出会い』を</h3>
                        <h1 class="display-4-2 text-black">Connect People In Cebu</h1>
                  </div>
                  <div class="col-md-4 d-flex flex-column justify-content-center">

                        <p class="right">セブで『仲間』を見つけよう</p>
                        <hr class="my-4">
            
                        <p>同じ趣味、関心を持った仲間たちとチャットを始めよう</p>
                        <p>仲良くなって一緒にイベントを開催しよう</p>
                        <p>CPICをはじめよ</p>
                  
                  <div class="col-md-4 d-flex align-items-center">
                        <a class="btn btn-primary btn-lg text-white" href="#" role="button">アカウント作成</a>
                        <a class="btn btn-primary btn-lg text-white" href="#" role="button">ログイン</a>
                  </div>
                  </div>
                  </div>

              </div>
         </div>

     </div>

        <!-- content画面 -->
        <div class="contents"></div>
            <p>さっそくイベントに参加してみる</p>
            <p>仲間がもうすぐ開催する開催するイベントを見てみよう。</p>









            <!-- CEBU CAPCEBU CAP開催
            金晩だ！華金だ！セブのお酒好き集まれ！美味しい日本食居酒屋で飲みましょう！！あれ？イツキさんやれてなくね？
            ILAND HOPPING
            Laravel勉強会
            ストバス＠MangoStreet
            セブのカメラ好き集合
            カジノ行きたくね？
            セブ留学生でBBQ -->


<!-- footer -->
    <div class="footer">
        <p>CPIC</p>
    </div>
</body>
</html>