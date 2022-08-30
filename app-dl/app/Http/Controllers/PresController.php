<?php

namespace App\Http\Controllers;

use App\Models\Pres;
use App\Mail\TestMail;
use App\Http\Requests\PreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Carbon;


class PresController extends Controller
{
    /**
     * showPreform function
     * @return view('pre.form')
     */
    public function showPre()
    {
        return view('pre.form');
    }

    /**
     * pre function
     * @param LoginFormRequest App\Http\Requests $request
     * @return void
     */
    public function exeStore(PreRequest $request)
    {
        $attr = $request->only('email');
        $attr['token'] = sha1(uniqid(rand(),1));
        $url   = "http://localhost:28001/register/" . $attr['token']  ;
        echo $url;
        DB::beginTransaction();
        try {
            Pres::create($attr);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            logger('test', [$e]);
            return redirect()->route("showPre",)->with(['err_msg' =>'仮登録に失敗しました']);
        } 
        return view('pre.form')->with(['err_msg' =>'仮登録が完了しました！24時間以内にメールに添付されたURLから本登録を行ってください']);
        //viewに表示するのまだ書いてない
    }

    /**
     * トークンが有効期限内か確認
     * showregisterform function
     * @return view('pre.register')
     */
    public function showRegister()
    {   
        //どうやってurlのtokenを取得するかという問題。。。
        //$token = $_GET['token'];
        $token = request('token');
        $user = Pres::findByToken($token);
        $res = $this->isTimeOut($user);
        if ( !($res) ) {
            return redirect()->route("showPre",)->with(['err_msg' =>'URLの有効期限が切れています']);
        }
        return view('pre.register')->with(['err_msg' =>'有効なURLです。本登録フォームを記入してください']);
    }

    public function isTimeOut( $user )
    {
        return $user->updated_at->between(Carbon::now()->subHour(1), Carbon::now());
    }

}
