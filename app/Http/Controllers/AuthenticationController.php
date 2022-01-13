<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function viewLogin(){
        return view('login');
    }

    public function viewRegister(){
        return view('register');
    }
}
