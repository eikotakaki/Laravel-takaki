<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;//
use Illuminate\Http\Request;
use App\Models\Models\Users;
use App\Http\Requests\LoginFormRequest;//
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * showLogin function
     * @return view('login.loginform')
     */
    public function showLogin()
    {
        return view('user.login_form');
    }

    /**
     * login function
     * @param LoginFormRequest App\Http\Requests $request
     * @return void
     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {//ログインの判定
            $request->session()->regenerate();//成功していたらsessionかき直す
            return redirect()->route("mypage")->with(['success' => 'ログイン成功しました！']);
        }

        return back()->withErrors([
            'login_error' => '入力情報が一致しません。',//sessionに入る
        ]);
    }

    /**
     * logout funstion
     * ユーザーをアプリケーションからログアウトさせる
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login")->with(['danger' => 'ログアウトしました']);
    }

    
}
