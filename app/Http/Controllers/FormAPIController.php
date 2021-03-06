<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\SubjectLecturer;
use App\Models\Subject;
use App\Models\ClusterScc;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Jobs\SendReminderEmail;
use App\Jobs\CreateForms;
use App\Mail\NotificationEmail;
use Illuminate\Support\Facades\Storage;

class FormAPIController extends Controller
{
    public function insertAnswer(Request $request){
        
        $rules = [
            'period' => 'required',
            'subject_id' => 'required'
        ];
        for($i = 1; $i <= 25; $i++){
            $rules['Ans_'.$i] = 'required';
        }
        foreach($request->input() as $key => $value) {
            error_log("$key is at $value");
          }
        error_log(implode('-', $request->input()));
        $request->validate($rules);
        // error_log('rule success');
        $subject = $request->subject_id;
        $period = $request->period;
        $lecturerId = explode('_', $request->cookie('user_auth'))[0];
        $lecturerName = explode('_', $request->cookie('user_auth'))[2];
        $id = $subject.$period.$lecturerId;
        $subjectLecturer = SubjectLecturer::where('subject_lecturers.id', $id)
                ->join('subjects', 'subjects.id', '=', 'subject_lecturers.subject_id')
                ->join('forms', 'forms.subject_id', '=', 'subjects.id')
                // ->whereRelation('subject.forms', 'period', '=', $period)
                ->where('forms.deadline', '>', date('Y-m-d H:i:s', time()))
                ->select('forms.*', 'subjects.id',
                     'subject_lecturers.has_filled_form',
                      'subject_lecturers.period as lecture_period')
                ->whereRaw('forms.period = subject_lecturers.period')
                ->get();

        error_log(count($subjectLecturer));
        if(count($subjectLecturer) != 1){
            error_log('form error');
            return redirect()->back()->withErrors([
                'errors' => [
                    'selected form is not found'
                ]
            ])->withInput($request->input());
        }
        $subjectLecturer = $subjectLecturer[0];
        if($subjectLecturer->has_filled_form){
            error_log('form has been filled');
            return redirect()->back()->withErrors([
                'errors' => [
                    'user has filled form'
                ]
            ])->withInput($request->input());
        }

        $form_path = $subjectLecturer->result_path;
        $answers = [];
        $answers[] = '"'.$lecturerId.'"';
        $answers[] = '"'.$lecturerName.'"';
        for($i = 1; $i <= 25; $i++){
            $answers[] = '"'.$request['Ans_'.$i].'"';
        }
        $answerString = implode(',', $answers);
        // $file = fopen($form_path, 'a');
        Storage::disk('google')->append($form_path, $answerString."\n");

        $subjectLecturer = SubjectLecturer::find($id);

        $subjectLecturer->has_filled_form = true;
        $subjectLecturer->save();

        // change route
        return redirect()->route('home');
    }

    public function createForm(Request $request){

        error_log($request->deadline);

        $request->validate([
            'period' => 'required|min:3|max:3',
            'deadline' => 
            'date|required|date_format:Y-m-d|after:'.
            date('Y-m-d', time()).'|before_or_equal:'.
            date('Y-m-d', time() + (7 * 24 * 60 * 60 + 1))
        ]);

        $sccId = explode('_', $request->cookie('user_auth'))[0];
        
        // $scc = ClusterScc::where('lecturer_id', $sccId)
        //         ->with('cluster.subjects.forms')
        //         ->whereRelation('forms', 'period', '=', $request->period)
        //         ->first();
        $id = ClusterScc::where('lecturer_id', $sccId)->first()->cluster_id;
        $nForms = Subject::where('subjects.cluster_id', $id)
                ->join('forms', 'forms.subject_id', '=', 'subjects.id')
                ->where('forms.period', $request->period)
                ->count();
        // $nForms = 0;
        // foreach($request->cluster->subjects as $subject){
        //     foreach($subject->forms as $form){
        //         $nForms++;
        //     }
        // }

        if($nForms > 0){
            return redirect()->back()->withErrors([
                'forms for '.$request->period.' period has been made'
            ])->withInput();
        }

        // $clusterScc = ClusterScc::where('lecturer_id', $sccId)
        //         ->with('cluster.subjects')->get();
        $subjects = Subject::where('subjects.cluster_id', $id)->get();


        $subjectIds = [];
        foreach($subjects as $subject){
            $subjectIds[] = $subject->id;
        }

        $formCreator = new CreateForms($subjectIds, $request->deadline, $request->period);
        $this->dispatch($formCreator);

        $this->sendEmail($id, $request->period, $request->deadline.' 23:59:59');

        return redirect()->route('home');
    }

    private function sendEmail($clusterId, $period, $deadline){

        $lecturerContents = Subject::where('subjects.cluster_id', $clusterId)
                    ->join('subject_lecturers', 'subject_lecturers.subject_id', '=', 'subjects.id')
                    ->join('lecturers', 'lecturers.id', '=', 'subject_lecturers.lecturer_id')
                    ->where('subject_lecturers.period', $period)
                    ->select('lecturers.email', 'subjects.subject', 
                    'subject_lecturers.period', 'lecturers.name',
                    'subjects.subject')
                    ->get();

        $emails = [];
        foreach($lecturerContents as $content){
            $details = [
                'title' => $content->subject.' form for '.$content->period.'.',
                'header' => 'Dear Mr/Ms. '.$content->name.'.',
                'content' => 'Please fill '.
                        $content->subject.' form for '.$content->period."\n\n\n".
                        'Deadline for the form is: '.$deadline.'.'
            ];
            $emails[] =[
                'email' => new NotificationEmail($details),
                'destination' => $content->email
            ];
            
        }
        $reminder = new SendReminderEmail($emails);
        $this->dispatch($reminder);

    }

}
