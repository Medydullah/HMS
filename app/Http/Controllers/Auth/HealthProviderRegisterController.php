<?php

namespace App\Http\Controllers\Auth;

use App\Events\HealthCareProviderRegistered;
use App\HealthCareProvider;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class HealthProviderRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/health_provider/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest:health_care_provider');
    }

    /**
     * Get a validator for an incoming registration request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     * @param  array  $data
     * @return \App\User
     */

    protected function guard(){
        return Auth::guard("health_care_provider");
    }


    public function showRegistrationForm(){
        return view('health_provider.auth.registration');
    }


    public function register(Request $request){
       // return $request->all();

        $request->validate([
            'facility_name' => 'required|max:169',
            'facility_type' => 'required|max:169',

            'phone_1' => 'required|max:169',
            'phone_2' => 'required|max:169',

            'region' => 'required|max:169',
            'district' => 'required|max:169',
            'ward' => 'required|max:169',

            'full_name' => 'required|max:169',
            'job_position' => 'required|max:169',
            'employee_id_number' => 'required|max:169',

            #Auth Credentials
            'email' => 'required|unique:health_care_providers|max:169',
            'password' => 'required | min:6',
        ]);

        $user = $this->create($request->all());

        event(new HealthCareProviderRegistered($user));

        $this->guard()->login($user);

        return redirect()->route('health_provider.admin');
    }



    protected function create(array $data){
        return HealthCareProvider::create([
            'facility_name' => $data['facility_name'],
            'facility_type' => $data['facility_type'],

            'phone_1' => $data['phone_1'],
            'phone_2' => $data['phone_2'],

            'region' => $data['region'],
            'district' => $data['district'],
            'ward' => $data['ward'],

            'full_name' => $data['full_name'],
            'job_position' => $data['job_position'],
            'employee_id_number' => $data['employee_id_number'],

            #auth credentials
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}
