<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    //
    public function viewInputForm(Request $request, $formid){
        
        $id = explode('_', $request->cookie('user_auth'))[0];
        $data = DB::table('forms')
        ->join('subject_lecturers', 'forms.subject_id', '=', 'subject_lecturers.subject_id')
        ->join('lecturers', 'subject_lecturers.lecturer_id', '=', 'lecturers.id')
        ->join('subjects', 'subjects.id','=','subject_lecturers.subject_id')
        ->select('forms.*', 'lecturers.name', 'subject_lecturers.lecturer_id','subjects.subject')
        ->where('lecturers.id', '=', $id)
        ->where('forms.id','=',$formid)
        ->first();
        return view('form', ['datalec'=>$data]);
    }
}
