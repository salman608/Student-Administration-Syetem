<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TNotice;

class TNoticeController extends Controller
{
  public function addNotice(){
    return view('admin.teacher_notice.add_form');
  }

  public function listNotice(){
   $user = \App\User::find(auth()->user()->id);
   $tnotice=$user->tnotices()->latest()->get();
   return view('admin.teacher_notice.notice_list',compact('tnotice'));
  }

  public function storeNotice(Request $request){
    $this->validate($request,[
      'notice_name' => 'required',
      'file' => 'required',
    ]);
    $tnotice=new TNotice();
    $tnotice->user_id = request()->user()->id;
    if($request->file('file')){
      $file=$request->file('file');
      $filename=time().'.'.$file->getClientOriginalExtension();
      $request->file->move('storage/Tnotice/',$filename);
      $tnotice->file=$filename;
    }
    $tnotice->notice_name=$request->notice_name;
    $tnotice->save();
    return redirect()->route('view-tnotice');
  }

  public function deleteNotice($id){
    $tnotice=TNotice::find($id)->delete();
    return back();
  }
  public function downloadFile($file){
    return response()->download('storage/tnotice/'.$file);
  }

  public function showStudent(){

   $tnotice=TNotice::latest()->get();
   return view('admin.teacher_notice.show_student',compact('tnotice'));
  }
}
