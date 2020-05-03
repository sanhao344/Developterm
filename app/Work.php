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
        'genre_id' => 'required',
        'price' => 'required',
    );

    // DBからwhereでとってきた後pageinateの前にソートのコード入れる
    public static function getGenreList(?int $genre_id = 0)
    {
        $query = Work::where('genre_id', $genre_id);
        
        return $query->get();
    }
}
