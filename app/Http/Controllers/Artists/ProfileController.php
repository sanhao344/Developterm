<?php

namespace App\Http\Controllers\Artists;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('artist.profile.create');
    }

    public function create()
    {
        return redirect('artist/profile/create');
    }

    public function edit()
    {
        return view('artist.profile.edit');
    }

    public function update()
    {
        return redirect('artist/profile/edit');
    }

}
