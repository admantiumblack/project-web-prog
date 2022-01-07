<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //

    public function viewLogin(){
        if(Auth::user()==null){
            return view('login');
        }
        return redirect()->back();
    }
}
