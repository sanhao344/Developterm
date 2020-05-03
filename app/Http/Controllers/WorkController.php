<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    protected $work;
    protected $genre_id;

    const NUM_PER_PAGE = 10;

    // self::NUM_PER_PAGE組み込む
    static function category(Request $request)
    {   
        $genre_id = $request->genre_id;
        $list = Work::getGenreList($genre_id);
        return view ('work.category', compact('list'));
    }

    function index($id){
        $work = Work::findOrFail($id);
        return view('work.show', compact('work'));
    }

}

// fixme 
// todo
// プラグイン必要
