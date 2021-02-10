<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Batch;
use App\Section;

class UniversityController extends Controller
{


    public function addBatch(){
      return view('admin.batch.add_form');
    }

    public function storeBatch(Request $request){
        $this->validate($request,[
          'batch_name'=>'required'
        ]);
        $batch=new batch();
        $batch->batch_name=$request->batch_name;
        $batch->save();

      return back();
    }

    public function listBatch(){
      $batchs=Batch::latest()->get();
      return view('admin.batch.view_form',compact('batchs'));
    }

    public function deleteBatch($id){
      $batch=Batch::find($id)->delete();
      return back();
    }

    public function editBatch($id){
      $batch=Batch::find($id);
      return view('admin.batch.edit_form',compact('batch'));
    }

    public function updateBatch(Request $request,$id){
      $this->validate($request,[
        'batch_name'=>'required'
      ]);

      $batch=Batch::find($id);
      $batch->batch_name=$request->batch_name;
      $batch->save();
      return redirect()->route('batch-list');

    }

    //=========section ============

    public function addSection(){
      $batchs=Batch::all();
      return view('admin.section.add_form',compact('batchs'));
    }

    public function storeSection(Request $request){
      $this->validate($request,[
        'batch_id'=>'required',
        'section_name'=>'required',
      ]);

      $data=new Section();
      $data->batch_id=$request->batch_id;
      $data->section_name=$request->section_name;
      $data->save();
      return back();
    }

    public function listSection(){
      $section=Section::latest()->get();
      $batchs=Batch::all();
      return view('admin.section.view_form',compact('section','batchs'));
    }

    public function sectionListByAjax(Request $request){
      $sections=Section::where([
        'batch_id'=>$request->id,
      ])->get();

      return view('admin.section.section_list_ajax',compact('sections'));

    }


    public function sectionDelete(){
      
    }
}
