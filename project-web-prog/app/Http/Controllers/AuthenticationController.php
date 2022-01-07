<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    //
    public function viewRegister(){

        return view('register');
    }

    public function viewLogin(){

        return view('login');
    }
}
