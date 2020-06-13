<?php

namespace App\Http\Controllers;

use App\HealthCareProvider;
use App\Mail\EmailVerificationMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SystemAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:system_admin');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('system_admin.health_care_providers',[
            'view_mode'=>'none',
            'selectedEmployees'=>new HealthCareProvider(),
            'healthCareProviders'=> HealthCareProvider::paginate(4),
            'activeLeftNav'=>"providers",
            'activeTab'=>'',
            'editMode'=>"none",
            'profession'=>'',
        ]);
    }

    public function showPatients(){

        return view('system_admin.patients',[
            'view_mode'=>'none',
            'selectedUser'=>new User(),
            'users'=> User::paginate(4),
            'activeLeftNav'=>"patients",
            'activeTab'=>'',
            'editMode'=>"none",
            'profession'=>'',
        ]);
    }


    public function activateProvider($provider_id){

        $provider = HealthCareProvider::find($provider_id);
        $provider->is_active = true;
        $provider->save();
        return redirect()->back();
    }

    public function deactivateProvider($provider_id){

        $provider = HealthCareProvider::find($provider_id);
        $provider->is_active = false;
        $provider->save();
        return redirect()->back();
    }


    public function activatePatient($patient_id){
        $patient = User::find($patient_id);
        $patient->is_active = true;
        $patient->save();
        return redirect()->back();
    }


    public function deactivatePatient($patient_id){
        $patient = User::find($patient_id);
        $patient->is_active = false;
        $patient->save();
        return redirect()->back();
    }







    public function testMail(){
        $healthProvider = HealthCareProvider::first();
        //return $healthProvider->email;

        Mail::to("rjkilonzo@gmail.com")->send(new EmailVerificationMail($healthProvider));

        return response()->json([$healthProvider]);

    }


}


