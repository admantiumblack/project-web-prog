<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SCCController extends Controller
{
    //
    public function viewAllForm(){
        return view('viewAllForm');
    }

    public function viewAllFeedback(){
        return view('viewAllFeedback');
    }
}
