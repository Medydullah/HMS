<?php

namespace App\Http\Controllers;

use App\LabResult;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //   $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return redirect()->route('user');
    }


    /**** SAVERS **/
    public function downloadLabResult($result_id){
      //  return "ddf ";
        $labResult = LabResult::find($result_id);

        $headers= ['Content-Type' => 'Application/pdf'];

        $filePath = storage_path('app/lab_results') . "//" . $labResult->file_path ;
        return response()->download($filePath,$labResult->file_path, $headers );

    }

}
