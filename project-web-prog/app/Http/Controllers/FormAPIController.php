<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\SubjectLecturer;

class FormAPIController extends Controller
{
    public function insertAnswer(Request $request){
        
        if(!$request->hasCookie('user_auth')){
            return redirect()->back();
        }

        $request->validate([
            'period' => 'required|string|min:3|max:3',
            'answer' => 'required|array'
        ]);

        $subject = $request->answer[2];
        $period = $request->period;
        $lecturerId = $request->answer[0];
        $id = $subject.$period.$lecturerId;
        $subjectLecturer = SubjectLecturer::with('subject.forms')
                ->where('id', $id)
                ->whereRelation('forms', 'period', '=', $period)->first();
        if($subjectLecturer->has_filled_form){
            return redirect()->back()->withErrors([
                'errors' => [
                    'user has filled form'
                ]
            ])->withInput($request->input());
        }

        $form_path = $subjectLecturer->subject->forms[0]->result_path;
        $public_path = pubic_path($form_path);
        $answers = [];
        foreach($request->answer as $answer){
            $answers[] = '"'.$answer.'"';
        }
        $answerString = implode(',', $answers);
        $file = fopen($form_path, 'a');
        fwrite($file, $answerString.'\n');
        fclose($file);
        // change route
        return redirect()->back();
    }
}
