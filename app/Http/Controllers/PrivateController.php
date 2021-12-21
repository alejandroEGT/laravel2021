<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateController extends Controller
{
    public function vista_privada(){
        return view('private.home');
    }
}
