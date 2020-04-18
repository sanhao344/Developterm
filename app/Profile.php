<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');

    protected $table = 'artistprofile';

    public static $rules = array(
        'name' => 'required',
        'genre' => 'required',
        'introduction' => 'required',
    );
}
