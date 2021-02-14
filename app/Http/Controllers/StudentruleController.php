<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StudentRule;

class StudentruleController extends Controller
{
  public function index(){
    $rules=StudentRule::latest()->paginate(4);
    return view('admin.student.view_rules',compact('rules'));
  }

  public function create(){
    return view('admin.student.create_rule');
  }

  public function storeStudentRule(Request $request){
    $rules=new StudentRule();
    $rules->student_rules=$request->student_rules;
    $rules->save();
    return redirect()->back();
  }

  public function deleteStudentRule($id){
    $rules=StudentRule::find($id)->delete();
    return back();
  }

  public function editStudentRule($id){
    $rules=StudentRule::find($id);
    return view('admin.student.edit_rules',compact('rules'));
  }

  public function updateStudentRule(Request $request,$id){
    $rules=StudentRule::find($id);
    $rules->student_rules=$request->student_rules;
    $rules->update();
    return back();
  }


  public function viewRules(){
    $rules=StudentRule::latest()->paginate(3);
    return view('admin.student.view_rule_list',compact('rules'));
  }
}
