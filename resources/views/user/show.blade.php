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

                        <ul class="ul-list-02">
                            <li>  
                                <dl class="row">
                                    <dt><img src="/storage/image/{{ $work_info->image_path}}" type="image/jpeg" alt="画像" width="250px" height="200px" /></dt>
                                    <dt class="col-md-2">{{ __('作品名') }}</dt>
                                    <dd class="col-md-10">{{ $work_info->name }}</dd> 
                                    <dt class="col-md-2">{{ __('作品メッセージ') }}</dt>
                                    <dd class="col-md-10">{{ $work_info->description }}</dd>
                                    <dt class="col-md-2">{{ __('値段') }}</dt>
                                    <dd class="col-md-10">{{ $work_info->price }}</dd>
                                    <dd><a href="#"><img src="cart.jpg" alt="ショッピングカート" width="" height="" /></a></dd>
                                    @if (Auth::id() != $work_info->work_id)
                                        @if (Auth::user()->is_favorite($work_info->id))
                                            {!! Form::open(['route' => ['favorites.unfavorite', $work_info->id], 'method' => 'delete']) !!}
                                                {!! Form::submit('いいね！を外す', ['class' => "button btn btn-warning"]) !!}
                                            {!! Form::close() !!}
                                        @else
                                            {!! Form::open(['route' => ['favorites.favorite', $work_info->id]]) !!}
                                                {!! Form::submit('いいね！を付ける', ['class' => "button btn btn-success"]) !!}
                                            {!! Form::close() !!}
                                        @endif
                                        <div class="text-right mb-2">いいね！
                                            <span class="badge badge-pill badge-success">{{ $work_info->favorite_users()->count() }}</span>
                                        </div>
                                    @endif 
                                </dl>  
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endsection

        @include('layouts.footer')
    </body>
</html>