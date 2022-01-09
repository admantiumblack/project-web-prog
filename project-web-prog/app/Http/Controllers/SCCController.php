<?php

namespace App\Http\Controllers;

use App\Models\ClusterScc;
use App\Models\Complaint;
use Illuminate\Http\Request;

class SCCController extends Controller
{
    //
    public function viewAllForm(){
        return view('view.formresult');
    }

    public function viewAllFeedback(Request $request){

        $ssc_id = explode('_', $request->cookie('user_auth'))[0];
        $cluster_id = ClusterScc::where('lecturer_id','=',$ssc_id)->first()->cluster_id;
        $complaints = Complaint::join('subjects', 'subjects.id', '=', 'complaints.subject_id')->where('subjects.cluster_id','=',$cluster_id)->get();
        return view('view.feedbackticket', ['complaints'=>$complaints]);
    }


}
