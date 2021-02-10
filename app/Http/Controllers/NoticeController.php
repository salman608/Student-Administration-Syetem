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
            'notice' => 'required',
        ]);
        $notice=new Notice();
        $notice->notice=$request->notice;
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
}
