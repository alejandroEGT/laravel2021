<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Productos;
use App\UnidadMedidas;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function vista_formulario_productos(){

        $categorias = Categorias::all();
        $medidas = UnidadMedidas::all();

        return view('private.admin.formulario_productos')
        ->with([
            'categorias' => $categorias,
            'medidas' => $medidas
        ]);
    }

    public function vista_lista_productos(){
        $productos = Productos::listar();
        $categorias = Categorias::all();
        $medidas = UnidadMedidas::all();
        
        return view('private.admin.lista_productos')
        ->with([
            'productos' => $productos, 
            'categorias' => $categorias,
            'medidas' => $medidas
        ]);
    }
    

    public function guardar(Request $r){
        $producto = Productos::guardar($r);
        return $producto;
    }

    public function actualizar(Request $r){
        
        $update = Productos::actualizar($r->all());
        return $update;

    }

    public function eliminar($id){
       $delete = Productos::eliminar($id);
       return $delete;
    }

}
