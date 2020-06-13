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
     * @return \Illuminate\Http\Response
     */


    public function index(){
        return redirect()->route('user');
    }

//    public function index(){
//        return redirect()->route('staff');
//    }

    public function verifyMail (){
        return "Email successful verified";
    }

}
