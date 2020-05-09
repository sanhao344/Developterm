<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
    </head>
    <body>
        @extends('layouts.home_artist')
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
                    <h3 class="middle-message" align="center">"REART"</h3>
                    <p class="middle-message-sub" align="center">
                        "日本の伝統・文化"<br>
                        "日本人の芸術"<br>
                        "今こそ世界に!"
                    </p>
                </div>
            </div>
            <div class="under-container">
                <h2 class="columns_title" align="center">"New Columns"</h2>
                <div class="columns_container">
                    <div class="items">
                        <h3>
                            <a href="#" target="_blank">
                                "Colume1 芸術との出会い"
                                <span>- 人名 -</span>
                            </a>
                        </h3>
                        <div class="post_date">2020.4.24</div>                                            
                    </div>
                    <div class="items">
                        <h3>
                            <a href="#" target="_blank">
                                "Colume1 芸術との出会い"
                                <span>- 人名 -</span>
                            </a>
                        </h3>
                        <div class="post_date">2020.4.24</div>                                            
                    </div>
                    <div class="items">
                        <h3>
                            <a href="#" target="_blank">
                                "Colume1 芸術との出会い"
                                <span>- 人名 -</span>
                            </a>
                        </h3>
                        <div class="post_date">2020.4.24</div>                                            
                    </div>
                </div>
            </div>
        @endsection

        @include('layouts.footer')
    </body>
</html>