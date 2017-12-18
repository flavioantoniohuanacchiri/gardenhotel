<?php

use Illuminate\Database\Seeder;

class WebBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('web_banners')->insert([
        'titulo' => 'GARDEN HOTEL SAN ISIDRO',
        'titulo_en' => 'GARDEN HOTEL SAN ISIDRO\' (en)',
        'descripcion' => 'en el centro financiero de Lima, en el distrito de San Isidro',
        'descripcion_en' => 'en el centro financiero de Lima, en el distrito de San Isidro (en)',
        'section_id' => '0',
        'estado' => 1,
        'path_imagen' => 'uploads/b-1.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'CONOCE NUESTRAS INSTALACIONES',
        'titulo_en' => 'CONOCE NUESTRAS INSTALACIONES (en)',
        'descripcion' => 'para sus eventos coorporativos',
        'descripcion_en' => 'para sus eventos coorporativos (en)',
        'section_id' => '0',
        'estado' => 1,
        'path_imagen' => 'uploads/b-2.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'SALA COMEDOR Y LOBBY',
        'titulo_en' => 'SALA COMEDOR Y LOBBY (en)',
        'descripcion' => 'todo en un lugar y al servicio de su comodidad',
        'descripcion_en' => 'todo en un lugar y al servicio de su comodidad (en)',
        'section_id' => '0',
        'estado' => 1,
        'path_imagen' => 'uploads/b-4.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'SALA DE REUNIONES Y CONFERENCIAS',
        'titulo_en' => 'SALA DE REUNIONES Y CONFERENCIAS (en)',
        'descripcion' => 'para sus eventos coorporativos',
        'descripcion_en' => 'para sus eventos coorporativos(en)',
        'section_id' => '0',
        'estado' => 1,
        'path_imagen' => 'uploads/b-3.jpg'
      ]);
      //habitaciones
      DB::table('web_banners')->insert([
        'titulo' => '21 bancos principales, 5 agencias bancarias, 5 administradoras de fondos de pensiones y 6 sociedades agentes de bolsa.',
        'titulo_en' => '21 bancos principales, 5 agencias bancarias, 5 administradoras de fondos de pensiones y 6 sociedades agentes de bolsa. (en)',
        'section_id' => '5',
        'estado' => 1,
        'path_imagen' => 'uploads/bancos.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'Centro de Convenciones Hotel Westin (a dos cuadras del Garden Hotel).',
        'titulo_en' => 'Centro de Convenciones Hotel Westin (a dos cuadras del Garden Hotel). (en)',
        'section_id' => '5',
        'estado' => 1,
        'path_imagen' => 'uploads/westin.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'A menos de 4km del Centro de Convenciones de Lima "27 de Enero',
        'titulo_en' => 'A menos de 4km del Centro de Convenciones de Lima "27 de Enero (en)',
        'section_id' => '5',
        'estado' => 1,
        'path_imagen' => 'uploads/centro-comercial.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'Áreas verdes incluyendo el el Parque de Abtao (15,000 m2) a solo unos metros del Garden Hotel y el Bosque El Olivar (10ha) a 1.2 km de distancia.',
        'titulo_en' => 'A menos de 4km del Centro de Convenciones de Lima "27 de Enero (en)',
        'section_id' => '5',
        'estado' => 1,
        'path_imagen' => 'uploads/areas-verdes.jpg'
      ]);
      //offertas
      DB::table('web_banners')->insert([
        'titulo' => 'OFERTA DE LAST MINUTE',
        'titulo_en' => 'OFERTA DE LAST MINUTE (en)',
        'descripcion' => 'Oferta de Last Minute.',
        'descripcion_en' => 'Oferta de Last Minute. (en)',
        'section_id' => '3',
        'estado' => 1,
        'path_imagen' => 'uploads/oferta-1.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'LATE CHECK-OUT',
        'titulo_en' => 'LATE CHECK-OUT (en)',
        'descripcion' => 'Dependiendo de nuestra disponibilidad, el check-out puede ser dos horas más tarde (2:00pm) sin costo alguno.',
        'descripcion_en' => 'Dependiendo de nuestra disponibilidad, el check-out puede ser dos horas más tarde (2:00pm) sin costo alguno. (en)',
        'section_id' => '3',
        'estado' => 1,
        'path_imagen' => 'uploads/oferta-2.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'TARIFA ESPECIAL',
        'titulo_en' => 'TARIFA ESPECIAL(en)',
        'descripcion' => 'Brindamos tarifa especial a nuestro plato bandera al ( Lomo Saltado ) al precio de S/. 30.00 soles ( incl. IGV ).',
        'descripcion_en' => 'Brindamos tarifa especial a nuestro plato bandera al ( Lomo Saltado ) al precio de S/. 30.00 soles ( incl. IGV ). (en)',
        'section_id' => '3',
        'estado' => 1,
        'path_imagen' => 'uploads/oferta-3.jpg'
      ]);
      DB::table('web_banners')->insert([
        'titulo' => 'PISCO SOUR DE BIENVENIDA',
        'titulo_en' => 'PISCO SOUR DE BIENVENIDA(en)',
        'descripcion' => 'Brindamos un pisco sour de cortesía a nuestros huéspedes..',
        'descripcion_en' => 'Brindamos un pisco sour de cortesía a nuestros huéspedes.(en)',
        'section_id' => '3',
        'estado' => 1,
        'path_imagen' => 'uploads/oferta-4.jpg'
      ]);





    }
}
