<?php

namespace App\Http\Controllers\Auth;

use App\HealthCareEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class HealthExpertLoginController extends Controller
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
    protected $redirectTo = '/expert';

    /**
     * Create a new controller instance.
     * @return void
     */

    protected function guard(){
        return Auth::guard("health_care_employee");
    }

    public function __construct(){
        $this->middleware('guest:health_care_employee')->except('logout');
    }

    public function showLoginForm($health_provider_id){
        return view('health_provider.auth.login',[
            'activeTab'=>'staff',
            'search'=>false,
            'health_provider_id'=>'1',
        ]);
    }

    public function login(Request $request){
        //return $request->all();

        $healthEmployee = HealthCareEmployee::where('health_provider_id',$request->input('health_provider_id') )
                                ->where('email', $request->input('email'))
                                ->first();

//        return $request->input('password');
//        return response()->json($healthEmployee);

        if($healthEmployee==null){
            return redirect()->back()->withErrors(['email'=>"Email does not exist on our Database, 
                        Contact IT technician at your workplace"]);
        }

        $credentials = [ 'email' => $request->input('email'), 'password' => $request->input('password')] ;
        if(Auth::guard('health_care_employee')->attempt( $credentials )  ){

            Auth::guard('health_care_employee')->login($healthEmployee);
            //TODO save Workplace/Health provider ID in session
             return redirect()->route('health_employee');
        }

        return redirect()->back()->withErrors(['password'=>"Incorrect  Password"]);

    }

    public function logout(){
        $this->guard()->logout();
        Session::flush();
        return redirect()->route('health_employee');
    }
}
 