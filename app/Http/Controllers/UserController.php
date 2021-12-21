<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function user_save(Request $data){
        $user = User::guardar($data);
        return $user;
    }

    public function vista_lista_usuarios(){
        $users = User::where('id','!=', Auth::user()->id)->get();
        return view('private.admin.lista_usuarios')
        ->with([
            'users' => $users,
        ]);
    } 
    public function eliminar($id){
        $user = User::eliminar($id);
        return $user;
    }

    public function actualizar(Request $r){
        $update = User::actualizar($r->all());
        return $update;
    }
}
