<?php

use Illuminate\Database\Seeder;

class ModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('modulo')->insert([
        'id' => 58,
        'class_icon' =>'fa-credit-card' ,
        'nombre' => 'Mantenimiento Web',
        'url' => '',
        'parent' => 0,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
      DB::table('modulo')->insert([
        'id' => 59,
        'class_icon' =>'',
        'nombre' => 'Inicio',
        'url' => 'admin/section-inicio',
        'parent' => 58,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
      DB::table('modulo')->insert([
        'id' => 60,
        'class_icon' =>'' ,
        'nombre' => 'Hotel',
        'url' => 'admin/section-hotel',
        'parent' => 58,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
      DB::table('modulo')->insert([
        'id' => 61,
        'class_icon' =>'' ,
        'nombre' => 'Ofertas',
        'url' => 'admin/section-ofertas',
        'parent' => 58,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
      DB::table('modulo')->insert([
        'id' => 62,
        'class_icon' =>'' ,
        'nombre' => 'Sala de Conferencias',
        'url' => 'admin/section-salaconferencias',
        'parent' => 58,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
      DB::table('modulo')->insert([
        'id' => 63,
        'class_icon' =>'' ,
        'nombre' => 'Habitaciones',
        'url' => 'admin/section-habitaciones',
        'parent' => 58,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
      DB::table('modulo')->insert([
        'id' => 64,
        'class_icon' =>'' ,
        'nombre' => 'Centro Finaciero',
        'url' => 'admin/section-centrofinanciero',
        'parent' => 58,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
    }

}
