<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    protected $work;
    protected $genre_id;

    // self::NUM_PER_PAGE組み込む
    static function category(Request $request)
    {   
        $genre_id = $request->genre_id;
        $list = Work::getGenreList($genre_id);
        return view ('user.category', compact('list'));
    }

    function index($id){
        $work = Work::findOrFail($id);
        return view('user.show', compact('work'));
    }

}

// fixme 
// todo
// プラグイン必要
