<?php

namespace App\Http\Controllers;
use App\Notice;

use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function create(){
        return view('admin.notice.create');
    }

    public function add(Request $request){
        $this->validate($request,[
          'notice_title' => 'required',
          'file' => 'required',
        ]);
        $notice=new Notice();
        if($request->file('file')){
          $file=$request->file('file');
          $filename=time().'.'.$file->getClientOriginalExtension();
          $request->file->move('storage/',$filename);
          $notice->file=$filename;
        }
        $notice->notice_title=$request->notice_title;
        $notice->save();
        return redirect()->route('notice-index');
    }

    public function index(){
        $notice=Notice::latest()->get();
        return view('admin.notice.index',compact('notice'));
    }

    public function delete($id){
        $notice=Notice::find($id)->delete();
        return back();
    }

    public function downloadFile($file){
      return response()->download('storage/'.$file);
    }

    public function showNotice(){
      $notice=Notice::latest()->get();
      return view('admin.show_notice',compact('notice'));
    }
}
