<?php

namespace App\Http\Controllers;

use App\ActiveVisit;
use App\Allergy;
use App\BloodRelative;
use App\Contact;
use App\DumbClasses\Parameters;
use App\Encounter;
use App\EncounterData;
use App\HealthCareProvider;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Barryvdh\DomPDF\Facade as PDF;

class UserControllerAPI extends Controller{

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct(){
      //  $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect()->route('user.visits');
    }

    //[[ 0 Profile ]]
    #auth
    public function register(Request $request){
       // return $request->all();

        $input = $request->all();
        $rule = [ 'email' => 'email|unique:users',  'password' => 'required', ];
        $messages = [ 'unique' => 'Email is already taken ',
            'required' => 'Invalid Password',
            'email' => 'Invalid Email',  ];

        $validator = Validator::make($input, $rule, $messages );

        if ($validator->fails()) {
            return response()->json($validator->errors());
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

        return response()->json([
            'status'=>'success',
            'user'=> $user
        ]);

    }
    public function login(Request $request){
       // return $request->all();

        $user = User::where('email',$request->input('email'))->first();

        if($user==null){
                 return response()->json([
                    'status'=>'success',
                    'auth_status'=>'failed',
                    'message'=>'Email does exist',
                     ]);
        }

        $credentials = [ 'email' => $request->input('email'),  'password' => $request->input('password')] ;
        if(Auth::guard('web')->attempt( $credentials )  ){
            return response()->json([
                'status'=>'success',
                'auth_status'=>'success',
                'user'=>$user,
                'message'=>'Login Successful',
            ]);
        }

        return response()->json([
            'status'=>'success',
            'auth_status'=>'failed',
            'message'=>'Wrong Password',

        ]);

    }

    //profile
    public function getProfile($user_id){
        $user = User::find($user_id);
        $user->primaryContact = $this->getPrimaryContact($user_id);
        $user->emergenceContacts = $this->getEmergenceContacts($user_id);
        $user->relatives = $this->getRelatives($user_id);

        return response()->json([
            'status'=>'success',
            'data'=> $user
        ]);
    }

    public function updateParticulars(Request $request){
        //  return $request->all();
        $user = User::find($request->input('id'));
        $user->name=$request->input('name');
        $user->dob=$request->input('dob');
        $user->gender=$request->input('gender');
        $user->marital_status=$request->input('marital_status');

        $user->ethnicity=$request->input('ethnicity');
        $user->tribe=$request->input('tribe');
        $user->occupation=$request->input('occupation');
        $user->working_hours=$request->input('working_hours');
        $user->save();

        return response()->json([
            'status'=>'success',
             'message'=>'Particulars Updated',
        ]);
    }

    public function updatePrimaryContact(Request $request){
        //return $request->all();

         $contact = Contact::firstOrNew([
            'user_id' => $request->input('id'),
            'type' => 'primary'
        ]);

        $contact->phone_1 = $request->input('phone_1');
        $contact->region = $request->input('region');
        $contact->district = $request->input('district');
        $contact->ward = $request->input('ward');
        $contact->street = $request->input('street');
        $contact->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Primary Contact Updated',
            'contact'=>$contact,
        ]);
     }


    #[[ 1 VITALS ]]
    #1.2 Vital Signs
    public function getVitalSignRecords($user_id, $vs_id){

         $vitalSignValues = VitalSignValue::where('user_id', $user_id)
            ->where('vital_sign_id', $vs_id)
            ->where('active', true)
            ->orderBy('id', 'DESC')
            ->get();

        return response()->json([
            'status'=>'success',
            'data'=> $vitalSignValues
        ]);

    }

    public function saveNewVitalSignRecord(Request $request){
        VitalSignValue::create([
            'user_id'=>$request->input('user_id'),
            'vital_sign_id'=> $request->input('vital_sign_id'),
            'value'=>$request->input('vs_value'),

            'active'=>true,
        ]);

        return  response()->json([
            'status'=>'success',
         ]);
    }

    #1.2 medications
    public function getMedications($user_id){
        $medication = Medication::where('user_id',$user_id )->orderBy('id','DESC')->get();
        return response()->json([
            'status'=>'success',
            'data'=> $medication
        ]);
    }

    public function saveMedications(Request $request){

        $medication= new Medication();
        $medication->user_id = $request->input('user_id');
        $medication->name = $request->input('name');
        $medication->taken_for = $request->input('taken_for');
        $medication->started_at = $request->input('started_at');
        $medication->results = $request->input('results');
        $medication->ended_at ="N/A";
        $medication->instruction ="N/A";
        $medication->intake_method = "N/A";
        $medication->notes = "N/A";
        $medication->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id =$request->input('user_id');
        $journalRecord->table_name = "medication";
        $journalRecord->item_id = $medication->id;
        $journalRecord->save();

        return response()->json([
            'status'=>'success'
         ]);
    }

    #1.3 allergies
    public function getAllergies($user_id){
        $allergies = Allergy::where('user_id', $user_id)
            ->orderBy('id','DESC')->get();

        return response()->json([
            'status'=>'success',
            'data'=> $allergies
        ]);
    }

    public function saveNewAllergy(Request $request){
        $allergy= new Allergy();
        $allergy->user_id = $request->input('user_id');
        $allergy->name = $request->input('name');
        $allergy->reaction = $request->input('reaction');
        $allergy->severity = $request->input('severity');
        $allergy->notes = "N/A";
        $allergy->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id = $allergy->user_id;
        $journalRecord->table_name = "allergy";
        $journalRecord->item_id = $allergy->id;
        $journalRecord->save();

        return response()->json([
            'status'=>'success',
         ]);
    }

    #1.4 immunizations
    public function getImmunizations($user_id){
        $immunizations = Immunization::where('user_id', $user_id )
            ->orderBy('id','DESC')->get();

        return response()->json([
            'status'=>'success',
            'data'=> $immunizations
        ]);
    }

    public function saveNewImmunization(Request $request){

        $immunization= new Immunization();
        $immunization->user_id = $request->input('user_id');
        $immunization->name = $request->input('name');
        $immunization->prescribed_for = $request->input('prescribed_for');
        $immunization->dosage = "N/A";
        $immunization->completed_at ="N/A";
        $immunization->save();

        //Add Journal record for traversing
        $journalRecord = new JournalRecord();
        $journalRecord->user_id =  $immunization->user_id;
        $journalRecord->table_name = "immunization";
        $journalRecord->item_id = $immunization->id;
        $journalRecord->save();

        return response()->json([
            'status'=>'success',
         ]);
    }




    #[[ 2 JOURNAL ]]
    public function  getJournalRecords($user_id){
        $journalRecords = JournalRecord::where('user_id',$user_id )
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

                $journalRecord->item =  $visitRecord;

            }else if($journalRecord->table_name=="medication"){
                $journalRecord->item  = Medication::find( $journalRecord->item_id);

            }else if($journalRecord->table_name=="symptom"){
                $journalRecord->item =  "";

            }else if($journalRecord->table_name=="immunization"){
                $journalRecord->item  = Immunization::find( $journalRecord->item_id);
            }else if($journalRecord->table_name=="allergy"){
                $journalRecord->item  = Allergy::find( $journalRecord->item_id);
            }else if($journalRecord->table_name=="issue"){
                $journalRecord->item  = MedicalCondition::find( $journalRecord->item_id);
            }

            $journalRecord->day =  Carbon::parse($journalRecord->created_at)->day;
            $journalRecord->month = Carbon::parse($journalRecord->created_at)->format('M');


        }

        return response()->json(['status'=>"success","data"=>$journalRecords ]);
     }

    public function  getVisitDetails($visit_id){
        $visit = Visit::where('visits.id',$visit_id )
            ->join('health_care_providers','visits.provider_id','health_care_providers.id')
            ->select('visits.*','health_care_providers.*')
            ->first();

        return response()->json(['status'=>"success","data"=>$visit ]);
     }

    public function confirmServiceReception($visit_id){
        $visit = Visit::find($visit_id);
        $visit->patient_confirmation = true;
        $visit->save();

        return response()->json(['status'=>"success","data"=>$visit ]);
    }

    public function getEncounterDatas( $visit_id, $encounter_code){
        $encounters = Encounter::where('visit_id', $visit_id)->get();
        $encounterDatas = [];

        foreach ($encounters as $encounter){
            if($encounter->encounter_code==$encounter_code){
                $encounterDatas = EncounterData::where('encounter_id',$encounter->id)->get();
                //Get lab results
                foreach ($encounterDatas as $encounterData){
                    $encounterData->encounter_title=$encounter->description;
                    $encounterData->labResults = LabResult::where('investigation_id',$encounterData->id)->get();
                }
            }
        }

        return response()->json(['status'=>"success","data"=>$encounterDatas ]);
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

        $healthCareProvider= HealthCareProvider::find($visit->provider_id);

        $data =  [
            'visit'=>$visit,
            'healthCareProvider'=>$healthCareProvider,
            'activeWalletTab'=>'visit',
            'activeLeftNav'=>"service-forms",
            'editMode'=>'none',
            'accessToken'=>"",
            'encounters'=>$this->getEncountersWithData($visit->id),
            'expenses'=>$this->getEncountersWithExpenses($visit_id),
            #dummies
            'investigationId'=>" ",
        ];

       // return $data;

        $pdf = PDF::loadView('user._9_x_service_form_pdf',  $data   );
        return $pdf->download('Service_Form'.'_'.$visit->name.now().'.pdf');

        return view('user._9_x_service_form_pdf',$data);

    }

    //profile helper
    private function  getPrimaryContact($user_id){
        $contact = Contact::firstOrNew([
            'user_id' => $user_id,
            'type' => 'primary'
        ]);
        return $contact;
    }

    private function  getEmergenceContacts($user_id){
        $contacts = Contact::where('user_id',$user_id)
            ->where('type','emergence')->get();
        return $contacts;
    }

    private function  getRelatives($user_id){
        $relatives = BloodRelative::where('user_id',$user_id)->get();
        foreach ($relatives as $relative){
            $relative->name = $this->getUserFromToken($relative->dmw_token)->name;
        }
        return $relatives;
    }

    private function getUserFromToken($token){
        $user = User::where('dmw_token',$token)->first();
        return $user;
    }

    //        $user->dmw_token= "U2019-003-TGA6";
    private function generateDmwToken(User $user){
        $token  ="M2009"."-D00"
                .$user->id
                 ."-".strtoupper(  dechex(time()) );

        return $token;
    }



    //Form Download
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
