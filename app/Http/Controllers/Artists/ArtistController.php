<?php

namespace App\Http\Controllers\Artists;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function login(Request $request)
    {
        $user_id = Auth::id();
        $artist_name = $request->artist_name;
        
        $artist = \Artist::table('artists')
            ->join('users','artists.user_id','=','users.user_id')
            ->where('user_id', $user_id)
            ->where('artist_name', $artist_name)
            ->first();
        
        $user_pwd = $artist->password;

        $encrypted= Crypt::encrypt($request->password);

        if(count($artist) > 0){
            if($user_pwd === $encrypted){
                //アクセストークンの発行処理とセッションへの保存処理

            }else{
                //login画面でパスワードが異なっているというエラーの表示

            }
        }else{
            //login画面でartist名が誤っているエラーの表示

        }
    }
}
