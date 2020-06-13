<?php

namespace App\Http\Controllers;

use App\ActiveVisit;
use App\Allergy;
use App\BloodRelative;
use App\Contact;
use App\DumbClasses\Parameters;
use App\DumbClasses\Profession;
use App\Encounter;
use App\EncounterData;
use App\Events\HealthCareEmployeeAdded;
use App\HealthCareEmployee;
use App\Immunization;
use App\JournalRecord;
use App\LabResult;
use App\MedicalCondition;
use App\Medication;
use App\User;
use App\Visit;
use App\VitalSign;
use App\VitalSignValue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HealthExpertController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth:health_care_employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //return Auth::user();
        switch (Auth::user()->profession){

        case 'receptionist':{
            return redirect()->route('hce.opd',[
                'active_tab'=>'insurance'
            ]);
        }break;

         default :{
        return redirect()->route('hce.patient.wallet.search');
        }


        }
    }


    //---------------------------------------------------------------------------------------------
    //-------------------------0.0 Wallet Searches-------------------------------------------------
    public function searchUserByToken(){
        return view('expert.1_search_form')->with(
            [
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'none',
                'accessToken'=>" ",
            ]);
    }

    public function submitSearchQuery(Request $request){

        #check if Form is active
        if($this->checkAccessToken($request->input('access_token')) == null ){
            return redirect()->back()
                ->withInput()
                ->withErrors(['token'=>'No Record found']);
        }

        #get Form Associated with the token
        $visit = $this->visitFromToken($request->input('access_token'));
        $user= User::where('dmw_token',$visit->dmw_token)->first();

        return view('expert.1_search_result')->with(
            [
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'none',
                'user'=>$user,
                'visit'=>$visit,
                'accessToken'=>$request->input('access_token'),
            ]);
    }

    #----------------------------------------------------------------------------------------------
    #-----------------OPD Service FORM ------------------------------------------------------------
    public function showServiceForms($active_tab){

        return view('expert.0_accounts',[
            'visits'=>$this->getVisits($active_tab),
            'activeTab'=>$active_tab,
            'activeLeftNav'=>'accounts',
            'activeWalletTab'=>'accounts',
            'editMode'=>'none',
            'investigationId'=>" ",
        ]);
    }

    #opd-1
    public function verifyDmwValidityForm($active_tab){
        return view('expert.0_accounts',[
            'visits'=>$this->getVisits($active_tab),
            'activeLeftNav'=>'accounts',
            'activeTab'=>$active_tab,
            'editMode'=>'verify_dmw',
            'results'=>false,
            'user'=>new User(),
        ]);
    }
    #opd-2
    public function verifyDmwValidityAttempt(Request $request){
       //return $request->all();

        $user = User::where('dmw_token',$request->input('dmw_token'))->first();
        if($user==null){
            return redirect()
                ->back()
                ->withErrors(['dmw_token'=> "ID:  ". $request->input('dmw_token').' Does not exist']);
        }

       // return $user;

        return view('expert.0_accounts',[
            'visits'=>$this->getVisits($request->input('active_tab')),
            'activeLeftNav'=>'accounts',
            'activeTab'=>$request->input('active_tab'),
            'user'=>$user,
            'editMode'=>'verify_dmw',
            'results'=>true,
        ]);

    }

    #opd-3
    public function generateNewServiceForm( $dmw_token, $active_tab){
        return view('expert.0_accounts',[
            'activeLeftNav'=>'accounts',
            'visits'=>$this->getVisits($active_tab),
            'activeTab'=>$active_tab,
            'dmw_token'=>$dmw_token,
            'editMode'=>'new_form',
        ]);
    }

    #opd-4
    public function saveNewServiceForm(Request $request){
        //return $request->all();

        $user = User::where('dmw_token',$request->input('dmw_token'))->first();
        if($user==null){
            return redirect()
                ->back()
                ->withErrors(['dmw_token'=> $request->input('dmw_token').' Does not exist']);
        }


        $visit = new Visit();
        $visit->user_id = $user->id;
        $visit->nhif_card_number = $request->input('nhif_card_number');

        $visit->provider_id = Auth::user()->health_provider_id  ;
        $visit->dmw_token = $request->input('dmw_token');
        $visit->taken = true;
        $visit->patient_confirmation = false;

        $visit->consultation_fee = $request->input('consultation_fee');
        $visit->payment_type = $request->input('active_tab');
        $visit->save();

        //Activate visit (Add to active Visit)
        $activeVisit = new ActiveVisit();
        $activeVisit->visit_id =  $visit->id;
        $activeVisit->access_token= $this->generateTemporalToken();
        $activeVisit->save();


        $visit->serial_number ="P". $visit->provider_id
                .$user->id
                .$visit->id
                ."-".strtoupper(  dechex(time()) );
        $visit->save();

        //TODO add JournalRecord
        $journalRecord = new JournalRecord();
        $journalRecord->user_id = $user->id;
        $journalRecord->table_name = "visits";
        $journalRecord->item_id = $visit->id;
        $journalRecord->save();



        return redirect()->route('hce.opd',[
            'active_tab'=>$request->input('active_tab' ),
        ]);
    }








    //---------------------------------------------------------------------------------------------
    //-------------------------[[2.1.0 Accounts]]------------------------------------------------------
    public function showAddTestPaymentForm($visit_id, $investigation_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'add_test_payment',

                'encounters'=>$encounters,
                'investigationId'=>$investigation_id,
            ]);
    }

    public function saveTestFeePayment(Request $request){

        $investigationTest = EncounterData::find($request->input('investigation_id'));
        $investigationTest->fee_amount = $request->input('fee_amount');
        $investigationTest->is_fee_paid = true;
        $investigationTest->save();

        return redirect()->route('hce.patient.consultation',[
            'visit_id'=>$request->input('visit_id'),
        ]);
    }





    //--------------------------------------------------------------------------------------
    //-------------------------[[3.0 Consultation]]---------------------------------------------
    public function showActiveVisit($visit_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'none',

                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }

    public function showServiceForm($visit_id){
        $visit = Visit::find($visit_id);
        //check patient confirmation

        if(!($visit->patient_confirmation)){
            return redirect()->back()->with([
                'flashMessage'=>"Patient has not confirmed the service form"
            ]);
        }

        if(!($visit->is_active)){
            return redirect()->back()->with([
                'flashMessage'=>"The Service form has been closed"
            ]);
        }

        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'none',
                'accessToken'=>'',
                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }


    #-------------- 3.1 Consultation Symptoms------------------------------------------
    public function showSymptomForm($visit_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeWalletTab'=>'visit',
                'activeLeftNav'=>'wallets',
                'editMode'=>'new_symptom',
                'accessToken'=>"",
                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }
    public function saveNewSymptom(Request $request){
        //return $request->all();

        $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();


        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#symptom'
        ]);
    }

    #-------------- 3.2 Consultation Examination------------------------------------------
    public function showExaminationForm($visit_id){
        $visit = Visit::find($visit_id);


        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'new_examination',

                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }
    public function saveNewExamination(Request $request){
         $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();


        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#examination'
        ]);

    }

    #-------------- 3.3 Consultation Investigation------------------------------------------
    public function showInvestigationForm($visit_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'new_investigation',
                'accessToken'=>" ",
                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }
    public function saveNewInvestigation(Request $request){
         $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();


        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#investigation'
        ]);
    }


    #-------------- 3.4 Lab Results ---------------------------------------------------
    public function showActiveInvestigations($visit_id){
        $visit = Visit::find($visit_id);
        $encounterDatas = $this->getLabEncounterDatas($visit->id);

        return view('lab.2_investigations')->with(
            [
                'activeLeftNav'=>'',
                'editMode'=>'none',

                'encounterDatas'=>$encounterDatas,
                'investigationId'=>" ",
            ]);
    }
    # Adding Lab Results
    public function showAddResultForm(Request $request,$visit_id, $investigation_id){
        $request->session()->flash('add_result', 'true');
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [

                'visit'=>$visit,
                'encounters'=>$encounters,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'accounts',
                'editMode'=>'add_result',
                'investigationId'=>$investigation_id,
            ]);
    }
    #Saving Lab Results
    public function saveResult(Request $request){
       //return $request->all();

        $file =$request->file('result_file');

        if($file==null){

            return redirect()->route('hce.patient.consultation.service_form',
                [
                    'visit_id'=>$request->input('visit_id'),
                ]
            );
        }



        //store uploaded file
        $file_name = "lab_file_" . time().".pdf";
        $destinationFolder = storage_path('app/lab_results');
        $file->move( $destinationFolder , $file_name );

        $labResult = new LabResult();
        $labResult->investigation_id = $request->input('investigation_id');
        $labResult->file_path = $file_name;
        $labResult->remark = $request->input('result_remark');
        $labResult->save();

        return redirect()->route('hce.patient.consultation.service_form',
            [
                'visit_id'=>$request->input('visit_id'),
            ]
        );

    }

    public function viewLabResult($result_id){
       //return $request->all();


    }

    #-------------- 3.5 Consultation Prescription------------------------------------
    public function showPrescriptionForm($visit_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'new_prescription',

                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }
    public function saveNewPrescription(Request $request){
        $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();

        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#prescription'
        ]);

    }

    public function showAddPrescriptionPaymentForm($visit_id, $prescription_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'encounters'=>$encounters,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'accounts',
                'editMode'=>'add_prescription_payment',
                'investigationId'=>$prescription_id,
            ]);
    }
    public function savePrescriptionPayment(Request $request){
        $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();

        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#prescription'
        ]);

    }

    #-------------- 3.6 Consultation Final Diagnosis------------------------------------
    public function showFinalDiagnosisForm($visit_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'new_final_diagnosis',

                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }
    public function saveNewFinalDiagnosis(Request $request){
        $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();

        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#prescription'
        ]);

    }

    #-------------- 3.6 Consultation Advice------------------------------------------
    public function showAdviceForm($visit_id){
        $visit = Visit::find($visit_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.3_visit')->with(
            [
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'visit',
                'editMode'=>'new_advice',

                'encounters'=>$encounters,

                #dummies
                'investigationId'=>" ",
            ]);
    }
    public function saveNewAdvice(Request $request){

         $visit = Visit::find($request->input('visit_id'));

        $encounter = Encounter::firstOrCreate(
            ['visit_id' => $visit->id, 'encounter_code' => $request->input('encounter_code')],
            ['description' => $request->input('encounter_description'), ]
        );

        $encounterData = new EncounterData();
        $encounterData->encounter_id = $encounter->id;
        $encounterData->text_1 =  $request->input('text_1');
        $encounterData->save();

        return redirect()->route('hce.patient.consultation.service_form',[
            'visit_id'=>$request->input('visit_id'),
            '#advice'
        ]);

    }





    ///[[ WALLET TABS ]]
    //------------------------------------------------------------------------------------
    //------------------------- 4.0 BasicInfo---------------------------------------------
    public function showUserPersonalDetails($visit_id){
        $visit = Visit::find($visit_id);
        return view('expert.4_personal_details')->with(
            [
                'user'=>$this->getUserProfile($visit_id),
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'personal',
                'editMode'=>'none',

                #dummies
                'investigationId'=>" ",
            ]);
    }

    //------------------------------------------------------------------------------------
    //------------------------- 5.0 MedicalBackground--------------------------------------
    public function showUserMedicalBackground($visit_id){
        $visit = Visit::find($visit_id);
        return view('expert.5_medical_vitals')->with(
            [
                'user'=>$this->getUserWithMedicalBackground($visit_id),
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'medical',
                'editMode'=>'none',

                #dummies
                'investigationId'=>" ",
            ]);
    }

    public function showVitalSignTrend($vs_id , $viewMode){

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

        return view('expert.5_medical_vitals_trend_graph')->with(
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

    //------------------------------------------------------------------------------------
    //------------------------- 6.0 Journal------------------------------------------------
    public function showJournalRecords($visit_id){
        // return $this->getJournalRecords();
        $visit = Visit::find($visit_id);

        return view('expert.6_medical__journal')->with(
            [
                'user'=>$this->getUserWithMedicalBackground($visit_id),
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'journal',
                'editMode'=>'none',

                'selectedRecord'=>" ",
                'encounters'=>" ",
                'viewMode'=>'journal_records',

                'currentVisit'=>new Visit(),
                'availableActiveVisit'=>false,
                'showPreviousVisits'=>true,
                'journalRecords'=>$this->getJournalRecords($visit_id),


                #dummies
                'investigationId'=>" ",
            ]);
    }

    public function showJournalRecordDetails($current_visit_id,$record_id){

        $visit = Visit::find($current_visit_id);

        $selectedVisitRecord = Visit::find($record_id);
        $encounters = $this->getEncountersWithData($visit->id);

        return view('expert.6_medical__journal')->with(
            [
                'user'=>$this->getUserWithMedicalBackground($current_visit_id),
                'visit'=>$visit,
                'activeLeftNav'=>'wallets',
                'activeWalletTab'=>'journal',
                'editMode'=>'none',

                'selectedVisitRecord'=>$selectedVisitRecord,
                'encounters'=>$encounters,
                'viewMode'=>'record_details',

                'currentVisit'=>new Visit(),
                'availableActiveVisit'=>false,
                'showPreviousVisits'=>true,
                'journalRecords'=>$this->getJournalRecords($current_visit_id),

                #dummies
                'investigationId'=>" ",
            ]);
    }





    //-------------------------------------------------------------------------------
    //----------------------------HELPERS--------------------------------------------

    #helper Visit from Token
    private function checkAccessToken($active_visit_token){
        $activeVisit= ActiveVisit::where('access_token', $active_visit_token )->first();
        return $activeVisit;
    }

    private function visitFromToken($active_visit_token){
        $activeVisit= ActiveVisit::where('access_token', $active_visit_token )->first();
        $visit = Visit::find($activeVisit->visit_id);
        return $visit;
    }



    ##PersonDetails-helpers
    private function getUserProfile($visitId){

        $visit =Visit::find($visitId);
        $user = User::where('dmw_token',$visit->dmw_token)->first();

        $user->primaryContact = $this->getPrimaryContact($user->id);
        $user->emergenceContacts = $this->getEmergenceContacts($user->id);
        $user->relatives = $this->getRelatives($user->id);
        return $user;
    }

    private function  getPrimaryContact($userId){
        $contact = Contact::firstOrNew([
            'user_id' => $userId,
            'type' => 'primary'
        ]);
        return $contact;
    }

    private function  getEmergenceContacts($userId){
        $contacts = Contact::where('user_id',$userId)
            ->where('type','emergence')->get();
        return $contacts;
    }

    private function  getRelatives($userId){
        $relatives = BloodRelative::where('user_id',$userId)->get();
        foreach ($relatives as $relative){
            $relative->name = $this->getUserFromToken($relative->dmw_token)->name;
        }
        return $relatives;
    }


    ##MedicalVitalsBackground-Helpers
    private function getUserWithMedicalBackground($visitId){

        $visit =Visit::find($visitId);
        $userWithBackground = User::where('dmw_token',$visit->dmw_token)->first();

        $userWithBackground->vitalSigns = $this->getVitalSigns($userWithBackground->id);
        $userWithBackground->medicalConditions = $this->getMedicalConditions($userWithBackground->id);
        $userWithBackground->medications = $this->getMedications($userWithBackground->id);
        $userWithBackground->allergies = $this->getAllergies($userWithBackground->id);
        $userWithBackground->immunizations = $this->getImmunizations($userWithBackground->id);
        return $userWithBackground;
    }

    private function  getVitalSigns($userId){
        $vitalSigns = VitalSign::all();
        foreach ($vitalSigns as $vitalSign){
            $vitalSign->values = VitalSignValue::where('user_id', $userId )
                ->where('vital_sign_id', $vitalSign->id)->get();
        }

        return $vitalSigns;
    }

    private function  getMedicalConditions($userId){
        $medicalConditions = MedicalCondition::where('user_id',$userId)->get();
        foreach ($medicalConditions as $medicalCondition){
            //Todo fetch lab results
            // $medicalCondition->labResult = LabResult::where('medical_condition_id')->get();
        }
        return $medicalConditions;
    }

    private function  getMedications($userId){
        $medication = Medication::where('user_id',$userId)->latest()->paginate(6);
        return $medication;
    }

    private function  getAllergies($userId){
        $allergies = Allergy::where('user_id',$userId)->latest()->paginate(6);
        return $allergies;
    }

    private function  getImmunizations($userId){
        $immunization = Immunization::where('user_id',$userId)->get();
        return $immunization;
    }

    ##MedicalJournal
    private function  getJournalRecords($visit_id){

        $visit =Visit::find($visit_id);
        $user = User::where('dmw_token',$visit->dmw_token)->first();

        $journalRecords = JournalRecord::where('user_id',$user->id)
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
        return $visits;
    }



    #MoreHelpers MoreHelpers MoreHelpers
    private function getUserFromToken($token){
        $user = User::where('dmw_token',$token)->first();
        return $user;
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

    #get Enc-1 encounterDatas with EncounterDatas
    private function getLabEncounterDatas($visit_id){
        $encounter = Encounter::where('visit_id', $visit_id)->where('encounter_code', 003)->first();
        if($encounter==null){
            return []  ;
        }

        $encounterDatas =  EncounterData::where('encounter_id',$encounter->id)->get();
        foreach ($encounterDatas as $encounterData){
            $encounterData->labResults = LabResult::where('investigation_id',$encounterData->id)->get();
        }
        return $encounterDatas;
    }

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

    private function  getVisits($activeTab){
        $visits = Visit::where( 'provider_id', Auth::user()->health_provider_id)
        ->where('payment_type',$activeTab)
        ->join('users','visits.dmw_token', 'users.dmw_token')
        ->select('visits.*','users.name')
            ->orderBy('id',"DESC")
            ->get();

        foreach ($visits as $visit){
            $activeVisit =  ActiveVisit::where('visit_id',$visit->id)->first() ;
            if( !($activeVisit==null)){
                $visit->access_token = $activeVisit->access_token;
            }else{
                $visit->access_token = "Not Active";
            }
        }
        return $visits;
    }

    private function generateTemporalToken(){

        do{
            $temporalCode = bin2hex(random_bytes(2))."-".bin2hex(random_bytes(2))."-".bin2hex(random_bytes(2));
            $visit = $this->checkAccessToken($temporalCode);
        }while(!($visit==null));


        return  strtoupper($temporalCode);

    }

}
