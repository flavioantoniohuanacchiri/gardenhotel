<?php

use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('section')->insert(['section' =>1, 'ubicacion' => '<p>Avenida Ricardo Rivera Navarrete 450, San Isidro</p>', 'ubicacion' => '<p>Avenida Ricardo Rivera Navarrete 450, San Isidro(en)</p>', 'telefono'=> '<p>(511) 4421771 / 99574368566</p>', 'email'=>'']);
      DB::table('section')->insert(['section' =>2, 'ubicacion' => '<p>Avenida Ricardo Rivera Navarrete 450, San Isidro</p>', 'ubicacion' => '<p>Avenida Ricardo Rivera Navarrete 450, San Isidro(en)</p>', 'telefono'=> '<p><strong>(511) 4421771 / 995743685</strong></p>', 'email'=>'<p><a href="mailto:reservas@gardenhotel.com.pe">reservas@gardenhotel.com.pe</a></p>']);
    }
}
