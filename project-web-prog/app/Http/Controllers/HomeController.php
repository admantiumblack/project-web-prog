<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome(Request $request){
        
        // TO-DO JSON STUFF
        $id = explode('_', $request->cookie('user_auth'))[0];
        $forms = DB::table('forms')
        ->join('subject_lecturers', 'forms.subject_id', '=', 'subject_lecturers.subject_id')
        ->join('subjects', 'forms.subject_id', '=', 'subjects.id')
        ->select('forms.*', 'subjects.subject', 'subject_lecturers.lecturer_id')
        ->where('subject_lecturers.lecturer_id', '=', $id)
        ->get();
        
        // dump($forms);
        
        return view('home')->with('forms', $forms);
    }
    
}
