<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SCCController extends Controller
{
    //
    public function viewAllForm(){
        return view('view.formresult');
    }

    public function viewAllFeedback(){
        return view('view.feedbackticket');
    }
}
