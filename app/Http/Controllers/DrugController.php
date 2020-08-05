<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
 
class DrugController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(){
    //     //return Auth::user();
    //     switch (Auth::user()->profession){

    //     case 'receptionist':{
    //         return redirect()->route('drug.list',[
    //             'active_tab'=>'drug',
               
    //         ]);
    //     }break;

    //      default :{
    //     return redirect()->route('hce.patient.wallet.search');
    //     }


    //     }
    // }

    public function showlogin()
    {
        return view('expert.drug');
    }  

    

    // }
}