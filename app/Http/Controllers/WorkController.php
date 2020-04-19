<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;

class WorkController extends Controller
{
    //workのDBからの参照とviewへの受け渡し
    public function index(){
        $works = Work::orderby('name', 'asc')->get();
        return view ('work.index', compact('works'));
    }

    public function show($id){
    $work = Work::findOrFail($id);
    return view('work.show', compact('work'));
    }

}
