<?php

use App\Categorias;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(CategoriaSeeder::class);
      $this->call(UnidadMedidaSeeder::class);
    }
}
