<?php

use App\Categorias;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            [ 'id' => 1, 'nombre' => 'Abarrotes' , 'activo'=>'S' ],
            [ 'id' => 2, 'nombre' => 'Legumbres' , 'activo'=>'S' ],
            [ 'id' => 3, 'nombre' => 'Carnes y cecinas' , 'activo'=>'S' ],
            [ 'id' => 4, 'nombre' => 'Otros' , 'activo'=>'S' ],
        ]);
    }
}
