<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Profile</title>
    </head>
    <body>
        @extends('layouts.artist')
        @section('title', '作品投稿画面')

        @section('content')
        @include('layouts.sidebar')
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h2>作品投稿</h2>
                        <form action="{{ action('Artists\WorkController@create') }}" method="post" enctype="multipart/form-data">

                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-2">作品タイトル</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="name" value="{{ old('name')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">作品コメント</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="description" rows="20">{{ old('description')}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">価格</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="price" value="{{ old('price')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">画像</label>
                                <div class="col-md-10">
                                    <input type="file" class="form-control-file" name="image" value="{{ old('image')}}">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </form>
                    </div>
                </div>
            </div>
        @endsection

        @include('layouts.footer')
    </body>
</html>