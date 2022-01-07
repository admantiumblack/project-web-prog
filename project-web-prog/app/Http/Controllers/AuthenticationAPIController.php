<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Lecturer;

class AuthenticationAPIController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Lecturer::where('email', $request->email)
                ->where('password', Hash::make($request->password))
                ->with(['position', 'clusterScc'])->get();
        if(count($user) != 1){
            return redirect()->back()
            ->withErrors($validator)->withInput($request->input());
        }

        $currUser = $user[0];

        $role = $currUser->position->position;
        $id = $currUser->id;
        $name = $currUser->name;
        if($currUser->clusterScc !== null){
            $role = 'SCC';
        }
        $userAuth = $id.'_'.$role.'_'.$name;



        Cookie::queue('user_auth', $userAuth);

        return redirect()->route('home');
    }

    public function logout(Request $request){
        if(!$request->hasCookie('user_auth')){
            return redirect()->route('home');
        }
        $cookie = Cookie::forget('user_auth');
        return redirect()->route('home')->withCookie($cookie);
    }
}
