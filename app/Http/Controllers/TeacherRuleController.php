<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeacherRule;

class TeacherRuleController extends Controller
{
  public function index(){
    $rules=TeacherRule::all();
    return view('admin.teacher.view_rules',compact('rules'));
  }

    public function create(){
      return view('admin.teacher.create_rule');
    }

    public function storeTeacherRule(Request $request){
       $rules=new TeacherRule();
       $rules->teacher_rules=$request->teacher_rules;
       $rules->save();
       return redirect()->back();
    }

    public function deleteTeacherRule($id){
      $rules=TeacherRule::find($id)->delete();
      return back();
    }

    public function editTeacherRule($id){
      $rules=TeacherRule::find($id);
      return view('admin.teacher.edit_rules',compact('rules'));
    }

    public function updateTeacherRule(Request $request,$id){
      $rules=TeacherRule::find($id);
      $rules->teacher_rules=$request->teacher_rules;
      $rules->update();
      return back();
    }
}
