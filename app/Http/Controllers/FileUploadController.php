<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileUpload extends Controller
{

/////=============================================upload file================///////////////////////
public function createForm(){
  return view('expert.file-upload')->with(
      [
          'activeLeftNav'=>'wallets',
       
          'activeTab'=>'activeTab',
          'activeTab'=>'table'
      
      ]);
}

public function fileUpload(Request $req){
      $req->validate([
      'file' => 'required|mimes:csv,txt,xlx,png,xls,docx,pdf|max:2048'
      ]);

      $fileModel = new File;

      if($req->file()) {
          $fileName = time().'_'.$req->file->getClientOriginalName();
          $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');

          $fileModel->name = time().'_'.$req->file->getClientOriginalName();
          $fileModel->file_path = '/storage/' . $filePath;
          $fileModel->save();

          return back()
          ->with('success','File has been uploaded succesfully.')
          ->with('file', $fileName);
      }
 }



}