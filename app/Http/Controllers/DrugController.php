<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Drug;

class DrugController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){

        if(request()->ajax()) {
            return datatables()->of(Drug::select('*'))
            ->addColumn('action', 'DataTables.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('list')
    

     }

    public function showlogin()
    {
        return view('expert.drug');
    }  

    public function AddDrug(Request $request)
    {  
        $productId = $request->product_id;
        $product   =   Drug::updateOrCreate(['id' => $productId],
                    ['title' => $request->title, 'product_code' => $request->product_code, 'description' => $request->description]);        
        return Response::json($product);
    }
      
      
    /**
     * Show the form for editing the specified resource.
     *
 * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editDrug($id)
    {   
        $where = array('id' => $id);
        $product  = Drug::where($where)->first();
      
        return Response::json($product);
    }
      
      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function removeDrug($id)
    {
        $product = Drug::where('id',$id)->delete();
      
        return Response::json($product);
    }
    }   

    // }
}