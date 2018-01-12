<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SectionsContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sections_content', function (Blueprint $table) {
        $table->increments('id');
        $table->string('titulo');
        $table->string('titulo_en');
        $table->text('descripcion');
        $table->text('descripcion_en');
        $table->double('habitacion_simple_precio');
        $table->double('habitacion_doble_precio');
        $table->text('desayuno_desc');
        $table->text('desayuno_desc_en');
        $table->integer('section_id');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('sections_content');
    }
}
