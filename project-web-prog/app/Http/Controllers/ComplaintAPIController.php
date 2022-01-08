<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Subject;

class ComplaintAPIController extends Controller
{
    public function insertNewComplaint(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'subject_id' => 'required'
        ]);

        $nSubject = Subject::where('id', $request->subject_id)->count();
        error_log($nSubject);
        if($nSubject != 1){
            return redirect()->back()->withErrors([
                'errors' => [
                    'subject not found'
                ]
            ])->withInput($request->input());
        }
        
        $newComplaint = new Complaint();
        $newComplaint->subject_id = $request->subject_id;
        $newComplaint->content = $request->content;
        $newComplaint->title = $request->title;
        $newComplaint->save();
        return redirect()->back();
    }
}
