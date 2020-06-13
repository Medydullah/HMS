<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisteredEvent;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
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
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    public function register(Request $request){
        // return $request->all();

        $input = $request->all();
        $rule = [ 'email' => 'email|unique:users',  'password' => 'required', ];
        $messages = [ 'unique' => 'Email is already taken ',
            'required' => 'Invalid Password',
            'email' => 'Invalid Email',  ];

        $validator = Validator::make($input, $rule, $messages );

        if ($validator->fails()) {
            //return redirect()->back()->with(['flashMessage'=>"One Weight Record Deleted"]);
            return redirect()->back()->withErrors($validator->errors())->withInput();
         //   return response()->json();
        }


        $user = new User();
        $user->name = $request->input('name');;
        $user->email =  $request->input('email');
        $user->password =Hash::make($request->input("password"));

        $user->phone = "N/A";
        $user->dmw_token= "N/A";
        $user->gender = "N/A";
        $user->save();

        $user->dmw_token= $this->generateDmwToken($user);
        $user->save();

        event(new UserRegisteredEvent($user));


        $this->guard()->login($user);

        return redirect()->route('user');

    }



    //        $user->dmw_token= "U2019-003-TGA6";
    private function generateDmwToken(User $user){
        $token  ="D2009"."-W00"
            .$user->id
            ."-".strtoupper(  dechex(time()) );

        return $token;
    }

}


