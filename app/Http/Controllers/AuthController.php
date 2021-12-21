<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $r){
        
        $r->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $r->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // return $credentials;
            return Response()->json([
                'auth'=>true,
                'user'=>Auth::user()
            ]);
            return redirect()->intended('private_home');
        }

        return redirect('login')->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
        Auth::logout();
  
        return redirect('login');
      }
}
