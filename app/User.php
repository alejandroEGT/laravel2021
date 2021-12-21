<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function guardar($data){
        
        $user = $this;
        $user->nombre=$data->nombres;
        $user->apellido=$data->apellidos;
        $user->email=$data->email;
        $user->password = bcrypt($data->password);
        $user->perfil = $data->perfil;
        if($user->save()){
            return ['estado'=>true,'mensaje'=>'Usuario registrado'];
        }
        return ['estado'=>false,'mensaje'=>'Error de registro'];
    }

    protected function eliminar($id){
        $user = User::find($id)->delete();
        if($user){
            return ['estado'=>true, 'mensaje'=>'Registro eliminado correctamente'];
        }
        return ['estado'=>false, 'mensaje'=>'No se ha eliminado el registro'];
    }

    protected function actualizar($r){
        $usuario = $this->find($r['id']);
        $usuario->nombre = $r['nombre'];
        $usuario->apellido = $r['apellido'];
        $usuario->email = $r['email'];
        $usuario->perfil = $r['perfil'];
        if($usuario->save()){
            return ['estado'=>true, 'mensaje' =>'Usuario actualizado', 'usuario'=>$usuario];
        }
        return ['estado'=>false, 'mensaje'=>'No se ha actualizado el registro'];

    }
}
