<?php

use Illuminate\Database\Seeder;

class AgregarModuloUbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //DB::table('modulo')->insert(['id' => 61, 'class_icon' => '' ,'nombre' => 'Ofertas', 'url' => 'admin/section-ofertas', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
      DB::table('modulo')->where('id', 61)->update(['nombre' => 'Reservas', 'url' => 'admin/section-reservas']);
    }
}
