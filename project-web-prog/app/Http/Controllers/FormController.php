<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    //
    public function viewForm(Request $request){
        
        $id = explode('_', $request->cookie('user_auth'))[0];
        $data = DB::table('forms')
        ->join('subject_lecturers', 'forms.subject_id', '=', 'subject_lecturers.subject_id')
        ->join('lecturers', 'subject_lecturers.lecturer_id', '=', 'lecturers.id')
        ->select('forms.*', 'lecturers.name', 'lecturers.id')
        ->where('lecturers.id', '=', $id)
        ->first();
        return view('form', ['datalec'=>$data]);
    }
}
