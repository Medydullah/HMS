<?php

namespace App\Http\Controllers;

use App\DumbClasses\Profession;
use App\DumbClasses\RecentDates;
use App\Encounter;
use App\EncounterData;
use App\Events\HealthCareEmployeeAdded;
use App\HealthCareEmployee;
use App\HealthCareProvider;
use App\LabResult;
use App\Visit;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HealthCareProviderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:health_care_provider');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect()->route('health_provider.employees',[
            'active_tab'=>'doctors',
        ]);
    }

    
    //---------------[[ Provider Profile]]--------------------
    public function showProfile( ){
        $healthCareProvider= HealthCareProvider::find(Auth::id());
        //return response()->json($healthCareProvider);

        return view('health_provider._0_profile',[
            'healthCareProvider'=>$healthCareProvider,
            'activeLeftNav'=>"profile",
             'editMode'=>"none"
         ]);
    }


//////////////report generate===================

public function generatereport(){

    return view('health_provider.generate_report',[
         'activeLeftNav'=>"service-forms",
        //  'activeDate'=>$this->getRecentDates()->first,
        //  'visits'=>$this->getVisitsByDate(Carbon::today()->toDateTimeString()),
        //  'recentDates'=> $this->getRecentDates(),
        'editMode'=>"none",
     ]);
}


    //---------------[[Staff |Employees | Experts]]--------------------
    public function showEmployees($active_tab ){

        $healthCareEmployees = HealthCareEmployee::where('health_provider_id',Auth::id())
            ->role($this->getProfession( $active_tab )->role)
                                ->get();
        return view('health_provider.staff',[
            'view_mode'=>'none',
            'selectedEmployees'=>new HealthCareEmployee(),
            'healthCareEmployees'=>$healthCareEmployees,
            'activeLeftNav'=>"staff",
            'activeTab'=>$active_tab,
            'editMode'=>"none",
            'profession'=>$this->getProfession($active_tab)->sentenceCase,
        ]);
    }
    

    public function showAddEmployeeForm($active_tab){
        return view('health_provider.staff',[
            'selectedEmployees'=>new HealthCareEmployee(),
            'view_mode'=>'none',
            'activeTab'=>$active_tab,
            'isUpdate'=>false,
            'editMode'=>"new_doctor",
            'activeLeftNav'=>"staff",
            'profession'=>$this->getProfession($active_tab)->sentenceCase,
        ]);
    }

    public function saveNewEmployee(Request $request){

        $request->validate([
            'name' => 'required|max:169',
            'email' => 'required|unique:health_care_employees|max:169',
            'phone' => 'required|max:28',

            'employment_id' => 'required|max:169',

            'qualification' => 'required|max:169',
            'specialization' => 'required|max:169',

        ]);

        $data = $request->all();

        //TODO Validate

        $defaultPassword= str_random(10);

        $healCareEmployee = HealthCareEmployee::create([
            'health_provider_id' => Auth::id(),
            'profession' => $this->getProfession( $request->input('active_tab') )->role ,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($defaultPassword),

            'phone' => $data['phone'],
            'employment_id' => $data['employment_id'],

            'qualification' => $data['qualification'],
            'specialization' => $data['specialization'],
        ]);

        $healCareEmployee->plain_password = $defaultPassword; //For sending with email

        //ROLE
        $healCareEmployee->assignRole($this->getProfession( $request->input('active_tab') )->role);

        //Grant selected permissions
       if($request->has('view_basic_info')) {  $healCareEmployee->givePermissionTo('view_basic_info'); }
       if($request->has('view_medical_background')) {  $healCareEmployee->givePermissionTo('view_medical_background'); }
       if($request->has('update_medical_background')) {  $healCareEmployee->givePermissionTo('update_medical_background'); }
       if($request->has('view_medical_journal')) {  $healCareEmployee->givePermissionTo('view_medical_journal'); }

       if($request->has('add_symptoms')) {  $healCareEmployee->givePermissionTo('add_symptoms'); }
       if($request->has('view_symptoms')) {  $healCareEmployee->givePermissionTo('view_symptoms'); }
       if($request->has('recommend_test')) {  $healCareEmployee->givePermissionTo('recommend_test'); }
       if($request->has('view_recommended_test')) {  $healCareEmployee->givePermissionTo('view_recommended_test'); }
       if($request->has('add_test_result')) {  $healCareEmployee->givePermissionTo('add_test_result'); }

       if($request->has('add_prescription')) {  $healCareEmployee->givePermissionTo('add_prescription'); }
       if($request->has('view_prescription')) {  $healCareEmployee->givePermissionTo('view_prescription'); }
       if($request->has('issue_medicine')) {  $healCareEmployee->givePermissionTo('issue_medicine'); }
       if($request->has('view_issued_medicine')) {  $healCareEmployee->givePermissionTo('view_issued_medicine'); }

       if($request->has('verify_consultation_fee')) {  $healCareEmployee->givePermissionTo('verify_consultation_fee'); }
       if($request->has('check_consultation_fee')) {  $healCareEmployee->givePermissionTo('check_consultation_fee'); }
       if($request->has('verify_lab_fee')) {  $healCareEmployee->givePermissionTo('verify_lab_fee'); }
       if($request->has('check_lab_fee')) {  $healCareEmployee->givePermissionTo('check_lab_fee'); }
       if($request->has('verify_medicine_fee')) {  $healCareEmployee->givePermissionTo('verify_medicine_fee'); }
       if($request->has('check_medicine_fee')) {  $healCareEmployee->givePermissionTo('check_medicine_fee'); }

        //TODO send invitation email
        event(new HealthCareEmployeeAdded($healCareEmployee));

        return redirect()->route('health_provider.employees',[
            'active_tab'=>$request->input('active_tab'),
        ]);

    }

    public function updateEmployee(Request $request){

        $data = $request->all();

        $healCareEmployee= HealthCareEmployee::find($request->input('expert_id'));
        $healCareEmployee->name =  $data['name'];
        $healCareEmployee->email =    $data['email'];
        $healCareEmployee->phone =    $data['phone'];
        $healCareEmployee->employment_id =  $data['employment_id'];
        $healCareEmployee->qualification =  $data['qualification'];
        $healCareEmployee->specialization =   $data['specialization'];
        $healCareEmployee->save();


        //Grant selected permissions
        if($request->has('view_basic_info')) {  $healCareEmployee->givePermissionTo('view_basic_info'); }
        if($request->has('view_medical_background')) {  $healCareEmployee->givePermissionTo('view_medical_background'); }
        if($request->has('update_medical_background')) {  $healCareEmployee->givePermissionTo('update_medical_background'); }
        if($request->has('view_medical_journal')) {  $healCareEmployee->givePermissionTo('view_medical_journal'); }

        if($request->has('add_symptoms')) {  $healCareEmployee->givePermissionTo('add_symptoms'); }
        if($request->has('view_symptoms')) {  $healCareEmployee->givePermissionTo('view_symptoms'); }
        if($request->has('recommend_test')) {  $healCareEmployee->givePermissionTo('recommend_test'); }
        if($request->has('view_recommended_test')) {  $healCareEmployee->givePermissionTo('view_recommended_test'); }
        if($request->has('add_test_result')) {  $healCareEmployee->givePermissionTo('add_test_result'); }

        if($request->has('add_prescription')) {  $healCareEmployee->givePermissionTo('add_prescription'); }
        if($request->has('view_prescription')) {  $healCareEmployee->givePermissionTo('view_prescription'); }
        if($request->has('issue_medicine')) {  $healCareEmployee->givePermissionTo('issue_medicine'); }
        if($request->has('view_issued_medicine')) {  $healCareEmployee->givePermissionTo('view_issued_medicine'); }

        if($request->has('verify_consultation_fee')) {  $healCareEmployee->givePermissionTo('verify_consultation_fee'); }
        if($request->has('check_consultation_fee')) {  $healCareEmployee->givePermissionTo('check_consultation_fee'); }
        if($request->has('verify_lab_fee')) {  $healCareEmployee->givePermissionTo('verify_lab_fee'); }
        if($request->has('check_lab_fee')) {  $healCareEmployee->givePermissionTo('check_lab_fee'); }
        if($request->has('verify_medicine_fee')) {  $healCareEmployee->givePermissionTo('verify_medicine_fee'); }
        if($request->has('check_medicine_fee')) {  $healCareEmployee->givePermissionTo('check_medicine_fee'); }

         return redirect()->route('health_provider.employees',[
            'active_tab'=>$request->input('active_tab'),
        ]);
    }

    public function showEditEmployeeForm($active_tab, $expert_id){
        $selectedEmployees = HealthCareEmployee::find($expert_id);

        return view('health_provider.staff',[
            'selectedEmployees'=>$selectedEmployees,
            'view_mode'=>'none',
            'activeTab'=>$active_tab,
            'editMode'=>"new_doctor",
            'isUpdate'=>true,
            'activeLeftNav'=>"staff",
            'profession'=>$this->getProfession($active_tab)->sentenceCase,
        ]);

     //   return $selectedExpert;
       return redirect()->back()->withInput([$selectedExpert]);
    }

    public function deleteEmployee($expert_id){

        HealthCareEmployee::destroy($expert_id);

        return redirect()->back();
    }





    //---------------[[Reports | Service Forms]]--------------------
    public function showTodayServiceForms(){

        return view('health_provider._1_service_forms',[
             'activeLeftNav'=>"service-forms",
             'activeDate'=>$this->getRecentDates()->first,
             'visits'=>$this->getVisitsByDate(Carbon::today()->toDateTimeString()),
             'recentDates'=> $this->getRecentDates(),
             'editMode'=>"none",
         ]);
    }

     public function showServiceFormsByDate($date_string){

       //return response()->json( $this->getVisitsByDate($date_string));
        return view('health_provider._1_service_forms',[
             'activeLeftNav'=>"service-forms",
            'activeDate'=>$date_string,
            'visits'=>$this->getVisitsByDate($date_string),
             'recentDates'=> $this->getRecentDates(),
             'editMode'=>"none",
         ]);
    }

     public function showServiceFormsByDateCustom(Request $request){
        $dateString =$request->input('year')."-".
                    $request->input('month')."-".
                    $request->input('day');
       // return $dateString;
       //return response()->json( $this->getVisitsByDate($date_string));

        return view('health_provider._1_service_forms',[
             'activeLeftNav'=>"service-forms",
            'activeDate'=>Carbon::parse($dateString)->toDateTimeString(),
            'visits'=>$this->getVisitsByDate($dateString),
             'recentDates'=> $this->getRecentDates(),
             'editMode'=>"none",
         ]);
    }

    public function showServiceFormDetails($visit_id){
        $visit = DB::table('visits')
            ->where('visits.id',$visit_id)
            ->join('users',"visits.user_id","users.id")
            ->select('visits.*',"users.name")
            ->first();

        $encounters = $this->getEncountersWithData($visit->id);

        return view('health_provider._1_service_form_detail')->with(
            [
                'visit'=>$visit,
                'activeWalletTab'=>'visit',
                'activeLeftNav'=>"service-forms",
                'editMode'=>'none',
                'accessToken'=>"",
                'encounters'=>$encounters,
                #dummies
                'investigationId'=>" ",

             ]);
    }

    public function closeServiceForm($visit_id){
        $visit = Visit::find($visit_id);
        $visit->is_active = false;
        $visit->save();

        return redirect()->back()->with([
            'flashMessage'=>"Service Form Has been deactivated, it can no longer be edited"]);

    }

    #download
    public function downloadServiceForm($visit_id){
        $visit = DB::table('visits')
            ->where('visits.id',$visit_id)
            ->join('users',"visits.user_id","users.id")
            ->Join('contacts',"users.id","contacts.user_id")
            ->select('visits.*',"users.name", 'contacts.phone_1', 'contacts.region', 'contacts.district',
                'contacts.ward','contacts.street')
            ->first();

        $data =  [
            'visit'=>$visit,
            'activeWalletTab'=>'visit',
            'activeLeftNav'=>"service-forms",
            'editMode'=>'none',
            'accessToken'=>"",
            'encounters'=>$this->getEncountersWithData($visit->id),
            'expenses'=>$this->getEncountersWithExpenses($visit_id),
            #dummies
            'investigationId'=>" ",
        ];

        $pdf = PDF::loadView('health_provider._1_service_form_pdf',  $data   );
          return $pdf->download('Service_Form'.'_'.$visit->name.now().'.pdf');

        return view('health_provider._1_service_form_pdf',$data);

    }


    //---------------------------------------------------------------
    //-------------------------HELPERS-------------------------------
    private function getProfession($activeTab){
        $profession = new Profession();

        switch ($activeTab){
            case 'doctors';{
                $profession->sentenceCase = "Doctor";
                $profession->role = "doctor";
                return  $profession;
            }break;

             case 'nurses';{
                 $profession->sentenceCase = "Nurse";
                 $profession->role = "nurse";
                 return  $profession;
            }break;

             case 'labs';{
                 $profession->sentenceCase = "Lab Technician";
                 $profession->role = "lab";
                 return  $profession;
            }break;

             case 'pharmacists';{
                 $profession->sentenceCase = "Pharmacist";
                 $profession->role = "pharmacist";
                 return  $profession;
            }break;

             case 'receptionists';{
                 $profession->sentenceCase = "Receptionist";
                 $profession->role = "receptionist";
                 return  $profession;
            }break;
         }

         return $profession;
    }

    #Reports | Service Forms | Visits


    private function  getVisitsByDate($date_string){
        $date_end = Carbon::parse($date_string)->addHours(24);
        $date_start = Carbon::parse($date_string);

        $visits = DB::table('visits')
            ->where('visits.created_at','>',$date_start)
            ->where('visits.created_at','<',$date_end)
            ->where('visits.provider_id',Auth::id())
            ->join('users','visits.user_id','users.id')
            ->select('visits.*','users.name')
            ->latest()
            ->get();

      //  $visits = [ 'start'=>$date_start, 'end'=>$date_end ];

        return $visits;
    }

    private function  getRecentDates(){
        $recentDates = new RecentDates();

        $recentDates->first = Carbon::today()->toDateTimeString() ;
        $recentDates->second = Carbon::today()->subDays(1)->toDateTimeString() ;
        $recentDates->third = Carbon::today()->subDays(2)->toDateTimeString() ;
        $recentDates->forth = Carbon::today()->subDays(3)->toDateTimeString() ;
        $recentDates->fifth = Carbon::today()->subDays(4)->toDateTimeString() ;
        $recentDates->sixth = Carbon::today()->subDays(5)->toDateTimeString() ;

        return $recentDates;
    }

    #get Enc-2 encounters with EncounterDatas
    private function getEncountersWithData($visit_id){
        $encounters = Encounter::where('visit_id', $visit_id)->get();
        foreach ($encounters as $encounter){
            $encounter->encounterDatas = EncounterData::where('encounter_id',$encounter->id)->get();
            foreach ($encounter->encounterDatas as $encounterData){
                $encounterData->labResults = LabResult::where('investigation_id',$encounterData->id)->get();
            }
        }

        return $encounters;
    }


    #get Enc-2 encounters with expenses
    private function getEncountersWithExpenses($visit_id){
        $expenses = 0;
        $encounters = Encounter::where('visit_id', $visit_id)->get();
        foreach ($encounters as $encounter){
            $encounter->encounterDatas = EncounterData::where('encounter_id',$encounter->id)->get();
            foreach (  $encounter->encounterDatas as $encounterData ){
                if($encounterData->is_fee_paid){
                    $expenses =$expenses + $encounterData->fee_amount;
                }
            }
        }
        $encounters->totalExpenses= $expenses;

        return $encounters;
    }

}



