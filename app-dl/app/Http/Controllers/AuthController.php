<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BlogsController;//
use App\Http\Controllers\Controller;//
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginFormRequest;//
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

/*     public function __construct() {
        $this->Blogs = new BlogsController;
    }
    protected $Blogs; */

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
            return redirect()->route("showMypage")->with(['success' => 'ログイン成功しました！']);
        }
        return back()->withErrors([
            'login_error' => '入力情報が一致しません。',//sessionに入る
        ]);
    }

    /**
     * showMypage function
     * @return view('login.loginform')
     */
    public function showMypage()
    {
        $blog = Blog::all();
        return view('user.mypage',['blogs' => $blog]);
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

    /**
     * showLogin function
     * @return view('user.setting_form')
     */
    public function showSetting()
    {
        return view('user.setting_form');
    }


    /**
     *  funstion
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function nameUpdate(Request $request)
    {
        $inputs = $request->only('_token','name');
        DB::beginTransaction();
        try {
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'name' => $inputs['name'],
        ]);
            $blog->save();
            DB::commit();
        } catch (\Throwable $e){
            DB::rollback();
            abort(500);
        }
        return redirect()->route("login")->with(['success' => 'ユーザーネームの変更が完了しました！']);
    }

    public function passUpdate(Request $request)
    {
        $inputs = $request->only('_token','password');
        DB::beginTransaction();
        try {
            $blog = Blog::find($inputs['id']);
            $blog->fill([
                'password' => $inputs['password'],
        ]);
            $blog->save();
            DB::commit();
        } catch (\Throwable $e){
            DB::rollback();
            abort(500);
        }
        return redirect()->route("login")->with(['success' => 'パスワードの変更が完了しました！']);
    }
}
