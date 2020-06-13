<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HealthProviderLoginController extends Controller
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
     * @var string
     */
    protected $redirectTo = '/health_provider/admin';

    /**
     * Create a new controller instance.
     * @return void
     */

    protected function guard(){
        return Auth::guard("health_care_provider");
    }

    public function __construct(){
        $this->middleware('guest:health_care_provider')->except('logout');
    }

    public function showLoginForm(){
        return view('health_provider.auth.login',[
            'activeTab'=>'admin',
            'health_provider_id'=>" ",
            'search'=>false,
        ]);
    }

    public function logout(){
        $this->guard()->logout();
        Session::flush();
        return redirect()->route('health_provider.admin');
    }
}
