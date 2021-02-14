<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assingment;

class AssingmentController extends Controller
{
    public function addAssingment (){
      return view('admin.assingment.add_form');
    }

    public function storeAssingment(Request $request){
      $this->validate($request,[
        'assingment_title' => 'required',
        'file' => 'required',
      ]);
      $assingment=new Assingment();
      $assingment->user_id = request()->user()->id;
      if($request->file('file')){
        $file=$request->file('file');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('storage/assingment/',$filename);
        $assingment->file=$filename;
      }
      $assingment->assingment_title=$request->assingment_title;
      $assingment->roll=$request->roll;
      $assingment->save();
      return redirect()->route('assingment-list');
    }

    public function listAssingment(){
      $user = \App\User::find(auth()->user()->id);
      $assingments=$user->assingments()->latest()->get();
      return view('admin.assingment.assingment_list',compact('assingments'));
    }

    public function deleteAssingment($id){
      $assingment=Assingment::find($id)->delete();
      return back();
    }

    public function downloadFile($file){
      return response()->download('storage/assingment/'.$file);
    }

    public function teacherReview(){
      $assingment=Assingment::latest()->get();
      return view('admin.assingment.teacher_review',compact('assingment'));
    }

    public function applyAccept($id){
        $assingment=Assingment::find($id)->update(['assingment_status'=>2]);
        return back();
    }

    public function applyReject($id){
        $assingment=Assingment::find($id)->update(['assingment_status'=>3]);
        return back();
    }
}
