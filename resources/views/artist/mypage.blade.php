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
                        <h1>マイページ</h1>  

                    </div>
                </div>
            </div>
        @endsection

        @include('layouts.footer')
    </body>
</html>