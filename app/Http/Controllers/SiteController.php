<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() {
        if(auth()->guest()) {
            return view('pages.login');
        }

        $user = auth()->user();
        $eventCount = \App\Event::count();
        $certCount = \App\Certificate::count();

        return view('pages.home',[
            'user'=>$user,
            'eventCount' => $eventCount,
            'certCount' => $certCount
        ]);
    }

    public function login(Request $request) {
        $this->validate($request,[
            'email' => 'required|email',
            'password'=>'required'
        ]);

        $user = auth()->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        if(!$user) return redirect('/')->with('Error','Invalid credentials');

        return redirect('/');

    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
