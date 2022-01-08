<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\SubjectLecturer;
use App\Models\ClusterScc;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FormAPIController extends Controller
{
    public function insertAnswer(Request $request){
        
        if(!$request->hasCookie('user_auth')){
            return redirect()->back();
        }

        $request->validate([
            'period' => 'required|string|min:3|max:3',
            'answer' => 'required|array',
            'subject_id' => 'required',
        ]);

        $subject = $request->subject_id;
        $period = $request->period;
        $lecturerId = explode($request->cookie('user_auth'))[0];
        $lecturerName = explode($request->cookie('user_auth'))[2];
        $id = $subject.$period.$lecturerId;
        $subjectLecturer = SubjectLecturer::with('subject.forms')
                ->where('id', $id)
                ->whereRelation('forms', 'period', '=', $period)
                ->whereRelation('forms', 'deadline', '>', date('Y-m-d H:i:s', time()))
                ->first();
        if($subjectLecturer->subject->forms === null){
            return redirect()->back()->withErrors([
                'errors' => [
                    'selected form is not found'
                ]
            ])->withInput($request->input());
        }
        if($subjectLecturer->has_filled_form){
            return redirect()->back()->withErrors([
                'errors' => [
                    'user has filled form'
                ]
            ])->withInput($request->input());
        }

        $form_path = $subjectLecturer->subject->forms[0]->result_path;
        $public_path = public_path($form_path);
        $answers = [];
        $answers[] = '"'.$lecturerId.'"';
        $answers[] = '"'.$lecturerName.'"';
        for($i = 1; $i <= 24; $i++){
            $answers[] = $request['Ans_'.$id];
        }
        $answerString = implode(',', $answers);
        $file = fopen($form_path, 'a');
        fwrite($file, $answerString.'\n');
        fclose($file);
        // change route
        return redirect()->back();
    }

    public function createForm(Request $request){

        $request->validate([
            'period' => 'required|min:3|max:3',
            'deadline' => 
            'date|required|date_format:Y-m-d H:i:s|after:'.
            date('Y-m-d H:i:s', time() + (24 * 60 * 60)).'|before_or_equal:'.
            date('Y-m-d H:i:s', time() + (7 * 24 * 60 * 60 + 1))
        ]);

        $sccId = explode('_', $request->cookie('user_auth'))[0];
        
        $scc = ClusterScc::where('lecturer_id', $sccId)
                ->with('cluster.subjects.forms')
                ->whereRelation('forms', 'period', '=', $request->period)
                ->first();

        $nForms = 0;
        foreach($request->cluster->subjects as $subject){
            foreach($subject->forms as $form){
                $nForms++;
            }
        }

        if($nForms > 0){
            return redirect()->back()->withErrors([
                'forms for '.$request->period.' period has been made'
            ])->withInput();
        }

        // $clusterScc = ClusterScc::where('lecturer_id', $sccId)
        //         ->with('cluster.subjects')->get();
        $subjects = $scc->cluster->subjects;

        $path = public_path('storage/form_results');
        $template = storage_path('template.csv');
        if(!file_exists($path)){
            File::makeDirectory($path);
        }

        foreach($subjects as $subject){
            $filename = Str::uuid().'.csv';
            $filepath = $path.'/'.$filename;
            File::copy($template, $filepath);
            $form = new Form();
            $form->subject_id = $subject->id;
            $form->deadline = $request->deadline;
            $form->period = $request->period;
            $form->result_path = 'storage/form_results/'.$filename;
            $form->save();
        }
        $this->sendEmail($request, $scc, $request->period);


        return redirect()->route('home');
    }

    private function sendEmail(Request $request, $clusterId, $period){

    }

}
