<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        dd("am ajuns aici");
//        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
        $this->middleware('guest')->except('logout');
//        just figured it out. in laravel 5.3 they changed the request to POST therefore GET request ( chnaging the URL ) will not work.
//    You need to implement a POSt method ( form with action POST for example ).﻿
    }
}
