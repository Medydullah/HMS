<?php

namespace App\Http\Controllers;

use App\ActiveVisit;
use App\Allergy;
use App\BloodRelative;
use App\Contact;
use App\DumbClasses\Parameters;
use App\Encounter;
use App\EncounterData;
use App\Immunization;
use App\JournalRecord;
use App\LabResult;
use App\MedicalCondition;
use App\Medication;
use App\User;
use App\Visit;
use App\VitalSign;
use App\VitalSignValue;
use App\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect()->route('user.visits');
    }

    //[Auth 2 ]
    public function showUpdatePwdForm(){
        return view('user.auth.password_change_form')->with(
            [
                'user'=>Auth::user(),
                'activeLeftNav'=>'medical',
            ]);
    }
    public function updatePwd(Request $request){

        $credentials = [ 'email' => Auth::user()->email,
            'password' => $request->input('old_password')] ;
        if(Auth::guard('web')->attempt( $credentials )  ){
            $user = Auth::user();
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return redirect()->route('user');
        }

        return redirect()->back()->with(['flashMessage'=>"Wrong old Password"]);


    }


    //-----------------------------------------------------------------------------------
    //-----------------0.0 [[ PROFILE ]]-------------------------------------------------------
    public function showProfile(){

        return view('user.2_personal_details')->with(
            [
                'user'=>$this->getUserProfile(),
                'activeLeftNav'=>'basic',
                'editMode'=>'none'
            ]);
    }

    #all profile forms
    public function showEditProfileForm($group_name){

        return view('user.2_personal_details')->with(
            [
                'user'=>$this->getUserProfile(),
                'activeLeftNav'=>'basic',
                'editMode'=>$group_name
            ]);
    }

    #update personal details
    public function updatePersonalDetails(Request $request){
        //  return $request->all();
        $user = User::find(Auth::id());
        $user->name=$request->input('name');
        $user->dob=$request->input('dob');
        $user->gender=$request->input('gender');
        $user->marital_status=$request->input('marital_status');

        $user->ethnicity=$request->input('ethnicity');
        $user->tribe=$request->input('tribe');
        $user->occupation=$request->input('occupation');
        $user->working_hours=$request->input('working_hours');
        $user->save();
        return redirect()->route('user.profile');
    }

    #update primary Contacts
    public function updatePrimaryContact(Request $request){
        //return $request->all();

        $contact = $this->getPrimaryContact();

        $contact->email = Auth::user()->email;
        $contact->phone_1 = $request->input('phone_1');
        $contact->phone_2 = $request->input('phone_2');
        $contact->region = $request->input('region');
        $contact->district = $request->input('district');
        $contact->ward = $request->input('ward');
        $contact->street = $request->input('street');
        $contact->save();

        return redirect()->route('user.profile');
    }

    #add emergence Contacts
    public function addEmergenceContact(Request $request){
        // return $request->all();

        $contact = new Contact();

        $contact->user_id = Auth::id();
        $contact->type = 'emergence';
        $contact->name =  $request->input('name');
        $contact->relationship =  $request->input('relationship');
        $contact->phone_1 = $request->input('phone_1');

        $contact->region = $request->input('region');
        $contact->district = $request->input('district');
        $contact->ward = $request->input('ward');
        $contact->street = $request->input('street');
        $contact->save();

        return redirect()->route('user.profile');
    }

    #add blood relative
    public function addBloodRelative(Request $request){
        // return $request->all();

        // return response()->json($this->getUserFromToken(  $request->input('wallet_token')));

        if($this->getUserFromToken(  $request->input('wallet_token')) == null ){
            return redirect()->back()->with([
                'flashMessageRelative'=>"No Wallet found with token: ".$request->input('wallet_token')
            ]);
        }

        $bloodRelative = new BloodRelative();
        $bloodRelative->user_id = Auth::id();
        $bloodRelative->dmw_token = $request->input('wallet_token');
        $bloodRelative->relationship = $request->input('relationship');
        $bloodRelative->save();

        return redirect()->route('user.profile');
    }





     //-----------------1.0 [[ VITALS ]]-------------------------------------------------------
    ##VitalSigns
    public function showVitalSignTrend($vs_id,$viewMode){

        #for For table
        $vitalSign = VitalSign::find($vs_id);

        $vitalSignValues = VitalSignValue::where('user_id', Auth::id())
            ->where('vital_sign_id', $vitalSign->id)
            ->where('active', true)
            ->orderBy('id', 'DESC')
            ->paginate(24);

        //TODO use created_at
        #iterate date labels
        $values24DateLabels = "]";
        foreach ($vitalSignValues as $i => $weightRecord){
            $instanceValue= "'".substr(Carbon::parse($weightRecord->updated_at)->toDateString(),0,7) ."'";
            $values24DateLabels =$instanceValue. " ,".$values24DateLabels;
        }
        $values24DateLabels =  "[". $values24DateLabels;
        // return $values24DateLabels;


        #iterate Values
        $values24= "]";
        foreach ($vitalSignValues as $i => $weightRecord){
            $values24 = $weightRecord->value.",".$values24;
        }
        $values24 =  "[".$values24;

        $graphParams = new Parameters();
        $graphParams->values24DateLabels = $values24DateLabels;
        $graphParams->values24 = $values24;


        $vitalSign->values = $vitalSignValues;

        return view('user.9_trend_graph')->with(
            [
                'user'=>Auth::user(),
                'editMode'=>'none',
                'vitalSign'=>$vitalSign,
                'parameters'=>$graphParams,
                'activeLeftNav'=>'medical',
                'viewMode'=>$viewMode,

                'parameterName'=>$vitalSign->name,
                'siUnit'=>$vitalSign->si_unit,

            ]);
    }
    public function saveNewVitalSignRecord(Request $request){
        VitalSignValue::create([
            'vital_sign_id'=> $request->input('vital_sign_id'),
            'user_id'=>Auth::id(),
            'value'=>$request->input('vs_value'),
            'active'=>true,
        ]);

        return redirect()->route('user.info.medical.vital_sign.trend',[
            'vs_id'=>$request->input('vital_sign_id'),
            'viewMode'=>'records'
        ]);
    }

    public function deleteVitalSignRecord($weight_id){

        if ($this->isWeightRecordOwner($weight_id)){
            Weight::destroy($weight_id);
            return redirect()->back()->with(['flashMessage'=>"One Weight Record Deleted"]);
        }

        return redirect()->back()->with(['flashMessage'=>"Record is Owned by another User"]);
    }

    ##Medical Issues/Conditions
    public function showAddNewConditionForm(){
        return view('user.3_medical_background')->with(
            [
                'user'=>$this->getUserWithMedicalBackground(),
                'activeLeftNav'=>'medical',
                'editMode'=>'medical_condition'
            ]);
    }

    public function saveNewMedicalCondition(Request $request){
        //return $request->all();
        $medicalCondition = new MedicalCondition();
        $medicalCondition->user_id = Auth::id();
        $medicalCondition->name = $request->input('name');
        $medicalCondition->diagnosed_at = $request->input('diagnosed_at');
        $medicalCondition->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id = Auth::id();
        $journalRecord->table_name = "issue";
        $journalRecord->item_id = $medicalCondition->id;
        $journalRecord->save();

        return redirect()->route('user.info.medical');
    }

    ##  Medication
    public function showAddNewMedicationForm(){
        return view('user.3_medical_background')->with(
            [
                'user'=>$this->getUserWithMedicalBackground(),
                'activeLeftNav'=>'medical',
                'editMode'=>'medication'
            ]);
    }

    public function saveNewMedication(Request $request){
        //return $request->all();

        $medication= new Medication();
        $medication->user_id = Auth::id();
        $medication->name = $request->input('name');
        $medication->taken_for = $request->input('taken_for');
        $medication->started_at = $request->input('started_at');
        $medication->ended_at = $request->input('ended_at');
        $medication->instruction = $request->input('instruction');
        $medication->intake_method = $request->input('intake_method');
        $medication->results = $request->input('results');
        $medication->notes = $request->input('notes');
        $medication->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id = Auth::id();
        $journalRecord->table_name = "medication";
        $journalRecord->item_id = $medication->id;
        $journalRecord->save();

        return redirect()->route('user.info.medical',[
            '#current-medications'
        ]);
    }


    ##Allergy
    public function showAddNewAllergyForm(){
        return view('user.3_medical_background')->with(
            [
                'user'=>$this->getUserWithMedicalBackground(),
                'activeLeftNav'=>'medical',
                'editMode'=>'add_allergy'
            ]);
    }

    public function saveNewAllergy(Request $request){
       // return $request->all();

        $allergy= new Allergy();
        $allergy->user_id = Auth::id();
        $allergy->name = $request->input('name');
        $allergy->reaction = $request->input('reaction');
        $allergy->severity = $request->input('severity');
        $allergy->notes = $request->input('notes');
        $allergy->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id = Auth::id();
        $journalRecord->table_name = "allergy";
        $journalRecord->item_id = $allergy->id;
        $journalRecord->save();

        return redirect()->route('user.info.medical',[
            '#allergies'
        ]);

    }


    ##Immunization
    public function showAddNewImmunizationsForm(){
        return view('user.3_medical_background')->with(
            [
                'user'=>$this->getUserWithMedicalBackground(),
                'activeLeftNav'=>'medical',
                'editMode'=>'add_immunization'
            ]);
    }

    public function saveNewImmunizations(Request $request){
       //return $request->all();

        $immunization= new Immunization();
        $immunization->user_id = Auth::id();
        $immunization->name = $request->input('name');
        $immunization->dosage = $request->input('dosage');
        $immunization->prescribed_for = $request->input('prescribed_for');
        $immunization->completed_at = $request->input('completed_at');
        $immunization->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id = Auth::id();
        $journalRecord->table_name = "immunization";
        $journalRecord->item_id = $immunization->id;
        $journalRecord->save();

        return redirect()->route('user.info.medical',[
            '#immunizations'
        ]);
    }

    public function showMedicalBackground(){
        return view('user.3_medical_background')->with(
            [
                'user'=>$this->getUserWithMedicalBackground(),
                'activeLeftNav'=>'medical',
                'editMode'=>'none'
            ]);
    }

    //---------------- [END] 3.0 MEDICAL BACKGROUND --------------------------------------




     //-----------------2.0 [[ JOURNAL ]]-------------------------------------------------------
     //-----------------2.0 JOURNAL RECORDS VISITS SERVICE FORMS------------------------------------------
    public function showJournalRecords(Request $request){
        // return $this->getJournalRecords();
        //return $this->getJournalRecords();
        return view('user.1_a_journal_records')->with(
            [
                'activeLeftNav'=>'visits',
                'currentVisit'=>new Visit(),
                'availableActiveVisit'=>false,
                'showPreviousVisits'=>true,
                'journalRecords'=>$this->getJournalRecords(),
            ]);
    }

    public function showVisitFormsDetails($visit_id){
        $visit = Visit::find($visit_id);
        // return response()->json($visit);

        $encounters = $this->getEncountersWithData($visit->id);

        return view('user.1_b_service_form_details')->with(
            [
                'activeLeftNav'=>'visits',
                'currentVisit'=>new Visit(),
                'availableActiveVisit'=>false,
                'editMode'=>'none',

                'accessToken'=>"ASSUMED-TOKEN",
                'visit'=>$visit,
                'encounters'=>$encounters,
                'investigationId'=>" ",
            ]);

    }

    public function confirmServiceReception($visit_id){
        $visit = Visit::find($visit_id);
        $visit->patient_confirmation = true;
        $visit->save();

        return redirect()->back()->with(['flashMessage'=>"This service form is now active"]);

    }


    #olderMethods
    public function closeVisitForm(Request $request){
        //TODO Test when a session expire
        $request->session()->put('availableActiveVisit', false);
        $request->session()->put('visit_token', null);

        return redirect()->route('user.visit.current');
    }

    public function activatePreviousVisits(Request $request,$visit_id){

        $activeVisit = new ActiveVisit();
        $activeVisit->visit_id =  $visit_id;
        $userId= 670;
        $activeVisit->access_token = strtoupper(str_random(4)) ."0".$userId. strtoupper(str_random(2)) ;
        $activeVisit->save();

        $request->session()->put('availableActiveVisit', true);
        $request->session()->put('visit_token', $activeVisit->access_token );

        return redirect()->route('user.visit.current');
    }






    #+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    #+++++++++++++++++ Helpers +++++++++++++++++++++++++++++++

    ##Profile-Helpers
    private function getUserProfile(){
        $user = Auth::user();
        $user->primaryContact = $this->getPrimaryContact();
        $user->emergenceContacts = $this->getEmergenceContacts();
        $user->relatives = $this->getRelatives();
        return $user;
    }

    private function  getPrimaryContact(){
        $contact = Contact::firstOrNew([
            'user_id' => Auth::id(),
            'type' => 'primary'
        ]);
        return $contact;
    }

    private function  getEmergenceContacts(){
        $contacts = Contact::where('user_id',Auth::id())
            ->where('type','emergence')->get();
        return $contacts;
    }

    private function  getRelatives(){
        $relatives = BloodRelative::where('user_id',Auth::id())->get();
        foreach ($relatives as $relative){
            $relative->name = $this->getUserFromToken($relative->dmw_token)->name;
        }
        return $relatives;
    }

    private function getUserFromToken($token){
        $user = User::where('dmw_token',$token)->first();
        return $user;
    }

    ##Journal
    private function  getJournalRecords(){
        $journalRecords = JournalRecord::where('user_id',Auth::id())
            ->latest()->get();

        foreach ($journalRecords as $journalRecord){

            if($journalRecord->table_name=="visits"){
                $visitRecord = Visit::where('visits.id', $journalRecord->item_id)
                    ->join('health_care_providers','visits.provider_id', 'health_care_providers.id')
                    ->select('visits.*','health_care_providers.facility_name','health_care_providers.facility_type')
                    ->first();
                $activeVisit =  ActiveVisit::where('visit_id',$visitRecord->id)->first() ;
                if( !($activeVisit==null)){
                    $visitRecord->access_token = $activeVisit->access_token;
                }else{
                    $visitRecord->access_token = "Not Active";
                }

                $journalRecord->data =  $visitRecord;

            }else if($journalRecord->table_name=="medication"){
                $journalRecord->data  = Medication::find( $journalRecord->item_id);

            }else if($journalRecord->table_name=="symptom"){
                $journalRecord->data =  "";

            }else if($journalRecord->table_name=="immunization"){
                $journalRecord->data  = Immunization::find( $journalRecord->item_id);
            }else if($journalRecord->table_name=="allergy"){
                $journalRecord->data  = Allergy::find( $journalRecord->item_id);
            }else if($journalRecord->table_name=="issue"){
                $journalRecord->data  = MedicalCondition::find( $journalRecord->item_id);
            }

        }

        return $journalRecords;
     }


    ##MedicalBackground-Helpers
    private function getUserWithMedicalBackground(){
        $userWithBackground = Auth::user();
        $userWithBackground->vitalSigns = $this->getVitalSigns();
        $userWithBackground->medicalConditions = $this->getMedicalConditions();
        $userWithBackground->medications = $this->getMedications();
        $userWithBackground->allergies = $this->getAllergies();
        $userWithBackground->immunizations = $this->getImmunizations();
        return $userWithBackground;
    }

    private function  getVitalSigns(){
        $vitalSigns = VitalSign::all();
        foreach ($vitalSigns as $vitalSign){
            $vitalSign->values = VitalSignValue::where('user_id',Auth::id())
                ->where('vital_sign_id', $vitalSign->id)->get();
        }

        return $vitalSigns;
    }

    private function  getMedicalConditions(){
        $medicalConditions = MedicalCondition::where('user_id',Auth::id())->get();
        foreach ($medicalConditions as $medicalCondition){
           // $medicalCondition->labResult = LabResult::where('medical_condition_id')->get();
        }
        return $medicalConditions;
    }

    private function  getMedications(){
        $medication = Medication::where('user_id',Auth::id())->get();
        return $medication;
    }

    private function  getAllergies(){
        $allergies = Allergy::where('user_id',Auth::id())->get();
        return $allergies;
    }

    private function  getImmunizations(){
        $immunization = Immunization::where('user_id',Auth::id())->get();
        return $immunization;
    }

    private function getDetailedVisits(){
        $visits = Visit::where('dmw_token',Auth::user()->dmw_token)->get();
        foreach ($visits as $visit){
            $visit->encounters = Encounter::where('visit_id', $visit->id)->get();;
            foreach ($visit->encounters  as $encounter){
                $encounter->encounterDatas = EncounterData::where('encounter_id',$encounter->id)->get();

                if($encounter->encounter_code == 003){
                    //Lab tests
                    foreach ($encounter->encounterDatas as $encounterData){
                        $encounterData->labResults = LabResult::where('investigation_id',$encounterData->id)->get();
                    }
                }

            }
        }
        return $visits;
    }


    #more Helpers
    private function isWeightRecordOwner($weightId){
        return Weight::find($weightId)->user_id == Auth::id() ? true : false ;
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


}
