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
                        <h2>商品カテゴリ1の商品詳細分類1 [商品掲載サンプル]</h2> 

                        @if (count($works) > 0)
                            <br>
                            <ul class="ul-list-02">
                                @foreach ($works as $work)
                                    <li>  
                                        <dl>  
                                            <dt><a href="/user/show/"><img src="/storage/image/{{ $work->image_path}}" type="image/jpeg" alt="画像" width="250px" height="200px" /></a></dt>  
                                            <dd>商品名：{{ $work->name}}</dd>  
                                            <dd>商品価格：&yen;{{ $work->price}}</dd>
                                            <dd><a href="/user/show?id=$work->id">商品詳細ページ</a></dd>  
                                            <dd><a href="#"><img src="cart.jpg" alt="ショッピングカート" width="" height="" /></a></dd> 
                                            @if (Auth::id() != $work->user_id)
                                                @if (Auth::user()->is_favorite($work->id))
                                                    {!! Form::open(['route' => ['favorites.unfavorite', $work->id], 'method' => 'delete']) !!}
                                                        {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
                                                    {!! Form::close() !!}
                                                @else
                                                    {!! Form::open(['route' => ['favorites.favorite', $work->id]]) !!}
                                                        {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
                                                    {!! Form::close() !!}
                                                @endif
                                                <div class="text-right mb-2">いいね！
                                                    <span class="badge badge-pill badge-success">{{ $work->favorite_users()->count() }}</span>
                                                </div>
                                            @endif 
                                        </dl>  
                                    </li>
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