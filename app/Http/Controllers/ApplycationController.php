<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applycation;

class ApplycationController extends Controller
{
    public function applyForm(){
      return view('admin.apply.apply_form');
    }

    public function applyStore(Request $request){
           $apply= new Applycation();
           $apply->user_id = request()->user()->id;
           $apply->apply_name=$request->apply_name;
           $apply->apply_email=$request->apply_email;
           $apply->apply_subject=$request->apply_subject;
           $apply->apply_details=$request->apply_details;
           $apply->save();
           return redirect()->route('apply-list');
    }

    public function applyList(){
      $user = \App\User::find(auth()->user()->id);
      $applys=$user->applications()->latest()->get();
      return view('admin.apply.view_form',compact('applys'));
    }

    public function apply_show_by_teacher(){
      $applys=Applycation::latest()->get();
      return view('admin.apply.teacher_view',compact('applys'));
    }

    public function apply_view_by_teacher($id){
      $apply=Applycation::find($id);
      return  view('admin.apply.teacher_full_view');
    }

    public function fetchdata($id) {

      $apply = Applycation::find($id);

      return response()->json([
        'data' => $apply
      ]);
    }
//==========accept teacher========
    public function applyAcceptByTeacher($id){
      $apply=Applycation::find($id)->update(['status'=>2]);
      return back();
    }

    //==========reject teacher========
        public function applyRejectByTeacher($id){
          $apply=Applycation::find($id)->update(['status'=>3]);
          return back();
        }


    public function apply_show_by_admin(){
      $applys=Applycation::where('status',2)->orWhere('status', 4)->orWhere('status', 5)->latest()->get();
      return view('admin.apply.admin_view',compact('applys'));

    }

    public function applyAcceptByAdmin($id){
        $apply=Applycation::find($id)->update(['status'=>4]);
        return back();
    }

    public function applyRejectByAdmin($id){
        $apply=Applycation::find($id)->update(['status'=>5]);
        return back();
    }
}
