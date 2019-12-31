<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('credentials')){
            $userLevel = $request->session()->get('credentials')[0];
            if($userLevel == 0){
                return view('home');
            }else{
                return view('mypage');
            }
        }
    }
}
