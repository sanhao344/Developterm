<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\User;

class WorkController extends Controller
{
    protected $work;
    protected $genre_id;
    protected $workId;

    // self::NUM_PER_PAGE組み込む
    static function category(Request $request)
    {   
        $genre_id = $request->genre_id;
        $list = Work::getGenreList($genre_id);

        return view ('user.category', compact('list'));
    }

    function index(){
        $works = Work::all();
        return view('user.index', compact('works'));
    }

    function show(Request $request){
        $workId = $request->id;
        $work_info = Work::where('id', $workId)->first();
        return view('user.show', compact('work_info'));
    }

}
