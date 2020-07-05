<?php

namespace App\Http\Controllers\Artists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Artist;

class RegisterController extends Controller
{
    //
    public function add()
    {
        return view('artist.register');
    }
    
    //redirect先をartistのプロフィール画面にするのを忘れない
    // FIXME:アーティスト名が重複できないように修正する
    public function create(Request $request)
    {
        // 以下を追記
      // Varidationを行う
      $this->validate($request, Artist::$rules);
      
      $artist = new Artist;
      $form = $request->all();

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);

      // データベースに保存する
      $artist->fill($form);
      $artist->save();
    
      return redirect('artist/works/create');
    }

}
