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
        'class_icon' =>'fa-credit-card' ,
        'nombre' => 'inicio',
        'url' => 'section-home',
        'parent' => 11,
        'visible' => 1,
        'orden' => 0,
        'estado' => 1,
        'created_at' => '2017-12-10 20:40:54',
      ]);
    }
}
