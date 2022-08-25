<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;//
use Illuminate\Http\Request;
use App\Models\Models\Users;
use App\Http\Requests\LoginFormRequest;//
use Illuminate\Support\Facades\DB;


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
    public function login( LoginFormRequest $request )
    {
        dd($request->all());

    }
}
