<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\SubjectLecturer;
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
        ->where('forms.period', '=', 'subject_lecturers.period')
        ->get();

        $subjectLecturers = SubjectLecturer::where('lecturer_id', $id)
                            ->with('subject')->get();
        // dump($forms);
        
        return view('home', [
            'forms' => $forms,
            'lecturerSubjects' => $subjectLecturers
        ]);
    }
    
}
