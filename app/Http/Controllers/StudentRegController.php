<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Section;


class StudentRegController extends Controller
{
    public function studentReg(){
      $batches=Batch::latest()->get();
      return view('admin.studentreg.add_form',compact('batches'));
    }

    public function bringSection(Request $request){
      $section=Section::where([
        'batch_id'=>$request->id,
      ])->get();
      return view('admin.studentreg.bring_section',compact('section'));
    }
}
