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
        ->select('forms.*', 'subjects.subject', 'subject_lecturers.lecturer_id', 'subject_lecturers.period as lecture_period')
        ->where('subject_lecturers.lecturer_id', '=', $id)
        ->where('subject_lecturers.has_filled_form','=',0)
        ->where('forms.deadline', '>', date('Y-m-d H:i:s', time()))
        ->get();

        $newForms = [];
        foreach($forms as $form){
            if($form->lecture_period == $form->period){
                $newForms[] = $form;
            }
        }

        $subjectLecturers = SubjectLecturer::where('lecturer_id', $id)
                            ->with('subject')->get();
        // dump($forms);
        
        return view('home', [
            'forms' => $forms,
            'lecturerSubjects' => $subjectLecturers
        ]);
    }
    
}
