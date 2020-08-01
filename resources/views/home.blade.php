<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
    </head>
    <body>
        @extends('layouts.home')
        @section('title', 'ホーム画面')

        @section('content')
            <div class="top-container">
                <div class="top-wrapper">
                    <h3 class="top-message">REART</h3>
                    <h4 class="top-message-sub">「芸術をもう一度」</h4>
                </div>
            </div>
            <div class="middle-container">
                <div class="middle-wrapper">
                    <h3 class="middle-message" align="center">"REARTの思い"</h3>
                    <p class="middle-message-sub" align="center">
                    人口減少、グローバル化、自国資源の不足、<br>
                    果たして数年後、数十年後の日本はまだ先進国でいられるだろうか<br>
                    日本が今後も国際競争力を高めて行くこと<br>
                    それがREARTを作った理由です<br>
                    </p>
                </div>
            </div>
            <div class="middle2-container">
                <div class="middle2-wrapper">
                    <h3 class="middle2-message" align="center">"REARTで、できること"</h3>
                    <h5 class="middle2-message" align="center" style="text-decoration: underline">ユーザー会員</h5>
                    <p class="middle-message-sub2" align="center">
                    芸術家・作品のジャンルやランキング順での検索<br>
                    芸術作品の購入<br>
                    お気に入りの芸術家や作品へのいいね<br>
                    </p>
                    <h5 class="middle2-message" align="center" style="text-decoration: underline">芸術家会員</h5>
                    <p class="middle-message-sub2" align="center">
                    芸術家・作品の紹介<br>
                    芸術作品の販売<br>
                    ランキング上位者は海外のコレクターとのコネクション支援<br>
                    </p>
                </div>
            </div>
            <div class="under-container">
                <h2 class="columns_title" align="center">"New Columns"</h2>
                <div class="columns_container">
                    <div class="items">
                        <h3>
                            <a class="colume" href="#" target="_blank">
                                "Colume1 芸術との出会い"
                                <span>- 人名 -</span>
                            </a>
                        </h3>
                        <div class="post_date">2020.4.24</div>                                            
                    </div>
                    <div class="items">
                        <h3>
                            <a class="colume" href="#" target="_blank">
                                "Colume2 日本の芸術の特異さ"
                                <span>- 人名 -</span>
                            </a>
                        </h3>
                        <div class="post_date">2020.5.30</div>                                            
                    </div>
                    <div class="items">
                        <h3>
                            <a class="colume" href="#" target="_blank">
                                "Colume3 今後の日本の芸術の向かう先"
                                <span>- 人名 -</span>
                            </a>
                        </h3>
                        <div class="post_date">2020.7.20</div>                                            
                    </div>
                </div>
            </div>
        @endsection

        @include('layouts.footer')
    </body>
</html>