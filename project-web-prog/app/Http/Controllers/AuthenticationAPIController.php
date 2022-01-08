<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Cookie;

class AuthenticationAPIController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Lecturer::where('email', $request->email)
                // ->get()[0];
                // ->where('password', Hash::make($request->password))
                ->with(['position', 'clusterScc'])->first();

        if($user === null){
            return redirect()->back()
            ->withErrors([
                'errors' => [
                    'user not found'
                ]
            ])->withInput($request->input());
        }
        error_log($user->position->position);
        error_log(Hash::make($request->password));
        if(!Hash::check($request->password, $user->password)){
            return redirect()->back()
            ->withErrors([
                'errors' => [
                    'user not found'
                ]
            ])->withInput($request->input());
        }

        $role = $user->position->position;
        $id = $user->id;
        $name = $user->name;
        error_log($user);
        if($user->clusterScc !== null){
            $role = 'SCC';
        }
        $userAuth = $id.'_'.$role.'_'.$name;



        Cookie::queue('user_auth', $userAuth);

        return redirect()->route('home');
    }

    public function logout(Request $request){
        $cookie = Cookie::forget('user_auth');
        return redirect()->route('home')->withCookie($cookie);
    }
}
