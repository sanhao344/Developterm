<?php

namespace App\Http\Controllers\Artists;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/artist/home';

    // ログイン画面
    public function showLoginForm()
    {
        return view('artist.login'); //管理者ログインページのテンプレート
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
        $this->middleware('guest:artist')->except('logout');
    }

    /* FIXME:ログアウトの動作確認して必要あれば修正*/
    public function logout(Request $request)
    {
        Auth::guard('artist')->logout();  //変更
        $request->session()->flush();
        $request->session()->regenerate();
 
        return redirect('/artist/login');  //変更  // ログアウト後のリダイレクト先
    }

}
