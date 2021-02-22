<?php

namespace App\Http\Controllers;

class WebController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function show_welcome(){
        return view('web.welcome');
    }
    public function show_register(){
        return view('web.register');
    }
    public function show_profile(){
        return view('web.profile');
    }
}
