<?php

use Illuminate\Database\Seeder;

class PerfilModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('perfil_modulo')->insert([
        'id_perfil' => 3,
        'id_modulo' => 59,
      ]);
      DB::table('perfil_modulo')->insert([
        'id_perfil' => 3,
        'id_modulo' => 60,
      ]);
      DB::table('perfil_modulo')->insert([
        'id_perfil' => 3,
        'id_modulo' => 61,
      ]);
      DB::table('perfil_modulo')->insert([
        'id_perfil' => 3,
        'id_modulo' => 62,
      ]);
      DB::table('perfil_modulo')->insert([
        'id_perfil' => 3,
        'id_modulo' => 63,
      ]);
      DB::table('perfil_modulo')->insert([
        'id_perfil' => 3,
        'id_modulo' => 64,
      ]);
    }
}
