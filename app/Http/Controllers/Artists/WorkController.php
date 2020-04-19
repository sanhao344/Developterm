<?php

namespace App\Http\Controllers\Artists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    //
    public function add()
    {
        return view('artist.work.create');
    }
    
    //redirect先をartistのプロフィール画面にするのを忘れない
    public function create(Request $request)
    {
        // 以下を追記
      // Varidationを行う
      $this->validate($request, Work::$rules);
      
            $works = new Work;
            $form = $request->all();
      
            // フォームから画像が送信されてきたら、保存して、$works->image_path に画像のパスを保存する
            if (isset($form['image'])) {
              $path = $request->file('image')->store('public/image');
              $works->image_path = basename($path);
            } else {
                $works->image_path = null;
            }
      
            // フォームから送信されてきた_tokenを削除する
            unset($form['_token']);
            // フォームから送信されてきたimageを削除する
            unset($form['image']);
      
            // データベースに保存する
            $works->fill($form);
            $works->save();
      
        return redirect('artist/work/create');
    }

    public function edit(Request $request)
    {
         // Work Modelからデータを取得する
      $work = Work::find($request->id);
      if (empty($work)) {
        abort(404);
      }
        return view('artist.work.edit', ['work_form' => $work]);
    }

    public function update()
    {
        // Validationをかける
      $this->validate($request, Work::$rules);
      // Work Modelからデータを取得する
      $work = Work::find($request->id);
      // 送信されてきたフォームデータを格納する
      $work_form = $request->all();
      if (isset($work_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $work->image_path = basename($path);
        unset($work_form['image']);
      } elseif (isset($request->remove)) {
        $work->image_path = null;
        unset($work_form['remove']);
      }
      unset($work_form['_token']);
      // 該当するデータを上書きして保存する
      $work->fill($work_form)->save();
        return redirect('artist/profile');
    }

    public function delete()
    {
        return redirect('artist/profile/edit');
    }
}
