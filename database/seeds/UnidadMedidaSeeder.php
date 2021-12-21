<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_medida')->insert([
            [ 'id' => 1, 'nombre' => 'Unidad' , 'activo'=>'S' ],
            [ 'id' => 2, 'nombre' => 'Kilos' , 'activo'=>'S' ],
            [ 'id' => 3, 'nombre' => 'Litro' , 'activo'=>'S' ],
            [ 'id' => 4, 'nombre' => 'Onza' , 'activo'=>'S' ],
            [ 'id' => 5, 'nombre' => 'Paquete' , 'activo'=>'S' ],
            [ 'id' => 6, 'nombre' => 'Otro' , 'activo'=>'S' ],
        ]);
    }
}
