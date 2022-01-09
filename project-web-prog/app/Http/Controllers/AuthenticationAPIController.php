<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Lecturer;
use App\Models\ClusterScc;
use Illuminate\Support\Facades\Cookie;

class AuthenticationAPIController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = Lecturer::where('email', $request->email)
                ->with(['position', 'clusterScc'])->first();

        if($user === null){
            return redirect()->back()
            ->withErrors([
                'errors' => [
                    'user not found'
                ]
            ])->withInput($request->input());
        }
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
            $clusterScc = ClusterScc::where('cluster_id', $user->clusterScc->id)
                            ->orderBy('date_appointed', 'Desc')
                            ->first();
            error_log($clusterScc);
            if(strcmp($clusterScc->lecturer_id, $id) == 0){
                $role = 'SCC';
            }

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
