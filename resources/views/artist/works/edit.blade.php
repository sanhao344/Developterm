@extends('layouts.artist')
@section('title', 'プロフィール画面')

@section('content')
    <div class="container">
         <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール新規作成</h2>
                <form action="{{ action('Artists\WorkController@update') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="name" value="{{ $work_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">作品コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="description" rows="20">{{ $work_form->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">価格</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="price" value="{{ $work_form->price }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $work_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $work_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection