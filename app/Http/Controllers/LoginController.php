<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $req){
        
        $credential = $req -> validate([
            'email' => 'required | email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credential)){
            return redirect() -> route('students.index');
        }else{
            return redirect() -> route('login');
        }

    }

    public function logout(Request $req){

    Auth::logout();
    $req->session()->invalidate();

    $req->session()->regenerateToken();

    return redirect('/');

    }
}
