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
      DB::table('perfil_modulo')->insert(['id' =>499, 'id_perfil' =>3, 'id_modulo' => 67]);
      DB::table('modulo')->insert(['id' => 67, 'class_icon' => '' ,'nombre' => 'Ubicación', 'url' => 'admin/section-ubicacion', 'parent' => 58, 'visible' => 1, 'orden' =>0, 'estado' =>1, 'created_at' => 43079.8617361111]);
    }
}
