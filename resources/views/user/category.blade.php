<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Top</title>
    </head>
    <body>
        @extends('layouts.user')
        @section('title', 'トップ画面')

        @section('content')
        @include('layouts.sidebar')
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h1>Reart 芸術をもう一度</h1>
                        <!-- コンテンツ ここから -->  
                        <h2>商品カテゴリ1の商品詳細分類1 [商品掲載サンプル]</h2> 

                        @if (count($list) > 0)
                            <br>
                            <ul class="ul-list-02">
                                @foreach ($list as $category)
                                    <!-- 商品情報 -->
                                    <!-- TODO:商品詳細ページ作成後に遷移先を追記する -->
                                    <!-- TODO:labelタグなどで商品名と価格を追記する -->
                                    <li>  
                                        <dl>  
                                            <dt><a href="/artist/works/cteate"><img src="/storage/image/{{ $category->image_path}}" type="image/jpeg" alt="画像" width="250px" height="200px" /></a></dt>  
                                            <dd>商品名：{{ $category->name}}</dd>  
                                            <dd>商品価格：&yen;{{ $category->price}}</dd>
                                            <dd><a href="#">商品詳細ページ</a></dd>  
                                            <dd><a href="#"><img src="cart.jpg" alt="ショッピングカート" width="" height="" /></a></dd> 
                                        </dl>  
                                    </li>  
                                    <!-- // 商品情報 -->
                                @endforeach
                            </ul>
                        @else
                            <br>
                            <p>カテゴリがありません。</p>
                        @endif
                    </div>
                </div>
            </div>
        @endsection

        @include('layouts.footer')
    </body>
</html>