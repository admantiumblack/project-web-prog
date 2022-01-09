<?php

namespace App\Http\Controllers;

use App\Models\ClusterScc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use League\Csv\Reader;

class FormController extends Controller
{
    //
    public function viewAllForm(Request $request){
        
        $ssc_id = explode('_', $request->cookie('user_auth'))[0];
        $cluster_id = ClusterScc::where('lecturer_id','=',$ssc_id)->first()->cluster_id;

        $forms = DB::table('forms')
        ->join('subjects', 'forms.subject_id', '=', 'subjects.id')
        ->select('forms.*', 'subjects.subject')
        ->where('subjects.cluster_id', '=', $cluster_id)
        ->get();
        
        return view('view.formresult', ['forms'=>$forms]);
    }
    
    public function viewInputForm(Request $request, $id){
        
        $lecturerId = explode('_', $request->cookie('user_auth'))[0];
        $data = DB::table('forms')
        ->join('subject_lecturers', 'forms.subject_id', '=', 'subject_lecturers.subject_id')
        ->join('lecturers', 'subject_lecturers.lecturer_id', '=', 'lecturers.id')
        ->join('subjects', 'subjects.id','=','subject_lecturers.subject_id')
        ->select('forms.*', 'lecturers.name', 'subject_lecturers.lecturer_id','subjects.subject')
        ->where('lecturers.id', '=', $lecturerId)
        ->where('forms.id','=',$id)
        ->first();
        return view('form', ['datalec'=>$data]);
    }

    public function viewFormDetail($formId){
        $form = Form::find($formId);

        $formPath = public_path($form->result_path);
        $data = Reader::createFromPath($formPath, 'r');

    }

}
