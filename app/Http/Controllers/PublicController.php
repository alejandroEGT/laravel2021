<?php

namespace App\Http\Controllers;

use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function vista_formulario_users(){
        return view("public.formularioUsers");
    }

    public function vista_login(){
        return view("public.login");
    }

    public function user_save(Request $data){
        $user = User::guardar($data);
        return $user;
    }


}
