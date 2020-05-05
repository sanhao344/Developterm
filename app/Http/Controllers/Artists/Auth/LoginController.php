<?php

namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Artist\Auth;

use App\Http\Controllers\Artist\Auth; 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // 追加(参考：https://qiita.com/PKunito/items/a8300db38ce7d6949106)

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile/create';

    // ログイン画面
    public function showLoginForm()
    {
        return view('artist.auth.login'); //管理者ログインページのテンプレート
    }

    protected function guard()
    {
        return \Auth::guard('artist'); //管理者認証のguardを指定
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
