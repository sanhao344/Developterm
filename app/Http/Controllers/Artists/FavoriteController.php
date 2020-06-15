<?php

namespace App\Http\Controllers\Artists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    //
    public function store(Request $request, $id)
    {
            \Auth::user()->favorite($id);
            return back();
    }

    public function destroy($id)
    {
            \Auth::user()->unfavorite($id);
            return back();
    }
}
