<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $guarded = array('id');

    protected $table = 'works';

    public static $rules = array(
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'image_path' => 'required',
    );
}
