<?php

namespace App\Http\Controllers;
use App\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{

    public function index()
    {
        $data['notes'] = Note::paginate(10);
   
        return view('list',$data);
    }
 
    public function pdf(){
      
     $data['title'] = 'Notes List';
     $data['notes'] =  Note::get();
 
     $pdf = PDF::loadView('notes.list_notes', $data);
   
     return $pdf->download('tuts_notes.pdf');
    }
    
    //
}
