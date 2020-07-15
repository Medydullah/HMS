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

    // public function index()
    // {
    //     return view('login');
    // }  
 
    // public function registration()
    // {
    //     return view('registration');
    // }
     
    // public function postLogin(Request $request)
    // {
    //     request()->validate([
    //     'email' => 'required',
    //     'password' => 'required',
    //     ]);
 
    //     $credentials = $request->only('email', 'password');
    //     if (Auth::attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('dashboard');
    //     }
    //     return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    // }
 
    // public function postRegistration(Request $request)
    // {  
    //     request()->validate([
    //     'name' => 'required',
    //     'email' => 'required|email|unique:users',
    //     'password' => 'required|min:6',
    //     ]);
         
    //     $data = $request->all();
 
    //     $check = $this->create($data);
       
    //     return Redirect::to("dashboard")->withSuccess('Great! You have Successfully loggedin');
    // }
     
    // public function dashboard()
    // {
 
    //   if(Auth::check()){
    //     return view('dashboard');
    //   }
    //    return Redirect::to("login")->withSuccess('Opps! You do not have access');
    // }
 
    // public function create(array $data)
    // {
    //   return User::create([
    //     'name' => $data['name'],
    //     'email' => $data['email'],
    //     'password' => Hash::make($data['password'])
    //   ]);
    // }
     
    // public function logout() {
    //     Session::flush();
    //     Auth::logout();
    //     return Redirect('login');
    // }
}
