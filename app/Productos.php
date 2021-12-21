<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';
    protected function guardar($r){
        $p = $this;
        $p->codigo = $r->codigo;
        $p->nombre = $r->nombre;
        $p->descripcion = $r->desc;
        $p->categoria_id = $r->categoria;
        $p->umedida_id = $r->medida;
        $p->activo = 'S';
        if($p->save()){
            return['estado'=>true,'mensaje'=>'Producto ingresado correctamente'];
        }
        return['estado'=>false,'mensaje'=>'Error de ingreso'];

    }
    protected function listar(){
        $productos = Productos::join('categorias','categorias.id','productos.categoria_id')
        ->join('unidad_medida','unidad_medida.id','productos.umedida_id')
        ->select([
            'productos.id',
            'productos.codigo',
            'productos.nombre',
            'productos.descripcion',
            'productos.categoria_id',
            'productos.umedida_id',
            'categorias.nombre as categoria',
            'unidad_medida.nombre as umedida'
        ])
        ->orderBy('id', 'desc')->get();
        if(count($productos)>0){
            return $productos;
        }
        return "No hay datos";
    }

    protected function actualizar($r){
        $prod = $this->find($r['id']);
        $prod->codigo = $r['codigo'];
        $prod->nombre = $r['nombre'];
        $prod->descripcion = $r['desc'];
        $prod->categoria_id = $r['categoria'];
        $prod->umedida_id = $r['medida'];
        if($prod->save()){
            return ['estado'=>true, 'mensaje' =>'Producto actualizado', 'producto'=>$prod];
        }
        return ['estado'=>false, 'mensaje'=>'No se ha actualizado el registro'];

    }

    protected function eliminar($id){
        $delete = Productos::find($id)->delete();
        if($delete){
            return ['estado'=>true, 'mensaje'=>'Registro eliminado correctamente'];
        }
        return ['estado'=>false, 'mensaje'=>'No se ha eliminado el registro'];
    }
}
