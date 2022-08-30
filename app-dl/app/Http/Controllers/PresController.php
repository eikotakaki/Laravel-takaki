<?php

namespace App\Http\Controllers;

use App\Models\Pres;
use App\Mail\TestMail;
use App\Http\Requests\PreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\LoginFormRequest;

class PresController extends Controller
{
    public function __construct()
    {
        //$this->Pres = new Pres();
    }

    /**
     * showPreform function
     * @return view('pre.form')
     */
    public function showPre()
    {
        return view('pre.form');
    }

    /**
     * login function
     * @param LoginFormRequest App\Http\Requests $request
     * @return void
     */
    public function pre(PreRequest $request)
    {
        $email = $request->only('email');
        $token = sha1(uniqid(rand(),1));
        $url   = "http://localhost:28001" . "?urltoken=" . $token ;
        echo $url;

        $register = Pres::build($email,$token);
        dd($register);//boolかデータが返ってくるはず
/*         if(isset($get)){
            Mail::to($get['email'])->send(new TestMail());
            return redirect()->route("showTop")->with(['success' => '仮登録完了しました！届いたメールのURLから24時間以内に本登録に進んでください']);
        } */
    }

    /**
     * showregisterform function
     * @return view('pre.register')
     */
    public function showRegister()
    {
        return view('pre.register');
    }

        /**
     * login function
     * @param LoginFormRequest App\Http\Requests $request
     * @return void
     */
    public function register(LoginFormRequest $request)
    {
        $get = $request->only('email');

    }


}
